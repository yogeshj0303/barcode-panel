<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarcodeDetail;
use App\Models\ScanBarcode;
use App\Models\PackingSlip;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage; // For storing barcode images

class ProductionController extends Controller
{
    
public function packingFileIndex(Request $request){
    // Fetch unique file names along with the latest updated_at timestamp
    $scannedRecords = PackingSlip::select('file_name', DB::raw('MAX(updated_at) as latest_update'))
        ->groupBy('file_name')
        ->orderBy('latest_update', 'desc')
        ->get();
        
    return view('production-records.packing-slip-index', compact('scannedRecords'));
}
    
     public function packingIndex(Request $request){
         $fileName = $request->file_name;
          $scannedRecords = PackingSlip::orderBy('updated_at', 'desc')->where('file_name',$fileName)->get();
          
                   
$woNo = BarcodeDetail::select('wo_no', \DB::raw('MAX(id) as id'), \DB::raw('MAX(updated_at) as updated_at'))
                     ->groupBy('wo_no')
                     ->orderByRaw('MAX(updated_at) DESC, MAX(created_at) DESC')
                     ->paginate(10);
          
          
         return view('production-records.packing-slip', compact('scannedRecords','woNo','fileName'));
     }
     
     
     public function index(Request $request) {
         
         $workOrder = $request->work_order_no;
         $operationNo = $request->operation_code;
         
$woNo = BarcodeDetail::select('wo_no', \DB::raw('MAX(id) as id'), \DB::raw('MAX(updated_at) as updated_at'))
                     ->groupBy('wo_no')
                     ->orderByRaw('MAX(updated_at) DESC, MAX(created_at) DESC')
                    
                     ->paginate(10);

   $scannedRecords = ScanBarcode::where('wo_no', $workOrder)
    ->where('operation_no', $operationNo)
    ->latest('updated_at') // Sort by the updated_at column in descending order
    ->get();
// Adjust the query as needed


    return view('production-records.production_process', compact('woNo','scannedRecords','workOrder','operationNo'));
}

     public function productionIndex(Request $request) {
         
$woNo = BarcodeDetail::select('wo_no', \DB::raw('MAX(id) as id'), \DB::raw('MAX(updated_at) as updated_at'))
                     ->groupBy('wo_no')
                     ->orderByRaw('MAX(updated_at) DESC, MAX(created_at) DESC')
                     ->paginate(10);



    return view('production-records.production_process_index', compact('woNo'));
}

public function getOperationCodes(Request $request) {
    $operationCodes = BarcodeDetail::where('wo_no', $request->wo_no)
                                    ->select('operation_code')
                                    ->distinct()
                                    ->get();

    return response()->json($operationCodes);
}

public function store(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'scanInput' => 'required|string|max:255', // Assuming this is the scanned code
        'work_order_no' => 'required|string|max:255',
        'operation_code' => 'required|string|max:255',
    ]);

    // Extract data from the scanned barcode string using the ~ separator
    $scannedData = explode('~', $request->scanInput);

    if (count($scannedData) < 4) {
        return response()->json(['error' => 'Invalid scanned data format.'], 400);
    }

    // Assign the extracted values to their corresponding fields
    $woNo = $scannedData[0];
    $partNo = $scannedData[1];
    $poNo = $scannedData[2];
    $soNo = $scannedData[3];
    $lineNo = $scannedData[4];

    // Validate against selected work order to match scanned data
    if ($woNo !== $request->work_order_no) {
         return response()->json([
                'success' => false,
                'message' => 'Scanned data does not match selected Work Order.',
            ], 400);
    }

    // Retrieve the corresponding record from barcode_details table
    $barcodeDetail = BarcodeDetail::where('wo_no', $woNo)
        ->where('part_no', $partNo)
        ->where('line_no', $lineNo)
        ->where('operation_code', $request->operation_code)
        ->first();

    if (!$barcodeDetail || $barcodeDetail->quantity == 0) {
        return response()->json([
            'success' => false,
            'message' => 'You have no available quantity for the related data.',
        ], 400);
    }

    // Define the quantity to be incremented, default to 1 if not provided
    $incrementQuantity = $request->quantity ?? 1;

    // Retrieve any existing scan record
    $existingScan = ScanBarcode::where('wo_no', $woNo)
        ->where('part_no', $partNo)
        ->where('line_no', $lineNo)
        ->where('operation_no', $request->operation_code)
        ->first();

    if ($existingScan) {
        // Calculate new total quantity after the increment
        $newQuantity = $existingScan->quantity + $incrementQuantity;

        // Ensure the new quantity does not exceed the available quantity in barcode details
        if ($newQuantity > $barcodeDetail->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Total quantity exceeds available quantity in barcode details.',
            ], 400);
        }

        // Update the existing record with the new quantity
        $existingScan->quantity = $newQuantity;
        $existingScan->save();
        
        
      // Handle history record for the current user
    $packingHistory = History::where([
        'wo_no' => $woNo,
        'part_no' => $partNo,
        'line_no' => $lineNo,
        'operation_no' => $request->operation_code,
        'user_id' => Auth::user()->id,
    ])->first();

    if ($packingHistory) {
        $packingHistory->quantity += $incrementQuantity;
        $packingHistory->save();
    } else {
        History::create([
            'wo_no' => $woNo,
            'part_no' => $partNo,
            'po_no' => $poNo,
            'so_no' => $soNo,
            'line_no' => $lineNo,
            'operation_no' => $request->operation_code,
            'user_id' => Auth::user()->id,
            'quantity' => $incrementQuantity,
        ]);
    }

        
        
 

        
        
         return response()->json([
        'success' => 'Record Updated successfully!',
    ]);
    } else {
        // Create a new record in the ScanBarcode table
        ScanBarcode::create([
            'wo_no' => $woNo,
            'part_no' => $partNo,
            'po_no' => $poNo,
            'so_no' => $soNo,
            'line_no' => $lineNo,
            'operation_no' => $request->operation_code,
            'user_id' =>Auth::user()->id,
            'quantity' => $incrementQuantity, // Starting quantity for a new scan entry
        ]);
        
                History::create([
            'wo_no' => $woNo,
            'part_no' => $partNo,
            'po_no' => $poNo,
            'so_no' => $soNo,
            'line_no' => $lineNo,
            'operation_no' => $request->operation_code,
            'user_id' => Auth::user()->id,
            'quantity' => $incrementQuantity, // Log the increment quantity in the histories table
        ]);
        
         return response()->json([
        'success' => 'Record added successfully!'
    ]);
    }

 
}




public function storeManualEntry(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'wo_no' => 'required|string|max:255',
        'part_no' => 'required|string|max:255',
         'po_no' => 'required|string|max:255',
        'so_no' => 'required|string|max:255',
        'line_no' => 'required|string|max:255',
        'operation_no' => 'required|string|max:255',
    ]);

    // Get the corresponding barcode detail record
    $barcodeDetail = BarcodeDetail::where('wo_no', $request->wo_no)
        ->where('part_no', $request->part_no)
        ->where('line_no', $request->line_no)
        ->where('operation_code', $request->operation_no)
        ->first();

    // Check if barcode detail record exists
    if (!$barcodeDetail) {
        return response()->json(['success' => false, 'message' => 'Barcode detail not found.'], 404);
    }

    // Check if a scanned record with the same details already exists
    $existingScan = ScanBarcode::where([
        'wo_no' => $request->wo_no,
        'part_no' => $request->part_no,
        'so_no' => $request->so_no,
        'line_no' => $request->line_no,
        'operation_no' => $request->operation_no,
    ])->first();

    if ($existingScan) {
        // Update the quantity if the record already exists
        $newQuantity = $existingScan->quantity + $request->quantity;

        // Ensure that the total quantity does not exceed the available quantity in barcode details
        if ($newQuantity > $barcodeDetail->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Total quantity exceeds available quantity in barcode details.',
            ], 400);
        }

        $existingScan->quantity = $newQuantity;
        $existingScan->save();
        
      // Update or create a history record for the current user
    $userId = Auth::user()->id;
    $existingHistory = History::where([
        'wo_no' => $request->wo_no,
        'part_no' => $request->part_no,
        'so_no' => $request->so_no,
        'line_no' => $request->line_no,
        'operation_no' => $request->operation_no,
        'user_id' => $userId,
    ])->first();

    if ($existingHistory) {
        // Update quantity for the same user
        $existingHistory->quantity += $request->quantity;
        $existingHistory->save();
    } else {
        // Create a new history record for a different user
        History::create([
            'wo_no' => $request->wo_no,
            'part_no' => $request->part_no,
            'po_no' => $request->po_no,
            'so_no' => $request->so_no,
            'line_no' => $request->line_no,
            'operation_no' => $request->operation_no,
            'quantity' => $request->quantity,
            'user_id' => $userId,
        ]);
    }
        
    } else {
        // Create a new record in the database if it doesn't exist
        // Ensure that the total quantity does not exceed the available quantity in barcode details
        if ($request->quantity > $barcodeDetail->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Quantity exceeds available quantity in barcode details.',
            ], 400);
        }

        ScanBarcode::create([
            'wo_no' => $request->wo_no,
            'part_no' => $request->part_no,
            'po_no' => $request->po_no,
            'so_no' => $request->so_no,
            'line_no' => $request->line_no,
            'operation_no' => $request->operation_no,
            'quantity' => $request->quantity,
             'user_id' =>Auth::user()->id,
        ]);
        
                  History::create([
            'wo_no' => $request->wo_no,
            'part_no' => $request->part_no,
            'po_no' => $request->po_no,
            'so_no' => $request->so_no,
            'line_no' => $request->line_no,
            'operation_no' => $request->operation_no,
            'quantity' => $request->quantity,
             'user_id' =>Auth::user()->id,
        ]);
    }

    // Fetch all records to return as JSON
    $scannedRecords = ScanBarcode::all();

    return response()->json([
        'success' => 'Record added/updated successfully!',
        'records' => $scannedRecords,
    ]);
}


public function updateQuantity(Request $request)
{
    $request->validate([
        'record_id' => 'required|integer',
        'quantity' => 'required|integer|min:1',
    ]);

    $record = ScanBarcode::find($request->record_id);
$updatedQuntity = $request->quantity - $record->quantity;

    if (!$record) {
        return response()->json(['success' => false, 'message' => 'Record not found.'], 404);
    }

    $barcodeDetail = BarcodeDetail::where('wo_no', $record->wo_no)
        ->where('part_no', $record->part_no)
        ->where('line_no', $record->line_no)
        ->where('operation_code', $record->operation_no)
        ->first();

    if (!$barcodeDetail) {
        return response()->json(['success' => false, 'message' => 'Barcode detail not found.'], 404);
    }

    $existingScansCount = ScanBarcode::where('wo_no', $record->wo_no)
        ->where('part_no', $record->part_no)
        ->where('line_no', $record->line_no)
        ->where('operation_no', $record->operation_no)
        ->sum('quantity');

    $totalQuantityAfterUpdate = $existingScansCount - $record->quantity + $request->quantity;

    if ($totalQuantityAfterUpdate > $barcodeDetail->quantity) {
        return response()->json(['success' => false, 'message' => 'Updated quantity exceeds available quantity in barcode details.']);
    }

    $record->quantity = $request->quantity;
    $record->save();
    
    $history = History::where('wo_no', $record->wo_no)
        ->where('part_no', $record->part_no)
        ->where('line_no', $record->line_no)
        ->where('operation_no', $record->operation_no)
         ->where('user_id', Auth::user()->id)
        ->first();
        
          if ($history) {
            // If the same user updates, increment the quantity
            
            
            $history->quantity += $updatedQuntity;
            $history->save();
        }else{
              History::create([
            'wo_no' => $record->wo_no,
            'part_no' => $record->part_no,
            'po_no' => $record->po_no,
            'so_no' => $record->so_no,
            'line_no' => $record->line_no,
            'operation_no' => $record->operation_no,
            'quantity' => $updatedQuntity,
             'user_id' =>Auth::user()->id,
        ]);
        }
    

    return response()->json(['success' => true, 'message' => 'Quantity updated successfully.', 'new_quantity' => $record->quantity]);
}


}
