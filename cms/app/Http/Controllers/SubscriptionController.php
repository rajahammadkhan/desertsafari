<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use DataTables;

class SubscriptionController extends Controller
{
    public function datatable()
    {
        $subscription = Subscription::orderByDesc('id')->get();

        return DataTables::collection($subscription)->toJson();

    }
    public function index()
    {
        return view('cms.subscription.index');
    }

    public function destroy(Request $request)
    {
        $subscription = Subscription::where('id', $request->deleteId)->first();
        $subscription->delete();
        // return $request;
        return response()->json($subscription, 200);
    }
}
