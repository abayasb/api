<template>
    <section class="full-width pageContent">

        <div class="full-width divider-menu-h"></div>
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
            <div class="mdl-tabs__tab-bar">
                <a href="#tabNewKardex" class="mdl-tabs__tab is-active">NUEVO</a>
                <a href="#tabListKardex" class="mdl-tabs__tab">LISTA</a>
            </div>

            <div class="mdl-tabs__panel is-active" id="tabNewKardex">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                        <div class="full-width panel mdl-shadow--2dp">
                            <div class="full-width panel-tittle bg-primary text-center tittles">
                                NUEVA COMPRA
                            </div>
                            <div class="full-width panel-content">
                                <form>
                                    <div class="mdl-grid">
                                        <div
                                            class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
                                            <h5 class="text-condensedLight">Datos a ingresar</h5>

                                            <div class="mdl-textfield mdl-js-textfield">
                                                <select class="mdl-textfield__input">
                                                    <option value="" disabled selected>Seleccionar Articulo
                                                    </option>
                                                    <option value="">Articulo 1</option>
                                                    <option value="">Articulo 2</option>
                                                </select>
                                            </div>

                                            <div class="mdl-textfield mdl-js-textfield">
                                                <select class="mdl-textfield__input">
                                                    <option value="" disabled selected>Seleccionar Proveedor
                                                    </option>
                                                    <option value="">Proveedor 1</option>
                                                    <option value="">Proveedor 2</option>
                                                </select>
                                            </div>

                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text" id="CodCompra">
                                                <label class="mdl-textfield__label" for="CodCompra">Codigo de
                                                    compra</label>
                                                <span class="mdl-textfield__error">Codigo inválido</span>
                                            </div>

                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="number"
                                                    pattern="-?[0-9]*(\.[0-9]+)?" id="CantidadCompra">
                                                <label class="mdl-textfield__label"
                                                    for="CantidadCompra">Cantidad</label>
                                                <span class="mdl-textfield__error">Cantidad inválido</span>
                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="number"
                                                    pattern="-?[0-9]*(\.[0-9]+)?" id="ValorCompra">
                                                <label class="mdl-textfield__label" for="ValorCompra">Valor</label>
                                                <span class="mdl-textfield__error">Valor inválido</span>
                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <label class="mdl-textfield__label" for="ValorCompra">Fecha de la
                                                    venta</label>

                                                <input type="date" id="start" name="trip-start" value="2018-07-22"
                                                    min="2018-01-01" max="2040-12-31">

                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                                                <label class="mdl-textfield__label" for="NameProduct">Fecha de carga
                                                </label>

                                            </div>

                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                                                <br><label class="mdl-textfield__label" for="NameProduct">Total
                                                    Compra</label>

                                            </div>

                                        </div>
                                    </div>
                                    <p class="text-center">
                                        <button
                                            class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary"
                                            id="btn-addProduct">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button>
                                    <div class="mdl-tooltip" for="btn-addProduct">Agregar Compra</div>
                                    </p>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="mdl-tabs__panel" id="tabListKardex">
                <div class="mdl-grid">
                    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
                        <thead>
                            <tr>

                                <th>ID COMPRA</th>
                                <th>PROVEEDOR</th>
                                <th>ARTICULO</th>
                                <th>CANTIDAD</th>
                                <th>VALOR</th>
                                <th>TOTAL</th>
                                <th>FECHA DE COMPRA</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td> <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
                                        editar
                                    </button></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </section>
</template>