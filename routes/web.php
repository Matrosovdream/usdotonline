<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\DotRecord;
use Illuminate\Http\Request;

Route::get('/', function () {

    if (request('search')) {
        $records = DotRecord::where('name', 'like', '%' . request('search') . '%')->paginate(5);
    } else {
        $records = [];
    }

    foreach( $records as $record ) {
        $record->properties = $record->properties()->get()->pluck('property_value', 'property_name');
    }

    return view('welcome', [
        'records' => $records
    ]);
});

/*
Route::post('/', function() {

    $records = DotRecord::where('name', request('search'))->first();

    return view('welcome', [
        'records' => $records
    ]);

})->name('search');
*/

Route::get('/records', function() {

    $recordCount = DotRecord::whereNotNull('created_at')->count();

    $records = DotRecord::whereNotNull('created_at')
                ->orderBy('created_at', 'desc')
                ->paginate(5);

    /*
    $records->load('properties');
    foreach ($records as $record) {
        $record->properties()->get();
    }
    */

    return view('records', [
        'recordCount' => $recordCount,
        'records' => $records
    ]);

})->name('records');

Route::get('/records/{name}', function($name) {

    $record = DotRecord::where('name', $name)->first();

    $record->properties = $record->properties()->get()->pluck('property_value', 'property_name');



    if( isset($_GET['debug']) ) {

        dd($record->properties);
    }

    return view('record', [
        'record' => $record,
    ]);

})->name('record');


Route::get('/load', function() {
    Artisan::call('api:parse-records', [
        'totalRecords' => 5,
        'chunkSize' => 5
    ]);

    return 'Command executed successfully.';
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
