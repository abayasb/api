<?php

use App\Http\Controllers\api\ArticuloController;
use App\Http\Controllers\api\MarcaController;
use App\Http\Controllers\api\PersonaController;
use App\Http\Controllers\api\ProveedorController;
use App\Http\Controllers\api\RolController;
use App\Http\Controllers\api\TipoController;
use App\Http\Controllers\api\CompraController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\VentaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function(){
    Route::get('/persona',[PersonaController::class,'index'])->name('listPersona');
    Route::post('/persona',[PersonaController::class,'store'])->name('addPersona');
    Route::get('/persona/{persona}',[PersonaController::class,'show'])->name('viewPersona');
    Route::put('/persona/{persona}',[PersonaController::class,'update'])->name('updatePersona');
    Route::delete('/persona/{persona}',[PersonaController::class,'destroy'])->name('deletePersona');
    
    Route::get('/usuario',[UserController::class, 'index']);
    Route::post('/usuario',[UserController::class,'store'])->name('addUsers');
    Route::get('/usuario/{usuario}',[UserController::class,'show'])->name('viewUsers');
    Route::put('/usuario/{usuario}',[UserController::class,'update'])->name('updateUsers');
    Route::delete('/usuario/{usuario}',[UserController::class,'destroy'])->name('deleteUsers');

    Route::get('/rol',[RolController::class,'index'])->name('listRol');
    Route::post('/rol',[RolController::class,'store'])->name('addRol');
    Route::get('/rol/{rol}',[RolController::class,'show'])->name('viewRol');
    Route::put('/rol/{rol}',[RolController::class,'update'])->name('updateRol');
    Route::delete('/rol/{rol}',[RolController::class,'destroy'])->name('deleteRol');
    
    Route::get('/tipo',[TipoController::class,'index'])->name('listTipo');
    Route::post('/tipo',[TipoController::class,'store'])->name('addTipo');
    Route::get('/tipo/{tipo}',[TipoController::class,'show'])->name('viewTipo');
    Route::put('/tipo/{tipo}',[TipoController::class,'update'])->name('updateTipo');
    Route::delete('/tipo/{tipo}',[TipoController::class,'destroy'])->name('deleteTipo');
    
    Route::get('/marca',[MarcaController::class,'index'])->name('listMarca');
    Route::post('/marca',[MarcaController::class,'store'])->name('addMarca');
    Route::get('/marca/{marca}',[MarcaController::class,'show'])->name('viewMarca');
    Route::put('/marca/{marca}',[MarcaController::class,'update'])->name('updateMarca');
    Route::delete('/marca/{marca}',[MarcaController::class,'destroy'])->name('deleteMarca');
    
    Route::get('/proveedor',[ProveedorController::class,'index'])->name('listProveedor');
    Route::post('/proveedor',[ProveedorController::class,'store'])->name('addProveedor');
    Route::get('/proveedor/{proveedor}',[ProveedorController::class,'show'])->name('viewProveedor');
    Route::put('/proveedor/{proveedor}',[ProveedorController::class,'update'])->name('updateProveedor');
    Route::delete('/proveedor/{proveedor}',[ProveedorController::class,'destroy'])->name('deleteProveedor');
    
    Route::get('/articulo',[ArticuloController::class,'relationTipo'])->name('listRArticulo');
    Route::get('/articulo',[ArticuloController::class,'index'])->name('listArticulo');
    Route::post('/articulo', [ArticuloController::class,'store'])->name('addArticulo');
    Route::get('/articulo/{articulo}',[ArticuloController::class,'show'])->name('viewArticulo');
    Route::put('/articulo/{articulo}',[ArticuloController::class,'update'])->name('updateArticulo');
    Route::delete('/articulo/{articulo}',[ArticuloController::class,'destroy'])->name('deleteArticulo');
    
    Route::get('/compra',[CompraController::class,'index'])->name('listCompra');
    Route::post('/compra', [CompraController::class,'store'])->name('addCompra');
    Route::get('/compra/{compra}',[CompraController::class,'show'])->name('viewCompra');
    Route::put('/compra/{compra}',[CompraController::class,'update'])->name('updateCompra');
    Route::delete('/compra/{compra}',[CompraController::class,'destroy'])->name('deleteCompra');
    
    Route::get('/venta',[VentaController::class,'index'])->name('listVenta');
    Route::post('/venta', [VentaController::class,'store'])->name('addVenta');
    Route::get('/venta/{venta}',[VentaController::class,'show'])->name('viewVenta');
    Route::put('/venta/{venta}',[VentaController::class,'update'])->name('updateVenta');
    Route::delete('/venta/{venta}',[VentaController::class,'destroy'])->name('deleteVenta');
});
