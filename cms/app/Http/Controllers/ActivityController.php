<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityPrice;
use App\Models\ActivityGalleryImage;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function index()
    {
        
        return view('cms.activities.index');
    }

    public function datatable()
    {
        $activity = Activity::where('status', 1)
                ->where(function ($query) {
                    $query->where('activity_type', 'Adventure Tours & Activities')
                          ->orWhere('activity_type', 'Best Selling Activities - Dubai');
                })
                ->orderBy('id', 'desc')
                ->get();

        // $roles = $roles->transform(function ($item) {
        //     $item->role_names = $item->roles->pluck('name')->implode(', ');
        //     return $item;
        // })->all();

        return DataTables::collection($activity)->toJson();
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

        return view('cms.activities.add', $data);
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
        
        $activity         =   new Activity;

        $image = Storage::disk('cms')->putFile('', $request->featured_image);
        $activity->featured_image  =   $image;

        $activity->activity_type                =   $request->type;
        $activity->name                         =   $request->name;
        $activity->price                        =   $request->price;
        $activity->country_state                =   $request->country_state;
        $activity->operating_hours              =   $request->operating_hours;
        $activity->instant_confirmation         =   $request->instant_confirmation;
        $activity->mobile_voucher_accepted      =   $request->mobile_voucher_accepted;
        $activity->non_refundable               =   $request->non_refundable;
        $activity->language                     =   $request->language;
        $activity->transfer_options_available   =   $request->transfer_options_available;
        $activity->google_map_link              =   $request->google_map_link;
        $activity->about_experience             =   $request->about_experience;
        $activity->highlights                   =   $request->highlights;
        $activity->tour_inclusions              =   $request->tour_inclusions;
        $activity->important_information        =   $request->important_information;
        $activity->booking_policy               =   $request->booking_policy;
        $activity->slug                         =   strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $activity->save();

        foreach($request->activity_name as $key => $activity_name){
            $activityprice                                   =   new ActivityPrice;
            $activityprice->activity_id                      =   $activity->id;
            $activityprice->activity_name                    =   $activity_name;
            $activityprice->without_transfer_option_price    =   $request->without_transfer_option_price[$key];
            $activityprice->sharing_transfer_option_price    =   $request->sharing_transfer_option_price[$key];
            $activityprice->private_transfer_option_price    =   $request->private_transfer_option_price[$key];
            $activityprice->tour_date                        =   $request->tour_date[$key];

            // Without Transfer Price
            $activityprice->adult_price                      =   $request->adult_price[$key];
            $activityprice->child_price                      =   $request->child_price[$key];
            $activityprice->infant_price                     =   $request->infant_price[$key];

            // Sharing Transfer Price
            $activityprice->adult_price_st                      =   $request->adult_price_st[$key];
            $activityprice->child_price_st                      =   $request->child_price_st[$key];
            $activityprice->infant_price_st                     =   $request->infant_price_st[$key];

            // Private Transfer Price
            $activityprice->adult_price_pt                      =   $request->adult_price_pt[$key];
            $activityprice->child_price_pt                      =   $request->child_price_pt[$key];
            $activityprice->infant_price_pt                     =   $request->infant_price_pt[$key];

            // More Booking Policy
            $activityprice->without_pickup_timings              =   $request->without_pickup_timings[$key];
            $activityprice->sharing_pickup_timings              =   $request->sharing_pickup_timings[$key];
            $activityprice->private_pickup_timings              =   $request->private_pickup_timings[$key];
            $activityprice->without_duration_approx             =   $request->without_duration_approx[$key];
            $activityprice->sharing_duration_approx             =   $request->sharing_duration_approx[$key];
            $activityprice->private_duration_approx             =   $request->private_duration_approx[$key];
            $activityprice->cancellation_policy                 =   $request->cancellation_policy[$key];
            $activityprice->child_policy                        =   $request->child_policy[$key];
            $activityprice->inclusions                          =   $request->inclusions[$key];
            $activityprice->exclusion                           =   $request->exclusion[$key];
            $activityprice->save();
        }

        if($request->has('multi_images')){
            foreach($request->multi_images as $gallery_img){
                $activity_gallery                =   new ActivityGalleryImage;
                $activity_gallery->activity_id    =   $activity->id;

                $imageName = Storage::disk('cms')->putFile('', $gallery_img);
                $activity_gallery->image  =   $imageName;
                $activity_gallery->save();
            }
        }

        return redirect()->route('activities');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        $data = [
            'isEdit'   => true,
            'activity'    => $activity->load('features'),
        ];

        // return $data['vehicle'];

        return view('cms.activities.add', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity, ActivityPrice $activityprice, ActivityGalleryImage $activity_gallery)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $activity                               =   Activity::find($request->id);
        $activity->activity_type                =   $request->type;
        $activity->name                         =   $request->name;
        $activity->price                        =   $request->price;
        $activity->country_state                =   $request->country_state;
        $activity->operating_hours              =   $request->operating_hours;
        $activity->instant_confirmation         =   $request->instant_confirmation;
        $activity->mobile_voucher_accepted      =   $request->mobile_voucher_accepted;
        $activity->non_refundable               =   $request->non_refundable;
        $activity->language                     =   $request->language;
        $activity->transfer_options_available   =   $request->transfer_options_available;
        $activity->google_map_link              =   $request->google_map_link;
        $activity->about_experience             =   $request->about_experience;
        $activity->highlights                   =   $request->highlights;
        $activity->tour_inclusions              =   $request->tour_inclusions;
        $activity->important_information        =   $request->important_information;
        $activity->booking_policy               =   $request->booking_policy;
        $activity->slug                         =   strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));

        if ($request->featured_image == null) {
             $activity->featured_image;            
        }
        else{
            $image = Storage::disk('cms')->putFile('', $request->featured_image);
            $activity->featured_image  =   $image;
        }
        
        $activity->save();

        if($activityprice->value != $request->activity_name[0]){            
            foreach($request->featureid as $key => $activity_name){
                $activityprice                =   ActivityPrice::where('id', $request->featureid[$key])->first();
                $activityprice->activity_name                    =   $request->activity_name[$key];
                $activityprice->without_transfer_option_price    =   $request->without_transfer_option_price[$key];
                $activityprice->sharing_transfer_option_price    =   $request->sharing_transfer_option_price[$key];
                $activityprice->private_transfer_option_price    =   $request->private_transfer_option_price[$key];
                $activityprice->tour_date                        =   $request->tour_date[$key];
                // Without Transfer Price
                $activityprice->adult_price                      =   $request->adult_price[$key];
                $activityprice->child_price                      =   $request->child_price[$key];
                $activityprice->infant_price                     =   $request->infant_price[$key];

                // Sharing Transfer Price
                $activityprice->adult_price_st                      =   $request->adult_price_st[$key];
                $activityprice->child_price_st                      =   $request->child_price_st[$key];
                $activityprice->infant_price_st                     =   $request->infant_price_st[$key];

                // Private Transfer Price
                $activityprice->adult_price_pt                      =   $request->adult_price_pt[$key];
                $activityprice->child_price_pt                      =   $request->child_price_pt[$key];
                $activityprice->infant_price_pt                     =   $request->infant_price_pt[$key];

                // More Booking Policy
                $activityprice->without_pickup_timings              =   $request->without_pickup_timings[$key];
                $activityprice->sharing_pickup_timings              =   $request->sharing_pickup_timings[$key];
                $activityprice->private_pickup_timings              =   $request->private_pickup_timings[$key];
                $activityprice->without_duration_approx             =   $request->without_duration_approx[$key];
                $activityprice->sharing_duration_approx             =   $request->sharing_duration_approx[$key];
                $activityprice->private_duration_approx             =   $request->private_duration_approx[$key];
                $activityprice->cancellation_policy                 =   $request->cancellation_policy[$key];
                $activityprice->child_policy                        =   $request->child_policy[$key];
                $activityprice->inclusions                          =   $request->inclusions[$key];
                $activityprice->exclusion                           =   $request->exclusion[$key];
                $activityprice->save();
            }  
            
        }
        else{           
            foreach($request->activity_name as $key => $activity_name){
                $activityprice                                   =   new ActivityPrice;
                $activityprice->activity_id                      =   $activity->id;
                $activityprice->activity_name                    =   $activity_name;
                $activityprice->without_transfer_option_price    =   $request->without_transfer_option_price[$key];
                $activityprice->sharing_transfer_option_price    =   $request->sharing_transfer_option_price[$key];
                $activityprice->private_transfer_option_price    =   $request->private_transfer_option_price[$key];
                $activityprice->tour_date                        =   $request->tour_date[$key];
                // Without Transfer Price
                $activityprice->adult_price                      =   $request->adult_price[$key];
                $activityprice->child_price                      =   $request->child_price[$key];
                $activityprice->infant_price                     =   $request->infant_price[$key];

                // Sharing Transfer Price
                $activityprice->adult_price_st                      =   $request->adult_price_st[$key];
                $activityprice->child_price_st                      =   $request->child_price_st[$key];
                $activityprice->infant_price_st                     =   $request->infant_price_st[$key];

                // Private Transfer Price
                $activityprice->adult_price_pt                      =   $request->adult_price_pt[$key];
                $activityprice->child_price_pt                      =   $request->child_price_pt[$key];
                $activityprice->infant_price_pt                     =   $request->infant_price_pt[$key];

                // More Booking Policy
                $activityprice->without_pickup_timings              =   $request->without_pickup_timings[$key];
                $activityprice->sharing_pickup_timings              =   $request->sharing_pickup_timings[$key];
                $activityprice->private_pickup_timings              =   $request->private_pickup_timings[$key];
                $activityprice->without_duration_approx             =   $request->without_duration_approx[$key];
                $activityprice->sharing_duration_approx             =   $request->sharing_duration_approx[$key];
                $activityprice->private_duration_approx             =   $request->private_duration_approx[$key];
                $activityprice->cancellation_policy                 =   $request->cancellation_policy[$key];
                $activityprice->child_policy                        =   $request->child_policy[$key];
                $activityprice->inclusions                          =   $request->inclusions[$key];
                $activityprice->exclusion                           =   $request->exclusion[$key];

                $activityprice->save();
                // dd($activityprice);
            }          
        }

        if($request->has('multi_images')){
            foreach($request->multi_images as $gallery_img){
                $activity_gallery                =   new ActivityGalleryImage;
                $activity_gallery->activity_id    =   $activity->id;

                $imageName = Storage::disk('cms')->putFile('', $gallery_img);
                $activity_gallery->image  =   $imageName;
                $activity_gallery->save();
            }
        }

        return redirect()->route('activities');
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
        $activity = Activity::where('id', $request->deleteId)->first();
        $activity->delete();

        return response()->json($activity, 200);
    }
}
