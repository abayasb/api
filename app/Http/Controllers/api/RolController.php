<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveRolResquest;
use App\Http\Requests\UpdateRolResquest;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rol = Rol::all();
        return response()->json($rol);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRolResquest $request)
    {
        $request->validated();
        $rol = new Rol();
        $rol->rol = e($request->input('rol'));
        if ($rol->save()) {
            return response()->json([
                'status' => 'OK',
                'message' =>'Registro guardado correctamente'
            ],201);
        }
        return response()->json(['message' => 'Error al guardar el registro'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
        //
        return response()->json([
            'status' =>'OK',
            'rol'=> $rol
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolResquest $request, Rol $rol)
    {
        //
        $rol->update($request->all());
        return response()->json(
            [
               'status'=>"OK",
               'message'=>"Registro se actualizo correctamente"
            ],200
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rol)
    {
        //
        $rol->delete();
        return response()->json(
            [
               'status'=>"OK",
               'rol'=>$rol,
               'message'=>"Registro se elimino correctamente"
            ],200);
    }
}
