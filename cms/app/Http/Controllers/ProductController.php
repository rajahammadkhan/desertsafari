<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\navigation;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Make_Shirts;
use App\Models\Make_Jeans;
use App\Models\Make_Skirts;
use App\Models\Make_Blouse_Tops;
use App\Models\Make_Shorts;
use App\Models\Make_Hoodies_Sweatshirts;
use App\Models\Make_Pants;
use App\Models\Make_Jerseys;
use App\Models\Make_T_Shirts;
use App\Models\Make_Jackets;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [

            'developers'    => navigation::get(),
        ];
        return view('cms.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
         // $products = Product::latest()->get();
         $products = Product::where('rework' , '=' , null)->latest()->get();
        //$products = Product::with('developers');


        return DataTables::collection($products)->toJson();
    }

    public function create()
    {
        $data = [
            'isEdit'    =>  false,
            'products'    =>  Product::get(),
            'navigations'    => navigation::get(),
            'brand'    => Brand::get(),
            'shirts'    => Make_Shirts::where('status', 1)->get(),
            'jeans'    => Make_Jeans::where('status', 1)->get(),
            'skirts'    => Make_Skirts::where('status', 1)->get(),
            'blouse_tops'    => Make_Blouse_Tops::where('status', 1)->get(),
            'shorts'    => Make_Shorts::where('status', 1)->get(),
            'hoodies_sweatshirts'    => Make_Hoodies_Sweatshirts::where('status', 1)->get(),
            'pants'    => Make_Pants::where('status', 1)->get(),
            'jerseys'    => Make_Jerseys::where('status', 1)->get(),
            't_shirts'    => Make_T_Shirts::where('status', 1)->get(),
            'jackets'    => Make_Jackets::where('status', 1)->get(),
            'menus' => navigation::with('children')->get(),
            'menus_parent' => navigation::with('parent')->get(),
        ];

        return view('cms.products.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $products         =   new Product;

        $image = Storage::disk('cms')->putFile('', $request->thumbnail);
        $products->thumbnail  =   $image;

        $data_id = array($request->category, $request->sub_category, $request->sub_category_name);
        $category_id = implode(", ",$data_id);

        $category_name1 = [];
        $category_name2 = [];
        $category_name3 = [];

        $cate_name1= explode(', ',$request->category);
        foreach($cate_name1 as $x => $c1){
            $category_name1 += [$x => navigation::where('id',$c1)->first()];
        }

        $cate_name2= explode(', ',$request->sub_category);
        foreach($cate_name2 as $x => $c2){
            $category_name2 += [$x => navigation::where('id',$c2)->first()];
        }

        $cate_name3= explode(', ',$request->sub_category_name);
        foreach($cate_name3 as $x => $c3){
            $category_name3 += [$x => navigation::where('id',$c3)->first()];
        }

        $data_name = array_merge($category_name1, $category_name2, $category_name3);
        $category_name = "";
        foreach($data_name as $name){
                $category_name .=$name->slug.", ";
            }

        $products->name                 =   $request->name;
        $products->price                =   str_replace(',', '', $request->price);
        $products->sku                  =   $request->sku;
        $products->brand_id             =   $request->brand_name;
        $abc = Brand::where('id', $request->brand_name)->first();
        $products->brand_name           =   $abc->slug;
        $products->brand_size           =   $request->brand_size;
        $products->chart_size           =   $request->chart_size;
        $products->category             =   $category_name;
        $products->category_id          =   $category_id;
        $products->weight               =   $request->weight;
        $products->condition            =   $request->condition;
        $products->colors               =   $request->colors;
        $products->size                 =   $request->size;
        $products->descriptions         =   $request->descriptions;
        $products->additional_info      =   $request->additional_info;
        $products->shipping             =   $request->shipping;
        $products->in_stock             =   $request->in_stock;
        $products->size_qty             =   $request->size_qty;
        $products->fabric               =   $request->fabric;
        $products->jackets               =   $request->jackets;
        $products->shirts               =   $request->shirts;
        $products->jeans               =   $request->jeans;
        $products->skirts               =   $request->skirts;
        $products->blouse_tops               =   $request->blouse_tops;
        $products->shorts               =   $request->shorts;
        $products->hoodies_sweatshirts               =   $request->hoodies_sweatshirts;
        $products->pants               =   $request->pants;
        $products->jerseys               =   $request->jerseys;
        $products->t_shirts               =   $request->t_shirts;
        $products->meta_title           =   $request->meta_title;
        $products->meta_des             =   $request->meta_des;
        $products->meta_keyword         =   $request->meta_keyword;
        $products->keyword              =   $request->keyword;
        $products->slug                 =   Str::slug($request->name);
            $img = '';

        if($request->has('multi_images')){
            foreach($request->multi_images as $gallery_img){
                $imageName = Storage::disk('cms')->putFile('', $gallery_img);
                $img .=$imageName.",";
            }
        }
        $products->product_images  =  $img;
            // dd($products);
        $products->save();
        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request)
    {
        $product = Product::where('id', $request->deleteId)->first();
        $images = explode(',', $product->product_images);
        Storage::disk('cms')->delete($images);
        $product->delete();
        // return $request;
        return response()->json($product, 200);
    }

    public function status(Request $request)
    {

        $status = $request->status;
        $id = $request->id;

        $item = Product::find($id);
        if ($item->update(['status' => $status])) {
            $response['status'] = true;
            $response['message'] = 'Status Updated Successfully!';

            return response()->json($response, 200);
        }
    }

    public function publish(Request $request)
    {

        $publish = $request->publish;
        $id = $request->id;

        $item = Product::find($id);
        if ($item->update(['published' => $publish])) {
            $response['published'] = true;
            $response['message'] = 'Published status Updated Successfully!';

            return response()->json($response, 200);
        }
    }

    public function popular(Request $request)
    {

        $is_polular = $request->is_polular;
        $id = $request->id;

        $item = Product::find($id);
        if ($item->update(['is_polular' => $is_polular])) {
            $response['is_polular'] = true;
            $response['message'] = 'Polular status Updated Successfully!';

            return response()->json($response, 200);
        }
    }

    public function arrival(Request $request)
    {

        $is_new_arrival = $request->is_new_arrival;
        $id = $request->id;

        $item = Product::find($id);
        if ($item->update(['is_new_arrival' => $is_new_arrival])) {
            $response['is_new_arrival'] = true;
            $response['message'] = 'New Arrival status Updated Successfully!';

            return response()->json($response, 200);
        }
    }

    public function best_selling(Request $request)
    {

        $is_best_selling = $request->is_best_selling;
        $id = $request->id;

        $item = Product::find($id);
        if ($item->update(['is_best_selling' => $is_best_selling])) {
            $response['is_best_selling'] = true;
            $response['message'] = 'Best Selling status Updated Successfully!';

            return response()->json($response, 200);
        }
    }

    public function deleteImage(Request $request)
    {

        // $status = $request->status;
        $id = $request->productId;
        $image = $request->image;

        $item = Product::find($id);
        $newImages = str_replace($image.',',"",$item->product_images);
        // $newImages = trim($item->images, $image.',');
        $item->product_images = $newImages;
        if($item->save())
        {return response()->json($item, 200);}

        // if ($item->update(['images' => $newImages])) {
        //     $response['featured'] = true;
        //     $response['message'] = 'Status Updated Successfully!';

        //     return response()->json($response, 200);
        // }
    }
}
