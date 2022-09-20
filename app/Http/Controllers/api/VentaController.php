<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveVentaRequest;
use App\Http\Requests\UpdateVentaRequest;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venta = Venta::all();
        $data = [
            'status'=>'OK',
            'message'=>'Error no se ha encontrado registro'
        ];
        if (count($venta)!=0) {
            $data['message'] = "Registros encontrados";
            $data['venta'] = $venta;
            return response()->json($data, 200);
        }
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveVentaRequest $request)
    {
        $request->validated();
        $venta = new Venta();
        $venta->codventa = strtoupper($request->input('codventa'));
        $venta->cantidad = $request->input('cantidad');
        $venta->valor = $request->input('valor');
        $venta->totalventa = $request->input('totalventa');
        $venta->id_articulo = $request->input('id_articulo');
        $venta->id_users = $request->input('id_users');
        $data =[
            'status'=>'OK',
            'message'=>'Error al guardar los datos'
        ];
        if ($venta->save()) {
            $data['message'] = "Registro guardado correctamente";
            $data['venta'] = $venta;
            return response()->json($data, 200);
        }
        return response()->json($data,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
        return response()->json([
            'status'=>'OK',
            'message'=>"Registro encontrado",
            'venta'=>$venta
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVentaRequest $request, Venta $venta)
    {
        //
        $request->validated();
        $venta = Venta::find($venta->id);
        $venta->codventa = strtoupper($request->input('codventa'));
        $venta->cantidad = $request->input('cantidad');
        $venta->valor = $request->input('valor');
        $venta->totalventa = $request->input('totalventa');
        $venta->id_articulo = $request->input('id_articulo');
        $venta->id_users = $request->input('id_users');
        $data =[
            'status'=>'OK',
            'message'=>'Error al guardar los datos'
        ];
        if ($venta->save()) {
            $data['message'] = "El Registro se actualizo correctamente";
            $data['venta'] = $venta;
            return response()->json($data, 200);
        }
        return response()->json($data,200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
        $venta->delete();
        return response()->json([
            'status'=>'OK',
            'message'=>"Registro eliminado",
            'venta' => $venta
        ]);
    }
}
