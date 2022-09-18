<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuardarPersonaResquest;
use App\Http\Requests\UpdatePersonaResquest;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $persona = Persona::all();
        return response()->json($persona);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarPersonaResquest $request)
    {

        $request->validated();
        $persona = new Persona();
        $persona->cedula = $request->cedula;
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->edad = $request->edad;
        $persona->sexo = $request->sexo;
        $persona->email = $request->email;
        $persona->telefono = $request->telefono;
        $resultado = $persona->save();
        if ($resultado) {
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
    public function show(Persona $persona)
    {
        return response()->json([
            'status' =>'OK',
            'persona'=> $persona
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonaResquest $request, Persona $persona)
    {
        $persona->update($request->all());
        return response()->json(
            [
               'status'=>"OK",
               'message'=>"Registro se actualizo correctamente"
            ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
        $persona->delete();
        return response()->json(
            [
               'status'=>"OK",
               'message'=>"Registro se elimino correctamente"
            ],200);
    }
}
