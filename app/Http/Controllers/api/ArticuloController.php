<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveArticuloRequest;
use App\Http\Requests\UpdateArticuloRequest;
use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articulo= Articulo::all();
        return $articulo;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveArticuloRequest $request)
    {
        $request->validated();
        $articulo= new Articulo();
        $articulo->codarticulo = strtoupper(e($request->input('codarticulo')));
        $articulo->detalle = strtoupper(e($request->input('detalle')));
        $articulo->stock = $request->input('stock');
        $articulo->valorcompra =$request->input('valorcompra');
        $articulo->valorventa=$request->input('valorventa');
        $articulo->id_tipo=$request->input('id_tipo');
        $articulo->id_marca=$request->input('id_marca');
        if ($articulo->save()) {
            return response()->json([
                'status'=>'OK',
                'message'=>'Articulo registrado correctamente',
                'articulo'=>$articulo
            ]);
        }
        return response()->json([
            'status'=>'Error',
            'message'=>'Hubo un error al registrar el articulo',
        ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        //
        $data = [
            'status' =>'OK',
            'message'=>'Registro encontrado',
            'articulo'=> $articulo
        ];

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticuloRequest $request, Articulo $articulo)
    {
        $request->validated();
        $articulo = Articulo::find($articulo->id);
        $articulo->codarticulo = strtoupper(e($request->input('codarticulo')));
        $articulo->detalle = strtoupper(e($request->input('detalle')));
        $articulo->stock = $request->input('stock');
        $articulo->valorcompra =$request->input('valorcompra');
        $articulo->valorventa=$request->input('valorventa');
        $articulo->id_tipo=$request->input('id_tipo');
        $articulo->id_marca=$request->input('id_marca');
        if ($articulo->save()) {
            $data = [
                'status'=>'OK',
                'message'=>'Articulo actualizado correctamente',
                'articulo'=>$articulo
            ];
            return response()->json($data, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        //
        $data = [
            'status'=>'Error',
            'message'=>'Hubo un error al eliminar el registro'
        ];

        if ($articulo->delete()) {
            $data = [
                'status'=>'OK',
                'message'=>'El articulo fue eliminado exitosamente'
            ];
            return response()->json($data, 200);
        }
        return response()->json($data);
    }
}
