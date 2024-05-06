<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function datatable()
    {
        $brand = Brand::latest()->get();

        return DataTables::collection($brand)->toJson();
    }

     public function index()
    {
        $data = [
            'brand' =>  Brand::get(),
        ];
        return view('cms.brand.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'isEdit' => false,
        ];

        return view('cms.brand.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand;

        $brand->brand_name      =   $request->brand_name;
        $brand->brand_alpha     =   strtolower(mb_substr($request->brand_name, 0, 1));
        $brand->slug            =   Str::slug($request->brand_name);


        $brand->save();

        return redirect()->route('brand');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $data = [
            'isEdit'        => true,
            'brand'         => $brand,
        ];

        return view('cms.brand.add', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->brand_name      =   $request->brand_name;
        $brand->brand_alpha     =   strtolower(mb_substr($request->brand_name, 0, 1));
        $brand->slug            =   Str::slug($request->brand_name);

        $brand->save();

        return redirect()->route('brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $brand = Brand::where('id', $request->deleteId)->first();
        $brand->delete();

        return response()->json($brand, 200);
    }
}
