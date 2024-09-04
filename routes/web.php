<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\DotRecord;
use App\Http\Middleware\RoleMiddleware;

use App\Http\Controllers\RecordController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\ContactPageController;


Route::get('/', [App\Http\Controllers\FrontPageController::class, 'index'])->name('frontpage');

Route::get('/about', [AboutPageController::class, 'index'])->name('about.page.index');
Route::get('/contact', [ContactPageController::class, 'index'])->name('contact.page.index');


Route::get('/records', [RecordController::class, 'index'])->name('record.index');
Route::get('/records/{name}', [RecordController::class, 'single'])->name('record.single');

Route::post('/records/{name}/reviews/create', [RecordController::class, 'createReview'])
->name('record.review.create');

Route::get('/admin', function() {
    return 'Just admin can visit this page';
})->middleware('role:admin');


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
