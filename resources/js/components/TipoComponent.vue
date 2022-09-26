<template>
    <section class="full-width pageContent">
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
            <div class="mdl-tabs__tab-bar">
                <a href="#tabNewCategory" class="mdl-tabs__tab is-active">NUEVO</a>
                <a href="#tabListCategory" class="mdl-tabs__tab">LISTA</a>
            </div>
            <div class="mdl-tabs__panel is-active" id="tabNewCategory">
                <div class="mdl-grid">
                    <div
                        class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                        <div class="full-width panel mdl-shadow--2dp">
                            <div class="full-width panel-tittle bg-primary text-center tittles">
                                Nueva Categoria
                            </div>
                            <div class="full-width panel-content">

                                <form @submit.prevent="create_tipo">
                                    <h5 class="text-condensedLight">Datos de la Categoria </h5>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="codtipo" v-model="tipo.codtipo">
                                        <label class="mdl-textfield__label" for="id_codtipo">Código de la
                                            Categoria</label>
                                        <span class="mdl-textfield__error">Código inválido</span>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text"
                                            pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="id_detalle" v-model="tipo.detalle">
                                        <label class="mdl-textfield__label" for="id_detalle">Descrición</label>
                                        <span class="mdl-textfield__error">Descripción inválida</span>
                                    </div>
                                    <p class="text-center">
                                        <button
                                            class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary"
                                            id="btn-addCategory">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button>
                                    <div class="mdl-tooltip" for="btn-addCategory">
                                        <button type="submit">Añadir Tipo</button> 
                                    </div>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mdl-tabs__panel" id="tabListCategory">
                <div class="mdl-grid">
                    <div
                        class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
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


                                <div class="mdl-list">
                                    <tr v-for="tipo in tipos" :key="tipo.id">
                                        <div class="mdl-list__item mdl-list__item--two-line" style="width: 200%;">
                                            <span class="mdl-list__item-primary-content">
                                                <i class="zmdi zmdi-label mdl-list__item-avatar"></i>
                                                <td>{{tipo.codtipo}}</td>
                                                <span class="mdl-list__item-sub-title">
                                                    <td>{{tipo.detalle}}</td>
                                                </span>
                                                <span class="badge badge-primary float-right">{{tipo.updated_at}}</span>
                                            </span>
                                            <a class="mdl-list__item-secondary-action" href="#!"><i
                                                    class="zmdi zmdi-more"></i></a>
                                        </div>
                                    </tr>
                                    <li class="full-width divider-menu-h"></li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios'


let url = 'http://localhost:8000/api/v1/tipo/';

export default {
    data() {
        return {
            tipos: [],
            dialog: false,
            operacion: '',
            tipo: {
                id: null,
                codtipo: '',
                detalle: '',
            }
        }
    },
    created() {
        this.mostrar()
    },
    methods: {
        mostrar: function () {
            axios.get(url).then(response => {
                this.tipos = response.data['tipo'];

            });
        },
        create_tipo () {
            let params = {
                codtipo: this.tipo.codtipo,
                detalle: this.tipo.detalle
            }
            axios.post(url, params).then(response => {
                this.tipo.push(response.data)
            });
            this.tipo.codtipo = '';
            this.tipo.detalle = '';
        },

        save: function () {
            if (this.operacion == 'create_tipo') {
                this.create_tipo();
            }
            if (this.operacion == 'edit') {
                this.edit();
            }
            this.dialog = false;
        },

        formNew: function () {
            this.dialog = true;
            this.operacion = 'create';
            this.tipo.codtipo = '';
            this.tipo.detalle = '';
        },
        formEdit: function (id, codtipo, detalle) {
            this.dialog = true;
            his.operacion = 'edit';
            this.tipo.id = id
            this.tipo.codtipo = codtipo;
            this.tipo.detalle = detalle;

        }
    }
}
</script>