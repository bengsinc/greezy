<?php

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
    return view('welcome');
});

//Route::get('/login', function () {
//    return redirect(route('filament.admin.auth.login'));
//})->name('login');

Route::get('/pagina/{id}', \App\Livewire\Landinpages\Landinpage::class)->name('site.landinpage');
Route::get('/pedido/{pedido}', \App\Livewire\Pedidos::class)->name('site.pedido');

Route::get('/obrigado', function () {
    return view('obrigado');
})->name('obrigado');

Route::get('/{user}/formularios', \App\Livewire\Cliente::class)->name('site.formularios');
