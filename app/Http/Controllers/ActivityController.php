<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityPrice;
use App\Models\Enquiry_Prodoct;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $data = [
            'activites' => Activity::where('status', 1)
                ->where(function ($query) {
                    $query->where('activity_type', 'Adventure Tours & Activities')
                          ->orWhere('activity_type', 'Best Selling Activities - Dubai');
                })
                ->orderBy('id', 'desc')
                ->get(),

            'activites_count' => Activity::where('status', 1)
                ->where(function ($query) {
                    $query->where('activity_type', 'Adventure Tours & Activities')
                          ->orWhere('activity_type', 'Best Selling Activities - Dubai');
                })
                ->orderBy('id', 'desc')
                ->count(),
        ];

        return view('product',$data);
    }

    public function packages()
    {
        $data = [
            'packages' => Activity::where('status', 1)
                ->where(function ($query) {
                    $query->where('activity_type', 'Best Vacation Packages - UAE')
                          ->orWhere('activity_type', 'Hoiday packages')
                          ->orWhere('activity_type', 'Combo package');
                })
                ->orderBy('id', 'desc')
                ->get(),

            'packages_count' => Activity::where('status', 1)
                ->where(function ($query) {
                    $query->where('activity_type', 'Best Vacation Packages - UAE')
                          ->orWhere('activity_type', 'Hoiday packages')
                          ->orWhere('activity_type', 'Combo package');
                })
                ->orderBy('id', 'desc')
                ->count(),
        ];

        return view('package',$data);
    }

    public function tours()
    {
        $data = [
            'tours' => Activity::where('status', 1)
                ->where(function ($query) {
                    $query->where('activity_type', 'Tours')
                          ->orWhere('activity_type', 'Best Saver Combo Tours');
                })
                ->orderBy('id', 'desc')
                ->get(),

            'tours_count' => Activity::where('status', 1)
                ->where(function ($query) {
                    $query->where('activity_type', 'Tours')
                          ->orWhere('activity_type', 'Best Saver Combo Tours');
                })
                ->orderBy('id', 'desc')
                ->count(),
        ];

        return view('tour',$data);
    }

    public function getActivity($slug)
    {
        $activity = Activity::where('slug',$slug)->first();

        $data = [
            'activityprice' => ActivityPrice::get(),
            'activity' => $activity,
        ];
        return view('single-product',$data);
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

    public function autosearch(Request $request)
    {
        if ($request->ajax()) {
            $data = Activity::where('name','LIKE',$request->product_brand_search.'%')
            ->where(function ($query) {
                    $query->where('activity_type', 'Hoiday packages')
                          ->orWhere('activity_type', 'Best Vacation Packages - UAE');
                })
            ->get();
            $output = '';
            if (count($data)>0) {
                $output = '<ul class="dropdown-menu" id="dropdown-menu-search-ul" style="display:block;width: 100%; border: 0px solid rgba(0,0,0,.15);">';
                foreach ($data as $row) {
                    $output .= '<li class="list-group-item" id="dropdown-menu-search-li">
                        <a href="http://127.0.0.1:8000/activites/'.$row->slug.'" style="display: flex;">
                            <span style="border-radius: 10px;display: -webkit-inline-box;">
                                <img src="http://localhost/desertsafari/cms/public/uploads/'.$row->featured_image.'" alt="'.$row->name.'" class="hover-image" style="height: 50px;border-radius: 5px;width: 50px;">
                            </span>
                            <span style="font-size: 13px;font-weight: 700; margin-left: 10px; display: flex; align-items: center;">'.$row->name.'</span> <br>
                            <p style="font-size: 13px;font-weight: 700; margin-left: 10px; display: flex; align-items: center;">AED '.$row->price.'</p> 
                        </a>
                    </li>';
                }
                $output .= '</ul>';
            }else {
                $output .= '<li class="list-group-item" style="display:block; position:absolute;width: 100%;padding: 10px; z-index: 999">
                    <center>
                        <img src="/assets/img/sorry.png" alt="Sorry Image" class="hover-image" style="border-radius: 10px;width: 200px;">
                    </center>
                </li>';
            }
            return $output;
        }
        return view('autosearch');  
    }
}
