<template>
    <div class="container">
        <template>
            <center>
                <h3>Busqueda de Notas</h3>
                <input type="text" v-model="buscar" placeholder="Nombre">
                <input type="text" v-model="apellido" placeholder="Apellido">
                <button type="button" @click="listar(buscar, apellido)">Buscar por Nombre</button><br>
                <!-- <a href="#" @click="mostrarDetalle()">Volver</a> -->
                <br>
                <br>
                <table border="1">
                    <thead>
                        <th>Gestion</th>
                        <th>Materia</th>
                        <th>Ser</th>
                        <th>Saber</th>
                        <th>Hacer</th>
                        <th>Decidir</th>
                        <th>Suma</th>
                    </thead>
                    <tbody>
                        <tr v-for="notas in arrayNotas" :key="notas.id">
                            <!-- <td v-text="notas.id"></td> -->
                            <td v-text="notas.Gestion"></td>
                            <td v-text="notas.Materia"></td>
                            <td v-text="notas.nota_ser"></td>
                            <td v-text="notas.nota_saber"></td>
                            <td v-text="notas.nota_hacer"></td>
                            <td v-text="notas.nota_decidir"></td>
                            <td v-text="notas.nota_decidir + notas.nota_ser + notas.nota_saber + notas.nota_decidir"></td>
                            
                            <!-- <td><a href="#" @click="listar(buscar)">Seleccionar</a></td> -->
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
                arrayNotas: [],
                buscar :'',
                apellido :''
            }
        },
        methods:{
            listar(buscar, apellido){
                let me = this;
                var url='/frmbuscarnotas?buscar='+buscar+'&apellido='+apellido;
                axios.get(url).then(function(response){
                    me.arrayNotas=response.data;
                })
                .catch(function(error){
                    console.log(error);
                });
            }

        },
        mounted() {
            
        }
    }
</script>
