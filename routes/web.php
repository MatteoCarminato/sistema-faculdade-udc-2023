<?php

use App\Http\Controllers\PaymentTermController;
use App\Http\Controllers\PaymentFormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('countries', CountryController::class);
Route::get('buscar/countries', [CountryController::class, 'buscar'])->name('countries.busca');

Route::resource('states', StateController::class);

Route::resource('payment_terms', PaymentTermController::class);

Route::resource('payment_forms', PaymentFormController::class);
Route::get('buscar/payment_forms', [PaymentFormController::class, 'buscar'])->name('payment_forms.busca');

//log-viewer -> Rota para listar logs


require __DIR__.'/auth.php';

