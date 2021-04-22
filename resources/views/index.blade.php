<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripcion</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/app.css">
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
                            <a class="nav-link" href="#">Curso</a>
                        </li>
                        <li @click="menu=4">
                            <a class="nav-link" href="#">Buscar Notas</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Menu principal -->
            <template v-if="menu==0">
                <b>Desarrollo de aplicaciones web</b>
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
                <frmbuscarnotas></frmbuscarnotas>
            </template>
        </div>
    </div>
    <script src="js/app.js"></script>
</body>
</html>