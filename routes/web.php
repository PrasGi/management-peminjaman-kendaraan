<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApproverController;
use App\Http\Controllers\ExportSubmitedController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\SubmitedController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::post('/login', [loginController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/logout', [loginController::class, 'logout']);

    Route::get('/home-admin', [AdminController::class, 'index'])->name('home-admin')->middleware('admin');
    Route::post('/submit', [SubmitedController::class, 'store'])->middleware('admin');

    Route::get('/home-approver', [ApproverController::class, 'index'])->name('home-approver')->middleware('approver');
    Route::get('/approver-edit-page/{submited}', [ApproverController::class, 'show'])->name('approver-edit-page')->middleware('approver');
    Route::put('/approver-edit/{submited}', [SubmitedController::class, 'update'])->name('approver-edit')->middleware('approver');
    Route::delete('/approver-delete/{submited}', [SubmitedController::class, 'destroy'])->name('approver-delete')->middleware('approver');

    Route::get('/export', [ExportSubmitedController::class, 'export'])->middleware('approver');
});
