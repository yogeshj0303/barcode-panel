<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarcodeDetail;
use App\Models\ScanBarcode;
use App\Models\PackingSlip;
use App\Models\History;
use App\Models\PackingHistory;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ScannedRecordsExport;
use App\Exports\PackingRecordsExport;
use App\Exports\ExcelProductionConvert;
use App\Exports\ExcelConvert;
use Barryvdh\DomPDF\Facade\Pdf;


use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage; // For storing barcode images

class BarcodeController extends Controller
{
    
     public function index(Request $request){
         $reports =  BarcodeDetail::select(
                                'wo_no',
                                'part_no', 
                                'so_no', 
                                'line_no', 
                                'operation_code', 
                                'quantity', 
                                \DB::raw('MAX(id) as id')
                            )
                            ->groupBy('wo_no','part_no', 'so_no', 'line_no', 'operation_code', 'quantity')
                            ->orderBy('id', 'desc')
                            ->paginate(10);
         return view('reports.add-csv',compact('reports'));
     }
     
     
     public function indexView(Request $request) {
    $reports = BarcodeDetail::select('wo_no', \DB::raw('MAX(id) as id'))
                             ->groupBy('wo_no')
                             ->orderBy('id', 'desc')
                             ->paginate(10);

    return view('reports.index', compact('reports'));
}

public function barcodeDetails(Request $request) {
    $reports = BarcodeDetail::where('wo_no', $request->wo_no)
                            ->select(
                                'part_no', 
                                'so_no', 
                                'line_no', 
                                'operation_code', 
                                'quantity', 
                                \DB::raw('MAX(id) as id')
                            )
                            ->groupBy('part_no', 'so_no', 'line_no', 'operation_code', 'quantity')
                            ->orderBy('id', 'desc')
                            ->paginate(10);

    return view('reports.barcode-details', compact('reports'));
}

    
public function import(Request $request)
{
    // Validate the file
    $validator = Validator::make($request->all(), [
        'file' => 'required|mimes:csv,txt|max:2048',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()->first()], 422);
    }

    // Handle the CSV file
    $file = $request->file('file');
    $fileHandle = fopen($file, 'r');

    // Skip the header row (if present)
    fgetcsv($fileHandle, 1000, '~');

    $skippedEntries = 0;
    $insertedEntries = 0;

    // Read the CSV file line by line
    while (($data = fgetcsv($fileHandle, 1000, '~')) !== false) {
        // Ensure the row contains exactly 6 fields
        if (count($data) < 6) {
            return response()->json(['error' => 'Invalid CSV format. Each row must have 6 fields.'], 422);
        }

        // Check if the record already exists
        $existingRecord = BarcodeDetail::where('wo_no', $data[0])
                            ->where('part_no', $data[1])
                            ->where('so_no', $data[2])
                            ->where('line_no', $data[3])
                            ->where('operation_code', $data[4])
                            ->first();

        // If record exists, skip this row
        if ($existingRecord) {
            $skippedEntries++;
            continue;
        }

        // Concatenate data for the QR code
        $qrData = implode('~', $data);

        // Generate the QR code image
        $qrCodeImage = QrCode::format('png')->size(200)->generate($qrData);

        // Create a unique filename for the QR code
        $qrFileName = 'qrcodes/' . uniqid() . '.png';

        // Store the QR code image in the storage directory
        Storage::disk('public')->put($qrFileName, $qrCodeImage);

        // Store data in the database
        BarcodeDetail::create([
            'wo_no'          => $data[0], // WO No
            'part_no'        => $data[1], // Part No
            'so_no'          => $data[2], // SO No
            'line_no'        => $data[3], // Line No
            'operation_code' => $data[4], // Operation Code
            'quantity'       => $data[5], // Quantity
            'barcode_path'   => $qrFileName, // Save the path to the QR code image
        ]);

        $insertedEntries++;
    }

    fclose($fileHandle);

    return response()->json([
        'message' => 'CSV imported successfully.',
        'inserted_entries' => $insertedEntries,
        'skipped_entries' => $skippedEntries
    ], 200);
}
    
public function destroy($id) {
    $report = BarcodeDetail::findOrFail($id);

    // Check if the record exists in ScanBarcode with the matching conditions
    $barcodeDetail = ScanBarcode::where('wo_no', $report->wo_no)
        ->where('so_no', $report->so_no)
        ->where('part_no', $report->part_no)
        ->where('line_no', $report->line_no)
        ->where('operation_no', $report->operation_code) // Ensure field names match the database columns
        ->first();

    // If a barcode record exists, prevent deletion and return with an error message
    if ($barcodeDetail) {
        return redirect()->route('barcode.reports')
            ->with('error', "The report with WO No: {$report->wo_no}, SO No: {$report->so_no}, Part No: {$report->part_no}, Line No: {$report->line_no}, and Operation Code: {$report->operation_code} cannot be deleted because it is linked to a Production Record.");
    }

    // If no matching record exists in ScanBarcode, delete the report
    $report->delete();

    return redirect()->route('barcode.reports')->with('success', 'Report deleted successfully.');
}


public function fetchAndSaveData(Request $request)
    {
        $woNo = $request->work_order_no;
        $operationCode = $request->operation_code;

        // Fetch matching data from barcode_details
        $barcodeDetails = BarcodeDetail::where('wo_no', $woNo)
                                        ->where('operation_code', $operationCode)
                                        ->first();

        if (!$barcodeDetails) {
            return response()->json(['message' => 'No data found for the selected Work Order and Operation Code.'], 404);
        }

        // Store the fetched data in scan_brcodes table
        $scanBarcode = ScanBarcode::create([
            'wo_no' => $barcodeDetails->wo_no,
            'part_no' => $barcodeDetails->part_no,
            'so_no' => $barcodeDetails->so_no,
            'line_no' => $barcodeDetails->line_no,
            'operation_no' => $barcodeDetails->operation_code,
            'quantity' => $barcodeDetails->quantity,
            'timestamp' => now(),
        ]);

        return response()->json($scanBarcode);
    }
    
public function deleteSelected(Request $request)
{
    $selectedIds = json_decode($request->selected_ids, true);

    if (is_array($selectedIds) && count($selectedIds) > 0) {
        // Collect the IDs of records that are safe to delete
        $deletableIds = [];
        $notDeletable = [];

        // Loop through the selected IDs and check if any record exists in the ScanBarcode table
        foreach ($selectedIds as $id) {
            $report = BarcodeDetail::find($id);

            // If the record doesn't exist, continue to the next ID (in case of a stale ID in the form)
            if (!$report) {
                continue;
            }

            // Check if the record exists in ScanBarcode with the matching conditions
            $barcodeDetail = ScanBarcode::where('wo_no', $report->wo_no)
                ->where('so_no', $report->so_no)
                ->where('part_no', $report->part_no)
                ->where('line_no', $report->line_no)
                ->where('operation_no', $report->operation_code) // Ensure field names match the database columns
                ->first();

            // If a barcode record exists, prevent deletion and add to the not deletable list
            if ($barcodeDetail) {
                $notDeletable[] = $report;
            } else {
                // If not found in ScanBarcode, add to deletable IDs
                $deletableIds[] = $id;
            }
        }

        // Delete the selected reports that are safe to delete
        if (!empty($deletableIds)) {
            BarcodeDetail::whereIn('id', $deletableIds)->delete();
        }

        // Prepare messages based on the result
        if (count($notDeletable) > 0) {
            $nonDeletableRecords = collect($notDeletable)->map(function ($report) {
                return "WO No: {$report->wo_no}, SO No: {$report->so_no}, Part No: {$report->part_no}, Line No: {$report->line_no}, Operation Code: {$report->operation_code}";
            })->implode(', ');

            return redirect()->back()->with('error', "Some records could not be deleted because they are linked to a Production Record: {$nonDeletableRecords}.");
        }

        return redirect()->back()->with('message', 'Selected reports have been deleted successfully.');
    }

    return redirect()->back()->with('error', 'No reports selected for deletion.');
}

public function getScannedQuantity(Request $request)
{
    // Validate the incoming request
    $validated = $request->validate([
        'wo_no' => 'required|string',
        'part_no' => 'required|string',
        'line_no' => 'required|string',
        'operation_code' => 'required|string',
    ]);

    // Search for the record in the ScanBarcode table
    $scanned = ScanBarcode::where('wo_no', $validated['wo_no'])
                ->where('part_no', $validated['part_no'])
                ->where('line_no', $validated['line_no'])
                ->where('operation_no', $validated['operation_code'])
                ->first();

    if ($scanned) {
        // Return the scanned quantity as a JSON response
        return response()->json([
            'success' => true,
            'quantity' => $scanned->quantity // Assuming you have a 'quantity' field in the ScanBarcode table
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'No record found'
    ]);
}

public function exportScannedRecords()
{
    // Get the current date and time
    $currentDateTime = now()->format('d-m-Y H:i');
    // Generate the dynamic filename
    $fileName = "Sheet1 {$currentDateTime}.xlsx";

    // Return the Excel download with the dynamic filename
    return Excel::download(new ScannedRecordsExport, $fileName);
}

public function exportPackingRecords()
{
    // Get the current date and time
    $currentDateTime = now()->format('d-m-Y H:i');
    // Generate the dynamic filename
    $fileName = "Sheet1 {$currentDateTime}.xlsx";

    // Return the Excel download with the dynamic filename
    return Excel::download(new PackingRecordsExport, $fileName);
}


public function exportToExcel()
{
    // Get the current date and time
    $currentDateTime = now()->format('d-m-Y H:i');
    // Generate the dynamic filename
    $fileName = "Sheet1 {$currentDateTime}.xlsx";

    // Return the Excel download with the dynamic filename
    return Excel::download(new ExcelConvert, $fileName);
}

public function exportToExcelProduction()
{
    // Get the current date and time
    $currentDateTime = now()->format('d-m-Y H:i');
    // Generate the dynamic filename
    $fileName = "Sheet1 {$currentDateTime}.xlsx";

    // Return the Excel download with the dynamic filename
    return Excel::download(new ExcelProductionConvert, $fileName);
}

public function exportToPDF()
{
    // Fetch the data sorted by `so_no` and `part_no`
    $records = PackingHistory::orderBy('so_no')
        ->orderBy('part_no')
        ->get();

    // Add blank rows as separators based on `so_no` changes
    $scannedRecords = [];
    $previousSoNo = null;

    foreach ($records as $record) {
        if ($previousSoNo !== null && $record->so_no !== $previousSoNo) {
            // Insert a blank row as a separator
            $scannedRecords[] = (object)[
                'wo_no' => '', 'part_no' => '', 'po_no' => '', 'so_no' => '',
                'line_no' => '', 'operation_no' => '', 'quantity' => '',
                'user_name' => ''
            ];
        }
        $scannedRecords[] = $record;
        $previousSoNo = $record->so_no;
    }

    // Get the current date and time for the filename
    $currentDateTime = now()->format('d-m-Y H:i');
    $fileName = "packing_records_{$currentDateTime}.pdf";

    // Generate the PDF with the `records1` view and pass the modified data
    $pdf = Pdf::loadView('records', compact('scannedRecords'));

    // Download the PDF with the specified dynamic name
    return $pdf->download($fileName);
}
public function exportProductionPDF()
{
    // Fetch the data sorted by `so_no` and `part_no`
    $records = History::orderBy('so_no')
        ->orderBy('part_no')
        ->get();

    // Add blank rows as separators based on `so_no` changes
    $scannedRecords = [];
    $previousSoNo = null;

    foreach ($records as $record) {
        if ($previousSoNo !== null && $record->so_no !== $previousSoNo) {
            // Insert a blank row as a separator
            $scannedRecords[] = (object)[
                'wo_no' => '', 'part_no' => '', 'po_no' => '', 'so_no' => '',
                'line_no' => '', 'operation_no' => '', 'quantity' => '',
                'user_name' => ''
            ];
        }
        $scannedRecords[] = $record;
        $previousSoNo = $record->so_no;
    }

    // Get the current date and time for the filename
    $currentDateTime = now()->format('d-m-Y H:i');
    $fileName = "production_records_{$currentDateTime}.pdf";

    // Generate the PDF with the `records1` view and pass the modified data
    $pdf = Pdf::loadView('records1', compact('scannedRecords'));

    // Download the PDF with the specified dynamic name
    return $pdf->download($fileName);
}

}
