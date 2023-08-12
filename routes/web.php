<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\GroupController;
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

Route::get('/', function () {
    return view('layouts.blank');
});

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
Route::get('buscar/clients', [ClientController::class, 'buscarAluno'])->name('clients.busca');
Route::get('buscar/parents', [ClientController::class, 'buscarReponsavel'])->name('responsavel.busca');
Route::post('salvar/clients', [ClientController::class, 'salvarAlunoBasico'])->name('clients.salvarAlunoBasico');

Route::resource('payment_terms', PaymentTermController::class);
Route::get('buscar/payment_terms', [PaymentTermController::class, 'buscar'])->name('payment_terms.busca');

Route::resource('payment_forms', PaymentFormController::class);
Route::get('buscar/payment_forms', [PaymentFormController::class, 'buscar'])->name('payment_forms.busca');


Route::resource('teachers', TeacherController::class);
Route::get('buscar/teachers', [TeacherController::class, 'buscar'])->name('teachers.busca');

Route::resource('categories', CategoryController::class);
Route::get('buscar/categories', [CategoryController::class, 'buscar'])->name('categories.busca');

Route::resource('modalities', ModalityController::class);
Route::get('buscar/modalities', [ModalityController::class, 'buscar'])->name('modalities.busca');

Route::resource('locals', LocalController::class);
Route::get('buscar/locals', [LocalController::class, 'buscar'])->name('locals.busca');

Route::resource('groups', GroupController::class);
Route::get('buscar/groups', [GroupController::class, 'buscar'])->name('groups.busca');

Route::resource('contracts', ContractController::class);

Route::resource('calendar', CalendarController::class)->only(['index','edit','store']);
Route::controller(CalendarController::class)->group(function () {
    Route::get('getevents','getEvents')->name('calendar.getevents');
    Route::put('update/events','updateEvents')->name('calendar.updateevents');
    Route::post('resize/events','resizeEvents')->name('calendar.resizeevents');
    Route::post('drop/events','dropEvents')->name('calendar.dropevents');
});


//log-viewer -> Rota para listar logs
//http://127.0.0.1:8000/telescope/

require __DIR__.'/auth.php';
