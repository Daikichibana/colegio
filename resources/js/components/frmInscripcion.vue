<template>
    <div class="container">

        <!-- menu registro de Inscripcion -->
        <template v-if="listado==0">
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>Estudiante</td>
                        <td><input type="text" v-model="estudiante" placeholder="estudiante..."></td>
                        <a href="#" @click="frmBuscarEstudiante()" data-toggle="modal" data-target="#modalEstudiante">Buscar Estudiante</a>
                    </tr>
                    <tr>
                        <td>Curso</td>
                        <td><input type="text" v-model="curso" placeholder="curso..."></td>
                        <a href="#" @click="frmBuscarCurso()" data-toggle="modal" data-target="#modalCurso">Buscar Curso</a>
                        <a href="#" @click="frmVerificarNotas()" data-toggle="modal" data-target="#modalNotas">Verificar Notas</a>
                    </tr>
                    <tr>
                        <td>Fecha</td>
                        <td><input type="date"></td>
                    </tr>
                    <!-- Detalle Apoderados -->
                    <table>
                        <tr>
                        <td>Id</td>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Telefono</td>
                        <td>Relacion</td>
                        </tr>
                    </table>
                    <!-- Botones -->
                    <tr>
                        <td colspan="3">
                            <button type="button" @click="nuevo()">Nuevo</button>
                            <button type="button" @click="guardarInscripcion()">Guardar</button>
                            <button type="button" @click="modificarInscripcion()">Modificar</button>
                            <button type="button" @click="anularInscripcion()">Eliminar</button>
                            <button type="button" @click="buscarInscripcion()">Buscar</button>
                        </td>
                    </tr>
                </table>
            </form>
        </template>

        <!-- menu de buscar Inscripcion -->
        <template v-else-if="listado==1">
            <!-- Aqui va el codigo -->
            <h4>Hola mundo</h4>
        </template>

        <!-- Inicio Modal frmBuscarEstudiante -->
        <div class="modal fade" id="modalEstudiante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Busqueda de Estudiante</h4>
                        <button type="button" data-dismiss="modal">x</button>
                    </div>
                    <div class="modal-body">
                        <!-- Aqui va su codigo -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal frmBuscarEstudiante -->

         <!-- Inicio Modal frmBuscarCurso -->
        <div class="modal fade" id="modalCurso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Busqueda de Curso</h4>
                        <button type="button" data-dismiss="modal">x</button>
                    </div>
                    <div class="modal-body">
                        <!-- Aqui va su codigo -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal frmBuscarCurso -->


        <!-- Inicio Modal frmBuscarNotas -->
        <div class="modal fade" id="modalNotas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Busqueda de Notas</h4>
                        <button type="button" data-dismiss="modal">x</button>
                    </div>
                    <div class="modal-body">
                        <!-- Aqui va su codigo -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal frmBuscarApoderado -->


        <!-- Inicio Modal frmBuscarApoderado -->
        <div class="modal fade" id="modalApoderado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Busqueda de Apoderado</h4>
                        <button type="button" data-dismiss="modal">x</button>
                    </div>
                    <div class="modal-body">
                        <!-- Aqui va su codigo -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal frmBuscarApoderado -->
       
    </div>
</template>

<script>
    export default {
        data(){
            return{
                listado: 0,
                estudiante:'',
                curso: '',
                buscar : '',
                arrayInscripcion:[]
            }
        },
        methods:{
            nuevo(){
                /*
                this.id_cliente = 0;
                this.cliente = '';
                this.fecha_venta = '';
                this.total = 0.0;
                this.id_producto = 0;
                this.producto = '';
                this.cantidad = 0;
                this.preciov = 0.0;
                this.stock = 0;
                this.arrayDetalle = [];
                this.errorMsj = '';
                this.respt='';
                */
            },
            guardarInscirpcion(){
                let me = this;
                axios.post('/Inscipcion/registrar',{
                    /*
                    fecha : this.fecha_venta,
                    monto : this.total,
                    id_cliente: this.id_cliente,
                    data : this.arrayDetalle
                    */
                }).then(function (response) {
                    me.respt = 'Incripcion Registrada...!';
                }).catch(function (error) {
                    console.log(error);
                });   
            },
            listar(buscar){
                let me = this;
                var url='/Inscripcion?buscar=' + buscar;
                axios.get(url).then(function(response){
                    me.arrayInscripcion = response.data;
                })
                .catch(function(error){
                    console.log(error);
                });
            },
            buscarInscripcion(){
                this.listado=1;
                this.listar('');
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
