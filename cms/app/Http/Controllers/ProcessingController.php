<?php

namespace App\Http\Controllers;

use App\Models\Processing;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ProcessingController extends Controller
{
    public function datatable()
    {
        $processings = Processing::orderBy('id', 'desc')->whereNotNull('order_number')->get();

        return DataTables::collection($processings)->toJson();

    }
    public function index()
    {
        return view('cms.store_purchase.index');
    }

    public function show(Processing $processings)
    {
        $data = [
            'isEdit'    =>  true,
            'processings'    => $processings,
        ];

        return view('cms.store_purchase.show', $data);
    }

    public function update(Request $request, Processing $processings)
    {
        if($request->client_name){
            $processings->client_name      =   $request->client_name;
        }
        if($request->client_country){
            $processings->client_country      =   $request->client_country;
        }
        if($request->client_address){
            $processings->client_address      =   $request->client_address;
        }
        if($request->client_number){
            $processings->client_number      =   $request->client_number;
        }
        if($request->client_alternate_number){
            $processings->client_alternate_number      =   $request->client_alternate_number;
        }
        if($request->order_status){
            $processings->order_status      =   $request->order_status;
        }
        $processings->reason_cancel     =   $request->reason_cancel;
        $processings->save();

        return redirect()->route('stock_purchase');
    }

    // public function destroy(Request $request)
    // {
    //     dd($request->input('id'));
    //     $id = $request->input('id');
    //     $processings = Processing::where('id', $id)->first();
    //     $processings->delete();
    //     // return $request;
    //     return response()->json($processings, 200);
    // }

    public function destroy(Request $request)
    {
        // dd($request->deleteId);
        $processings = Processing::where('id', $request->deleteId)->first();
        $processings->delete();
        // return $request;

        return response()->json($processings, 200);
    }

    public function emailsent(Request $request)
    {
        $processings = Processing::where('id', $request->emailId)->first();
        // dd($processings->client_email);
        
        $data = ['booking' => $processings];
        $user['to'] = $processings->client_email;
        $user['cc'] = 'mrhuzaifa29@gmail.com';
        // $user['cc'] = 'booking@falcondrive.ae';
        
        Mail::send('cms.store_purchase.booking_email', $data, function ($messages) use ($user) {
            $messages->to($user['to']);
            $messages->cc($user['cc']);
            $messages->subject('Purchased Service');
            $messages->from('huzikhan900@gmail.com', 'Desert Safari'); // Add the sender's email address and name
        });

        // return $request;

        return response()->json($processings, 200);
    }

    public function getDataDownloadBetweenDates(Request $request)
    {
        // dd($request->all());
        $status = $request->input('status');
        
        $transactionsQuery = Processing::orderBy("id","DESC");

        if ($status !== 'All') {
            $transactionsQuery->where('order_status', $status);
        }

        $transactions = $transactionsQuery->orderBy("id","DESC")->whereNotNull('order_number')->get();
        $count = $transactions->count();

        return response()->json(['transactions' => $transactions, 'count' => $count]);
    }
}


