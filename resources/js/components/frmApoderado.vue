<template>
<center>
<div class="container">
   
 <h3>Apoderado</h3>
 <form action="/apoderado/" method="POST">
 <table>
     <tr>
         <td>Nombre</td>
         <td><input type="text" v-model="nombre" placeholder="Nombre"></td>
     </tr>
       <tr>
         <td>Apellidos</td>
         <td><input type="text" v-model="apellidos" placeholder="Apellidos"></td>
     </tr>
       <tr>
         <td>Telefono</td>
         <td><input type="text" v-model="telefono" placeholder="Telefono"></td>
     </tr>
     <tr>
         <td colspan="3">
             <button type="button" @click="nuevo()">Nuevo</button>
             <button type="button" @click="guardar()">Guardar</button>
           
         </td>
     </tr>
 </table>
 <input type="text" v-model="buscar" placeholder="Nombre">
 <button type="button" @click="listar(buscar)"> Buscar </button>
 </form>
 <br>
 <br>
 <table border="3">
     <thead>
         <th>Id</th>
         <th>Nombre</th>
         <th>Apellidos</th>
         <th>Telefono</th>
     </thead>
     <tbody>
     <tr v-for="apoderado in arrayApoderado" :key="apoderado.id">
         <td v-text="apoderado.id"></td>
         <td v-text="apoderado.nombre"></td>
         <td v-text="apoderado.apellidos"></td>
         <td v-text="apoderado.telefono"></td>
        <!-- <td v-text="apoderado.relacion"></td>-->
     </tr>
 </tbody>
 </table>
 
  
    </div>
    </center>
    </template>
 
 <script>
 export default {
      data(){
            return{
                id_apoderado:0,
                nombre:'',
                apellidos:'',
                telefono:'',
                buscar:'',
                arrayApoderado:[]
            }
        },
        methods:{
            listar(buscar){
                let me=this;
                var url='/apoderado?buscar='+buscar;
                axios.get(url).then(function(response){
                    me.arrayApoderado=response.data;
                })
                .catch(function(error){
                    console:log(error);
                });
            },
            guardar(){
                let me = this;
                axios.post('/apoderado/registrar',{
                    
                    nombre : this.nombre,
                    apellidos : this.apellidos,
                    telefono: this.telefono,
                  
                 
                }).then(function (error) {
                    me.listar('');
                }).catch(function (error) {
                    console.log(error);
                });   
            },         
            nuevo(){
                this.nombre='';
                this.apellidos='';
                this.telefono='';
                this.buscar='';
            }
        },
        mounted(){
            this.listar(this.buscar);
        }
    }
 
 </script>
    