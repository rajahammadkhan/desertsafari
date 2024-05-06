<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Processing;
use PDF;
use Illuminate\Support\Facades\View;

class PDFController extends Controller
{
    public function generatePDF($processingId)
    {
        // Fetch the data needed for the invoice (replace with your logic)
        $invoiceData = $this->getProcessingData($processingId);

        // Check if data was found, and if not, handle accordingly (e.g., show a 404 page)
        if (!$invoiceData) {
            abort(404);
        }

        // Load the view with the data
        $pdf = PDF::loadView('invoice', compact('invoiceData'));

        // Set the filename for the downloaded PDF
        $fileName = 'Order_Slip_' . $invoiceData->order_number . '.pdf';

        // Generate the PDF and offer it for download
        return $pdf->download($fileName);
    }

    // Replace this function with your actual data retrieval logic using Eloquent
    private function getProcessingData($processingId)
    {
        // Use Eloquent to fetch data from the 'processing' table
        // Replace 'Processing' with your actual Eloquent model
        return Processing::find($processingId);
    }

}
