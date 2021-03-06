<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripcion</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/app.css">
    <style>
        .masthead {
            height: 100vh;
            min-height: 500px;
            background-image: url('https://source.unsplash.com/BtbjCFUvBXs/1920x1080');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="app-body">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a @click="menu=0" href="#" class="navbar-brand">Aplicacion web para gestion de colegios</a>
                <div>
                    <ul class="navbar-nav mr-auto">
                        <li @click="menu=1">
                            <a href="#" class="nav-link">Inscripcion</a>
                        </li>
                        <li @click="menu=2">
                            <a class="nav-link" href="#">Apoderado</a>
                        </li>
                        <li @click="menu=3">
                            <a class="nav-link" href="#">Buscar Curso</a>
                        </li>
                        <li @click="menu=4">
                            <a class="nav-link" href="#">Buscar Notas</a>
                        </li>
                        <li @click="menu=5">
                            <a class="nav-link" href="#">Estudiante</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Menu principal -->
            <template v-if="menu==0">
                        <!-- Full Page Image Header with Vertically Centered Content -->
            <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="font-weight-light">Aplicacion web para la gestion academica</h1>
                    <p class="lead">Proyecto para la materia de desarrollo web</p>
                </div>
                </div>
            </div>
            </header>

            <!-- Page Content -->
            <section class="py-5">
            <div class="container">
                <h2 class="font-weight-light">Integrantes:</h2>
                <p>Daiki Chibana</p>
                <p>Mauricio Cuevas</p>
                <p>Andreu Loayza</p>
                <p>Miguel Rojas</p>
            </div>
            </section>
            </template>
            <template v-if="menu==1">
                <frminscripcion></frminscripcion>
            </template>
            <template v-if="menu==2">
                <frmapoderado></frmapoderado>
            </template>
            <template v-if="menu==3">
                <frmbuscarcurso></frmbuscarcurso>
            </template>
            <template v-if="menu==4">
                <frmejemplo></frmejemplo>
            </template>
            <template v-if="menu==5">
                <frmEstudiante></frmEstudiante>
            </template>
        </div>
    </div>
    <script src="js/app.js"></script>
</body>
</html>