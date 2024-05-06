<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\total_users;
use Hash;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class TotalUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.total_users.index');
    }

    public function datatable()
    {
        $roles = total_users::latest()->get();

        return DataTables::collection($roles)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\total_users  $total_users
     * @return \Illuminate\Http\Response
     */
    public function show(total_users $total_users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\total_users  $total_users
     * @return \Illuminate\Http\Response
     */
    public function edit(total_users $user)
    {
        $data = [
            'isEdit' => true,
            'user' => $user,
        ];
        return view('cms.total_users.add-user', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, total_users $user)
    {   
        $user->name = $request->name;
        $user->lname = $request->lname;
        $user->date_of_birth = $request->date_of_birth;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        // return redirect()->intended('users');
        return redirect()->route('users_data');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\total_users  $total_users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = total_users::where('id', $request->deleteId)->first();
        $user->delete();
        return response()->json($user, 200);
    }
}
