<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProveedorRespuest;
use App\Http\Requests\UpdateProveedorRespuest;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $proveedor = Proveedor::all();
        $data = ['status'=>'OK'];
        if (count($proveedor)!=0) {
            $data['message']='Datos en el registro encontrado';
            $data['proveedor'] = $proveedor;
            return response()->json($data,200);
        }
        $data['message']="No se encontro ningun dato en el registro";
        return response()->json($data,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProveedorRespuest $request)
    {
        //
        $request->validated();
        $proveedor = new Proveedor();
        $proveedor->codproveedor = strtoupper($request->input('codproveedor'));
        $proveedor->nombre_ape = strtoupper($request->input('nombre_ape'));
        $proveedor->direccion = strtoupper($request->input('direccion'));
        $proveedor->email=e($request->input('email'));
        $proveedor->telefono = e($request->input('telefono'));
        $data=[
            'status'=>'OK',
            'message'=>'El registro de proveedor se guardo correctamente'
        ];
        if ($proveedor->save()) {
            $data['proveedor'] =$proveedor;
            return response()->json($data, 200);
        }
        $data['message'] = "Hubo un error al guardar el registro";
        return response()->json($data, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
        $data = [
            'status' =>'OK',
            'message'=>'Registro encontrado',
            'proveedor'=>$proveedor
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
    public function update(UpdateProveedorRespuest $request, Proveedor $proveedor)
    {
        $request->validated();
        $proveedor = Proveedor::find($proveedor->id);
        $proveedor->codproveedor = strtoupper($request->input('codproveedor'));
        $proveedor->nombre_ape = strtoupper($request->input('nombre_ape'));
        $proveedor->direccion = strtoupper($request->input('direccion'));
        $proveedor->email=e($request->input('email'));
        $proveedor->telefono = e($request->input('telefono'));
        $data=[
            'status'=>'OK',
            'message'=>'El registro de proveedor se actualizo correctamente'
        ];
        if ($proveedor->save()) {
            $data['proveedor'] = $proveedor;
            return response()->json($data, 200);
        }
        $data['message']="Error al actualizar el proveedor";
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return response()->json([
            'status' =>'OK',
            'message'=>'Proveedor eliminado'
        ],200);
    }
}
