<?php

namespace App\Http\Controllers;

use App\Models\Visa;
use App\Models\VisaPrice;
use App\Models\Enquiry_Prodoct;
use Illuminate\Http\Request;

class VisaController extends Controller
{
    public function index()
    {
        $data = [
            'visas' => Visa::where('status', 1)->orderBy('id', 'desc')
                ->get(),

            'visas_count' => Visa::where('status', 1)->orderBy('id', 'desc')
                ->count(),
        ];

        return view('visa',$data);
    }

    public function getVisa($slug)
    {
        $visa = Visa::where('slug',$slug)->first();

        $data = [
            'visaprice' => VisaPrice::get(),
            'visa' => $visa,
        ];
        return view('single-visa',$data);
    }

    public function enquirysend(Request $request)
    {
        $enquiry = new Enquiry_Prodoct;
        $enquiry->product_name = $request->product_name;
        $enquiry->product_link = $request->product_link;
        $enquiry->fname = $request->fname;
        $enquiry->lname = $request->lname;
        $enquiry->email = $request->email;
        $enquiry->country = $request->country;
        $enquiry->number = $request->number;
        $enquiry->subject = $request->subject;
        $enquiry->save();

        return redirect()->back()->with('message', 'YOUR REQUEST HAS BEEN SUBMITTED SUCCESSFULLY');
    }
}
