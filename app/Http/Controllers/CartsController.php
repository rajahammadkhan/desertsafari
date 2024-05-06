<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Activity;
use App\Models\ActivityPrice;
use App\Models\Cart;
use App\Models\Discount;
use App\Models\Processing;
use App\Models\Visa;
use App\Models\VisaPrice;
use App\Notifications\PurchaseNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;


use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('checkout');
    }

    public function cart(Request $request)
    {
        // $activity = Activity::where('id', $activity_id)->first();

        $cartItems = session()->get('cart', []);

        $activityIds = [];

        foreach ($cartItems as $cartItem) {
            if (isset($cartItem['activity_id'])) {
                $activityIds[] = $cartItem['activity_id'];
            }
        }

        $activities = Activity::whereIn('id', $activityIds)->get();

        $data = [            
            'activities' =>  $activityIds,
        ];
        return view('cart', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function addToCart(Request $request)
    {

       $user_auth = auth()->user()->id ?? null;
       $user_auth_temp_id = auth()->user()->temp_id ?? null;

       // dd($user_auth_temp_id);
       $user_id = "";
       $temp_id = "";
       $temp_id_session = "";
        if(!empty($user_auth)){
            $user_id = $user_auth;

            if(!empty($user_auth_temp_id)){
                $temp_id = $user_auth_temp_id;
            }

            if (session()->has('valueid')) {
                $idValue = session()->get('valueid');
            } else {
                $currentDateTime = Carbon::now('Asia/Karachi');
                $formattedDateTime = $currentDateTime->format('His'); 

                $valueid = collect([
                    "id" => $formattedDateTime,
                ]);

                session()->put('valueid', $valueid);

                $idValue = $valueid; 
            }    
            $temp_id_session = $idValue['id'];

        } else{    
            if (session()->has('valueid')) {
                $idValue = session()->get('valueid');
            } else {
                $currentDateTime = Carbon::now('Asia/Karachi');
                $formattedDateTime = $currentDateTime->format('His'); 

                $valueid = collect([
                    "id" => $formattedDateTime,
                ]);

                session()->put('valueid', $valueid);

                $idValue = $valueid; 
            }    
            $temp_id_session = $idValue['id'];        
        }   

        $cart = session()->get('cart', []);

        $activity = $request->input('activity_id');
        $visa = $request->input('visa_id');
        $selectedPackages = $request->input('selected_packages');
        $totalprice = $request->input('total_Amountinput');

        $insertedData = array();

        foreach ($selectedPackages as $index => $package) {
            $price = isset($totalprice[$index]) ? $totalprice[$index] : null;
            $insertedData[] = $price;
        }

        foreach ($insertedData as $index => $value) {
            if (substr($value, -3) === ".00") {
                $insertedData[$index] = (int)str_replace(',', '', $value) - 1;
            }
        }

        // dd($selectedPackages, $insertedData);
        $transferOptions = [];
        $travelDates = [];
        $adultPrices = [];
        $adultPrices_st = [];
        $adultPrices_pt = [];
        $childPrices = [];
        $childPrices_st = [];
        $childPrices_pt = [];
        $infantPrices = [];
        $infantPrices_st = [];
        $infantPrices_pt = [];

        $noVisa = [];
        $noVisa_e = [];

        // Loop through the form fields with dynamic names
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'transfer_option') !== false) {
                $itemId = substr($key, strlen('transfer_option'));
                $transferOptions[$itemId] = $value ?? null;
            }

            if (strpos($key, 'travel_date') !== false) {
                $itemId = substr($key, strlen('travel_date'));
                $travelDates[$itemId] = $value ?? null;
            }

            if (strpos($key, 'adult_price') !== false) {
                $itemId = substr($key, strlen('adult_price'));
                $adultPrices[$itemId] = $value ?? null;
            }

            if (strpos($key, 'adult_price_st') !== false) {
                $itemId = substr($key, strlen('adult_price_st'));
                $adultPrices_st[$itemId] = $value ?? null;
            }

            if (strpos($key, 'adult_price_pt') !== false) {
                $itemId = substr($key, strlen('adult_price_pt'));
                $adultPrices_pt[$itemId] = $value ?? null;
            }

            if (strpos($key, 'child_price') !== false) {
                $itemId = substr($key, strlen('child_price'));
                $childPrices[$itemId] = $value ?? null;
            }

            if (strpos($key, 'child_price_st') !== false) {
                $itemId = substr($key, strlen('child_price_st'));
                $childPrices_st[$itemId] = $value ?? null;
            }

            if (strpos($key, 'child_price_pt') !== false) {
                $itemId = substr($key, strlen('child_price_pt'));
                $childPrices_pt[$itemId] = $value ?? null;
            }

            if (strpos($key, 'infant_price') !== false) {
                $itemId = substr($key, strlen('infant_price'));
                $infantPrices[$itemId] = $value ?? null;
            }

            if (strpos($key, 'infant_price_st') !== false) {
                $itemId = substr($key, strlen('infant_price_st'));
                $infantPrices_st[$itemId] = $value ?? null;
            }

            if (strpos($key, 'infant_price_pt') !== false) {
                $itemId = substr($key, strlen('infant_price_pt'));
                $infantPrices_pt[$itemId] = $value ?? null;
            }

            if (strpos($key, 'visa_price') !== false) {
                $itemId = substr($key, strlen('visa_price'));
                $noVisa[$itemId] = $value ?? null;
            }  
            if (strpos($key, 'visa_price_e') !== false) {
                $itemId = substr($key, strlen('visa_price_e'));
                $noVisa_e[$itemId] = $value ?? null;
            }        
        }

        // $asdas = session('id');
        // dd($asdas);
        $visafinal = $visa."_Visa";

// dd($user_id, $temp_id, $temp_id_session);
        if(!empty($user_id) && !empty($temp_id)){
            if (isset($cart[$activity]) || isset($cart[$visafinal])) {
                // $cart[$activity]['quantity']++;
                dd("Error");
            } else {
                // dd("IF");
                if ($activity) {
                    $cart[$activity] = [
                        'activity_id' => $activity,
                        'user_id' => $temp_id,
                        'product_activity' => "activity",
                        'activity_packages' => json_encode($selectedPackages),
                        // 'activity_transfer' => json_encode($transferOptions),
                        'activity_travel_date' => json_encode($travelDates),
                        'activity_adult_price' => json_encode($adultPrices),
                        'activity_adult_price_st' => json_encode($adultPrices_st),
                        'activity_adult_price_pt' => json_encode($adultPrices_pt),
                        'activity_child_price' => json_encode($childPrices),
                        'activity_child_price_st' => json_encode($childPrices_st),
                        'activity_child_price_pt' => json_encode($childPrices_pt),
                        'activity_infant_price' => json_encode($infantPrices),
                        'activity_infant_price_st' => json_encode($infantPrices_st),
                        'activity_infant_price_pt' => json_encode($infantPrices_pt),
                        'activity_total_amount' => json_encode($insertedData),
                    ];
                }
                else{
                    $cart[$visafinal] = [
                        'visa_id' => $visa,
                        'user_id' => $temp_id,
                        'product_visa' => "visa",
                        'visa_packages' => json_encode($selectedPackages),
                        'visa_processing_type' => json_encode($transferOptions),
                        'visa_travel_date' => json_encode($travelDates),
                        'visa_number' => json_encode($noVisa),
                        'visa_number_e' => json_encode($noVisa_e),
                        'visa_total_amount' => json_encode($insertedData),
                    ];
                }
            }          
            session()->put('cart', $cart);
            
            $success = true;
            return response()->json(['success' => $success]);
        }
        else{
            if (isset($cart[$activity]) || isset($cart[$visafinal])) {
                // $cart[$activity]['quantity']++;
                dd("Error");
            } else {
                // dd("Else");
                if ($activity) {
                    $cart[$activity] = [
                        'activity_id' => $activity,
                        'user_id' => $temp_id_session,
                        'product_activity' => "activity",
                        'activity_packages' => json_encode($selectedPackages),
                        // 'activity_transfer' => json_encode($transferOptions),
                        'activity_travel_date' => json_encode($travelDates),
                        'activity_adult_price' => json_encode($adultPrices),
                        'activity_adult_price_st' => json_encode($adultPrices_st),
                        'activity_adult_price_pt' => json_encode($adultPrices_pt),
                        'activity_child_price' => json_encode($childPrices),
                        'activity_child_price_st' => json_encode($childPrices_st),
                        'activity_child_price_pt' => json_encode($childPrices_pt),
                        'activity_infant_price' => json_encode($infantPrices),
                        'activity_infant_price_st' => json_encode($infantPrices_st),
                        'activity_infant_price_pt' => json_encode($infantPrices_pt),
                        'activity_total_amount' => json_encode($insertedData),
                    ];
                }
                else{
                    $cart[$visafinal] = [
                        'visa_id' => $visa,
                        'user_id' => $temp_id_session,
                        'product_visa' => "visa",
                        'visa_packages' => json_encode($selectedPackages),
                        'visa_processing_type' => json_encode($transferOptions),
                        'visa_travel_date' => json_encode($travelDates),
                        'visa_number' => json_encode($noVisa),
                        'visa_number_e' => json_encode($noVisa_e),
                        'visa_total_amount' => json_encode($insertedData),
                    ];
                }
            }          
            session()->put('cart', $cart);
            
            $success = true;
            return response()->json(['success' => $success]);
            dd("Else");
        }
    }



    public function getCartItemsForCheckout()
    {
        $discount_code = Discount::get();
        $activitycartItems = Cart::with('activity')->where('user_id', auth()->user()->id)->get();
        $visacartItems = Cart::with('visa')->where('user_id', auth()->user()->id)->get();
        $finalData = [];
        $amount = 0;   

        foreach ($activitycartItems as $cartItem) {
            foreach ($cartItem->activity as $cartProduct) {
                $productId = 'activity_' . $cartProduct->id;
                $finalData[$productId]['id'] = $cartProduct->id;
                $finalData[$productId]['name'] = $cartProduct->name;
                $finalData[$productId]['featured_image'] = $cartProduct->featured_image;
                $finalData[$productId]['slug'] = $cartProduct->slug;
                $finalData[$productId]['cart_id'] = $cartItem->id;

                $dataArray = json_decode($cartItem->activity_total_amount, true);

                $filteredData = array_filter($dataArray, function ($value) {
                    return $value !== null;
                });

                $filteredData = array_map(function ($value) {
                    return str_replace(',', '', $value);
                }, $filteredData);

                $sum = array_sum($filteredData);

                $formattedPrice = $sum;

                $finalData[$productId]['activity_total_amount'] = $formattedPrice;
                $finalData[$productId]['product'] = 'activity';

                $amount += $formattedPrice;
                $finalData['totalAmount'] = $amount;
            }
        }    

        foreach ($visacartItems as $cartItem) {
            foreach ($cartItem->visa as $cartProduct) {
                $productId = 'visa_' . $cartProduct->id;
                $finalData[$productId]['id'] = $cartProduct->id;
                $finalData[$productId]['name'] = $cartProduct->name;
                $finalData[$productId]['featured_image'] = $cartProduct->featured_image;
                $finalData[$productId]['slug'] = $cartProduct->slug;
                $finalData[$productId]['cart_id'] = $cartItem->id;

                $dataArray = json_decode($cartItem->visa_total_amount, true);

                $filteredData = array_filter($dataArray, function ($value) {
                    return $value !== null;
                });

                $filteredData = array_map(function ($value) {
                    return str_replace(',', '', $value);
                }, $filteredData);

                $sum = array_sum($filteredData);

                $formattedPrice = $sum;

                $finalData[$productId]['visa_total_amount'] = $formattedPrice;
                $finalData[$productId]['product'] = 'visa';

                $amount += $formattedPrice;
                $finalData['totalAmount'] = $amount;
            }
        }
        
        $finalData['discount_code'] = json_encode($discount_code);

        // dd($finalData);
        return response()->json($finalData);
    }

    public function getCartItemsForCart()
    {

        $activitycartItems = Cart::with('activity')->where('user_id', auth()->user()->id)->get();
        $visacartItems = Cart::with('visa')->where('user_id', auth()->user()->id)->get();
        $finalData = [];
        $amount = 0;

        foreach ($activitycartItems as $cartItem) {
            foreach ($cartItem->activity as $cartProduct) {
                $productId = 'activity_' . $cartProduct->id;
                $finalData[$productId]['id'] = $cartProduct->id;
                $finalData[$productId]['name'] = $cartProduct->name;
                $finalData[$productId]['featured_image'] = $cartProduct->featured_image;
                $finalData[$productId]['slug'] = $cartProduct->slug;
                $finalData[$productId]['cart_id'] = $cartItem->id;

                $dataArray = json_decode($cartItem->activity_total_amount, true);

                $filteredData = array_filter($dataArray, function ($value) {
                    return $value !== null;
                });

                $filteredData = array_map(function ($value) {
                    return str_replace(',', '', $value);
                }, $filteredData);

                $sum = array_sum($filteredData);

                $formattedPrice = $sum;

                $finalData[$productId]['activity_total_amount'] = $formattedPrice;
                $finalData[$productId]['product'] = 'activity';

                $amount += $formattedPrice;
                $finalData['totalAmount'] = $amount;
            }
        }

        foreach ($visacartItems as $cartItem) {
            foreach ($cartItem->visa as $cartProduct) {
                $productId = 'visa_' . $cartProduct->id;
                $finalData[$productId]['id'] = $cartProduct->id;
                $finalData[$productId]['name'] = $cartProduct->name;
                $finalData[$productId]['featured_image'] = $cartProduct->featured_image;
                $finalData[$productId]['slug'] = $cartProduct->slug;
                $finalData[$productId]['cart_id'] = $cartItem->id;

                $dataArray = json_decode($cartItem->visa_total_amount, true);

                $filteredData = array_filter($dataArray, function ($value) {
                    return $value !== null;
                });

                $filteredData = array_map(function ($value) {
                    return str_replace(',', '', $value);
                }, $filteredData);

                $sum = array_sum($filteredData);

                $formattedPrice = $sum;

                $finalData[$productId]['visa_total_amount'] = $formattedPrice;
                $finalData[$productId]['product'] = 'visa';

                $amount += $formattedPrice;
                $finalData['totalAmount'] = $amount;
            }
        }

        return response()->json($finalData);
                
    }

    public function processPayment(Request $request)
    {

        $user_auth = auth()->user()->id ?? null;
        $user_auth_temp_id = auth()->user()->temp_id ?? null;

        $orderData = $request->get('order');
        $orderArray = json_decode($orderData, true); 

        $firstUserId = null;
        $firstUserIdSession = null;

        if(!empty($user_auth)){
            $firstUserId = $user_auth;

            if(!empty($user_auth_temp_id)){
                $firstUserId = $user_auth_temp_id;
            }

            if (!empty($orderArray) && is_array($orderArray)) {
                $firstItem = reset($orderArray); // Get the first item from the array
                $firstUserIdSession = $firstItem['user_id']; // Retrieve the user_id from the first item
            }
        } else{
            if (!empty($orderArray) && is_array($orderArray)) {
                $firstItem = reset($orderArray); // Get the first item from the array
                $firstUserIdSession = $firstItem['user_id']; // Retrieve the user_id from the first item
            }
        }

        $packagesKey = null;
        $allPackages = [];

        foreach ($orderArray as $item) {
            if (isset($item['activity_packages'])) {
                $packagesKey = 'activity_packages';
            } elseif (isset($item['visa_packages'])) {
                $packagesKey = 'visa_packages';
            } else {
                // Handle the case where neither 'activity_packages' nor 'visa_packages' is present
                continue;
            }

            $packages = json_decode($item[$packagesKey], true);
            $allPackages = array_merge($allPackages, $packages);
        }

        // dd($allPackages);

        $order_current_id = $firstUserId;

        // dd($request->get('Famount'));
        $firstname = $request->get('firstname');
        $lastname = $request->get('lastname');
        $email = $request->get('email');
        $address = $request->get('address');
        $towncity = $request->get('towncity');
        $statecountry = $request->get('statecountry');
        $postcodezip = $request->get('postcodezip');
        $number = $request->get('number');
        $alternumber = $request->get('alternumber');
        $amount = $request->get('Famount');
        $Ship = $request->get('Ship');
        $shipaddress = $request->get('shipaddress');
        $note = $request->get('note');
        $peymentReceived = $request->get('isCheckedbank');
        $orders = $request->get('order');
        $couponType = $request->get('coupontype');
        $couponPrice = $request->get('couponprice');
        $userpass = $request->get('pass');

        $orderString = implode(', ', $allPackages);
        $first = strtoupper(substr($address, -2));
        $second = strtolower(substr($towncity, -2));
        $third = strtoupper(substr($statecountry, -2));

        $myTableRow = Processing::orderBy('id', 'desc')->limit(1)->get();
        $myTableRow1 = $myTableRow[0]->id;
        $randomNumber = rand(1, 100);
        $randomNumber1 = rand(1, $randomNumber);
        $myTableRow2 = $myTableRow1 + $randomNumber1;
        $final_order_number = $first.$second.$third.'-'.$order_current_id.'-'.$myTableRow2;

        // dd($first, $second, $final_order_number);

        $finalAmount= '';
        if($couponPrice != null){
            $finalAmount = $amount - $couponPrice;
        }
        else{
            $finalAmount = $amount;
        }
        // dd($finalAmount , $couponType);
        if($firstUserId == $firstUserIdSession){
            $processingDetails = Processing::create([
                'order_number' => $final_order_number,
                'client_id' => $firstUserId,
                'client_name' => $firstname.' '.$lastname,
                'client_address' => $address.' '.$towncity.' '.$statecountry,
                'client_country' => $statecountry,
                'order_details' => json_encode($orders),
                'product_name' => $orderString,
                'client_number' => $number,
                'client_alternate_number' => $alternumber,
                'client_email' => $email,
                'client_shipaddress' => $shipaddress,
                'client_note' => $note,
                'discount_type' => $couponType,
                'discount_amount' => $couponPrice,
                'amount' => $amount,
                'received_by' => $peymentReceived,
                'order_status' => 'Pending',
            ]);
        }
        else{
            $processingDetails = Processing::create([
                'order_number' => $final_order_number,
                'client_id' => $firstUserIdSession,
                'client_name' => $firstname.' '.$lastname,
                'client_address' => $address.' '.$towncity.' '.$statecountry,
                'client_country' => $statecountry,
                'order_details' => json_encode($orders),
                'product_name' => $orderString,
                'client_number' => $number,
                'client_alternate_number' => $alternumber,
                'client_email' => $email,
                'client_shipaddress' => $shipaddress,
                'client_note' => $note,
                'discount_type' => $couponType,
                'discount_amount' => $couponPrice,
                'amount' => $amount,
                'received_by' => $peymentReceived,
                'order_status' => 'Pending',
            ]);
        }

        $data = ['booking' => $processingDetails];
        $user['to'] = $request->email;
        $user['cc'] = 'mrhuzaifa29@gmail.com';
        // $user['cc'] = 'booking@falcondrive.ae';
        
        Mail::send('booking_email', $data, function ($messages) use ($user) {
            $messages->to($user['to']);
            $messages->cc($user['cc']);
            $messages->subject('Purchased Service');
            $messages->from('huzikhan900@gmail.com', 'Desert Safari'); // Add the sender's email address and name
        });
// dd($processingDetails);
        if($processingDetails)
        {
            if ($firstUserId == $firstUserIdSession) {
                session()->forget('cart');
                session()->forget('valueid');
                session()->forget('coupon');
                Cart:: where('user_id', $order_current_id)->delete();

                return ['success'=> 'Order completed successfully'];
            }
            elseif ($firstUserId) {
                User::where('id', $firstUserId)
                    ->update([
                        'temp_id' => $firstUserIdSession,
                    ]);

                    session()->forget('cart');
                    session()->forget('valueid');
                    session()->forget('coupon');
                    Cart:: where('user_id', $order_current_id)->delete();

                    return ['success'=> 'Order completed successfully'];
            }
            else{
                User::create([
                    'temp_id' => $firstUserIdSession,
                    'name' => $firstname,
                    'lname' => $lastname,
                    'email' => $email,
                    'phone' => $number,
                    'password' => Hash::make($userpass),
                ]);

                session()->forget('cart');
                session()->forget('valueid');
                session()->forget('coupon');
                Cart:: where('user_id', $order_current_id)->delete();

                return ['success'=> 'Order completed successfully'];
            }

        }

        else
        {
            return ['error'=> 'Order failed contact support'];
        }


    }

    public function destroy($cart_id)
    {
        
        Cart::destroy($cart_id);

        return response()->json(['message' => 'Item removed from cart']);
    }

    public function applycoupon(Request $request)
    {
        // dd($request->all());
        $discount_code = $request->input('discount_code');
        $discount_codeId = $request->input('discount_code_id');

        $currentDateTime = Carbon::now('Asia/Karachi');
        $currentLocalDate = $currentDateTime->format('Y-m-d');
        $currentLocalTime = $currentDateTime->format('H:i:s');
        // dd($currentLocalDate, $currentLocalTime);

        $discountPriceGetDate = Discount::where('coupon_code', $discount_code)
            ->where(function ($query) use ($currentLocalDate) {
                $query->where('end_date', '>=', $currentLocalDate);
            })
            ->first();

        $discountPriceGetTime = Discount::where('coupon_code', $discount_code)
            ->where(function ($query) use ($currentLocalTime) {
                $query->where('end_time', '>=', $currentLocalTime)
                    ->orWhere(function ($subQuery) use ($currentLocalTime) {
                        $subQuery->where('end_time', '>', $currentLocalTime)
                                  ->where('end_time', '>', '00:00:00');
                    });
            })
            ->first();

        if ($discountPriceGetDate && $discountPriceGetTime) {
            $coupon_price_time = $discountPriceGetTime['coupon_price'];
            $coupon_price_date = $discountPriceGetDate['coupon_price'];

            $coupon = session()->get('coupon', []);

            if (isset($coupon[$discount_codeId])) {
                $coupon[$discount_codeId] = [
                    "code" => $discount_code,
                    "couponPrice" => $coupon_price_time,
                ];
            } else {
                $coupon[$discount_codeId] = [
                    "code" => $discount_code,
                    "couponPrice" => $coupon_price_time,
                ];
            }

            session()->put('coupon', $coupon);

            return response()->json(['success' => 'Coupon applied successfully']);
        } elseif ($discountPriceGetDate || $discountPriceGetTime) {
            return response()->json(['error' => 'Expired coupon code']);
        } else {
            return response()->json(['error' => 'Invalid coupon code']);
        }
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function modifyapplycoupon(Request $request)
    {
        $discount_code = $request->input('discount_code');
        $discount_codeId = $request->input('discount_code_id');

        $currentDateTime = Carbon::now('Asia/Karachi');
        $currentLocalTimeModify = $currentDateTime->format('Y-m-d H:i:s');

        $discountPriceGet = Discount::where('coupon_code', $discount_code)
            ->where('modify_date_time', '>=', $currentLocalTimeModify) // Check end date and time
            ->first();

        if ($discountPriceGet) {
            $coupon_price_time = $discountPriceGet->coupon_price;
            $coupon_price_discount = $discountPriceGet->discount;

            $coupon = session()->get('coupon', []);

            if (isset($coupon[$discount_codeId])) {
                $coupon[$discount_codeId] = [
                    "code" => $discount_code,
                    "couponPrice" => $coupon_price_time,
                    "couponDiscount" => $coupon_price_discount,
                ];
            } else {
                $coupon[$discount_codeId] = [
                    "code" => $discount_code,
                    "couponPrice" => $coupon_price_time,
                    "couponDiscount" => $coupon_price_discount,
                ];
            }

            session()->put('coupon', $coupon);

            return response()->json(['success' => 'Valid Coupon Applied Successfully']);
        } else {
            return response()->json(['error' => 'Invalid or expired coupon code']);
        }
    }
        
    public function getPrice(Request $request)
    {
        $code = $request->input('code');
        
        // Define your price table here
        // Example: 'DISCOUNT_CODE' => PRICE,
        $priceTable = [
            'CODE1' => 10,
            'CODE2' => 20,
            'CODE3' => 30,
        ];

        if (array_key_exists($code, $priceTable)) {
            $price = $priceTable[$code];
            return response()->json([
                'success' => true,
                'price' => $price,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'price' => 0,
            ]);
        }
    }
}
