<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveCompraRequest;
use App\Http\Requests\UpdateCompraRequest;
use App\Models\Compra;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compra = Compra::all();
        $data = [
            'status'=>'OK',
            'message'=>'No se encontraron registro'
        ];
        if (count($compra)!=0) {
            $data['message']="Registros encontrados";
            $data['compra'] = $compra;
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
    public function store(SaveCompraRequest $request)
    {
        $request->validated();
        $compra = new Compra();
        $compra->codcompra = strtoupper($request->input('codcompra'));
        $compra->cantidad = $request->input('cantidad');
        $compra->valor = $request->input('valor');
        $compra->totalcompra = $request->input('totalcompra');
        $compra->id_proveedor = $request->input('id_proveedor');
        $compra->id_articulo = $request->input('id_articulo');
        $data =[
            'status'=>'OK',
            'message'=>'Error al guardar los datos'
        ];
        if ($compra->save()) {
            $data['message'] = "Registro guardado correctamente";
            $data['compra'] = $compra;
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
    public function show(Compra $compra)
    {
        return response()->json([
            'status'=>'OK',
            'message'=>"Registro encontrado",
            'compra'=>$compra
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompraRequest $request, Compra $compra)
    {
        $request->validated();
        $compra = Compra::find($compra->id);
        $compra->codcompra = strtoupper($request->input('codcompra'));
        $compra->cantidad = $request->input('cantidad');
        $compra->valor = $request->input('valor');
        $compra->totalcompra = $request->input('totalcompra');
        $compra->id_proveedor = $request->input('id_proveedor');
        $compra->id_articulo = $request->input('id_articulo');
        $data =[
            'status'=>'OK',
            'message'=>'Error al cargar los datos'
        ];
        if ($compra->save()) {
            $data['message'] = "El registro se actualizo correctamente";
            $data['compra'] = $compra;
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
    public function destroy(Compra $compra)
    {
        return response()->json([
            'status'=>'OK',
            'message'=>"El registro de elimino correctamente",
            'compra'=>$compra
        ]);
    }
}
