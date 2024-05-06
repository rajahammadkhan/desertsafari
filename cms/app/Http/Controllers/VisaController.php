<?php

namespace App\Http\Controllers;

use App\Models\visa;
use App\Models\VisaPrice;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;

class VisaController extends Controller
{
    public function index()
    {
        
        return view('cms.visa.index');
    }

    public function datatable()
    {
        $visa = visa::orderBy('id', 'desc')->get();

        // $roles = $roles->transform(function ($item) {
        //     $item->role_names = $item->roles->pluck('name')->implode(', ');
        //     return $item;
        // })->all();

        return DataTables::collection($visa)->toJson();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'isEdit'    =>  false,
        ];

        return view('cms.visa.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
// dd($request->all());
        $request->validate([
            'name' => 'required',
        ]);
        
        $visa         =   new visa;

        $image = Storage::disk('cms')->putFile('', $request->featured_image);
        $visa->featured_image  =   $image;

        $visa->name   =   $request->name;
        $visa->price   =   $request->price;
        $visa->description   =   $request->description;
        $visa->visa_documents   =   $request->visa_documents;
        $visa->faq   =   $request->faq;
        $visa->arrival_visa_country   =   $request->arrival_visa_country;
        $visa->restricted_visa_country   =   $request->restricted_visa_country;
        $visa->term_condition   =   $request->term_condition;
        $visa->working_days   =   $request->working_days;
        $visa->easy_documentation   =   $request->easy_documentation;
        $visa->online_payment   =   $request->online_payment;
        $visa->slug   =   strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $visa->save();

        foreach($request->visa_name as $key => $visa_name){
            $visaprice                         =   new VisaPrice;
            $visaprice->visa_id                =   $visa->id;
            $visaprice->visa_name              =   $visa_name;
            $visaprice->processing_type_normal =   $request->processing_type_normal[$key];
            $visaprice->processing_type_express=   $request->processing_type_express[$key];
            $visaprice->travel_date_end        =   $request->travel_date_end[$key];
            $visaprice->visa_price             =   $request->visa_price[$key];
            $visaprice->visa_price_e           =   $request->visa_price_e[$key];
            $visaprice->save();
        }

        return redirect()->route('visas');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(visa $visa)
    {
        $data = [
            'isEdit'   => true,
            'visa'    => $visa->load('features'),
        ];

        // return $data['visa'];

        return view('cms.visa.add', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, visa $visa, VisaPrice $visaprice)
    {
        // dd($request->all());
        $visa                               =   visa::find($request->id);
        $visa->name   =   $request->name;
        $visa->price   =   $request->price;
        $visa->description   =   $request->description;
        $visa->visa_documents   =   $request->visa_documents;
        $visa->faq   =   $request->faq;
        $visa->arrival_visa_country   =   $request->arrival_visa_country;
        $visa->restricted_visa_country   =   $request->restricted_visa_country;
        $visa->term_condition   =   $request->term_condition;
        $visa->working_days   =   $request->working_days;
        $visa->easy_documentation   =   $request->easy_documentation;
        $visa->online_payment   =   $request->online_payment;
        $visa->slug   =   strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));

        if ($request->featured_image == null) {
             $visa->featured_image;            
        }
        else{
            $image = Storage::disk('cms')->putFile('', $request->featured_image);
            $visa->featured_image  =   $image;
        }
        
        $visa->save();

        if($visaprice->value != $request->visa_name[0]){            
            foreach($request->featureid as $key => $visa_name){
                $visaprice                =   VisaPrice::where('id', $request->featureid[$key])->first();
                $visaprice->visa_name              =   $request->visa_name[$key];
                $visaprice->processing_type_normal =   $request->processing_type_normal[$key];
                $visaprice->processing_type_express=   $request->processing_type_express[$key];
                $visaprice->travel_date_end        =   $request->travel_date_end[$key];
                $visaprice->visa_price             =   $request->visa_price[$key];
                $visaprice->visa_price_e           =   $request->visa_price_e[$key];
                $visaprice->save();
            }  
            
        }
        else{           
            foreach($request->visa_name as $key => $visa_name){
                $visaprice                         =   new VisaPrice;
                $visaprice->visa_id                =   $visa->id;
                $visaprice->visa_name              =   $visa_name;
                $visaprice->processing_type_normal =   $request->processing_type_normal[$key];
                $visaprice->processing_type_express=   $request->processing_type_express[$key];
                $visaprice->travel_date_end        =   $request->travel_date_end[$key];
                $visaprice->visa_price             =   $request->visa_price[$key];
                $visaprice->visa_price_e           =   $request->visa_price_e[$key];
                $visaprice->save();
                // dd($visaprice);
            }          
        }

        return redirect()->route('visas');
    }

    public function status(Request $request)
    {

        $status = $request->status;
        $id = $request->id;

        $item = visa::find($id);

        if ($item->update(['status' => $status])) {
            $response['status'] = true;
            $response['message'] = 'Status Updated Successfully!';

            return response()->json($response, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        VisaPrice::where('visa_id', $request->deleteId)->delete();
        $visa = visa::where('id', $request->deleteId)->first();
        $visa->delete();

        return response()->json($visa, 200);
    }
}
