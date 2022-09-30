<template>
    <section class="full-width pageContent">

        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
            <div class="mdl-tabs__tab-bar">
                <a href="#tabNewAdmin" class="mdl-tabs__tab is-active">NUEVO</a>
                <a href="#tabListAdmin" class="mdl-tabs__tab">LISTA</a>
            </div>
            <div class="mdl-tabs__panel is-active" id="tabNewAdmin">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                        <div class="full-width panel mdl-shadow--2dp">
                            <div class="full-width panel-tittle bg-primary text-center tittles">
                                Nuevo Proveedor
                            </div>

                            <div class="full-width panel-content">
                                <form @submit.prevent="create_proveedor">

                                    <div class="mdl-grid">
                                        <center>
                                            <div
                                                class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
                                                <h5 class="text-condensedLight">Datos Proveedor</h5>
                                                <div
                                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="text" v-model = "proveedor.codproveedor"
                                                        id="id_codproveedor">
                                                    <label class="mdl-textfield__label" for="id_codproveedor">Código
                                                        proveedor</label>
                                                    <span class="mdl-textfield__error">Código inválida</span>
                                                </div>

                                                <div
                                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="text" v-model = "proveedor.nombre_ape"
                                                    id="id_nombre_contacto">
                                                    <label class="mdl-textfield__label" for="id_nombre_contacto">nombre contacto</label>
                                                    <span class="mdl-textfield__error">Nombre inválido</span>
                                                </div>
                                                <div
                                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="tel" v-model = "proveedor.telefono"
                                                    id="id_telefono">
                                                    <label class="mdl-textfield__label"
                                                        for="id_telefono">Teléfono</label>
                                                    <span class="mdl-textfield__error">Número de teléfono
                                                        invalido</span>
                                                </div>
                                                <div
                                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="email" v-model = "proveedor.email"
                                                    id="id_correo">
                                                    <label class="mdl-textfield__label" for="id_correo">Correos</label>
                                                    <span class="mdl-textfield__error">Correo inválido</span>
                                                </div>
                                                <div
                                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="text" id="id_direccion" v-model = "proveedor.direccion">
                                                    <label class="mdl-textfield__label"
                                                        for="id_direccion">Dirección</label>
                                                    <span class="mdl-textfield__error">Dirección inválida</span>
                                                </div>
                                            </div>
                                        </center>
                                    </div>

                                    <p class="text-center">
                                        <button
                                            class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary"
                                            id="btn-addAdmin">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button>
                                    <div class="mdl-tooltip" for="btn-addAdmin">Agregar Proveedor</div>
                                    </p>

                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="mdl-tabs__panel" id="tabListAdmin">
                <div class="mdl-grid">
                    <div
                        class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                        <div class="full-width panel mdl-shadow--2dp">
                            <div class="full-width panel-tittle bg-success text-center tittles">
                                Lista de Proveedores
                            </div>
                            <div class="full-width panel-content">
                                <!-- Inicio de la Seccion de search -->
                                <form action="#">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                                        <label class="mdl-button mdl-js-button mdl-button--icon" for="searchAdmin">
                                            <i class="zmdi zmdi-search"></i>
                                        </label>
                                        <div class="mdl-textfield__expandable-holder">
                                            <input class="mdl-textfield__input" type="text" id="searchAdmin">
                                            <label class="mdl-textfield__label"></label>
                                        </div>
                                    </div>
                                </form>

                                <!-- Fin de la Seccion de search -->



                                <div class="mdl-list">
                                    <tr v-for="proveedor in proveedores" :key="proveedor.id">
                                        <div class="mdl-list__item mdl-list__item--two-line">
                                            <span class="mdl-list__item-primary-content">
                                                <i class="zmdi zmdi-account mdl-list__item-avatar"></i>
                                                <td>{{proveedor.codproveedor}}</td>
                                                <span class="mdl-list__item-sub-title">
                                                    <td>{{proveedor.nombre_ape}}</td>
                                                </span>
                                                <span class="mdl-list__item-sub-title">
                                                    <td>{{proveedor.direccion}}: </td>
                                                    <td>{{proveedor.email}}: </td>
                                                    <td>{{proveedor.telefono}} </td>
                                                </span>

                                            </span>
                                            <a class="mdl-list__item-secondary-action" href="#!"><i
                                                    class="zmdi zmdi-more"></i></a>
                                        </div>
                                    </tr>

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
let url = 'http://localhost:8000/api/v1/proveedor/';
export default {
    data() {
        return {
            proveedores: [],
            dialog: false,
            operacion: '',
            proveedor: {
                id: null,
                codproveedor: '',
                nombre_ape: '',
                direccion: '',
                email: '',
                telefono: ''
            }
        }
    },
    created() {
        this.mostrar()
    },
    methods:{
        mostrar:function(){
            axios.get(url).
            then(response=>{
                this.proveedores = response.data['proveedor'];
            });
        },
        create_proveedor(){
            let params={
                codproveedor : this.proveedor.codproveedor,
                nombre_ape : this.proveedor.nombre_ape,
                direccion : this.proveedor.direccion,
                email : this.proveedor.email,
                telefono : this.proveedor.telefono
                
            }
            console.log(params);
            axios.post(url, params).then(response => {
                this.proveedor.push(response.data)
            });
            this.proveedor.codproveedor = '';
            this.proveedor.nombre_ape = '';
            this.proveedor.direccion = '';
            this.proveedor.email = '';
            this.proveedor.telefono = '';
        },
    }
}
</script>