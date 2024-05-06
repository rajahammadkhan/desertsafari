<?php

namespace App\Http\Controllers;

use App\Models\Enquiry_Prodoct;
use Illuminate\Http\Request;
use DataTables;

class EnquiryProdoctController extends Controller
{
    public function datatable()
    {
        $enquiry = Enquiry_Prodoct::orderByDesc('id')->get();

        return DataTables::collection($enquiry)->toJson();

    }
    public function index()
    {
        return view('cms.enquiry.index');
    }

    public function destroy(Request $request)
    {
        $enquiry = Enquiry_Prodoct::where('id', $request->deleteId)->first();
        $enquiry->delete();
        return response()->json($enquiry, 200);
    }
}
