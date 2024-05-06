<?php

namespace App\Http\Controllers;

use App\Models\Dicount_Coupon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DicountCouponController extends Controller
{
    public function datatable()
    {
        $discount = Dicount_Coupon::get();

        return DataTables::collection($discount)->toJson();
    }

    public function index()
    {
        $data = [
            'discounts' =>  Dicount_Coupon::get(),
        ];
        return view('cms.discount_coupon.index', $data);
    }

    public function create()
    {
        $data = [
            'isEdit' => false,
        ];

        return view('cms.discount_coupon.add', $data);
    }

    public function store(Request $request)
    {
        // return $request;

        $request->validate([
            'coupon_code' => 'required',
        ]);
        
        $discount         =   new Dicount_Coupon;

        $discount->discount             =   $request->discount;
        $discount->coupon_code          =   $request->coupon_code;
        $discount->coupon_price         =   $request->coupon_price;
        $discount->start_date         =   $request->start_date;
        $discount->end_date         =   $request->end_date;
        $discount->start_time         =   $request->start_time;
        $discount->end_time         =   $request->end_time;
        $discount->modify_date_time =   $request->end_date." ".$request->end_time.":00";
        $discount->save();

        return redirect()->route('discounts');
    }

    public function edit(Dicount_Coupon $discount)
    {
        $data = [
            'isEdit'                => true,
            'discount'    => $discount,
        ];

        // return $data['discount_coupon'];

        return view('cms.discount_coupon.add', $data);
    }

    public function update(Request $request, Dicount_Coupon $discount)
    {
        // return $request;
        $discount->discount             =   $request->discount;
        $discount->coupon_code          =   $request->coupon_code;
        $discount->coupon_price         =   $request->coupon_price;
        $discount->start_date         =   $request->start_date;
        $discount->end_date         =   $request->end_date;
        $discount->start_time         =   $request->start_time;
        $discount->end_time         =   $request->end_time;
        $discount->modify_date_time =   $request->end_date." ".$request->end_time;
        $discount->save();

        return redirect()->route('discounts');
    }

    public function status(Request $request)
    {

        $status = $request->status;
        $id = $request->id;

        $item = Dicount_Coupon::find($id);

        if ($item->update(['status' => $status])) {
            $response['status'] = true;
            $response['message'] = 'Status Updated Successfully!';

            return response()->json($response, 200);
        }
    }

    public function destroy(Request $request)
    {
        $discount = Dicount_Coupon::where('id', $request->deleteId)->first();
        $discount->delete();

        return response()->json($discount, 200);
    }
}
