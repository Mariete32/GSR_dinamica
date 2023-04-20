<?php
require_once "./BBDD/database.php";
require_once "./classes/usuarios.php";
require_once "./CRUDs/directiva_CRUD.php";
require_once "./CRUDs/eventos_CRUD.php";
require_once "./CRUDs/cargos_CRUD.php";
require_once "./CRUDs/recurso_CRUD.php";
require_once "./CRUDs/inscritos_CRUD.php";
require_once "./CRUDs/usuarios_CRUD.php";
session_start();
//si los campos estan rellenos
if (isset($_POST["usuario"]) && isset($_POST["contraseña"])) {

    //creamos el objeto crudusuario para gestionar el login
    $crudusuario = new CrudUsuario();
    $usuario = $crudusuario->obtenerRolUsuario($_POST["usuario"], $_POST["contraseña"]);
    $rol = $usuario->get_user_rol();
    //creamos el objeto usuario con los datos introducidos
    //$login = new Usuario($_POST["usuario"], $_POST["contraseña"]);
    //$cookie = $_POST["usuario"];
    // Guardar el valor de la variable de sesión en una cookie
    //setcookie('sesion', $cookie, time() + 60, '/'); // 86400 segundos = 1 día (86400 * 30)
    //si el usuario o contraseña son incorrectos la bbdd no devuelve el id
    if ($rol == 0 || $rol == null) {
        header("Location: ./login.php?error=1");
    } else {
        //guardamos el usuario en la session para que no nos redirija a index si ya hemos iniciado sesion
        $_SESSION["usuario"] = $_POST["usuario"];
        $_SESSION["nivel"] = $rol;
        //si marca recordar credenciales, almacenamos el ID en la coockie
    }
    //if ($_POST["usuario"] == "admin" || $_POST["usuario"] == "ADMIN") {
    //guardamos el nivel en la session para que no nos redirija a login si ya hemos iniciado sesion
    //  $_SESSION["nivel"] = 1;
    //} else {
    //  $_SESSION["nivel"] = 2;
    //}
    //si ya estamos logueados no nos redirije a login.php
} else if (!isset($_SESSION["nivel"])) {
    header("Location: ./login.php");
//si se selecciona un año, mostramos la junta directiva de ese año en otro select
} else if (isset($_POST["anyos"])) {
    $anyos = $_POST["anyos"];

    //si seleccionamos directivo, mostramos sus datos en el formulario para su modificacion o eliminacion
} else if (isset($_POST["directivo"])) {
    $idDirectivo = $_POST["directivo"];
} else if (isset($_POST["eve_id"])) {
    $eve_id = $_POST["eve_id"];

    //si seleccionamos directivo, mostramos sus datos en el formulario para su modificacion o eliminacion
} else if (isset($_POST["rutaRecurso"])) {
    $rutaRecurso = $_POST["rutaRecurso"];
} else if (isset($_POST["recursoSeleccionado"])) {
    $recursoSeleccionado = $_POST["recursoSeleccionado"];

    //si seleccionamos usuario, mostramos sus datos en el formulario para su modificacion o eliminacion
} else if (isset($_POST["rutaRecurso"])) {
    $rutaRecurso = $_POST["rutaRecurso"];
} else if (isset($_POST["usuarioSeleccionado"])) {
    $usuarioSeleccionado = $_POST["usuarioSeleccionado"];
    //----------------JUNTA DIRECTIVA--------------
    //si seleccionamos eliminar desde el formulario, eliminamos el directivo en la BBDD
} else if (isset($_POST["idEliminarDirectivo"])) {
    $idEliminar = $_POST["idEliminarDirectivo"];
    $directivoEliminado = new CrudDirectiva();
    $directivoEliminado->eliminarDirectivo($idEliminar);

//si seleccionamos crear desde el formulario, insertamos el directivo en la BBDD
} else if (isset($_POST["directivoCrear"])) {
    $anyoNew = $_POST["anyoNew"];
    $nombreNew = $_POST["nombreNew"];
    $apellidosNew = $_POST["apellidosNew"];
    $Urlimg = $_POST["Urlimg"];
    $cargoId = $_POST["cargoId"];
    $directivoNuevo = new Junta_directiva($nombreNew, $apellidosNew, $Urlimg, $anyoNew, $cargoId);
    $directivoCreado = new CrudDirectiva();
    $exito = $directivoCreado->insertarDirectivo($directivoNuevo);

//si seleccionamos modificar desde el formulario, modificamos el directivo en la BBDD
} else if (isset($_POST["idModificarDirectivo"])) {
    $anyoNew = $_POST["anyoNew"];
    $nombreNew = $_POST["nombreNew"];
    $apellidosNew = $_POST["apellidosNew"];
    $Urlimg = $_POST["Urlimg"];
    $cargoId = $_POST["cargoId"];
    $directivoEditado = new Junta_directiva($nombreNew, $apellidosNew, $Urlimg, $anyoNew, $cargoId);
    $directivoEditado->set_jun_id($_POST["idModificarDirectivo"]);
    $directivoCreado = new CrudDirectiva();
    $directivoCreado->editarDirectivo($directivoEditado);

    //-----------------------------EVENTOS--------------------------
    //si seleccionamos modificar desde el formulario, modificamos el directivo en la BBDD
} else if (isset($_POST["idModificarEvento"])) {
    $tituloNew = $_POST["TituloNew"];
    $descripcionNew = $_POST["DescripcionNew"];
    $fechaNew = $_POST["FechaNew"];
    $fechaLimiteNew = $_POST["fechaLimiteNew"];
    $urlimg = $_POST["Urlimg"];

    /*si tiene marcada la casilla de suscripcion cambiamos el valor de la variable para la BBDD
    en caso contrario le asignamos un 0*/
    if (isset($_POST["suscripcionNew"])) {
      $fechaLimiteNew = $_POST["fechaLimiteNew"];
      $suscripcionNew = $_POST["suscripcionNew"];
      $suscripcionNew = ($suscripcionNew == "on") ? 1 : 0;
    } else { 
      $suscripcionNew = 0;
      $fechaLimiteNew = NULL;
    }
    $eventoEditado = new Evento($fechaNew, $fechaLimiteNew, $tituloNew, $descripcionNew, $suscripcionNew, $urlimg);
    $eventoEditado->set_eve_id($_POST["idModificarEvento"]);
    $eventoCreado = new CrudEventos();
    $eventoCreado->editarEvento($eventoEditado);

//si seleccionamos eliminar desde el formulario, eliminamos el directivo en la BBDD
} else if (isset($_POST["idEliminarEvento"])) {
    $idEliminar = $_POST["idEliminarEvento"];
    $eventoEliminado = new CrudEventos();
    $eventoEliminado->eliminarEvento($idEliminar);
//si seleccionamos crear desde el formulario, insertamos el directivo en la BBDD
} else if (isset($_POST["eventoCrear"])) {
    var_dump($_POST);
    $TituloNew = $_POST["TituloNew"];
    $DescripcionNew = $_POST["DescripcionNew"];
    $fechaNew = $_POST["fechaNew"];
    $Urlimg = $_POST["Urlimg"];
    if (isset($_POST["suscripcionNew"])) {
      $fechaLimiteNew = $_POST["fechaLimiteNew"];
      $suscripcionNew = $_POST["suscripcionNew"];
      $suscripcionNew = ($suscripcionNew == "on") ? 1 : 0;
    } else { 
      $suscripcionNew = 0;
      $fechaLimiteNew = NULL;
    }
    $eventoNuevo = new Evento($fechaNew, $fechaLimiteNew, $TituloNew, $DescripcionNew, $suscripcionNew, $Urlimg);
    $eventoCreado = new CrudEventos();
    $exito = $eventoCreado->insertarEvento($eventoNuevo);

//-----------------------------USUARIOS--------------------------
    //si seleccionamos eliminar desde el formulario, eliminamos el directivo en la BBDD
} else if (isset($_POST["idEliminarUsuario"])) {
    $idEliminar = $_POST["idEliminarUsuario"];
    $usuarioEliminado = new CrudUsuario();
    $usuarioEliminado->eliminarUsuario($idEliminar);

//si seleccionamos crear desde el formulario, insertamos el directivo en la BBDD
} else if (isset($_POST["usuarioCrear"])) {
    $loginNew = $_POST["loginNew"];
    $passwordNew = $_POST["passwordNew"];
    $rolNew = $_POST["rolNew"];
    $usuarioNuevo = new Usuario($loginNew, $passwordNew, $rolNew);
    $usuarioCreado = new CrudUsuario();
    $exito = $usuarioCreado->insertarUsuario($usuarioNuevo);

//si seleccionamos modificar desde el formulario, modificamos el directivo en la BBDD
} else if (isset($_POST["idModificarUsuario"])) {
    $loginNew = $_POST["loginNew"];
    $passwordNew = $_POST["passwordNew"];
    $rolNew = $_POST["rolNew"];
    $usuarioEditado = new Usuario($loginNew, $passwordNew, $rolNew);
    $usuarioEditado->set_user_id($_POST["idModificarUsuario"]);
    $usuarioCreado = new CrudUsuario();
    $usuarioCreado->editarUsuario($usuarioEditado);

    //-----------------------------RECURSO--------------------------
    //si seleccionamos modificar desde el formulario, modificamos el recurso en la BBDD
} else if (isset($_POST["idModificarRecurso"])) {
    $nombreNew = $_POST["nombreNew"];
    $anyoNew = $_POST["anyoNew"];
    $recursoNew = $_POST["recursoNew"];
    $urlNew = $_POST["urlNew"];
    $recursoEditado = new recurso($nombreNew, $recursoNew, $anyoNew, $urlNew);
    $recursoEditado->set_rec_id($_POST["idModificarRecurso"]);
    $recursoCreado = new CrudRecurso();
    $recursoCreado->editarRecurso($recursoEditado);

//si seleccionamos eliminar desde el formulario, eliminamos el directivo en la BBDD
} else if (isset($_POST["idEliminarRecurso"])) {
    $idEliminar = $_POST["idEliminarRecurso"];
    $recursoEliminado = new CrudRecurso();
    $recursoEliminado->eliminarRecurso($idEliminar);

//si seleccionamos crear desde el formulario, insertamos el directivo en la BBDD
} else if (isset($_POST["recursoCrear"])) {
    $anyoNew = $_POST["anyoNew"];
    $nombreNew = $_POST["nombreNew"];
    $tipoNew = $_POST["recursoNew"];
    //En la página "guardar_imagen.php", verifica que se haya subido un archivo y que sea una imagen válida:
    if (isset($_FILES['imagenNew']) && $_FILES['imagenNew']['error'] == 0) {
        //prefijos para generar los nombres de las imagenes
        $tipoFM = 'FM_';
        $tipoFMI = 'FMI_';
        $tipoP = 'P_';
        $tipoPI = 'PI_';
        $tipoEVENTO = 'Evento_';
        $tipoBOCETO = 'Boceto_';
        $tipoPREMIO = 'Premio_';
        $tipoLLIBRET = 'Llibret_';

        //cambiamos el nombre de la imagen por uno estandar en la carpeta directiva
        //En la función move_uploaded_file, el primer argumento es la ubicación temporal del archivo subido y
        //el segundo argumento es la ubicación a la que deseas mover el archivo. En este caso,
        //estamos moviendo el archivo a una carpeta con la ruta "ruta/a/la/carpeta/" y utilizando el nombre original del archivo.
        if ($tipoNew == "FM_imagen") {
            $nombreNuevo = $tipoFM . $_FILES['imagenNew']['name'];
            $rutaNew = './imagenes/directiva/' . $nombreNuevo;
            /*Si el archivo es una imagen válida, puedes moverlo a la carpeta deseada utilizando la función move_uploaded_file:*/
            move_uploaded_file($_FILES['imagenNew']['tmp_name'], './imagenes/directiva/' . $nombreNuevo);
        } else if ($tipoNew == "FMI_imagen") {
            $nombreNuevo = $tipoFMI . $_FILES['imagenNew']['name'];
            $rutaNew = './imagenes/directiva/' . $nombreNuevo;
            /*Si el archivo es una imagen válida, puedes moverlo a la carpeta deseada utilizando la función move_uploaded_file:*/
            move_uploaded_file($_FILES['imagenNew']['tmp_name'], './imagenes/directiva/' . $nombreNuevo);
        } else if ($tipoNew == "P_imagen") {
            $nombreNuevo = $tipoP . $_FILES['imagenNew']['name'];
            $rutaNew = './imagenes/directiva/' . $nombreNuevo;

            /*Si el archivo es una imagen válida, puedes moverlo a la carpeta deseada utilizando la función move_uploaded_file:*/
            move_uploaded_file($_FILES['imagenNew']['tmp_name'], './imagenes/directiva/' . $nombreNuevo);
        } else if ($tipoNew == "PI_imagen") {
            $nombreNuevo = $tipoPI . $_FILES['imagenNew']['name'];
            $rutaNew = './imagenes/directiva/' . $nombreNuevo;
            /*Si el archivo es una imagen válida, puedes moverlo a la carpeta deseada utilizando la función move_uploaded_file:*/
            move_uploaded_file($_FILES['imagenNew']['tmp_name'], './imagenes/directiva/' . $nombreNuevo);

            //cambiamos el nombre de la imagen por uno estandar en la carpeta imagenesEventos
        } else if ($tipoNew == "Evento_imagen") {
            $nombreNuevo = $tipoEVENTO . $_FILES['imagenNew']['name'];
            $rutaNew = './imagenes/imagenesEventos/' . $nombreNuevo;
            /*Si el archivo es una imagen válida, puedes moverlo a la carpeta deseada utilizando la función move_uploaded_file:*/
            move_uploaded_file($_FILES['imagenNew']['tmp_name'], './imagenes/imagenesEventos/' . $nombreNuevo);

            //cambiamos el nombre de la imagen por uno estandar en la carpeta Bocetos
        } else if ($tipoNew == "Boceto_imagen") {
            $nombreNuevo = $tipoBOCETO . $_FILES['imagenNew']['name'];
            $rutaNew = './imagenes/Bocetos/' . $nombreNuevo;
            /*Si el archivo es una imagen válida, puedes moverlo a la carpeta deseada utilizando la función move_uploaded_file:*/
            move_uploaded_file($_FILES['imagenNew']['tmp_name'], './imagenes/Bocetos/' . $nombreNuevo);

            //cambiamos el nombre de la imagen por uno estandar en la carpeta Premios
        } else if ($tipoNew == "Premio_imagen") {
            $nombreNuevo = $tipoPREMIO . $_FILES['imagenNew']['name'];
            $rutaNew = './llibrets/' . $nombreNuevo;
            /*Si el archivo es una imagen válida, puedes moverlo a la carpeta deseada utilizando la función move_uploaded_file:*/
            move_uploaded_file($_FILES['imagenNew']['tmp_name'], './imagenes/Premios/' . $nombreNuevo);
        } else if ($tipoNew == "pdf_llibret") {
            $nombreNuevo = $tipoLLIBRET . $_FILES['imagenNew']['anyoNew'];
            $rutaNew = './llibrets/' . $nombreNuevo;
            /*Si el archivo es una imagen válida, puedes moverlo a la carpeta deseada utilizando la función move_uploaded_file:*/
            move_uploaded_file($_FILES['imagenNew']['tmp_name'], './llibrets/' . $nombreNuevo);
        }
        $recursoNuevo = new Recurso($nombreNew, $anyoNew, $tipoNew, $rutaNew);
        $directivoCreado = new CrudRecurso();
        $exito = $directivoCreado->insertarDirectivo($recursoNuevo);
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="anos_historia.js"></script>
  <link rel="stylesheet" href="estilos.css">
  <link rel="stylesheet" href="estilos2.css">
  <title>GSR</title>
</head>

<body>


  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v14.0"
    nonce="IX9rRk67"></script>
  <header>
    <div class="container">
      <div class="row">
        <div class="align-self-center col-lg-2 col-md-2 col-sm-3 col-3">
          <img src="imagenes/escudo-falla.jpg" class="img-fluid rounded float-start"
            alt="falla Guillem Sorolla i Recaredo">
        </div>
        <div class="align-self-center text-center col-lg-8 col-md-8 col-sm-6 col-6">
          <p class="display-4" id="nombreFalla">Falla Guillem Sorolla i Recaredo</p>
          <p class="h3" id="historia"></p>
        </div>
        <div class="align-self-center col-lg-2 col-md-2 col-sm-3 col-3">
          <div class="text-center align-self-bottom">LOTERIA</div>
          <a href="https://www.labrujitagenerosa.es/loteria-empresas-verlot.php?GadMS=1">
            <svg class="align-self-center col-12" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500"
              width="300px" id="blobSvg" filter="blur(0px)" style="opacity: 1;" transform="rotate(-9)">
              <image x="0" y="0" width="100%" height="100%" clip-path="url(#shape)" href="imagenes/loteria.jpeg"
                preserveAspectRatio="none"></image>
              <defs>
                <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                  <stop offset="0%" style="stop-color: rgb(133, 106, 71);"></stop>
                  <stop offset="100%" style="stop-color: rgb(133, 106, 71);"></stop>
                </linearGradient>
              </defs>
              <clipPath id="shape">
                <path id="blob" fill="url(#gradient)">
                  <animate attributeName="d" dur="2300ms" repeatCount="indefinite"
                    values="M440.5,320.5Q418,391,355.5,442.5Q293,494,226,450.5Q159,407,99,367Q39,327,31.5,247.5Q24,168,89,125.5Q154,83,219.5,68Q285,53,335.5,94.5Q386,136,424.5,193Q463,250,440.5,320.5Z;M453.78747,319.98894Q416.97789,389.97789,353.96683,436.87838Q290.95577,483.77887,223.95577,447.43366Q156.95577,411.08845,105.64373,365.97789Q54.33169,320.86732,62.67444,252.61056Q71.01719,184.3538,113.01965,135.21007Q155.02211,86.06634,220.52211,66.46683Q286.02211,46.86732,335.5,91.94472Q384.97789,137.02211,437.78747,193.51106Q490.59704,250,453.78747,319.98894Z;M411.39826,313.90633Q402.59677,377.81265,342.92059,407.63957Q283.24442,437.46649,215.13648,432.5428Q147.02853,427.61911,82.23325,380.9572Q17.43796,334.29529,20.45223,250.83809Q23.46649,167.38089,82.5856,115.05707Q141.70471,62.73325,212.19045,63.73015Q282.67618,64.72705,352.67308,84.79839Q422.66998,104.86972,421.43486,177.43486Q420.19974,250,411.39826,313.90633Z;M440.5,320.5Q418,391,355.5,442.5Q293,494,226,450.5Q159,407,99,367Q39,327,31.5,247.5Q24,168,89,125.5Q154,83,219.5,68Q285,53,335.5,94.5Q386,136,424.5,193Q463,250,440.5,320.5Z;">
                  </animate>
                </path>
              </clipPath>
            </svg>
          </a>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light btn-azulclaro">
      <div class="container-fluid ">
        <a class="navbar-brand " href="index.html">INICIO</a>
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="historia.php">Historia</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="premios.php">Premios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="eventos.php">Eventos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="juntas.php">Juntas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="falleras_majores.php">Falleras mayores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="presidentes.php">Presidentes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="monumentos.php">Fallas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="libros.php">Llibrets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="directiva.php">Junta directiva</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="imagenes.php">Himno</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="programacion_fallera.php">Semana fallera</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="cuotas.php">Cuotas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="contacto.php">Contacto</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="login.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
              </svg>
              </a>
            </li>

            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <center>
  <?php

if ($_SESSION["nivel"] == 1) {
    //
    //..............JUNTA DIRECTIVA..................
    //
    //formulario de Seleccion de fallera para insertar los datos en el formulario de modificar
    echo '<p class="mt-2"><strong> EDITAR JUNTA DIRECTIVA</strong></p>';
    echo '<div class="container">';
    echo '<div class="row">';
    echo ' <form action=edicion.php method=POST class= "mt-4 col-lg-2 col-md-4 col-sm-12">';
    $directivo = new CrudDirectiva();
    $directivo->anyos();
    echo '<button type="submit" class="btn m-1  btn-success">Selecionar</button>';
    echo '</form>';
    if (isset($anyos)) {
        echo ' <form action=edicion.php method=POST class= "mt-4 col-lg-2 col-md-4 col-sm-12">';
        $directivos = $directivo->nombresDirectivos($anyos);
        echo '<button type="submit" class="btn m-1  btn-success">Selecionar</button>';
        echo '</form>';}
    if (isset($idDirectivo)) {
        //obtenemos los datos del directivo seleccionado para ponerlos en el formulario
        $datosDirectivo = $directivo->datosDirectivoID($idDirectivo);
        $nombre = $datosDirectivo->get_jun_nombre();
        $apellidos = $datosDirectivo->get_jun_apellidos();
        $anyo = $datosDirectivo->get_jun_anyo();
        $imagen = $datosDirectivo->get_jun_img();
        $cargoID = $datosDirectivo->get_jun_cargo_id();
        $idEliminar = $idDirectivo;
        $idModificar = $idDirectivo;
        echo '<form action=edicion.php method=POST class= "mt-4 border col-lg-4 col-md-8 col-sm-12">';
        echo '<div class="form-group mt-2">';
        echo '<label for="nombre">Nombre</label>';
        echo '<input type="text" class="form-control" id="nombre" name="nombreNew" value="' . $nombre . '" placeholder="' . $nombre . '">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="apellidos">Apellidos</label>';
        echo '<input type="text" class="form-control" id="apellidos" name="apellidosNew" value="' . $apellidos . '" placeholder="' . $apellidos . '">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="anyo">Año</label>';
        echo '<input type="number" class="form-control" id="anyo" name="anyoNew" value=' . $anyo . ' placeholder="' . $anyo . '">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="Urlimg">Seleccione cargo</label>';
        echo "<select id='Urlimg'class='form-select form-select-sm' name='Urlimg' >";
        //mostramos l cargo actual del directivo seleccionado
        $crudCargos = new CrudCargos();
        $cargoActual = $crudCargos->cargoActual($cargoID);
        echo "esto es $cargoActual)";
        echo "<option value='$cargoActual'> $cargoActual</option>";
        //mostramos la lista de los cargos
        $crudCargos->listadoCargos();
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="Urlimg">Selecciona imagen</label>';
        echo "<select id='Urlimg'class='form-select form-select-sm' name='Urlimg' >";
        echo "<option value='$imagen'> $imagen</option>";
        //mostramos las rutas de todas las imagenes
        $recurso = new CrudRecurso();
        $recurso->listadoRecurso();
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<input type=hidden name="idModificarDirectivo" value="' . $idModificar . '">';
        echo '</div>';
        echo '<button type="submit" class="m-2 btn btn-septiembre">Modificar</button>';
        echo '</form>';
        echo '<form action=edicion.php method=POST class= " mt-4 col-lg-2 col-md-4 col-sm-12">';
        echo '<div class="form-group mt-2">';
        echo '<label for="eliminar">Nombre</label>';
        echo '<input type="text" class="form-control " id="eliminar"  placeholder="' . $nombre . ' ' . $apellidos . '">';
        echo '<input type=hidden name="idEliminarDirectivo" value="' . $idEliminar . '">';
        echo '</div>';
        echo '<button type="submit" class="btn m-1  btn-danger">Eliminar</button>';
        echo '</form>';
        echo '<hr>';
    } else {
        // Formulario de crear un directivo
        echo ' <form action=edicion.php method=POST enctype="multipart/form-data" class="mt-4 border col-lg-4 col-md-8 col-sm-12">';
        echo '<div class="form-group mt-2">';
        echo '<label for="nombre">Nombre</label>';
        echo '<input type="text" class="form-control" id="nombre" name="nombreNew" aria-describedby="nombreHelp" placeholder="Nombre">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="apellidos">Apellidos</label>';
        echo '<input type="text" class="form-control" id="apellidos" name="apellidosNew" placeholder="Apellidos">';
        echo '</div>';
        echo '<div class="form-group mt-2" >';
        echo '<label for="anyo">Año</label>';
        echo '<input type="number" class="form-control" id="anyo" name="anyoNew" placeholder="Año">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="Urlimg">Selecciona cargo</label>';
        echo "<select id='Urlimg'class='form-select form-select-sm' name='Urlimg' >";
        echo "<option > Selecciona...</option>";
        //mostramos la lista de los cargos
        $listaCargos = new CrudCargos();
        $listaCargos->listadoCargos();
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="Urlimg">Selecciona ruta imagen</label>';
        echo "<select id='Urlimg'class='form-select form-select-sm' name='Urlimg' >";
        echo "<option > Selecciona...</option>";
        //mostramos las rutas de todas las imagenes
        $recurso = new CrudRecurso();
        $recurso->listadoRecurso();
        echo '<input type=hidden name="directivoCrear" value="crear">';
        echo '</div>';
        echo '<button type="submit" class="m-2 btn m-1  btn-primary">Crear</button>';
        echo '</form>';
    }
    echo '</div>';
    echo '</div>';
    echo '<hr>';
    //
    //..............EVENTOS..................
    //
    //mostramos los formularios para crear, modificar o eliminar eventos
    echo '<p class="mt-2"><strong> EDITAR EVENTOS</strong></p>';
    echo '<div class="container">';
    echo '<div class="row">';
    echo ' <form action=edicion.php method=POST class="mt-4 col-lg-3 col-md-4 col-sm-12">';
    $eventos = new CrudEventos();
    $eventos->nombresEventos();
    echo '<button type="submit" class="btn m-1  btn-success">Selecionar</button>';
    echo '</form>';
    if (isset($eve_id)) {
        $evento = $eventos->datosEvento($eve_id);
        $fechaBBDD = $evento->get_eve_fecha();
        $fecha = new DateTime($fechaBBDD); // Crear objeto DateTime a partir del string
        $fecha = date_format($fecha, 'd/m/Y'); // Formatear la fecha
        $eve_fecha_limite_inscripcion = $evento->get_eve_fecha_limite_inscripcion();
        $eve_titulo = $evento->get_eve_titulo();
        $eve_detalles = $evento->get_eve_detalles();
        $eve_suscripcion = $evento->get_eve_suscripcion();
        $eve_suscripcion = ($eve_suscripcion == 0) ? " " : "checked";
        $valor = ($eve_suscripcion == "checked") ? 1 : 0;
        $eve_url_img = $evento->get_eve_url_img();
        $idEliminarEvento = $eve_id;
        $idModificarEvento = $eve_id;
        echo ' <form action=edicion.php method=POST class="mt-4 border col-lg-4 col-md-8 col-sm-12">';
        echo '<div class="form-group mt-2">';
        echo '<label for="Titulo">Titulo</label>';
        echo '<input type="text" class="form-control" id="Titulo" name="TituloNew" value="' . $eve_titulo . ' " placeholder=' . $eve_titulo . '>';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="Descripcion">Descripcion</label>';
        echo '<input type="text" class="form-control" id="Descripcion" name="DescripcionNew" value="' . $eve_detalles . '" placeholder=' . $eve_detalles . '>';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="Fecha">Fecha</label>';
        echo '<input type="date" class="form-control" id="Fecha" name="FechaNew" value="' . $fechaBBDD . '" >';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="fechaLimite">Fecha límite de inscripción</label>';
        echo '<input type="date" class="form-control" id="fechaLimite" name="fechaLimiteNew" value="' . $eve_fecha_limite_inscripcion . '">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="Urlimg">Selecciona imagen</label>';
        echo "<select id='Urlimg'class='form-select form-select-sm' name='Urlimg' >";
        echo "<option value='$eve_url_img'> $eve_url_img</option>";
        //mostramos las rutas de todas las imagenes
        $recurso = new CrudRecurso();
        $recurso->urlEventos();
        echo '<div class="form-group mt-2 m-2">';
        echo "<input class='form-check-input' type='checkbox' name='suscripcionNew' id='validationFormCheck1' $eve_suscripcion>";
        echo '<label class="form-check-label" for="validationFormCheck1">';
        echo '  Se requiere inscribirse al evento';
        echo '</label>';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<input type=hidden name="idModificarEvento" value="' . $idModificarEvento . '">';
        echo '</div>';
        echo '<button type="submit" class="m-2 btn btn-septiembre">Modificar</button>';
        echo '</form>';
        echo '<form action=edicion.php method=POST class= "mt-4 col-lg-2 col-md-4 col-sm-12">';
        echo '<div class="form-group mt-2">';
        echo '<label for="eliminar">Nombre</label>';
        echo '<input type="text" class="form-control" id="eliminar"  placeholder="' . $eve_titulo . ' ' . $fecha . '">';
        echo '<input type=hidden name="idEliminarEvento" value="' . $idEliminarEvento . '">';
        echo '</div>';
        echo '<button type="submit" class="btn m-1  btn-danger">Eliminar</button>';
        echo '</form>';
    } else {
        //formulario de crear nuevo evento
        echo ' <form action=edicion.php method=POST enctype="multipart/form-data" class=" mt-4 border col-lg-4 col-md-8 col-sm-12">';
        echo '<div class="form-group mt-2">';
        echo '<label for="Titulo">Titulo</label>';
        echo '<input type="text" class="form-control" id="Titulo" name="TituloNew" aria-describedby="TituloHelp" placeholder="Titulo">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="Descripcion">Descripcion</label>';
        echo '<input type="text" class="form-control" id="Descripcion" name="DescripcionNew" placeholder="Descripcion">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="fecha">Fecha</label>';
        echo '<input type="date" class="form-control" id="fecha" name="fechaNew" placeholder="Fecha">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="fechaLimite">Fecha límite de inscripción</label>';
        echo '<input type="date" class="form-control" id="fechaLimite" name="fechaLimiteNew" placeholder="fechaLimite">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="Urlimg">Selecciona ruta imagen</label>';
        echo "<select id='Urlimg'class='form-select form-select-sm' name='Urlimg' >";
        echo "<option> Seleccionar imagen</option>";
        //mostramos las rutas de todas las imagenes
        $recurso = new CrudRecurso();
        $recurso->urlEventos();
        echo '<div class="form-group mt-2 m-2">';
        echo '<input class="form-check-input" type="checkbox"  id="validationFormCheck1" >';
        echo '<label class="form-check-label" for="validationFormCheck1">';
        echo '  Se requiere inscribirse al evento';
        echo '</label>';
        echo '</div>';
        echo '<input type=hidden name="eventoCrear" value="crear">';
        echo '</div>';
        echo '<button type="submit" class="m-2 btn m-1  btn-primary">Crear</button>';
        echo '</form>';
        echo ' <form action=inscritos.php method=POST class="mt-4 col-lg-3 col-md-4 col-sm-12">';
        $eventos = new CrudEventos();
        $eventos->nombresEventosSuscripcion();
        echo '<button type="submit" class="btn m-1  btn-success">Selecionar</button>';
        echo '</form>';
    }
    echo '</div>';
    echo '</div>';
    echo '<hr>';
    //
    //..............RECURSOS..................
    //
    /*
    if (isset($rutaRecurso)) {
    var_dump($rutaRecurso);
    echo ' <form action=edicion.php method=POST class= "mt-4 col-lg-2 col-md-4 col-sm-12">';
    $recursos = $recurso->nombresRecursos($rutaRecurso);
    echo '<button type="submit" class="btn m-1  btn-success">Selecionar</button>';
    echo '</form>';}
     */
    //mostramos los formularios para crear, modificar o eliminar recurso
    echo '<p class="mt-2"><strong> EDITAR IMAGENES Y LLIBRETS</strong></p>';
    echo '<div class="container">';
    echo '<div class="row">';
    echo ' <form action=edicion.php method=POST class="mt-4 col-lg-3 col-md-4 col-sm-12">';
    echo '<label for="rutaRecurso">Selecciona tipo de recurso</label>';
    echo "<select id='rutaRecurso'class='form-select form-select-md' name='rutaRecurso' >";
    echo "<option > Selecciona...</option>";
    $recurso = new CrudRecurso();
    $recurso->tiposRecursos();
    echo '<button type="submit" class="btn m-1  btn-success">Selecionar</button>';
    echo '</form>';
    //con la ruta del recurso tenemos que hacer otro select con los recursos de esa ruta
    if (isset($rutaRecurso)) {
        echo ' <form action=edicion.php method=POST class= "mt-4 col-lg-2 col-md-4 col-sm-12">';
        $recursos = $recurso->nombresRecursos($rutaRecurso);
        echo '<button type="submit" class="btn m-1  btn-success">Selecionar</button>';
        echo '</form>';}
    if (isset($recursoSeleccionado)) {
        $datosRecurso = new CrudRecurso();
        $recurso = $datosRecurso->datosRecurso($recursoSeleccionado);
        $nombre = $recurso->get_rec_nombre();
        $anyo = $recurso->get_rec_anyo();
        $tipo = $recurso->get_rec_tipo();
        $url = $recurso->get_rec_url();
        $idEliminarRecurso = $recursoSeleccionado;
        $idModificarRecurso = $recursoSeleccionado;
        echo ' <form action=edicion.php method=POST class="mt-4 border col-lg-4 col-md-8 col-sm-12">';
        echo '<div class="form-group mt-2">';
        echo '<label for="nombre">Nombre</label>';
        echo '<input type="text" class="form-control" id="nombre" name="nombreNew" value="' . $nombre . ' " placeholder=' . $nombre . '>';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="anyo">Año</label>';
        echo '<input type="number" class="form-control" id="anyo" min="2023" name="anyoNew" value=' . $anyo . ' placeholder="' . $anyo . '">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="rutaRecurso">Selecciona tipo del recurso</label>';
        echo "<select id='rutaRecurso'class='form-select form-select-md' name='recursoNew' >";
        $recurso = new CrudRecurso();
        $recurso->tiposRecursos();
        echo '</div>';
        echo "<input type=hidden name='urlNew' value='$url'>";
        /*echo '<div class="form-group mt-2">';
        //mostramos las rutas de todas las imagenes
        $recurso= new CrudRecurso();
        $recurso->listadoRecurso();
        echo '</div>';*/
        echo '<div class="form-group mt-2">';
        echo '<input type=hidden name="idModificarRecurso" value="' . $idModificarRecurso . '">';
        echo '</div>';
        echo '<button type="submit" class="m-2 btn btn-septiembre">Modificar</button>';
        echo '</form>';
        echo '<form action=edicion.php method=POST class= "mt-4 col-lg-2 col-md-4 col-sm-12">';
        echo '<div class="form-group mt-2">';
        echo '<label for="eliminar">Nombre</label>';
        echo '<input type="text" class="form-control" id="eliminar"  placeholder="' . $nombre . ' ' . $anyo . '">';
        echo '<input type=hidden name="idEliminarRecurso" value="' . $idEliminarRecurso . '">';
        echo '</div>';
        echo '<button type="submit" class="btn m-1  btn-danger">Eliminar</button>';
        echo '</form>';
    } else {
        //formulario de crear nuevo recuso
        echo ' <form action=edicion.php method=POST enctype="multipart/form-data" class=" mt-4 border col-lg-4 col-md-8 col-sm-12">';
        echo '<div class="form-group mt-2">';
        echo '<label for="nombre">Nombre</label>';
        echo '<input type="text" class="form-control" id="nombre" name="nombreNew" aria-describedby="nombreHelp" placeholder="Nombre">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="anyo">Año</label>';
        echo '<input type="number" class="form-control" id="anyo" name="anyoNew" placeholder="Año">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="rutaRecurso">Selecciona tipo del recurso</label>';
        echo "<select id='rutaRecurso'class='form-select form-select-md' name='recursoNew' >";
        $recurso = new CrudRecurso();
        $recurso->tiposRecursos();
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="imagen">Archivo</label>';
        echo '<input type="file" class="form-control-file form-control-sm" id="imagen" name="imagenNew" placeholder="seleccionar">';
        echo '<input type=hidden name="recursoCrear" value="crear">';
        echo '</div>';
        echo '<button type="submit" class="m-2 btn m-1  btn-primary">Crear</button>';
        echo '</form>';
    }
    echo '</div>';
    echo '</div>';
    echo '<hr>';
    //
    //..............USUARIOS..................
    //
    //mostramos los formularios para crear, modificar o eliminar usuarios
    echo '<p class="mt-2"><strong> EDITAR USUARIO</strong></p>';

    echo '<div class="container">';
    echo '<div class="row">';
    echo ' <form action=edicion.php method=POST class="mt-4 col-lg-2 col-md-4 col-sm-12">';
    $usuarios = new CrudUsuario();
    $usuarios->nombresUsuarios();
    echo '<button type="submit" class="btn m-1  btn-success">Selecionar</button>';
    echo '</form>';
    if (isset($usuarioSeleccionado)) {
        $datosUsuarios = new CrudUsuario();
        $usuario = $datosUsuarios->obtenerDatosUsuario($usuarioSeleccionado);
        $login = $usuario->get_user_login();
        $password = $usuario->get_user_password();
        $rol = $usuario->get_user_rol();
        $idEliminarUsuario = $usuarioSeleccionado;
        $idModificarUsuario = $usuarioSeleccionado;
        echo ' <form action=edicion.php method=POST class="mt-4 border col-lg-4 col-md-8 col-sm-12">';
        echo '<div class="form-group mt-2">';
        echo '<label for="login">Login</label>';
        echo '<input type="text" class="form-control" id="login" name="loginNew" value=' . $login . ' placeholder=' . $login . '>';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="password">Password</label>';
        echo '<input type="text" class="form-control" id="password" name="passwordNew" value=' . $password . ' placeholder=' . $password . '>';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="rol">Permisos (1=administrador 2=usuario)</label>';
        echo '<input type="number" class="form-control" min="1" max="2" id="rol" name="rolNew" value=' . $rol . ' placeholder="' . $rol . '">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<input type=hidden name="idModificarUsuario" value="' . $idModificarUsuario . '">';
        echo '</div>';
        echo '<button type="submit" class="m-2 btn btn-septiembre">Modificar</button>';
        echo '</form>';
        echo '<form action=edicion.php method=POST class= " mt-4 col-lg-2 col-md-4 col-sm-12">';
        echo '<div class="form-group mt-2">';
        echo '<label for="eliminar">Nombre</label>';
        echo '<input type="text" class="form-control" id="eliminar"  placeholder="' . $login . '">';
        echo '<input type=hidden name="idEliminarUsuario" value="' . $idEliminarUsuario . '">';
        echo '</div>';
        echo '<button type="submit" class="btn m-1  btn-danger">Eliminar</button>';
        echo '</form>';
    } else {
        //formulario de crear nuevo usuario
        echo ' <form action=edicion.php method=POST class=" mt-4 border col-lg-4 col-md-8 col-sm-12">';
        echo '<div class="form-group mt-2">';
        echo '<label for="login">Login</label>';
        echo '<input type="text" class="form-control" id="login" name="loginNew" aria-describedby="loginHelp" placeholder="login">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="password">Password</label>';
        echo '<input type="text" class="form-control" id="password" name="passwordNew" placeholder="password">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="rol">Permisos (1=administrador 2=usuario)</label>';
        echo '<input type="number" class="form-control" id="rol" name="rolNew" placeholder="Rol">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<input type=hidden name="usuarioCrear" value="crear">';
        echo '</div>';
        echo '<button type="submit" class="m-2 btn m-1  btn-primary">Crear</button>';
        echo '</form>';
    }
    echo '</div>';
    echo '</div>';
}
echo '</div>';
echo '</div>';

if ($_SESSION["nivel"] == 2) {
    //
    //..............EVENTOS..................
    //
    //mostramos los formularios para crear, modificar o eliminar eventos
    echo '<p class="mt-2"><strong> EDITAR EVENTOS</strong></p>';
    echo '<div class="container">';
    echo '<div class="row">';
    echo ' <form action=edicion.php method=POST class="mt-4 col-lg-3 col-md-4 col-sm-12">';
    $eventos = new CrudEventos();
    $eventos->nombresEventos();
    echo '<button type="submit" class="btn m-1  btn-success">Selecionar</button>';
    echo '</form>';
    if (isset($eve_id)) {
        $evento = $eventos->datosEvento($eve_id);
        $fechaBBDD = $evento->get_eve_fecha();
        $fecha = new DateTime($fechaBBDD); // Crear objeto DateTime a partir del string
        $fecha = date_format($fecha, 'd/m/Y'); // Formatear la fecha
        $eve_fecha_limite_inscripcion = $evento->get_eve_fecha_limite_inscripcion();
        $eve_titulo = $evento->get_eve_titulo();
        $eve_detalles = $evento->get_eve_detalles();
        $eve_suscripcion = $evento->get_eve_suscripcion();
        $eve_suscripcion = ($eve_suscripcion == 0) ? " " : "checked";
        $valor = ($eve_suscripcion == "checked") ? 1 : 0;
        $eve_url_img = $evento->get_eve_url_img();
        $idEliminarEvento = $eve_id;
        $idModificarEvento = $eve_id;
        echo ' <form action=edicion.php method=POST class="mt-4 border col-lg-4 col-md-8 col-sm-12">';
        echo '<div class="form-group mt-2">';
        echo '<label for="Titulo">Titulo</label>';
        echo '<input type="text" class="form-control" id="Titulo" name="TituloNew" value="' . $eve_titulo . ' " placeholder=' . $eve_titulo . '>';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="Descripcion">Descripcion</label>';
        echo '<input type="text" class="form-control" id="Descripcion" name="DescripcionNew" value="' . $eve_detalles . '" placeholder=' . $eve_detalles . '>';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="Fecha">Fecha</label>';
        echo '<input type="date" class="form-control" id="Fecha" name="FechaNew" value="' . $fechaBBDD . '" >';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="fechaLimite">Fecha límite de inscripción</label>';
        echo '<input type="date" class="form-control" id="fechaLimite" name="fechaLimiteNew" value="' . $eve_fecha_limite_inscripcion . '">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="Urlimg">Selecciona imagen</label>';
        echo "<select id='Urlimg'class='form-select form-select-sm' name='Urlimg' >";
        echo "<option value='$eve_url_img'> $eve_url_img</option>";
        //mostramos las rutas de todas las imagenes
        $recurso = new CrudRecurso();
        $recurso->urlEventos();
        echo '<div class="form-group mt-2 m-2">';
        echo "<input class='form-check-input' type='checkbox' name='suscripcionNew' id='validationFormCheck1' $eve_suscripcion>";
        echo '<label class="form-check-label" for="validationFormCheck1">';
        echo '  Se requiere inscribirse al evento';
        echo '</label>';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<input type=hidden name="idModificarEvento" value="' . $idModificarEvento . '">';
        echo '</div>';
        echo '<button type="submit" class="m-2 btn btn-septiembre">Modificar</button>';
        echo '</form>';
        echo '<form action=edicion.php method=POST class= "mt-4 col-lg-2 col-md-4 col-sm-12">';
        echo '<div class="form-group mt-2">';
        echo '<label for="eliminar">Nombre</label>';
        echo '<input type="text" class="form-control" id="eliminar"  placeholder="' . $eve_titulo . ' ' . $fecha . '">';
        echo '<input type=hidden name="idEliminarEvento" value="' . $idEliminarEvento . '">';
        echo '</div>';
        echo '<button type="submit" class="btn m-1  btn-danger">Eliminar</button>';
        echo '</form>';
    } else {
        //formulario de crear nuevo evento
        echo ' <form action=edicion.php method=POST enctype="multipart/form-data" class=" mt-4 border col-lg-4 col-md-8 col-sm-12">';
        echo '<div class="form-group mt-2">';
        echo '<label for="Titulo">Titulo</label>';
        echo '<input type="text" class="form-control" id="Titulo" name="TituloNew" aria-describedby="TituloHelp" placeholder="Titulo">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="Descripcion">Descripcion</label>';
        echo '<input type="text" class="form-control" id="Descripcion" name="DescripcionNew" placeholder="Descripcion">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="fecha">Fecha</label>';
        echo '<input type="date" class="form-control" id="fecha" name="fechaNew" placeholder="Fecha">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="fechaLimite">Fecha límite de inscripción</label>';
        echo '<input type="date" class="form-control" id="fechaLimite" name="fechaLimiteNew" placeholder="fechaLimite">';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<label for="Urlimg">Selecciona ruta imagen</label>';
        echo "<select id='Urlimg'class='form-select form-select-sm' name='Urlimg' >";
        echo "<option> Seleccionar imagen</option>";
        //mostramos las rutas de todas las imagenes
        $recurso = new CrudRecurso();
        $recurso->urlEventos();
        echo '<div class="form-group mt-2 m-2">';
        echo '<input class="form-check-input" type="checkbox"  id="validationFormCheck1" >';
        echo '<label class="form-check-label" for="validationFormCheck1">';
        echo '  Se requiere inscribirse al evento';
        echo '</label>';
        echo '</div>';
        echo '<input type=hidden name="eventoCrear" value="crear">';
        echo '</div>';
        echo '<button type="submit" class="m-2 btn m-1  btn-primary">Crear</button>';
        echo '</form>';
        echo ' <form action=inscritos.php method=POST class="mt-4 col-lg-3 col-md-4 col-sm-12">';
        $eventos = new CrudEventos();
        $eventos->nombresEventosSuscripcion();
        echo '<button type="submit" class="btn m-1  btn-success">Selecionar</button>';
        echo '</form>';
    }
    echo '</div>';
    echo '</div>';
}
?>
  <footer class="btn-azulclaro footer">
    <div class="text-center">
      <p class="">Síguenos en: </p>
      <a class="mx-2 link-light" href="https://www.facebook.com/guillemsorolla/">
        <img src="./imagenes/_facebook.png" class="rrss" alt="">
      </a>
      <a class="mx-2 link-light" href="https://twitter.com/fguillemsor_rec">
        <img src="./imagenes/_twitter.png" class="rrss" alt="">
      </a>
      <a class="mx-2 link-light" href="https://www.instagram.com/fallaguillemsorolla_recaredo/">
        <img src="./imagenes/Instagram_icon.png.webp" class="rrss" alt="">
      </a>
    </div>
    <a class="mx-5 link-dark nav-link" href="aviso_legal.html">Aviso legal</a>

  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>
</html>