<template>
    <div class="container">
        <template>
            <center>
                <h3>Busqueda de Cursos</h3>
                <input type="text" v-model="buscar" placeholder="Ej: 1ro">
                <button type="button" @click="listar(buscar)">Buscar por Nombre</button><br>
                <a href="#" @click="mostrarDetalle()">Volver</a>
                <br>
                <br>
                <table border="1">
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Gestion</th>
                        <th>Paralelo</th>
                        <th>Opcion</th>
                    </thead>
                    <tbody>
                        <tr v-for="curso in arrayCurso" :key="curso.id">
                            <td v-text="curso.id"></td>
                            <td v-text="curso.curso_nombre"></td>
                            <td v-text="curso.gestion_nombre"></td>
                            <td v-text="curso.paralelo_nombre"></td>
                            
                            <td><a href="#" @click="listar(buscar)">Seleccionar</a></td>
                        </tr>
                    </tbody>
                </table>
            </center>
        </template>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                nombre :'',
                arrayCurso: [],
                buscar :''
            }
        },
        methods:{
            listar(buscar){
                let me = this;
                var url='/frmbuscarcurso?buscar='+buscar;
                axios.get(url).then(function(response){
                    me.arrayCurso=response.data;
                })
                .catch(function(error){
                    console.log(error);
                });
            }

        },
        mounted() {
            this.listar(this.buscar);
        }
    }
</script>
