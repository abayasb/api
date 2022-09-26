<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data=[];
        $data['proveedor'] = Proveedor::all();
        $data['users'] = User::all()->count();
        $data['administrador']= DB::table('users')->where('id_rol','=',3)->get()->count();
        $data['gerente']= DB::table('users')->where('id_rol','=',1)->get()->count();
        $data['compra'] = DB::table('compras')->select(DB::raw('SUM(totalcompra) as total_compra'))->get() ;
        $data['venta'] = DB::table('ventas')->select(DB::raw('SUM(totalventa) as total_venta'))->get();
        //return $data['compra'];
        return view('home',compact('data'));
    }

    public function tipo(){ return view('layouts.templates.tipo'); }

    public function marca(){ return view('layouts.templates.marca'); }
}
