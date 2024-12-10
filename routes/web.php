<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\PackingSlipController;
use App\Http\Middleware\RouteUnderMaintenance;
use App\Http\Controllers\LoginController;

Route::post('/import-barcode', [BarcodeController::class, 'import'])->name('barcode.import')->middleware(['auth', RouteUnderMaintenance::class]);

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', RouteUnderMaintenance::class]);



Route::get('/import-csv', [BarcodeController::class, 'index'])->name('barcode.reports')->middleware(['auth', RouteUnderMaintenance::class]);

Route::get('/admin-report-view', [BarcodeController::class, 'indexView'])->name('admin.reportsview')->middleware(['auth', RouteUnderMaintenance::class]);
Route::get('/barcode-details/{wo_no}', [BarcodeController::class, 'barcodeDetails'])->name('barcode.details')->middleware(['auth', RouteUnderMaintenance::class]);
Route::delete('/barcode/delete-selected', [BarcodeController::class, 'deleteSelected'])->name('barcode.deleteSelected');
Route::get('/scan-quantity', [BarcodeController::class, 'getScannedQuantity'])->name('scan-quantity');

Route::get('/export-scanned-records', [BarcodeController::class, 'exportScannedRecords'])->name('export.scannedRecords'); 
Route::get('/export-packing-records', [BarcodeController::class, 'exportPackingRecords'])->name('export.packingRecords'); 
Route::get('/export-to-pdf', [BarcodeController::class, 'exportToPDF'])->name('export.toPDF');
Route::get('/export-production-pdf', [BarcodeController::class, 'exportProductionPDF'])->name('export.productionPDF');
Route::get('/export-to-excel', [BarcodeController::class, 'exportToExcel'])->name('export.toExcel');
Route::get('/export-to-production', [BarcodeController::class, 'exportToExcelProduction'])->name('export.production.Excel');


Route::get('/get-operation-codes', [ProductionController::class, 'getOperationCodes'])->name('get.operation.codes')->middleware(['auth', RouteUnderMaintenance::class]);
Route::get('/packing-slip', [ProductionController::class, 'packingIndex'])->name('packing.slip')->middleware(['auth', RouteUnderMaintenance::class]);
Route::get('/packing-slip-index', [ProductionController::class, 'packingFileIndex'])->name('packing.slip.index')->middleware(['auth', RouteUnderMaintenance::class]);
// Display production process page (GET request)
Route::get('/production-process', [ProductionController::class, 'index'])->name('production.process')->middleware(['auth', RouteUnderMaintenance::class]);
Route::get('/production-process-index', [ProductionController::class, 'productionIndex'])->name('production.index')->middleware(['auth', RouteUnderMaintenance::class]);
// Store barcode data (POST request)
Route::post('/scan-barcodes/store', [ProductionController::class, 'store'])->name('scan.barcodes.store');

Route::post('/packing-slip', [PackingSlipController::class, 'store'])->name('packing.slip.store');
Route::post('/scan-packing', [PackingSlipController::class, 'scanPackingSlip'])->name('scan.packingSlip');
Route::put('/quantity-update/{id}', [PackingSlipController::class, 'updateQuantity'])->name('quantity.update');


// In routes/web.php or routes/api.php

Route::post('/manual-entry', [ProductionController::class, 'storeManualEntry'])->name('manual.entry.store');
Route::post('/update-quantity', [ProductionController::class, 'updateQuantity'])->name('update.quantity');



Route::post('/fetch-and-save', [BarcodeController::class, 'fetchAndSaveData'])->name('fetch.and.save')->middleware(['auth', RouteUnderMaintenance::class]);


Route::delete('/barcode/{id}', [BarcodeController::class, 'destroy'])->name('barcode.destroy');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware(['auth', RouteUnderMaintenance::class]);


Route::get('/view-users', [LoginController::class, 'showUsers'])->name('show.users')->middleware(['auth', RouteUnderMaintenance::class]);


Route::get('/backup', [LoginController::class, 'downloadBackup'])->name('backup.store');


Route::get('/add-users', [LoginController::class, 'addUsers'])->name('add.users')->middleware(['auth', RouteUnderMaintenance::class]);
Route::post('/store-users', [LoginController::class, 'store'])->name('users.store')->middleware(['auth', RouteUnderMaintenance::class]);
Route::delete('/users/{id}', [LoginController::class, 'destroy'])->name('users.destroy')->middleware(['auth', RouteUnderMaintenance::class]);

