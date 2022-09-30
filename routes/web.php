<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use  GuzzleHttp\Exception\ClientException ;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Psr7 ; 
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Http;
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
    return view('welcome');
});

Auth::routes();

Route::prefix('venta')->group(function(){
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::post('/register', [RegisterController::class, 'create'])->name('register');
Route::get('/logout',[LogoutController::class,'logout'])->name('logout');
Route::get('/tipo',[HomeController::class,'tipo'])->name('viewTipo');
Route::get('/marca',[HomeController::class,'marca'])->name('viewMarca');
Route::get('/proveedor',[HomeController::class,'proveedor'])->name('viewProveedor');
Route::get('/articulo',[HomeController::class,'articulo'])->name('viewArticulo');
Route::get('/compra',[HomeController::class,'compra'])->name('viewCompra');
});