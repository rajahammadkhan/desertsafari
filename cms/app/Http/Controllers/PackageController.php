<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityPrice;
use App\Models\ActivityGalleryImage;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    public function index()
    {
        
        return view('cms.packages.index');
    }

    public function datatable()
    {
        $package = Activity::where('status', 1)
                ->where(function ($query) {
                    $query->where('activity_type', 'Best Vacation Packages - UAE')
                          ->orWhere('activity_type', 'Hoiday packages')
                          ->orWhere('activity_type', 'Combo package');
                })
                ->orderBy('id', 'desc')
                ->get();

        // $roles = $roles->transform(function ($item) {
        //     $item->role_names = $item->roles->pluck('name')->implode(', ');
        //     return $item;
        // })->all();

        return DataTables::collection($package)->toJson();
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

        return view('cms.packages.add', $data);
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
        
        $package         =   new Activity;

        $image = Storage::disk('cms')->putFile('', $request->featured_image);
        $package->featured_image  =   $image;

        $package->activity_type                =   $request->type;
        $package->name                         =   $request->name;
        $package->price                        =   $request->price;
        $package->country_state                =   $request->country_state;
        $package->operating_hours              =   $request->operating_hours;
        $package->instant_confirmation         =   $request->instant_confirmation;
        $package->mobile_voucher_accepted      =   $request->mobile_voucher_accepted;
        $package->non_refundable               =   $request->non_refundable;
        $package->language                     =   $request->language;
        $package->transfer_options_available   =   $request->transfer_options_available;
        $package->google_map_link              =   $request->google_map_link;
        $package->about_experience             =   $request->about_experience;
        $package->highlights                   =   $request->highlights;
        $package->tour_inclusions              =   $request->tour_inclusions;
        $package->important_information        =   $request->important_information;     
        $package->booking_policy               =   $request->booking_policy;   
        $package->slug                         =   strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $package->save();

        foreach($request->activity_name as $key => $package_name){
            $packageprice                                   =   new ActivityPrice;
            $packageprice->activity_id                      =   $package->id;
            $packageprice->activity_name                    =   $package_name;
            $packageprice->without_transfer_option_price    =   $request->without_transfer_option_price[$key];
            $packageprice->sharing_transfer_option_price    =   $request->sharing_transfer_option_price[$key];
            $packageprice->private_transfer_option_price    =   $request->private_transfer_option_price[$key];
            $packageprice->tour_date                        =   $request->tour_date[$key];
            // Without Transfer Price
            $packageprice->adult_price                      =   $request->adult_price[$key];
            $packageprice->child_price                      =   $request->child_price[$key];
            $packageprice->infant_price                     =   $request->infant_price[$key];

            // Sharing Transfer Price
            $packageprice->adult_price_st                      =   $request->adult_price_st[$key];
            $packageprice->child_price_st                      =   $request->child_price_st[$key];
            $packageprice->infant_price_st                     =   $request->infant_price_st[$key];

            // Private Transfer Price
            $packageprice->adult_price_pt                      =   $request->adult_price_pt[$key];
            $packageprice->child_price_pt                      =   $request->child_price_pt[$key];
            $packageprice->infant_price_pt                     =   $request->infant_price_pt[$key];

            // More Booking Policy
            $packageprice->without_pickup_timings              =   $request->without_pickup_timings[$key];
            $packageprice->sharing_pickup_timings              =   $request->sharing_pickup_timings[$key];
            $packageprice->private_pickup_timings              =   $request->private_pickup_timings[$key];
            $packageprice->without_duration_approx             =   $request->without_duration_approx[$key];
            $packageprice->sharing_duration_approx             =   $request->sharing_duration_approx[$key];
            $packageprice->private_duration_approx             =   $request->private_duration_approx[$key];
            $packageprice->cancellation_policy                 =   $request->cancellation_policy[$key];
            $packageprice->child_policy                        =   $request->child_policy[$key];
            $packageprice->inclusions                          =   $request->inclusions[$key];
            $packageprice->exclusion                           =   $request->exclusion[$key];
            $packageprice->save();
        }

        if($request->has('multi_images')){
            foreach($request->multi_images as $gallery_img){
                $package_gallery                =   new ActivityGalleryImage;
                $package_gallery->activity_id    =   $package->id;

                $imageName = Storage::disk('cms')->putFile('', $gallery_img);
                $package_gallery->image  =   $imageName;
                $package_gallery->save();
            }
        }

        return redirect()->route('packages');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $package)
    {
        $data = [
            'isEdit'   => true,
            'package'    => $package->load('features'),
        ];

        // return $data['vehicle'];

        return view('cms.packages.add', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $package, ActivityPrice $packageprice, ActivityGalleryImage $package_gallery)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $package                               =   Activity::find($request->id);
        $package->activity_type                =   $request->type;
        $package->name                         =   $request->name;
        $package->price                        =   $request->price;
        $package->country_state                =   $request->country_state;
        $package->operating_hours              =   $request->operating_hours;
        $package->instant_confirmation         =   $request->instant_confirmation;
        $package->mobile_voucher_accepted      =   $request->mobile_voucher_accepted;
        $package->non_refundable               =   $request->non_refundable;
        $package->language                     =   $request->language;
        $package->transfer_options_available   =   $request->transfer_options_available;
        $package->google_map_link              =   $request->google_map_link;
        $package->about_experience             =   $request->about_experience;
        $package->highlights                   =   $request->highlights;
        $package->tour_inclusions              =   $request->tour_inclusions;
        $package->important_information        =   $request->important_information;     
        $package->booking_policy               =   $request->booking_policy;
        $package->slug                         =   strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));

        if ($request->featured_image == null) {
             $package->featured_image;            
        }
        else{
            $image = Storage::disk('cms')->putFile('', $request->featured_image);
            $package->featured_image  =   $image;
        }
        
        $package->save();

        if($packageprice->value != $request->activity_name[0]){            
            foreach($request->featureid as $key => $package_name){
                $packageprice                =   ActivityPrice::where('id', $request->featureid[$key])->first();
                $packageprice->activity_name                    =   $request->activity_name[$key];
                $packageprice->without_transfer_option_price    =   $request->without_transfer_option_price[$key];
                $packageprice->sharing_transfer_option_price    =   $request->sharing_transfer_option_price[$key];
                $packageprice->private_transfer_option_price    =   $request->private_transfer_option_price[$key];
                // Without Transfer Price
                $packageprice->adult_price                      =   $request->adult_price[$key];
                $packageprice->child_price                      =   $request->child_price[$key];
                $packageprice->infant_price                     =   $request->infant_price[$key];

                // Sharing Transfer Price
                $packageprice->adult_price_st                      =   $request->adult_price_st[$key];
                $packageprice->child_price_st                      =   $request->child_price_st[$key];
                $packageprice->infant_price_st                     =   $request->infant_price_st[$key];

                // Private Transfer Price
                $packageprice->adult_price_pt                      =   $request->adult_price_pt[$key];
                $packageprice->child_price_pt                      =   $request->child_price_pt[$key];
                $packageprice->infant_price_pt                     =   $request->infant_price_pt[$key];

                // More Booking Policy
                $packageprice->without_pickup_timings              =   $request->without_pickup_timings[$key];
                $packageprice->sharing_pickup_timings              =   $request->sharing_pickup_timings[$key];
                $packageprice->private_pickup_timings              =   $request->private_pickup_timings[$key];
                $packageprice->without_duration_approx             =   $request->without_duration_approx[$key];
                $packageprice->sharing_duration_approx             =   $request->sharing_duration_approx[$key];
                $packageprice->private_duration_approx             =   $request->private_duration_approx[$key];
                $packageprice->cancellation_policy                 =   $request->cancellation_policy[$key];
                $packageprice->child_policy                        =   $request->child_policy[$key];
                $packageprice->inclusions                          =   $request->inclusions[$key];
                $packageprice->exclusion                           =   $request->exclusion[$key];
                $packageprice->save();
            }  
            
        }
        else{           
            foreach($request->activity_name as $key => $package_name){
                $packageprice                                   =   new ActivityPrice;
                $packageprice->activity_id                      =   $package->id;
                $packageprice->activity_name                    =   $package_name;
                $packageprice->without_transfer_option_price    =   $request->without_transfer_option_price[$key];
                $packageprice->sharing_transfer_option_price    =   $request->sharing_transfer_option_price[$key];
                $packageprice->private_transfer_option_price    =   $request->private_transfer_option_price[$key];
                // Without Transfer Price
                $packageprice->adult_price                      =   $request->adult_price[$key];
                $packageprice->child_price                      =   $request->child_price[$key];
                $packageprice->infant_price                     =   $request->infant_price[$key];

                // Sharing Transfer Price
                $packageprice->adult_price_st                      =   $request->adult_price_st[$key];
                $packageprice->child_price_st                      =   $request->child_price_st[$key];
                $packageprice->infant_price_st                     =   $request->infant_price_st[$key];

                // Private Transfer Price
                $packageprice->adult_price_pt                      =   $request->adult_price_pt[$key];
                $packageprice->child_price_pt                      =   $request->child_price_pt[$key];
                $packageprice->infant_price_pt                     =   $request->infant_price_pt[$key];

                // More Booking Policy
                $packageprice->without_pickup_timings              =   $request->without_pickup_timings[$key];
                $packageprice->sharing_pickup_timings              =   $request->sharing_pickup_timings[$key];
                $packageprice->private_pickup_timings              =   $request->private_pickup_timings[$key];
                $packageprice->without_duration_approx             =   $request->without_duration_approx[$key];
                $packageprice->sharing_duration_approx             =   $request->sharing_duration_approx[$key];
                $packageprice->private_duration_approx             =   $request->private_duration_approx[$key];
                $packageprice->cancellation_policy                 =   $request->cancellation_policy[$key];
                $packageprice->child_policy                        =   $request->child_policy[$key];
                $packageprice->inclusions                          =   $request->inclusions[$key];
                $packageprice->exclusion                           =   $request->exclusion[$key];
                $packageprice->save();
                // dd($packageprice);
            }          
        }

        if($request->has('multi_images')){
            foreach($request->multi_images as $gallery_img){
                $package_gallery                =   new ActivityGalleryImage;
                $package_gallery->activity_id    =   $package->id;

                $imageName = Storage::disk('cms')->putFile('', $gallery_img);
                $package_gallery->image  =   $imageName;
                $package_gallery->save();
            }
        }

        return redirect()->route('packages');
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
        $packageimage = ActivityGalleryImage::where('id', $request->deleteId);
        $packageimage->delete();


        return response()->json($packageimage, 200);
    }

    public function featuredestroy(Request $request)
    {
        $packagefeature = ActivityGalleryImage::where('id', $request->deletefeatureId);
        $packagefeature->delete();


        return response()->json($packagefeature, 200);
    }

    public function destroy(Request $request)
    {
        ActivityPrice::where('activity_id', $request->deleteId)->delete();
        ActivityGalleryImage::where('activity_id', $request->deleteId)->delete();
        Wishlist::where('activity_id', $request->deleteId)->delete();
        $package = Activity::where('id', $request->deleteId)->first();
        $package->delete();

        return response()->json($package, 200);
    }
}
