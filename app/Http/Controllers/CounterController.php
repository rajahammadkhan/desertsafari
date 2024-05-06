<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Counter;
use Illuminate\Support\Facades\Session;

class CounterController extends Controller
{
    public function increment(Request $request)
    {
        $counter = Counter::first();

        if ($counter) {
            $incrementValue = $request->input('liked_value', 1);
            $counter->increment('liked_value', $incrementValue);
            Session::flash('success', 'Feedback Drives Excellence!');
        }

        return redirect()->back();
    }

    public function disincrement(Request $request)
    {
        $counter = Counter::first();

        if ($counter) {
            $disincrementValue = $request->input('disliked_value', 1);
            $counter->increment('disliked_value', $disincrementValue);
            Session::flash('error', 'Your Feedback & Dislikes Drive Our Excellence!');
        }

        return redirect()->back();
    }
}
