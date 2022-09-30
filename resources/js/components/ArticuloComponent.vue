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
                                NUEVO ARTICULO
                            </div>
                            <div class="full-width panel-content">
                                <form @submit.prevent="create_articulo">
                                    <div class="mdl-grid">
                                        <div
                                            class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
                                            <h5 class="text-condensedLight">Datos a ingresar</h5>

                                            <div class="mdl-textfield mdl-js-textfield">
                                                <input class="mdl-textfield__input" type="text"
                                                    v-model="articulo.codarticulo"
                                                    pattern="?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="id_codarticulo">
                                                <label class="mdl-textfield__label" for="CodProduct">Código del
                                                    Artículo</label>
                                                <span class="mdl-textfield__error">Código Invalida</span>
                                            </div>

                                            <div class="mdl-textfield mdl-js-textfield">
                                                <input class="mdl-textfield__input" type="text"
                                                    v-model="articulo.detalle"
                                                     id="id_detalle">
                                                <label class="mdl-textfield__label" for="id_detalle">detalle</label>
                                                <span class="mdl-textfield__error">Nombre inválido</span>
                                            </div>

                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="number"
                                                    v-model="articulo.valorcompra" pattern="-?[0-9- ]*(\.[0-9]+)?"
                                                    id="CompraCode">
                                                <label class="mdl-textfield__label" for="CompraCode">Valor de
                                                    Compra</label>
                                                <span class="mdl-textfield__error">Valor no válido</span>
                                            </div>

                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="number"
                                                    v-model="articulo.valorventa" pattern="-?[0-9- ]*(\.[0-9]+)?"
                                                    id="VentaCode">
                                                <label class="mdl-textfield__label" for="VentaCode">Valor de
                                                    Venta</label>
                                                <span class="mdl-textfield__error">Valor no válido</span>
                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <select class="mdl-textfield__input" v-model="articulo.id_tipo">
                                                    <option value="" disabled selected>Selecciona el tipo </option>
                                                    <option v-for="tipo in tipos" v-bind:value ="tipo.id">{{tipo.detalle}}</option>
                                                </select>
                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <select class="mdl-textfield__input" v-model="articulo.id_marca">
                                                    <option value="" disabled selected>Selecciona la marca </option>
                                                    <option v-for="marca in marcas" v-bind:value="marca.id">{{marca.detalle}}</option>
                                                </select>
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
                                <th>ID Artículo: </th>
                                <th>Cod Artículo</th>
                                <th>Detalle</th>
                                <th>Marca</th>
                                <th>Tipo</th>
                                <th>Stock</th>
                                <th>Valor de Compra</th>
                                <th>Valor de Venta</th>
                                <th>Fecha Carga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="articulo in articulos" :key="articulo.id">
                                <td>{{articulo.id}}</td>
                                <td>{{articulo.codarticulo}}</td>
                                <td>{{articulo.detalle}}</td>
                                <td>{{articulo.marca.detalle}}</td>
                                <td>{{articulo.tipo.detalle}}</td>
                                <td>{{articulo.stock}}</td>
                                <td>{{articulo.valorcompra}}</td>
                                <td>{{articulo.valorventa}}</td>
                                <td>{{articulo.created_at}}</td>
                                <td>
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
                                        editar
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import axios from 'axios';

let url = 'http://localhost:8000/api/v1/articulo/';
export default {
    data() {
        return {
            articulos: [],
            marcas: [],
            tipos: [],
            dialog: false,
            operacion: '',
            articulo: {
                id : null,
                codarticulo : '',
                detalle : '',
                valorcompra : '',
                valorventa : '',
                id_marca : '',
                id_tipo : ''
            },
        }
    },
    created() {
        this.mostrar()
    },

    methods: {
        mostrar: function () {
            axios.get(url).
                then(response => {
                    this.articulos = response.data;

                });
            axios.get('http://localhost:8000/api/v1/marca').
                then(response => {
                    this.marcas = response.data;
                });
            axios.get('http://localhost:8000/api/v1/tipo').
                then(response => {
                    this.tipos = response.data['tipo'];
                });
        },

        create_articulo() {
            let params = {
                codarticulo: this.articulo.codarticulo,
                detalle: this.articulo.detalle,
                stock: 5,
                valorcompra: this.articulo.valorcompra,
                valorventa: this.articulo.valorventa,
                id_tipo : this.articulo.id_tipo,
                id_marca : this.articulo.id_marca
               
            }

            axios.post(url, params).
            then(response =>{
                const addArticulo = response.data;
                this.articulos.push(addArticulo);   
            });
        },
    }

}
</script>