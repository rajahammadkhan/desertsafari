<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Navigation;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

            // 'products'     =>     DB::table('products')->raw('SELECT * FROM products INNER JOIN brands ON products.brand_id = brands.id ')->get(),
            // 'products'     =>     DB::table('products')->join('brands', 'products.brand_id', '=', 'brands.id')->select('products.*', 'brands.brand_name')->get(),
            'products'     =>     DB::table('products')->get(),
            'brands'        =>  DB::table('products')->distinct()->inRandomOrder()->limit(4)->get(['brand_name']),
            'pro_jackets'        =>  DB::table('products')->select('jackets')->groupBy('jackets')->inRandomOrder()->limit(4)->get(),
            'pro_shirts'        =>  DB::table('products')->select('shirts')->groupBy('shirts')->inRandomOrder()->limit(4)->get(),
            'pro_jeans'        =>  DB::table('products')->select('jeans')->groupBy('jeans')->inRandomOrder()->limit(4)->get(),
            'pro_skirts'        =>  DB::table('products')->select('skirts')->groupBy('skirts')->inRandomOrder()->limit(4)->get(),
            'pro_blouse_tops'        =>  DB::table('products')->select('blouse_tops')->groupBy('blouse_tops')->inRandomOrder()->limit(4)->get(),
            'pro_shorts'        =>  DB::table('products')->select('shorts')->groupBy('shorts')->inRandomOrder()->limit(4)->get(),
            'pro_hoodies_sweatshirts'        =>  DB::table('products')->select('hoodies_sweatshirts')->groupBy('hoodies_sweatshirts')->inRandomOrder()->limit(4)->get(),
            'pro_pants'        =>  DB::table('products')->select('pants')->groupBy('pants')->inRandomOrder()->limit(4)->get(),
            'pro_jerseys'        =>  DB::table('products')->select('jerseys')->groupBy('jerseys')->inRandomOrder()->limit(4)->get(),
            'pro_t_shirts'        =>  DB::table('products')->select('t_shirts')->groupBy('t_shirts')->inRandomOrder()->limit(4)->get(),

            'productsc'     =>     DB::table('products')->where('chart_size', 'XS')->count(),
            'count'        => DB::table('products')->where('created_at', Carbon::today())->count(),
            // 'products'     =>     Product::limit(20)->get(),
            // 'products'     =>     Product::limit(20)->get()->toJSON(),
        ];
        // dd($data);
        return view('product', $data);
    }
       
    public function searchedIndex($category ,$subCategory ,$subSubCategory)
    {   
        // dd($category, $subCategory, $subSubCategory);
        if($subCategory == 'all' && $subSubCategory == 'all')
        {
           $products = DB::table('products')->join('brands', 'products.brand_id', '=', 'brands.id')->select('products.*', 'brands.brand_name')->where('category', 'LIKE', $category.'%')->get();
        }

        elseif($subSubCategory == 'all')
        {
           $products =  DB::table('products')->join('brands', 'products.brand_id', '=', 'brands.id')->select('products.*', 'brands.brand_name')->where('category', 'LIKE', $category.', '.$subCategory.'%')->get();
        }

        else
        {
            $products =  DB::table('products')->join('navigation', 'products.category_id', '=', 'navigation.id')->select('products.*')->where('category', 'LIKE', $category.', '.$subCategory.', '.$subSubCategory.'%')->get();
        }
        // dd($products);
        $data = [
            'products'  => $products,
            'brands'        => DB::table('products')->distinct()->inRandomOrder()->limit(4)->get(['brand_name']),
            'pro_jackets'        =>  DB::table('products')->select('jackets')->groupBy('jackets')->inRandomOrder()->limit(4)->get(),
            'pro_shirts'        =>  DB::table('products')->select('shirts')->groupBy('shirts')->inRandomOrder()->limit(4)->get(),
            'pro_jeans'        =>  DB::table('products')->select('jeans')->groupBy('jeans')->inRandomOrder()->limit(4)->get(),
            'pro_skirts'        =>  DB::table('products')->select('skirts')->groupBy('skirts')->inRandomOrder()->limit(4)->get(),
            'pro_blouse_tops'        =>  DB::table('products')->select('blouse_tops')->groupBy('blouse_tops')->inRandomOrder()->limit(4)->get(),
            'pro_shorts'        =>  DB::table('products')->select('shorts')->groupBy('shorts')->inRandomOrder()->limit(4)->get(),
            'pro_hoodies_sweatshirts'        =>  DB::table('products')->select('hoodies_sweatshirts')->groupBy('hoodies_sweatshirts')->inRandomOrder()->limit(4)->get(),
            'pro_pants'        =>  DB::table('products')->select('pants')->groupBy('pants')->inRandomOrder()->limit(4)->get(),
            'pro_jerseys'        =>  DB::table('products')->select('jerseys')->groupBy('jerseys')->inRandomOrder()->limit(4)->get(),
            'pro_t_shirts'        =>  DB::table('products')->select('t_shirts')->groupBy('t_shirts')->inRandomOrder()->limit(4)->get(),
            'count'        => DB::table('products')->where('created_at', Carbon::today())->count(),
        ];
        return view('product', $data);
    }

    public function searchedIndexbrand($category ,$subCategory ,$subSubCategory)
    {   
        // dd($category, $subCategory, $subSubCategory);
        if($category && $subCategory)
        {
            $products =  DB::table('products')->join('brands', 'products.brand_id', '=', 'brands.id')->select('products.*', 'brands.brand_name')->where('brands.brand_name', 'LIKE', $subSubCategory.'%')->get();
        }
        // dd($products);
        $data = [
            'products'  => $products,
            'brands'        => DB::table('products')->distinct()->inRandomOrder()->limit(4)->get(['brand_name']),
            'pro_jackets'        =>  DB::table('products')->select('jackets')->groupBy('jackets')->inRandomOrder()->limit(4)->get(),
            'pro_shirts'        =>  DB::table('products')->select('shirts')->groupBy('shirts')->inRandomOrder()->limit(4)->get(),
            'pro_jeans'        =>  DB::table('products')->select('jeans')->groupBy('jeans')->inRandomOrder()->limit(4)->get(),
            'pro_skirts'        =>  DB::table('products')->select('skirts')->groupBy('skirts')->inRandomOrder()->limit(4)->get(),
            'pro_blouse_tops'        =>  DB::table('products')->select('blouse_tops')->groupBy('blouse_tops')->inRandomOrder()->limit(4)->get(),
            'pro_shorts'        =>  DB::table('products')->select('shorts')->groupBy('shorts')->inRandomOrder()->limit(4)->get(),
            'pro_hoodies_sweatshirts'        =>  DB::table('products')->select('hoodies_sweatshirts')->groupBy('hoodies_sweatshirts')->inRandomOrder()->limit(4)->get(),
            'pro_pants'        =>  DB::table('products')->select('pants')->groupBy('pants')->inRandomOrder()->limit(4)->get(),
            'pro_jerseys'        =>  DB::table('products')->select('jerseys')->groupBy('jerseys')->inRandomOrder()->limit(4)->get(),
            'pro_t_shirts'        =>  DB::table('products')->select('t_shirts')->groupBy('t_shirts')->inRandomOrder()->limit(4)->get(),
            'count'        => DB::table('products')->where('created_at', Carbon::today())->count(),
        ];
        return view('product', $data);
    }

    public function show($slug)
    {
        $data = [
            'product'  =>   Product::where('slug', $slug)->first(),
        ];
        return view('product-detail', $data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function autosearch(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::where('name','LIKE',$request->product_brand_search.'%')
            ->orwhere('brand_name','LIKE',$request->product_brand_search.'%')
            ->get();
            $output = '';
            if (count($data)>0) {
                $output = '<ul class="dropdown-menu" id="dropdown-menu-search-ul">';
                foreach ($data as $row) {
                    $output .= '<li class="list-group-item" id="dropdown-menu-search-li">
                        <a href="http://127.0.0.1:8000/product-detail/'.$row->slug.'">
                            <span style="height: 100px;border-radius: 10px;width: 100px;display: -webkit-inline-box;">
                                <img src="http://localhost/fashion/fashion_cms/public/uploads/'.$row->thumbnail.'" alt="'.$row->name.'" class="hover-image" style="height: 100px;border-radius: 10px;width: 100px;">
                            </span>
                            <span style="font-size: 15px;font-weight: 900; margin-left: 10px;">'.$row->name.'</span> 
                        </a>
                        <a href="http://127.0.0.1:8000/brand/brands/top-brands/'.$row->brand_name.'">
                            <span style="margin-left: 20px;color: #66bf01;font-size: 14px;font-weight: 800;">'.$row->brand_name.'</span> 
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
