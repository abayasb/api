@extends('layouts.master')

@section('title','Tipo')


@section('content')
<!-- pageContent -->
<section class="full-width pageContent">

    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <div class="mdl-tabs__tab-bar">
            <a href="#tabNewCategory" class="mdl-tabs__tab is-active">NUEVO</a>
            <a href="#tabListCategory" class="mdl-tabs__tab">LISTA</a>
        </div>
        <div class="mdl-tabs__panel is-active" id="tabNewCategory">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width panel-tittle bg-primary text-center tittles">
                            Nueva Categoria
                        </div>
                        <div class="full-width panel-content">
                            <form action="{{url('api/tipo')}}" method="POST">
                                <h5 class="text-condensedLight">Datos de la Categoria </h5>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="id_codtipo" name="codtipo">
                                    <label class="mdl-textfield__label" for="id_codtipo">Código de la Categoria</label>
                                    <span class="mdl-textfield__error">Código inválido</span>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="id_detalle" name="detalle">
                                    <label class="mdl-textfield__label" for="id_detalle">Descrición</label>
                                    <span class="mdl-textfield__error">Descripción inválida</span>
                                </div>
                                <p class="text-center">
                                    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addCategory">
                                        <i class="zmdi zmdi-plus"></i>
                                    </button>
                                <div class="mdl-tooltip" for="btn-addCategory">Añadir Tipo</div>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mdl-tabs__panel" id="tabListCategory">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width panel-tittle bg-success text-center tittles">
                            Lista de Categorias
                        </div>
                        <div class="full-width panel-content">
                            <form action="#">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                                    <label class="mdl-button mdl-js-button mdl-button--icon" for="searchCategory">
                                        <i class="zmdi zmdi-search"></i>
                                    </label>
                                    <div class="mdl-textfield__expandable-holder">
                                        <input class="mdl-textfield__input" type="text" id="searchCategory">
                                        <label class="mdl-textfield__label"></label>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="mdl-list">
                            @foreach($tipos as $tipo)
                            <tr>
                                <div class="mdl-list__item mdl-list__item--two-line">
                                    <span class="mdl-list__item-primary-content">
                                        <i class="zmdi zmdi-label mdl-list__item-avatar"></i>
                                        <td>{{$tipo->codtipo}}</td>
                                        <span class="mdl-list__item-sub-title">
                                            <td>ss</td>
                                        </span>
                                    </span>
                                    <a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
                                </div>
                            </tr>
                            <li class="full-width divider-menu-h"></li>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@stop