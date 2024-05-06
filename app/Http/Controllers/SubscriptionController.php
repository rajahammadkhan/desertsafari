<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscriptionsend(Request $request)
    {
        $subscriptions = new Subscription;
        $subscriptions->email = $request->email;
        $subscriptions->save();
        
        return redirect()->back()->with('message', 'YOUR REQUEST HAS BEEN SUBMITTED SUCCESSFULLY');
    }
}
