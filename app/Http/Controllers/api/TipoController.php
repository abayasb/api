<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveTipoRequest;
use App\Http\Requests\UpdateTipoRequest;
use App\Models\Models\Rol;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipo = Tipo::all();
        return response()->json([
            'status'=>'OK',
            'message'=> "Registro creado correctamente",
            'tipo'=> $tipo
        ],200);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveTipoRequest $request)
    {
        
            $request->validated();
            $tipos = new Tipo();
            $tipos->codtipo = strtoupper(e($request->input('codtipo')));
            $tipos->detalle = strtoupper(e($request->input('detalle')));
            $tipos->save();
            if ($tipos->save()) {
                return response()->json([
                    'status'=>'OK',
                    'message'=>'Registro creado correctamente',
                    'tipo' => $tipos
                ]);
            }
            return response()->json([
                'status' => 'Error',
                'message' => "No se pudo guardar el registro"
            ]);
        
        
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo $tipo)
    {
        return response()->json([
            'status' =>'OK',
            'tipo'=> $tipo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoRequest $request, Tipo $tipo)
    {
        //
        $tipo->update($request->all());
        return response()->json([
            'status' => 'OK',
            'message' =>'El registro se actualizo correctamente',
            'tipo'=> $tipo
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo $tipo)
    {
        $tipo->delete();
        return response()->json(
            [
               'status'=>"OK",
               'rol'=>$tipo,
               'message'=>"Registro se elimino correctamente"
            ],200);
    }
}
