<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Activity;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function wishlist()
    {
        return view('wishlist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->get('activity_id'));
        $userId = auth()->user()->id ?? null;
        if (!$request->get('activity_id')) {
            return [
                'message' => 'Wishlist Items Returned',
                'items' => Wishlist::where('user_id', $userId)->sum('quantity'),
            ];
        }

        $activity = Activity::where('id', $request->get('activity_id'))->first();

        $productFoundInCart = Wishlist::where('activity_id', $request->get('activity_id'))
            ->where('user_id', $userId)
            ->first();

        if (!$productFoundInCart) {
            $cart = Wishlist::create([
                'activity_id' => $activity->id,
                'quantity' => 1,
                'price' => $activity->price,
                'user_id' => $userId,
            ]);
        } else {
            $cart = Wishlist::where('activity_id', $request->get('activity_id'))
                ->where('user_id', $userId);
        }

        if ($cart) {
            return [
                'message' => 'Wishlist Updated',
                'items' => Wishlist::where('user_id', $userId)->sum('quantity'),
            ];
        }
    }
    public function getWishlistItemsForWishlist()
    {

        $cartItems = Wishlist::with('activity')->where('user_id', auth()->user()->id)->get();
        $finalData = [];
        $amount = 0;

        if(isset($cartItems))
        {
            foreach($cartItems as $cartItem){
                if($cartItem->activity){                
                    foreach($cartItem->activity as $cartProduct){
                        if($cartProduct->id == $cartItem->activity_id){
                            $finalData[$cartItem->activity_id] ['id'] = $cartProduct->id;
                            $finalData[$cartItem->activity_id] ['name'] = $cartProduct->name;
                            $finalData[$cartItem->activity_id] ['slug'] = $cartProduct->slug;
                            $finalData[$cartItem->activity_id] ['featured_image'] = $cartProduct->featured_image;
                            $finalData[$cartItem->activity_id] ['quantity'] = $cartItem->quantity;
                            $finalData[$cartItem->activity_id] ['sprice'] = $cartProduct->price;
                            $finalData[$cartItem->activity_id] ['cart_id'] = $cartItem->id;
                            $finalData[$cartItem->activity_id] ['total'] = $cartProduct->price * $cartItem->quantity;
                            $amount += $cartProduct->price * $cartItem->quantity;
                            $finalData['totalAmount'] = $amount;           
                        }
                    }
                }
            }  
        }        
        // dd($finalData);
        return response()->json($finalData);
    }

    public function wishlistdestroy($cart_id)
    {
        
        Wishlist::destroy($cart_id);

        return response()->json(['message' => 'Item removed from cart']);
    }
}
