<template>
  <div class="container">
    <!-- menu registro de Inscripcion -->
    <template v-if="listado == 0">
      <form action="" method="POST">
        <table>
          <tr>
            <td>Estudiante</td>
            <td>
              <input
                type="text"
                v-model="estudiante"
                placeholder="estudiante..."
              />
            </td>
            <a
              href="#"
              @click="frmBuscarEstudiante()"
              data-toggle="modal"
              data-target="#modalEstudiante"
              >Buscar Estudiante</a
            >
          </tr>
          <tr>
            <td>Curso</td>
            <td>
              <input type="text" v-model="curso" placeholder="curso..." />
            </td>
            <a
              href="#"
              @click="frmBuscarCurso()"
              data-toggle="modal"
              data-target="#modalCurso"
              >Buscar Curso</a
            >
            <a
              href="#"
              @click="frmVerificarNotas()"
              data-toggle="modal"
              data-target="#modalNotas"
              >Verificar Notas</a
            >
          </tr>
          <tr>
            <td>Fecha</td>
            <td><input type="date" /></td>
          </tr>
          <tr>
            <a
              href="#"
              @click="frmAgregarApoderado()"
              data-toggle="modal"
              data-target="#modalApoderado"
              >Agregar Apoderado</a
            >
          </tr>
        </table>

        <!-- Detalle Apoderados -->
        <table border="1">
          <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Relacion</th>
          </thead>
          <tbody>
            <tr v-for="apoderado in arrayApoderado" :key="apoderado.id">
              <td v-text="apoderado.id"></td>
              <td v-text="apoderado.nombre"></td>
              <td v-text="apoderado.apellidos"></td>
              <td v-text="apoderado.telefono"></td>
              <td>
                <select
                  name="relacion_name"
                  id="relacion_id"
                  v-model="relacion"
                >
                  <option value="Padre">Padre</option>
                  <option value="Madre">Madre</option>
                </select>
              </td>
              <td></td>
            </tr>
          </tbody>
        </table>

        <!-- Detalle Inscripcion -->
        <table border="1">
          <thead>
            <tr>
              <th>Opcion</th>
              <th>nombre</th>
              <th>apellido</th>
              <th>telefono</th>
              <th>direccion</th>
              <th>direccion</th>
            </tr>
          </thead>
          <tbody v-if="arrayDetalle.length">
            <tr v-for="(detalle, index) in arrayDetalle" :key="detalle.id">
              <td v-text="detalle.producto"></td>
              <td v-text="detalle.precio"></td>
              <td>
                <span
                  style="color: red"
                  v-show="detalle.cantidad > detalle.stock"
                  >Stock: {{ detalle.stock }}</span
                >
                <input type="number" v-model="detalle.cantidad" />
              </td>
              <td>
                {{ (detalle.preciov = detalle.precio * detalle.cantidad) }}
              </td>
            </tr>
            <tr style="background-color: #ceecf5">
              <td colspan="4" align="right"><strong>Total Neto: bs</strong></td>
              <td>{{ (total = calcularTotal) }}</td>
            </tr>
          </tbody>
        </table>

        <!-- Botones -->
        <table>
          <tr>
            <td colspan="3">
              <button type="button" @click="nuevo()">Nuevo</button>
              <button type="button" @click="guardarInscripcion()">
                Guardar
              </button>
              <button type="button" @click="modificarInscripcion()">
                Modificar
              </button>
              <button type="button" @click="anularInscripcion()">
                Eliminar
              </button>
              <button type="button" @click="buscarInscripcion()">Buscar</button>
            </td>
          </tr>
        </table>
      </form>
    </template>

    <!-- menu de buscar Inscripcion -->
    <template v-else-if="listado == 1">
      <!-- Buscar Inscripciones -->
      <table border="1">
        <thead>
          <th>Id</th>
          <th>fecha Inscripcion</th>
          <th>Curso</th>
          <th>Estudiante</th>
          <th>Apoderado</th>
        </thead>
        <tbody>
          <tr v-for="inscripcion in arrayInscripcion" :key="inscripcion.id">
            <td v-text="inscripcion.id"></td>
            <td v-text="inscripcion.fechaInscripcion"></td>
            <td v-text="inscripcion.id_aCursoGestion"></td>
            <td v-text="inscripcion.id_estudiante"></td>
          </tr>
        </tbody>
      </table>
    </template>

    <!-- Inicio Modal frmBuscarEstudiante -->
    <div
      class="modal fade"
      id="modalEstudiante"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myModalLabel"
      style="display: none"
      aria-hidden="true"
    >
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
    <div
      class="modal fade"
      id="modalCurso"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myModalLabel"
      style="display: none"
      aria-hidden="true"
    >
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
    <div
      class="modal fade"
      id="modalNotas"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myModalLabel"
      style="display: none"
      aria-hidden="true"
    >
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
    <!-- Fin Modal frmBuscarNota -->

    <!-- Inicio Modal frmBuscarApoderado -->
    <div
      class="modal fade"
      id="modalApoderado"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myModalLabel"
      style="display: none"
      aria-hidden="true"
    >
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
  data() {
    return {
      listado: 0,
      estudiante: "",
      curso: "",
      fecha: "",
      buscar: "",
      arrayApoderado: [],
      arrayInscripcion: [],
      relacion: "",
      arrayDetalle: [],
    };
  },
  methods: {
    nuevo() {
      (listado = 0),
        (estudiante = ""),
        (curso = ""),
        (fecha = ""),
        (buscar = ""),
        (arrayApoderado = []),
        (arrayInscripcion = []),
        (relacion = ""),
        (arrayDetalle = []);
    },
    guardarInscripcion() {
      let me = this;
      axios
        .post("/Inscipcion/registrar", {
          estudiante: this.estudiante,
          curso: this.curso, //Asignacion curso Gestion
          fecha: this.fecha,
          //data: this.arrayApoderado,
        })
        .then(function (response) {
          me.respt = "Incripcion Registrada...!";
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    listarInscripcion(buscar) {
      let me = this;
      var url = "/inscripcion?buscar=" + buscar;
      axios
        .get(url)
        .then(function (response) {
          me.arrayInscripcion = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    listarApoderado(buscar) {
      let me = this;
      var url = "/apoderado?buscar=" + buscar;
      axios
        .get(url)
        .then(function (response) {
          me.arrayApoderado = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    buscarInscripcion() {
      this.listado = 1;
      this.listar("");
    },
  },
  mounted() {
    console.log("Component mounted.");
    this.listarApoderado(this.buscar);
  },
};
</script>
