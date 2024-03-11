<?php

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\CustomersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| ruta               Controlador::instancia al metodo o funcion pasa nombre y dir de la vista
| tipo de peticion GET|POST|DELETE|PATCH
| metodo: index|create|store|show|edit|update|destroy
| Route::tipo de peticion('ruta',[ControladorController::class,'metodo'])->name('directorio.vista')
| puedes pasarle vista a todos exepto a delete
*/

Route::view('/', 'home');
//Route::view('contact-us','contact');
Route::get('contact', [ContactFormController::class,'create'])->name('contact.create');
Route::post('contact', [ContactFormController::class,'store'])->name('contact.store');

Route::view('about','about');
// Route::get('customers', function(){
//     $customers = [
//         'John Doe',
//         'Jane Doe',
//         'Bob the builder'
//     ];

//     return view('internals.customers',[
//         'customers' =>$customers
//     ]);
// });
// Route::get('customers', [CustomersController::class,'index'])->name('customers.index');
// 
// Route::post('customers', [CustomersController::class,'store'])->name('customers.store');
// Route::get('customers/{customer}', [CustomersController::class,'show'])->name('customers.show');
// Route::get('customers/{customer}/edit', [CustomersController::class,'edit'])->name('customers.edit');
// Route::patch('customers/{customer}', [CustomersController::class,'update'])->name('customers.update');
// Route::delete('/customers/{customer}',[CustomersController::class,'destroy']);

Route::resource('customers', CustomersController::class);
Route::get('customers/create', [CustomersController::class,'create'])->name('customers.create');