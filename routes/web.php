<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\DotRecord;

Route::get('/', function () {

    if (request('search')) {
        $records = DotRecord::where('name', request('search'))->get();
    } else {
        $records = [];
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

Route::get('/stat', function() {

    $recordCount = DotRecord::count();

    $records = DotRecord::orderBy('created_at', 'desc')->paginate(5);

    /*
    $records->load('properties');
    foreach ($records as $record) {
        $record->properties()->get();
    }
    */

    return view('stat', [
        'recordCount' => $recordCount,
        'records' => $records
    ]);

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
