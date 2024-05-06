<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityPrice;
use App\Models\ActivityGalleryImage;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{
    public function index()
    {
        
        return view('cms.tours.index');
    }

    public function datatable()
    {
        $tour = Activity::where('status', 1)
                ->where(function ($query) {
                    $query->where('activity_type', 'Tours')
                          ->orWhere('activity_type', 'Best Saver Combo Tours');
                })
                ->orderBy('id', 'desc')
                ->get();

        // $roles = $roles->transform(function ($item) {
        //     $item->role_names = $item->roles->pluck('name')->implode(', ');
        //     return $item;
        // })->all();

        return DataTables::collection($tour)->toJson();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'isEdit'    =>  false,
        ];

        return view('cms.tours.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        $request->validate([
            'name' => 'required',
        ]);
        
        $tour         =   new Activity;

        $image = Storage::disk('cms')->putFile('', $request->featured_image);
        $tour->featured_image  =   $image;

        $tour->activity_type                =   $request->type;
        $tour->name                         =   $request->name;
        $tour->price                        =   $request->price;
        $tour->country_state                =   $request->country_state;
        $tour->operating_hours              =   $request->operating_hours;
        $tour->instant_confirmation         =   $request->instant_confirmation;
        $tour->mobile_voucher_accepted      =   $request->mobile_voucher_accepted;
        $tour->non_refundable               =   $request->non_refundable;
        $tour->language                     =   $request->language;
        $tour->transfer_options_available   =   $request->transfer_options_available;
        $tour->google_map_link              =   $request->google_map_link;
        $tour->about_experience             =   $request->about_experience;
        $tour->highlights                   =   $request->highlights;
        $tour->tour_inclusions              =   $request->tour_inclusions;
        $tour->important_information        =   $request->important_information;     
        $tour->booking_policy               =   $request->booking_policy;
        $tour->slug                         =   strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $tour->save();

        foreach($request->activity_name as $key => $tour_name){
            $tourprice                                   =   new ActivityPrice;
            $tourprice->activity_id                      =   $tour->id;
            $tourprice->activity_name                    =   $tour_name;
            $tourprice->without_transfer_option_price    =   $request->without_transfer_option_price[$key];
            $tourprice->sharing_transfer_option_price    =   $request->sharing_transfer_option_price[$key];
            $tourprice->private_transfer_option_price    =   $request->private_transfer_option_price[$key];
            $tourprice->tour_date                        =   $request->tour_date[$key];
            // Without Transfer Price
            $tourprice->adult_price                      =   $request->adult_price[$key];
            $tourprice->child_price                      =   $request->child_price[$key];
            $tourprice->infant_price                     =   $request->infant_price[$key];

            // Sharing Transfer Price
            $tourprice->adult_price_st                      =   $request->adult_price_st[$key];
            $tourprice->child_price_st                      =   $request->child_price_st[$key];
            $tourprice->infant_price_st                     =   $request->infant_price_st[$key];

            // Private Transfer Price
            $tourprice->adult_price_pt                      =   $request->adult_price_pt[$key];
            $tourprice->child_price_pt                      =   $request->child_price_pt[$key];
            $tourprice->infant_price_pt                     =   $request->infant_price_pt[$key];

            // More Booking Policy
            $tourprice->without_pickup_timings              =   $request->without_pickup_timings[$key];
            $tourprice->sharing_pickup_timings              =   $request->sharing_pickup_timings[$key];
            $tourprice->private_pickup_timings              =   $request->private_pickup_timings[$key];
            $tourprice->without_duration_approx             =   $request->without_duration_approx[$key];
            $tourprice->sharing_duration_approx             =   $request->sharing_duration_approx[$key];
            $tourprice->private_duration_approx             =   $request->private_duration_approx[$key];
            $tourprice->cancellation_policy                 =   $request->cancellation_policy[$key];
            $tourprice->child_policy                        =   $request->child_policy[$key];
            $tourprice->inclusions                          =   $request->inclusions[$key];
            $tourprice->exclusion                           =   $request->exclusion[$key];
            $tourprice->save();
        }

        if($request->has('multi_images')){
            foreach($request->multi_images as $gallery_img){
                $tour_gallery                =   new ActivityGalleryImage;
                $tour_gallery->activity_id    =   $tour->id;

                $imageName = Storage::disk('cms')->putFile('', $gallery_img);
                $tour_gallery->image  =   $imageName;
                $tour_gallery->save();
            }
        }

        return redirect()->route('tours');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $tour)
    {
        $data = [
            'isEdit'   => true,
            'tour'    => $tour->load('features'),
        ];

        // return $data['vehicle'];

        return view('cms.tours.add', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $tour, ActivityPrice $tourprice)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $tour                               =   Activity::find($request->id);
        $tour->activity_type                =   $request->type;
        $tour->name                         =   $request->name;
        $tour->price                        =   $request->price;
        $tour->country_state                =   $request->country_state;
        $tour->operating_hours              =   $request->operating_hours;
        $tour->instant_confirmation         =   $request->instant_confirmation;
        $tour->mobile_voucher_accepted      =   $request->mobile_voucher_accepted;
        $tour->non_refundable               =   $request->non_refundable;
        $tour->language                     =   $request->language;
        $tour->transfer_options_available   =   $request->transfer_options_available;
        $tour->google_map_link              =   $request->google_map_link;
        $tour->about_experience             =   $request->about_experience;
        $tour->highlights                   =   $request->highlights;
        $tour->tour_inclusions              =   $request->tour_inclusions;
        $tour->important_information        =   $request->important_information; 
        $tour->booking_policy               =   $request->booking_policy;
        $tour->slug                         =   strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));

        if ($request->featured_image == null) {
             $tour->featured_image;            
        }
        else{
            $image = Storage::disk('cms')->putFile('', $request->featured_image);
            $tour->featured_image  =   $image;
        }
        
        $tour->save();

        if($tourprice->value != $request->activity_name[0]){            
            foreach($request->featureid as $key => $tour_name){
                $tourprice                =   ActivityPrice::where('id', $request->featureid[$key])->first();
                $tourprice->activity_name                    =   $request->activity_name[$key];
                $tourprice->without_transfer_option_price    =   $request->without_transfer_option_price[$key];
                $tourprice->sharing_transfer_option_price    =   $request->sharing_transfer_option_price[$key];
                $tourprice->private_transfer_option_price    =   $request->private_transfer_option_price[$key];
                $tourprice->tour_date                        =   $request->tour_date[$key];
                // Without Transfer Price
                $tourprice->adult_price                      =   $request->adult_price[$key];
                $tourprice->child_price                      =   $request->child_price[$key];
                $tourprice->infant_price                     =   $request->infant_price[$key];

                // Sharing Transfer Price
                $tourprice->adult_price_st                      =   $request->adult_price_st[$key];
                $tourprice->child_price_st                      =   $request->child_price_st[$key];
                $tourprice->infant_price_st                     =   $request->infant_price_st[$key];

                // Private Transfer Price
                $tourprice->adult_price_pt                      =   $request->adult_price_pt[$key];
                $tourprice->child_price_pt                      =   $request->child_price_pt[$key];
                $tourprice->infant_price_pt                     =   $request->infant_price_pt[$key];

                // More Booking Policy
                $tourprice->without_pickup_timings              =   $request->without_pickup_timings[$key];
                $tourprice->sharing_pickup_timings              =   $request->sharing_pickup_timings[$key];
                $tourprice->private_pickup_timings              =   $request->private_pickup_timings[$key];
                $tourprice->without_duration_approx             =   $request->without_duration_approx[$key];
                $tourprice->sharing_duration_approx             =   $request->sharing_duration_approx[$key];
                $tourprice->private_duration_approx             =   $request->private_duration_approx[$key];
                $tourprice->cancellation_policy                 =   $request->cancellation_policy[$key];
                $tourprice->child_policy                        =   $request->child_policy[$key];
                $tourprice->inclusions                          =   $request->inclusions[$key];
                $tourprice->exclusion                           =   $request->exclusion[$key];
                $tourprice->save();
            }  
            
        }
        else{           
            foreach($request->activity_name as $key => $tour_name){
                $tourprice                                   =   new ActivityPrice;
                $tourprice->activity_id                      =   $tour->id;
                $tourprice->activity_name                    =   $tour_name;
                $tourprice->without_transfer_option_price    =   $request->without_transfer_option_price[$key];
                $tourprice->sharing_transfer_option_price    =   $request->sharing_transfer_option_price[$key];
                $tourprice->private_transfer_option_price    =   $request->private_transfer_option_price[$key];
                $tourprice->tour_date                        =   $request->tour_date[$key];
                // Without Transfer Price
                $tourprice->adult_price                      =   $request->adult_price[$key];
                $tourprice->child_price                      =   $request->child_price[$key];
                $tourprice->infant_price                     =   $request->infant_price[$key];

                // Sharing Transfer Price
                $tourprice->adult_price_st                      =   $request->adult_price_st[$key];
                $tourprice->child_price_st                      =   $request->child_price_st[$key];
                $tourprice->infant_price_st                     =   $request->infant_price_st[$key];

                // Private Transfer Price
                $tourprice->adult_price_pt                      =   $request->adult_price_pt[$key];
                $tourprice->child_price_pt                      =   $request->child_price_pt[$key];
                $tourprice->infant_price_pt                     =   $request->infant_price_pt[$key];

                // More Booking Policy
                $tourprice->without_pickup_timings              =   $request->without_pickup_timings[$key];
                $tourprice->sharing_pickup_timings              =   $request->sharing_pickup_timings[$key];
                $tourprice->private_pickup_timings              =   $request->private_pickup_timings[$key];
                $tourprice->without_duration_approx             =   $request->without_duration_approx[$key];
                $tourprice->sharing_duration_approx             =   $request->sharing_duration_approx[$key];
                $tourprice->private_duration_approx             =   $request->private_duration_approx[$key];
                $tourprice->cancellation_policy                 =   $request->cancellation_policy[$key];
                $tourprice->child_policy                        =   $request->child_policy[$key];
                $tourprice->inclusions                          =   $request->inclusions[$key];
                $tourprice->exclusion                           =   $request->exclusion[$key];

                $tourprice->save();
                // dd($tourprice);
            }          
        }

        if($request->has('multi_images')){
            foreach($request->multi_images as $gallery_img){
                $tour_gallery                =   new ActivityGalleryImage;
                $tour_gallery->activity_id    =   $tour->id;

                $imageName = Storage::disk('cms')->putFile('', $gallery_img);
                $tour_gallery->image  =   $imageName;
                $tour_gallery->save();
            }
        }

        return redirect()->route('tours');
    }

    public function status(Request $request)
    {

        $status = $request->status;
        $id = $request->id;

        $item = Activity::find($id);

        if ($item->update(['status' => $status])) {
            $response['status'] = true;
            $response['message'] = 'Status Updated Successfully!';

            return response()->json($response, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function imagedestroy(Request $request)
    {
        $activityimage = ActivityGalleryImage::where('id', $request->deleteId);
        $activityimage->delete();


        return response()->json($activityimage, 200);
    }

    public function featuredestroy(Request $request)
    {
        $activityfeature = ActivityGalleryImage::where('id', $request->deletefeatureId);
        $activityfeature->delete();


        return response()->json($activityfeature, 200);
    }

    public function destroy(Request $request)
    {        
        ActivityPrice::where('activity_id', $request->deleteId)->delete();
        ActivityGalleryImage::where('activity_id', $request->deleteId)->delete();
        Wishlist::where('activity_id', $request->deleteId)->delete();
        $tour = Activity::where('id', $request->deleteId)->first();
        $tour->delete();

        return response()->json($tour, 200);
    }
}
