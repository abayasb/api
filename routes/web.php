<?php
use App\Http\Controllers\Auth\LoginController;
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
Route::get('/tipo', function () {
    return Http::get('http://127.0.0.1:8080/api/v1/marca')['codmarca'];
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'tipo'])->name('home');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::post('/register', [RegisterController::class, 'create'])->name('register');

Route::get('/marca', function() {
    //$client = new GuzzleHttp\Client(['base_uri' => 'https://my-json-server.typicode.com/typicode/demo/posts', 'timeout'  => 2.0]);
    $client = Http::get('https://my-json-server.typicode.com/typicode/demo/posts');
    dd($client);
});

