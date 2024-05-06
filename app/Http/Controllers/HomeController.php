<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Activity;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [      
            'services'        =>  Activity::where('status',1)->orderBy('id', 'desc')->get(),      
            'activites'        =>  Activity::limit(4)->where('status',1)->where('activity_type','Best Selling Activities - Dubai')->orderBy('id', 'desc')->get(),
            'activites_adventures'        =>  Activity::limit(4)->where('status',1)->where('activity_type','Adventure Tours & Activities')->orderBy('id', 'desc')->get(),
            'activites_packages'        =>  Activity::limit(4)->where('status',1)->where('activity_type','Best Vacation Packages - UAE')->orderBy('id', 'desc')->get(),
            'activites_holidays'        =>  Activity::limit(4)->where('status',1)->where('activity_type','Hoiday packages')->orderBy('id', 'desc')->get(),
            'activites_combos'        =>  Activity::limit(4)->where('status',1)->where('activity_type','Combo package')->orderBy('id', 'desc')->get(),
            'activites_tours'        =>  Activity::limit(4)->where('status',1)->where('activity_type','Tours')->orderBy('id', 'desc')->get(),
            'activites_combo_tours'        =>  Activity::limit(4)->where('status',1)->where('activity_type','Best Saver Combo Tours')->orderBy('id', 'desc')->get(),

            'activites_count_abu_dhabi'        =>  Activity::where('status',1)->where('country_state', 'Abu Dhabi')->orderBy('id', 'desc')->get(),   
            'activites_count_dubai'        =>  Activity::where('status',1)->where('country_state', 'Dubai')->orderBy('id', 'desc')->get(),   
            'activites_count_ajman'        =>  Activity::where('status',1)->where('country_state', 'Ajman')->orderBy('id', 'desc')->get(),   
            'activites_count_sharjah'        =>  Activity::where('status',1)->where('country_state', 'Sharjah')->orderBy('id', 'desc')->get(),   

            'blogs'          =>     Blog::where('status',1)
                ->limit(3)
                ->orderBy('id', 'desc')
                ->get(),


            'activites_one'        =>  Activity::where('status',1)->orderBy('id', 'desc')->limit(1)->get(),
        ];
        return view('home', $data);
    }

    public function search(Request $request)
    {
        if($request->service != ''){
            $activity = Activity::where('status',1)->where('name',$request->service)->get();
            $activitycount = Activity::where('status',1)->where('name',$request->service)->orderBy('id', 'desc')->count();
        }
        else{
            $activity = Activity::where('status',1)->get();            
            $activitycount = Activity::where('status',1)->latest()->count();
        }

        $data = [
            'activites'  =>  $activity,
            // 'activites'        =>  Activity::where('status',1)->orderBy('id', 'desc')->get(),
            'activites_count'     =>  $activitycount,
        ];

        return view('product',$data);
    }

    public function typesearch(Request $request)
    {
        // dd($request->all());
        if($request->activity_type != ''){
            $activity = Activity::where('activity_type',$request->activity_type)->get();
            $activitycount = Activity::where('activity_type',$request->activity_type)->orderBy('id', 'desc')->count();
        }
        else{
            $activity = Activity::where('status',1)->get();            
            $activitycount = Activity::where('status',1)->latest()->count();
        }

        $data = [
            'activites'  =>  $activity,
            // 'activites'        =>  Activity::where('status',1)->orderBy('id', 'desc')->get(),
            'activites_count'     =>  $activitycount,
        ];

        return view('product',$data);
    }
}
