<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Activity;
use App\Models\visa;
use App\Models\Contact;
use App\Models\Enquiry_Prodoct;
use App\Models\Processing;
use App\Models\Counter;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $currentDate = Carbon::now();

        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $lastDate = Processing::orderBy('updated_at', 'desc')->pluck('updated_at')->first();
        $lastDate = date('Y-m-d', strtotime($lastDate));

        $data = [            
            'activity' => count(Activity::get()),
            'visa' => count(visa::get()),
            'blogs' => count(Blog::get()),
            'contacts' => count(Contact::get()),
            'enquiry' => count(Enquiry_Prodoct::get()),
            'liked' => Counter::first()->liked_value,
            'disliked' => Counter::first()->disliked_value,
            'processings' => count(Processing::whereNotNull('order_number')->get()), 

            'currentMonth' => $endDate->format('F'),  
            'currentDate' => $currentDate->format('d'),  

            'daysaleammount' => Processing::where('order_status', 'Approved')->whereDate('updated_at', $currentDate)->sum('amount'),
            'monthsaleammount' => Processing::where('order_status', 'Approved')->whereBetween('updated_at', [$startDate, $endDate])->sum('amount'),
            'allsaleammount' => Processing::where('order_status', 'Approved')->sum('amount'),

            'month' => Processing::select(
                DB::raw('MONTH(updated_at) as month'),
                DB::raw('MIN(updated_at) as start_date'),
                DB::raw('MAX(updated_at) as end_date'),
                DB::raw('SUM(amount) as total_amount')
            )
                ->groupBy('month')
                ->where('order_status', 'Approved')
                ->get(),         
        ];
        $numericMonths = $data['month']->pluck('month'); // Extract numeric month values
        $englishMonths = [];

        foreach ($numericMonths as $numericMonth) {
            $englishMonths[] = Carbon::createFromDate(null, $numericMonth)->englishMonth;
        }

        $data['montheng'] = $englishMonths;
        $data['start'] = $data['month']->pluck('start_date');
        $data['end'] = $data['month']->pluck('end_date');
        $data['labels'] = $data['start']->map(function ($datetime) {
            return Carbon::parse($datetime)->toDateString();
        })->toArray();
        $data['labels2'] = $data['end']->map(function ($date) {
            return Carbon::parse($date)->toDateString();
        })->toArray();
        $data['values'] = $data['month']->pluck('total_amount');
        // dd($data);
        return view('cms.dashboards.dashboard', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
