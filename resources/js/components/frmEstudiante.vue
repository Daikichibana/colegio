<template>
    <div class='container'>
    <h3> Registro de Estudiantes </h3>
    <form action="" method="$POST">
        <table>
            <tr>
                    <td>Nombre</td>
                    <td><input type="text" v-model="nombre" placeholder="Nombre Cliente"></td>
                </tr>
                <tr>
                    <td>Apellido</td>
                    <td><input type="text" v-model="apellidos" placeholder="Apellidos"></td>
                </tr>
                <tr>
                    <td>Direccion</td>
                    <td><input type="text" v-model="direccion" placeholder="Direccion"></td>
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
        <input type="text" v-model="buscar" placeholder="Nombre Estudiante">
        <button type="button" @click="listar(buscar)">Buscar por Nombre</button>
    </form>
    <br>
    <br>
    <table border="1">
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Direccion</th>
            <th>Telefono</th>
        </thead>
        <tbody>
            <tr v-for="estudiante in arrayEstudiante" :key="estudiante.id">
                <td v-text="estudiante.id"></td>
                <td v-text="estudiante.nombre"></td>
                <td v-text="estudiante.apellidos"></td>
                <td v-text="estudiante.direccion"></td>
                <td v-text="estudiante.telefono"></td>
            </tr>
        </tbody>
    </table>
    </div>
</template>

<script>
export default {
    data(){
        return{
            id_estudiante : 0,
            nombre : '',
            apellidos : '',
            direccion : '',
            telefono : '',
            buscar : '',
            arrayEstudiante : []
        }
    },
    methods:{
        listar(buscar){
            let me = this;
            var url='/estudiante?buscar='+buscar;
            axios.get(url).then(function(response){
                me.arrayEstudiante= response.data;
            })
            .catch(function(error){
                console.log(error);
            });
        },
        guardar(){
            let me = this;
            axios.post('estudiante/registrar',{
                'nombre': this.nombre,
                'apellidos' : this.apellidos,
                'direccion' : this.direccion,
                'telefono' : this.telefono
            }).then(function(error){
                me.listar('');
            }).catch(function(error){
                console.log(error);
            });               
        },


        llenar(data=[]){
            this.id_estudiante=data['id'];
            this.nombre=data['nombre'];
            this.apellidos=data['apellidos'];
            this.direccion=data['direccion'];
            this.telefono=data['telefono'];
        },
        nuevo(){
            this.nombre = '';
            this.apellidos = '';
            this.direccion ='';
            this.telefono= '';
            this.buscar = '';
        },
    },       
    mounted(){
        this.listar('');
    }
}
</script>