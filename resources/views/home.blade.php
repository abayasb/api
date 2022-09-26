@extends('layouts.master')

@section('content')
<section class="full-width pageContent">
        <section class="full-width text-center" style="padding: 40px 0;">
            <h3 class="text-center tittles">OPCIONES</h3>
            <!-- Tiles -->
            <article class="full-width tile">
                <div class="tile-text">
                    <span class="text-condensedLight">
                        {{$data['administrador']}}<br>
                        <small>Administradores</small>
                    </span>
                </div>
                <i class="zmdi zmdi-account tile-icon"></i>
            </article>
            <article class="full-width tile">
                <div class="tile-text">
                    <span class="text-condensedLight">
                    {{$data['gerente']}}<br>
                        <small>Gerentes</small>
                    </span>
                </div>
                <i class="zmdi zmdi-accounts tile-icon"></i>
            </article>
            <article class="full-width tile">
                <div class="tile-text">
                    <span class="text-condensedLight">
                    {{$data['users']}}<br>
                        <small>Empleados</small>
                    </span>
                </div>
                <i class="zmdi zmdi-accounts tile-icon"></i>
            </article>
            <article class="full-width tile">
                <div class="tile-text">
                    <span class="text-condensedLight">
                    @foreach($data['compra'] as $price)
                        ${{$price->total_compra}}
                    @endforeach   
                    <br>
                        <small>Compras</small>
                    </span>
                </div>
                <i class="zmdi zmdi-label tile-icon"></i>
            </article>
            <article class="full-width tile">
                <div class="tile-text">
                    <span class="text-condensedLight">
                    @foreach($data['venta'] as $price)
                        ${{$price->total_venta}}
                    @endforeach   
                    <br>
                        <small>Ventas</small>
                    </span>
                </div>
                <i class="zmdi zmdi-washing-machine tile-icon"></i>
            </article>
            <article class="full-width tile">
                <div class="tile-text">
                    <span class="text-condensedLight">
                    {{count($data['proveedor'])}}<br>
                        <small>Proveedores</small>
                    </span>
                </div>
                <i class="zmdi zmdi-accounts tile-icon"></i>
            </article>
        </section>
    </section>
@endsection
