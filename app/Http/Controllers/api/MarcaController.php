<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveMarcaRequest;
use App\Http\Requests\SaveTipoRequest;
use App\Http\Requests\UpdateMarcaRequest;
use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marca = Marca::all();
        
        return response($marca);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveMarcaRequest $request)
    {
        //
        $request->validated();
        $marca = new Marca();
        $marca->codmarca = strtoupper(e($request->input('codmarca')));
        $marca->detalle = strtoupper(e($request->input('detalle')));
        if ($marca->save()) {
            return response()->json([
                'status'=>'OK',
                'marca' => $marca
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        return response()->json([
            'status' =>'OK',
            'marca'=> $marca
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMarcaRequest $request,Marca $marca)
    {
        $marca->update($request->all());
        return response()->json([
            'status' =>"OK",
            'message'=>"El registro de ha actualizado correcmante"
        ],200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        //
        $marca->delete();
        return response()->json([
            'status' =>'OK',
            'message' =>'El registro de ha eliminado'
        ]);
    }
}
