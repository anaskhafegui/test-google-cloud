<?php

use App\Http\Controllers\Admin\CustomerRequestController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceClassController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceTypeController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\Models\ServiceType;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/', [GuestController::class, 'index'])->name('index');
Route::get('/umokkur', [GuestController::class, 'contact'])->name('contact');
Route::get('/skilmalar', [GuestController::class, 'termsOfService'])->name('termsOfService');
Route::get('/mottuhreinsun', [GuestController::class, 'carpetCleaning'])->name('carpetCleaning');
Route::get('/teppahreinsun', [GuestController::class, 'teppahreinsun'])->name('teppahreinsun');
Route::get('/djuphreinsun', [GuestController::class, 'deepCleaning'])->name('deepCleaning');
Route::get('/leiga', [GuestController::class, 'machineRental'])->name('machineRental');
Route::get('/leiga/{id}', [GuestController::class, 'singleMachine'])->name('singleMachine');
Route::get('/bookService', [GuestController::class, 'bookService'])->name('bookService');
Route::post('/bookService/calender', [GuestController::class, 'selectCalender'])->name('bookService.selectCalender');
Route::post('/bookService/userInformation', [GuestController::class, 'userInformation'])->name('bookService.userInformation');
Route::any('/bookService/complete', [GuestController::class, 'complete'])->name('bookService.complete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/products', ProductController::class);
    Route::resource('/serviceTypes', ServiceTypeController::class);
    Route::resource('/services', ServiceController::class);
    Route::resource('/serviceClasses', ServiceClassController::class);
    Route::resource('/customerRequests', CustomerRequestController::class);

    Route::any('/customerRequests/markReturned/{id}', [CustomerRequestController::class, 'markReturned'])->name('customerRequests.markReturned');
});

require __DIR__.'/auth.php';
