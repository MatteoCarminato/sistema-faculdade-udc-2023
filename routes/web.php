<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\ModalityController;
use App\Http\Controllers\PaymentFormController;
use App\Http\Controllers\PaymentTermController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\TeacherController;
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
Route::get('buscar/states', [StateController::class, 'buscar'])->name('states.busca');

Route::resource('cities', CityController::class);
Route::get('buscar/cities', [CityController::class, 'buscar'])->name('cities.busca');


Route::resource('clients', ClientController::class);
Route::get('/parents', [ClientController::class, 'indexParent'])->name('parents.index');
Route::delete('/parents/{client}', [ClientController::class, 'destroy'])->name('parents.destroy');

Route::resource('payment_terms', PaymentTermController::class);

Route::resource('payment_forms', PaymentFormController::class);
Route::get('buscar/payment_forms', [PaymentFormController::class, 'buscar'])->name('payment_forms.busca');


Route::resource('teachers', TeacherController::class);

Route::resource('categories', CategoryController::class);
Route::resource('modalities', ModalityController::class);
Route::resource('locals', LocalController::class);

//log-viewer -> Rota para listar logs
//http://127.0.0.1:8000/telescope/

require __DIR__.'/auth.php';
