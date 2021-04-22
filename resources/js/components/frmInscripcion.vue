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
                type="hidden"
                v-model="idEstudiante"
                placeholder="estudiante..."
              />
              <input
                type="text"
                v-model="estudianteNombre"
                placeholder="estudiante nombre..."
                readonly
              />
              <input
                type="text"
                v-model="estudianteApellidos"
                placeholder="estudiante apellido..."
                readonly
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
              <input type="text" v-model="idCurso" placeholder="curso..." />
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
            <td><input type="date" v-model="fecha" /></td>
          </tr>
          <tr>
            <a
              href="#"
              @click="frmBuscarApoderado()"
              data-toggle="modal"
              data-target="#modalApoderado"
              >Agregar Apoderado</a
            >
          </tr>
          <tr></tr>
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
          <tbody v-if="arrayDetalle.length">
            <tr v-for="(detalle, index) in arrayDetalle" :key="detalle.id">
              <td><a href="#" @click="eliminarDetalle(index)">Quitar</a></td>
              <td v-text="detalle.apoderadoNombre"></td>
              <td v-text="detalle.apoderadoApellidos"></td>
              <td v-text="detalle.apoderadoTelefono"></td>
              <td>
                <input
                  type="text"
                  placeholder="relacion..."
                  v-model="detalle.relacion"
                />
              </td>
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
              <button type="button" @click="buscarInscripcion()">Buscar</button>
            </td>
          </tr>
        </table>
      </form>
    </template>

    <!-- menu de buscar Inscripcion -->
    <template v-else-if="listado == 1">
      <!-- Buscar Inscripciones -->
      <h3>Busqueda de Inscripciones</h3>
      <input type="text" v-model="buscar" placeholder="Nombre Cliente" />
      <button type="button" @click="listar(buscar)">Buscar</button>
      <br />
      <a href="#" @click="nuevo()">Volver</a>
      <br />
      <br />
      <table border="1">
        <thead>
          <th>Id</th>
          <th>fecha Inscripcion</th>
          <th>Curso</th>
          <th>Gestion</th>
          <th>Estudiante</th>
          <th>Opcion</th>
        </thead>
        <tbody>
          <tr v-for="inscripcion in arrayInscripcion" :key="inscripcion.id">
            <td v-text="inscripcion.id"></td>
            <td v-text="inscripcion.fechaInscripcion"></td>
            <td v-text="inscripcion.cursoNombre"></td>
            <td v-text="inscripcion.cursoGestion"></td>
            <td
              v-text="
                inscripcion.estudianteNombre +
                ' ' +
                inscripcion.estudianteApellidos
              "
            ></td>
            <td>
              <a href="#" @click="modificarDetalle(inscripcion.id)"
                >Seleccionar</a
              >
            </td>
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
            <form action="" method="$POST">
              <input
                type="text"
                v-model="buscarEstudiante"
                placeholder="Nombre Estudiante"
              />
              <button type="button" @click="listarEstudiante(buscarEstudiante)">
                Buscar por Nombre
              </button>
            </form>
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
                  <td>
                    <a href="#" @click="seleccionarEstudiante(estudiante)" data-dismiss="modal">Seleccionar</a>
                  </td>
                </tr>
              </tbody>
            </table>
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
            <div class="form-group row">
              <div class="col-md-8">
                <div class="input-group">
                  <input
                    type="text"
                    v-model="buscarApoderado"
                    placeholder="Nombre"
                  />
                  <button
                    type="button"
                    @click="listarApoderado(buscarApoderado)"
                  >
                    Buscar
                  </button>
                  <br />
                  <br />
                  <label for="" v-text="errorMsj"></label>
                  <table border="1">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="apoderado in arrayApoderado"
                        :key="apoderado.id"
                      >
                        <td v-text="apoderado.id"></td>
                        <td v-text="apoderado.nombre"></td>
                        <td v-text="apoderado.apellidos"></td>
                        <td v-text="apoderado.telefono"></td>
                        <td>
                          <a href="#" @click="seleccionarApoderado(apoderado)"
                            >Seleccionar</a
                          >
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal">cerrar</button>
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
      fecha: "",
      buscar: "",
      errorMsj: "",
      buscarApoderado: "",
      apoderado: "",
      idApoderado: 0,
      apoderadoNombre: "",
      apoderadoApellidos: "",
      apoderadoTelefono: "",
      arrayApoderado: [],
      arrayInscripcion: [],
      arrayNotas: [],
      idEstudiante: "",
      estudianteNombre: "",
      estudianteApellidos: "",
      estudianteDireccion: "",
      estudianteTelefono: "",
      buscarEstudiante: "",
      arrayEstudiante: [],
      idCurso: "",
      cursoNombre: "",
      cursoGestion: "",
      arrayCurso: [],
      relacion: "",
      arrayDetalle: [],
    };
  },
  methods: {
    frmBuscarEstudiante() {
      this.arrayEstudiante = [];
      this.buscarEstudiante = "";
    },
    frmBuscarCurso() {
      this.arrayCurso = [];
      this.buscarCurso = "";
    },
    frmVerificarNotas() {
      this.arrayNotas = [];
      this.buscarNotas = "";
    },
    frmBuscarApoderado() {
      this.arrayApoderado = [];
      this.buscarApoderado = "";
      this.errorMsj = "";
    },
    seleccionarApoderado(data = []) {
      let me = this;
      if (me.encuentra(data["id"])) {
        this.errorMsj = "Ya se encuentra agregado...";
      } else {
        me.arrayDetalle.push({
          idApoderado: data["id"],
          apoderadoNombre: data["nombre"],
          apoderadoApellidos: data["apellidos"],
          apoderadoTelefono: data["telefono"],
          relacion: "",
        });
      }
    },
    seleccionarEstudiante(data = []) {
      this.idEstudiante = data["id"];
      this.estudianteNombre = data["nombre"];
      this.estudianteApellidos = data["apellidos"];
      this.estudianteDireccion = data["direccion"];
      this.estudianteTelefono = data["telefono"];
    },
    encuentra(id) {
      var sw = 0;
      for (var i = 0; i < this.arrayDetalle.length; i++) {
        if (this.arrayDetalle[i].idApoderado == id) {
          sw = true;
        }
      }
      return sw;
    },
    nuevo() {
      this.listado = 0;
      this.estudiante = "";
      this.curso = "";
      this.fecha = "";
      this.buscar = "";
      this.buscarApoderado = "";
      this.apoderado = "";
      this.idApoderado = 0;
      this.apoderadoNombre = "";
      this.apoderadoApellidos = "";
      this.apoderadoTelefono = "";
      this.arrayApoderado = [];
      this.arrayInscripcion = [];
      this.arrayNotas = [];
      (this.buscarEstudiante = ""),
        (this.idEstudiante = ""),
        (this.estudianteNombre = ""),
        (this.estudianteApellidos = ""),
        (this.estudianteDireccion = ""),
        (this.estudianteTelefono = "");
      this.arrayEstudiante = [];
      this.relacion = "";
      this.arrayDetalle = [];
    },
    guardarInscripcion() {
      let me = this;
      axios
        .post("/inscripcion/registrar", {
          fecha: this.fecha,
          idCurso: this.idCurso, //Asignacion curso Gestion
          idEstudiante: this.idEstudiante,
          data: this.arrayDetalle,
        })
        .then(function (response) {
          me.respt = "Incripcion Registrada...!";
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    buscarInscripcion() {
      this.listado = 1;
      this.listar("");
    },
    listar(buscar) {
      let me = this;
      this.arrayInscripcion = [];

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
    listarEstudiante(buscar) {
      let me = this;
      var url = "/estudiante?buscar=" + buscar;
      axios
        .get(url)
        .then(function (response) {
          me.arrayEstudiante = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },

    listarCurso(buscar) {
      let me = this;
      var url = "/curso?buscar=" + buscar;
      axios
        .get(url)
        .then(function (response) {
          me.arrayCurso = response.data;
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
    modificarDetalle(id) {
      let me = this;
      me.listado = 0;
      this.respt = "";
      let arrayInscripcionT;
      var url = "/inscripcion/obtenerCabecera?id=" + id;
      axios
        .get(url)
        .then(function (response) {
          arrayInscripcionT = response.data.inscripcion;

          console.log(arrayInscripcionT);
          me.idEstudiante = arrayInscripcionT[0].idEstudiante;
          me.estudianteNombre = arrayInscripcionT[0].estudianteNombre;
          me.estudianteApellidos = arrayInscripcionT[0].estudianteApellidos;
          me.idCurso = arrayInscripcionT[0].idCurso;
          me.cursoNombre = arrayInscripcionT[0].cursoNombre;
          me.cursoGestion = arrayInscripcionT[0].cursoGestion;
          me.fecha = arrayInscripcionT[0].fechaInscripcion;
          console.log(me);
          console.log(arrayInscripcionT.idEstudiantes);
          console.log(typeof arrayInscripcionT);
        })
        .catch(function (error) {
          console.log(error);
        });

      var url1 = "/inscripcion/obtenerDetalles?id=" + id;
      axios
        .get(url1)
        .then(function (response) {
          me.arrayDetalle = response.data.detalle;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
  mounted() {
    console.log("Component mounted.");
    //this.listarApoderado(this.buscar);
  },
};
</script>
