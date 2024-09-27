<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
class PdfController extends Controller
{
    public function downloadPdf($id)
    {
        // Fetch the device along with the user who owns it
        $device = Device::with('user')->findOrFail($id);

        // Create an instance of Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);

        // Load the view into Dompdf
        $html = view('pdf.devices', [
            'device' => $device,
            'user' => $device->user,
        ])->render();

        // Load HTML content to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        return $dompdf->stream('device_' . $device->id . '.pdf', [
            'Attachment' => true, // Set to false to open in browser
        ]);
    }

}
