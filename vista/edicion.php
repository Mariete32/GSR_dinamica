<?php
require_once "./plantillas/require.php";
session_start();
//var_dump($_POST);
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
        $conectado = (isset($_SESSION["usuario"])) ? "style='background-color: #9cfbb6;'" : 'btn-azulclaro';

        //si marca recordar credenciales, almacenamos el ID en la coockie
    }
    //si ya estamos logueados no nos redirije a login.php
} else if (!isset($_SESSION["nivel"])) {
    header("Location: ./login.php");}
//si se selecciona un año, mostramos la junta directiva de ese año en otro select
if (isset($_POST["anyos"])) {
    $anyos = $_POST["anyos"];
}
//si seleccionamos directivo, mostramos sus datos en el formulario para su modificacion o eliminacion
if (isset($_POST["directivo"])) {
    $idDirectivo = $_POST["directivo"];
}

//si seleccionamos evento, mostramos sus datos en el formulario para su modificacion o eliminacion
if (isset($_POST["eve_id"])) {
    $eve_id = $_POST["eve_id"];
    ?><script>window.addEventListener('load', function() {
        scrollEvento(); // Llamada a la función después del evento load
      });</script><?php
}
//si seleccionamos recurso, mostramos sus datos en el formulario para su modificacion o eliminacion
if (!isset($_POST["idEliminarRecurso"])) {
    if (isset($_POST["rutaRecurso"])) {
        $rutaRecurso = $_POST["rutaRecurso"];
        ?><script>window.addEventListener('load', function() {
            scrollRecurso(); // Llamada a la función después del evento load
          });</script><?php
    }
    if (isset($_POST["recursoSeleccionado"])) {
        $recursoSeleccionado = $_POST["recursoSeleccionado"];
        ?><script>window.addEventListener('load', function() {
            scrollRecurso(); // Llamada a la función después del evento load
          });</script><?php
    }
    
} 
//si seleccionamos usuario, mostramos sus datos en el formulario para su modificacion o eliminacion
if (isset($_POST["usuarioSeleccionado"])) {
    $usuarioSeleccionado = $_POST["usuarioSeleccionado"];
    ?><script>window.addEventListener('load', function() {
        scrollUsuario(); // Llamada a la función después del evento load
      });</script><?php
}

//----------------JUNTA DIRECTIVA--------------
//si seleccionamos eliminar desde el formulario, eliminamos el directivo en la BBDD
if (isset($_POST["idEliminarDirectivo"])) {
    $idEliminar = $_POST["idEliminarDirectivo"];
    $directivoEliminado = new CrudDirectiva();
    $directivoEliminado->eliminarDirectivo($idEliminar);}

//si seleccionamos crear desde el formulario, insertamos el directivo en la BBDD
if (isset($_POST["directivoCrear"])) {
    $anyoNew = $_POST["anyoNew"];
    $nombreNew = $_POST["nombreNew"];
    $apellidosNew = $_POST["apellidosNew"];
    $Urlimg = $_POST["Urlimg"];
    $cargoId = $_POST["cargoId"];
      $directivoNuevo = new Junta_directiva($nombreNew, $apellidosNew, $Urlimg, $anyoNew, $cargoId);
      $directivoCreado = new CrudDirectiva();
      $exito = $directivoCreado->insertarDirectivo($directivoNuevo);
    }

//si seleccionamos modificar desde el formulario, modificamos el directivo en la BBDD
if (isset($_POST["idModificarDirectivo"])) {
    $anyoNew = $_POST["anyoNew"];
    $nombreNew = $_POST["nombreNew"];
    $apellidosNew = $_POST["apellidosNew"];
    $Urlimg = $_POST["Urlimg"];
    $cargoId = $_POST["cargoId"];
    $directivoEditado = new Junta_directiva($nombreNew, $apellidosNew, $Urlimg, $anyoNew, $cargoId);
    $directivoEditado->set_jun_id($_POST["idModificarDirectivo"]);
    $directivoCreado = new CrudDirectiva();
    $directivoCreado->editarDirectivo($directivoEditado);}

//-----------------------------EVENTOS--------------------------
//si seleccionamos modificar desde el formulario, modificamos el directivo en la BBDD
if (isset($_POST["idModificarEvento"])) {
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
        $fechaLimiteNew = null;
    }
    $eventoEditado = new Evento($fechaNew, $fechaLimiteNew, $tituloNew, $descripcionNew, $suscripcionNew, $urlimg);
    $eventoEditado->set_eve_id($_POST["idModificarEvento"]);
    $eventoCreado = new CrudEventos();
    $eventoCreado->editarEvento($eventoEditado);}

//si seleccionamos eliminar desde el formulario, eliminamos el directivo en la BBDD
if (isset($_POST["idEliminarEvento"])) {
    $idEliminar = $_POST["idEliminarEvento"];
    $eventoEliminado = new CrudEventos();
    $eventoEliminado->eliminarEvento($idEliminar);}
//si seleccionamos crear desde el formulario, insertamos el directivo en la BBDD
if (isset($_POST["eventoCrear"])) {
    $TituloNew = $_POST["TituloNew"];
    $DescripcionNew = $_POST["DescripcionNew"];
    $fechaNew = $_POST["fechaNew"];
    $Urlimg = $_POST["Urlimg"];
    if (isset($_POST["fechaLimiteNew"])) {
        $fechaLimiteNew = $_POST["fechaLimiteNew"];
        $suscripcionNew = 1;
    } else {
        $suscripcionNew = 0;
        $fechaLimiteNew = null;
    }
    $eventoNuevo = new Evento($fechaNew, $fechaLimiteNew, $TituloNew, $DescripcionNew, $suscripcionNew, $Urlimg);
    $eventoCreado = new CrudEventos();
    $exito = $eventoCreado->insertarEvento($eventoNuevo);}

//-----------------------------USUARIOS--------------------------
//si seleccionamos eliminar desde el formulario, eliminamos el directivo en la BBDD
if (isset($_POST["idEliminarUsuario"])) {
    $idEliminar = $_POST["idEliminarUsuario"];
    $usuarioEliminado = new CrudUsuario();
    $usuarioEliminado->eliminarUsuario($idEliminar);}

//si seleccionamos crear desde el formulario, insertamos el directivo en la BBDD
if (isset($_POST["usuarioCrear"])) {
    $loginNew = $_POST["loginNew"];
    $passwordNew = $_POST["passwordNew"];
    $rolNew = $_POST["rolNew"];
    $usuarioNuevo = new Usuario($loginNew, $passwordNew, $rolNew);
    $usuarioCreado = new CrudUsuario();
    $exito = $usuarioCreado->insertarUsuario($usuarioNuevo);}

//si seleccionamos modificar desde el formulario, modificamos el directivo en la BBDD
if (isset($_POST["idModificarUsuario"])) {
    $loginNew = $_POST["loginNew"];
    $passwordNew = $_POST["passwordNew"];
    $rolNew = $_POST["rolNew"];
    $usuarioEditado = new Usuario($loginNew, $passwordNew, $rolNew);
    $usuarioEditado->set_user_id($_POST["idModificarUsuario"]);
    $usuarioCreado = new CrudUsuario();
    $usuarioCreado->editarUsuario($usuarioEditado);}

//-----------------------------RECURSO--------------------------
//si seleccionamos modificar desde el formulario, modificamos el recurso en la BBDD
if (isset($_POST["idModificarRecurso"])) {
    $nombreNew = $_POST["nombreNew"];
    $anyoNew = $_POST["anyoNew"];
    $recursoNew = $_POST["recursoNew"];
    $urlNew = $_POST["urlNew"];
    $recursoEditado = new recurso($nombreNew,  $anyoNew,$recursoNew, $urlNew);
    $recursoEditado->set_rec_id($_POST["idModificarRecurso"]);
    $recursoCreado = new CrudRecurso();
    $recursoCreado->editarRecurso($recursoEditado);}

//si seleccionamos eliminar desde el formulario, eliminamos el directivo en la BBDD
if (isset($_POST["idEliminarRecurso"])) {
    $idEliminar = $_POST["idEliminarRecurso"];
    $recursoEliminado = new CrudRecurso();
    $recursoEliminado->eliminarRecurso($idEliminar);}

//si seleccionamos crear desde el formulario, insertamos el directivo en la BBDD
if (isset($_POST["recursoCrear"])) {
    $anyoNew = $_POST["anyoNew"];
    $nombreNew = $_POST["nombreNew"];
    $tipoNew = $_POST["recursoNew"];
    //var_dump($_FILES['imagenNew']['error']);
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
          $_FILES['imagenNew']['name']=$tipoFM .$nombreNew."_".$anyoNew.".jpg";
            $nombreNuevo = $_FILES['imagenNew']['name'];
            $rutaNew = './imagenes/directiva/' . $nombreNuevo;
            /*Si el archivo es una imagen válida, puedes moverlo a la carpeta deseada utilizando la función move_uploaded_file:*/
            move_uploaded_file($_FILES['imagenNew']['tmp_name'], '../imagenes/directiva/' . $nombreNuevo);
        } else if ($tipoNew == "FMI_imagen") {
          $_FILES['imagenNew']['name']=$tipoFMI .$nombreNew."_".$anyoNew.".jpg";
            $nombreNuevo = $_FILES['imagenNew']['name'];
            $rutaNew = './imagenes/directiva/' . $nombreNuevo;
            /*Si el archivo es una imagen válida, puedes moverlo a la carpeta deseada utilizando la función move_uploaded_file:*/
            move_uploaded_file($_FILES['imagenNew']['tmp_name'], '../imagenes/directiva/' . $nombreNuevo);
        } else if ($tipoNew == "P_imagen") {
          $_FILES['imagenNew']['name']=$tipoP .$nombreNew."_".$anyoNew.".jpg";
            $nombreNuevo = $_FILES['imagenNew']['name'];
            $rutaNew = './imagenes/directiva/' . $nombreNuevo;

            /*Si el archivo es una imagen válida, puedes moverlo a la carpeta deseada utilizando la función move_uploaded_file:*/
            move_uploaded_file($_FILES['imagenNew']['tmp_name'], '../imagenes/directiva/' . $nombreNuevo);
        } else if ($tipoNew == "PI_imagen") {
          $_FILES['imagenNew']['name']=$tipoPI .$nombreNew."_".$anyoNew.".jpg";
            $nombreNuevo = $_FILES['imagenNew']['name'];
            $rutaNew = './imagenes/directiva/' . $nombreNuevo;
            /*Si el archivo es una imagen válida, puedes moverlo a la carpeta deseada utilizando la función move_uploaded_file:*/
            move_uploaded_file($_FILES['imagenNew']['tmp_name'], '../imagenes/directiva/' . $nombreNuevo);

            //cambiamos el nombre de la imagen por uno estandar en la carpeta imagenesEventos
        } else if ($tipoNew == "Evento_imagen") {
          $_FILES['imagenNew']['name']=$tipoEVENTO .$nombreNew."_".$anyoNew.".jpg";
            $nombreNuevo = $_FILES['imagenNew']['name'];
            $rutaNew = './imagenes/imagenesEventos/' . $nombreNuevo;
            /*Si el archivo es una imagen válida, puedes moverlo a la carpeta deseada utilizando la función move_uploaded_file:*/
            move_uploaded_file($_FILES['imagenNew']['tmp_name'], '../imagenes/imagenesEventos/' . $nombreNuevo);

            //cambiamos el nombre de la imagen por uno estandar en la carpeta Bocetos
        } else if ($tipoNew == "Boceto_imagen") {
          $_FILES['imagenNew']['name']=$tipoBOCETO .$nombreNew."_".$anyoNew.".jpg";
            $nombreNuevo = $_FILES['imagenNew']['name'];
            $rutaNew = './imagenes/Bocetos/' . $nombreNuevo;
            /*Si el archivo es una imagen válida, puedes moverlo a la carpeta deseada utilizando la función move_uploaded_file:*/
            move_uploaded_file($_FILES['imagenNew']['tmp_name'], '../imagenes/Bocetos/' . $nombreNuevo);

            //cambiamos el nombre de la imagen por uno estandar en la carpeta Premios
        } else if ($tipoNew == "Premio_imagen") {
          $_FILES['imagenNew']['name']=$tipoPREMIO .$nombreNew."_".$anyoNew.".jpg";
            $nombreNuevo = $_FILES['imagenNew']['name'];
            $rutaNew = './imagenes/Premios/' . $nombreNuevo;
            /*Si el archivo es una imagen válida, puedes moverlo a la carpeta deseada utilizando la función move_uploaded_file:*/
            move_uploaded_file($_FILES['imagenNew']['tmp_name'], '../imagenes/Premios/' . $nombreNuevo);
        } else if ($tipoNew == "pdf_llibret") {
          //$_FILES['imagenNew']['name']=$_FILES['imagenNew']['name'].$anyoNew.".pdf";
            $nombreNuevo =$tipoLLIBRET. $anyoNew.".pdf";
            $rutaNew = '../llibrets/' . $nombreNuevo;
            $nombreNew = "llibret";
            /*Si el archivo es una imagen válida, puedes moverlo a la carpeta deseada utilizando la función move_uploaded_file:*/
            move_uploaded_file($_FILES['imagenNew']['tmp_name'], '../llibrets/' . $nombreNuevo);
        }
        $recursoNuevo = new Recurso($nombreNew, $anyoNew, $tipoNew, $rutaNew);
        $recursoCreado = new CrudRecurso();
        $exito = $recursoCreado->insertarRecurso($recursoNuevo);
    }
}

require_once './plantillas/header_edicion.php';

echo '<center>';

if ($_SESSION["nivel"] == 1) {
    //
    //..............JUNTA DIRECTIVA..................
    //
    //formulario de Seleccion de fallera para insertar los datos en el formulario de modificar
    echo '<p class="mt-4"><strong> GESTION DE JUNTA DIRECTIVA</strong></p>';
    echo '<div class="container">';
    echo '<div class="row col-12">';
    echo ' <form action=edicion.php method=POST class= "mt-4 col-lg-2 border border-dark col-md-4 col-sm-12">';
    $directivo = new CrudDirectiva();
    $directivo->anyos();
    echo '<button type="submit" class="btn m-1  btn-success">Selecionar</button>';
    echo '</form>';
    if (isset($anyos)) {
        echo ' <form action=edicion.php method=POST class= "border btn-azulclaro border-dark mt-4 col-lg-2 col-md-4 col-sm-12">';
        $directivos = $directivo->nombresDirectivos($anyos);
        echo '<input type=hidden name="anyos" value="' . $anyos . '">';
        echo '<button type="submit" class="btn m-1  btn-success">Selecionar</button>';
        echo '</form>';}
    if (isset($idDirectivo) && isset($anyos)) {
        //obtenemos los datos del directivo seleccionado para ponerlos en el formulario
        $datosDirectivo = $directivo->datosDirectivoID($idDirectivo);
        $nombre = $datosDirectivo->get_jun_nombre();
        $apellidos = $datosDirectivo->get_jun_apellidos();
        $anyo = $datosDirectivo->get_jun_anyo();
        $imagen = $datosDirectivo->get_jun_img();
        $cargoID = $datosDirectivo->get_jun_cargo_id();
        $idEliminar = $idDirectivo;
        $idModificar = $idDirectivo;
        echo '<form action=edicion.php method=POST class= "mt-4 btn-azulclaro border border-dark col-lg-8 col-md-8 col-sm-12">';
        echo '<div class="row">';
        echo '<div class="form-group mt-2 col-lg-6 col-md-6 col-sm-12">';
        echo '<label for="nombre"><strong>Nombre</strong></label>';
        echo '<input type="text" class="form-control" id="nombre" name="nombreNew" value="' . $nombre . '" placeholder="' . $nombre . '" required>';
        echo '</div>';
        echo '<div class="mt-2 col-lg-6 col-md-6 col-sm-12">';
        echo '<label for="apellidos"><strong>Apellidos</strong></label>';
        echo '<input type="text" class="form-control" id="apellidos" name="apellidosNew" value="' . $apellidos . '" placeholder="' . $apellidos . '">';
        echo '</div>';
        echo '</div>';
        echo '<div class="row">';
        echo '<div class="form-group mt- col-lg-4 col-md-4 col-sm-122">';
        echo '<label for="anyo"><strong>Año</strong></label>';
        echo '<input type="number" class="form-control" id="anyo" name="anyoNew" value=' . $anyo . ' placeholder="' . $anyo . '" required>';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-4 col-md-4 col-sm-12">';
        echo '<label for="Urlimg"><strong>Seleccione cargo</strong></label>';
        echo "<select id='Urlimg'class='form-select form-select-sm' name='cargoId' required>";
        //mostramos el cargo actual del directivo seleccionado
        $crudCargos = new CrudCargos();
        $cargoActual = $crudCargos->cargoActual($cargoID);
        echo "<option value='$cargoID' > $cargoActual</option>";
        //mostramos la lista de los cargos
        $crudCargos->listadoCargos();
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-4 col-md-4 col-sm-12">';
        echo '<label for="Urlimg"><strong>Selecciona imagen</strong></label>';
        echo "<select id='Urlimg'class='form-select form-select-sm' name='Urlimg' >";
        echo "<option value='$imagen'> $imagen</option>";
        //mostramos las rutas de todas las imagenes
        $recurso = new CrudRecurso();
        $recurso->listadoRecurso();
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<button type="submit" name="idModificarDirectivo" value="' . $idModificar . '" class="mx-4 my-3 btn btn-septiembre">Modificar</button>';
        echo '<input type=hidden name="anyos" value="' . $anyo . '">';
        echo '<input type=hidden name="directivo" value="' . $idDirectivo . '">';
        echo '<button type="submit" name="idEliminarDirectivo" value="' . $idEliminar . '" class="btn mx-4 my-3 btn-danger">Eliminar</button>';
        echo '</div>';
        echo '</form>';

    } else {
        // Formulario de crear un directivo
        echo ' <form action=edicion.php method=POST enctype="multipart/form-data" class="mt-4 border border-dark
  col-lg-8 col-md-8 col-sm-12">';
        echo '<div class="row ">';
        echo '<div class="form-group mt-2 col-lg-6 col-md-6 col-sm-12">';
        echo '<label for="nombre"><strong>Nombre</strong></label>';
        echo '<input type="text" class="form-control" id="nombre" name="nombreNew" aria-describedby="nombreHelp" placeholder="Nombre" required>';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-6 col-md-6 col-sm-12">';
        echo '<label for="apellidos"><strong>Apellidos</strong></label>';
        echo '<input type="text" class="form-control" id="apellidos" name="apellidosNew" placeholder="Apellidos">';
        echo '</div>';
        echo '</div>';
        echo '<div class="row">';
        echo '<div class="form-group mt-2 col-lg-4 col-md-6 col-sm-12" >';
        echo '<label for="anyo"><strong>Año</strong></label>';
        echo '<input type="number" class="form-control form-control-sm" id="anyo" name="anyoNew" placeholder="Año" required>';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-4 col-md-6 col-sm-12">';
        echo '<label for="cargoId"><strong>Selecciona cargo</strong></label>';
        echo "<select id='cargoId'class='form-select form-select-sm' name='cargoId' required>";
        echo "<option selected disabled value=''> Selecciona...</option>";
        //mostramos la lista de los cargos
        $listaCargos = new CrudCargos();
        $listaCargos->listadoCargos();
        echo '</div>';
        echo '<div class="form-group  mt-2 col-lg-4 col-md-6 col-sm-12">';
        echo '<label for="Urlimg"><strong>Selecciona ruta imagen</strong></label>';
        echo "<select id='Urlimg'class='form-select form-select-sm' name='Urlimg' >";
        echo "<option > Selecciona...</option>";
        //mostramos las rutas de todas las imagenes
        $recurso = new CrudRecurso();
        $recurso->listadoRecurso();
        echo '<input type=hidden name="directivoCrear" value="crear">';
        echo '</div>';
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
    echo '<p class="mt-5"><strong> GESTION DE EVENTOS</strong></p>';
    echo '<div class="container">';
    echo '<div class="row col-12">';
    echo '<div class="row col-lg-3 col-md-3 col-sm-12">';
    echo ' <form action=edicion.php method=POST class="border border-dark mt-4 col-12">';
    $eventos = new CrudEventos();
    $eventos->nombresEventos();
    echo '<button type="submit" class="btn m-1  btn-success">Selecionar</button>';
    echo '</form>';
    echo '</form>';
    echo ' <form action=inscritos.php method=POST class="border border-dark mt-4 col-12">';
    $eventos = new CrudEventos();
    $eventos->nombresEventosSuscripcion();
    echo '<button type="submit" class="btn m-1  btn-success">Selecionar</button>';
    echo '</form>';
    echo '</div>';
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
        echo '<div class="row col-lg-9 col-md-9 col-sm-12">';
        echo ' <form action=edicion.php method=POST class="m-4 btn-azulclaro border border-dark
 ">';
        echo '<div class="row ">';
        echo '<div class="form-group mt-2 col-lg-4 col-md-6 col-sm-12">';
        echo '<label for="Titulo"><strong>Titulo</strong></label>';
        echo '<input type="text" class="form-control" id="Titulo" name="TituloNew" value="' . $eve_titulo . ' " placeholder=' . $eve_titulo . '>';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-8 col-md-6 col-sm-12">';
        echo '<label for="Descripcion"><strong>Descripcion</strong></label>';
        echo '<input type="text" class="form-control" id="Descripcion" name="DescripcionNew" value="' . $eve_detalles . '" placeholder=' . $eve_detalles . '>';
        echo '</div>';
        echo '</div>';
        echo '<div class="row ">';
        echo '<div class="form-group mt-2 col-lg-4 col-md-6 col-sm-12">';
        echo '<label for="Fecha"><strong>Fecha</strong></label>';
        echo '<input type="date" class="form-control" id="Fecha" name="FechaNew" value="' . $fechaBBDD . '" >';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-4 col-md-6 col-sm-12">';
        echo '<label for="fechaLimite"><strong>Fecha límite de inscripción</strong></label>';
        echo '<input type="date" class="form-control" id="fechaLimite" name="fechaLimiteNew" value="' . $eve_fecha_limite_inscripcion . '">';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-4 col-md-6 col-sm-12">';
        echo '<label for="Urlimg"><strong>Selecciona imagen</strong></label>';
        echo "<select id='Urlimg'class='form-select form-select-sm' name='Urlimg' >";
        echo "<option value='$eve_url_img'> $eve_url_img</option>";
        //mostramos las rutas de todas las imagenes
        $recurso = new CrudRecurso();
        $recurso->urlEventos();
        echo '</div>';
        echo '<div class="form-group mt-2  col-12">';
        echo "<input class='mx-2 form-check-input' type='checkbox' name='suscripcionNew' id='validationFormCheck1' $eve_suscripcion>";
        echo '<label class="form-check-label" for="validationFormCheck1"><strong>';
        echo '  Se requiere inscribirse al evento';
        echo '</strong></label>';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<button type="submit" name="idModificarEvento" value="' . $idModificarEvento . '" class="mx-4 my-3 btn btn-septiembre">Modificar</button>';
        echo '<button type="submit" name="idEliminarEvento" value="' . $idEliminarEvento . '"class="btn mx-5 my-3  btn-danger">Eliminar</button>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
    } else {
        //formulario de crear nuevo evento
        echo '<div class="row col-lg-9 col-md-9 col-sm-12">';
        echo ' <form action=edicion.php method=POST enctype="multipart/form-data" class="col-12 mt-4 border border-dark
 ">';
        echo '<div class="row ">';
        echo '<div class="form-group mt-2 col-lg-4 col-md-6 col-sm-12">';
        echo '<label for="Titulo"><strong>Titulo</strong></label>';
        echo '<input type="text" class="form-control" id="Titulo" name="TituloNew" aria-describedby="TituloHelp" placeholder="Titulo" required>';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-8 col-md-6 col-sm-12">';
        echo '<label for="Descripcion"><strong>Descripcion</strong></label>';
        echo '<input type="text" class="form-control" id="Descripcion" name="DescripcionNew" placeholder="Descripcion">';
        echo '</div>';
        echo '</div>';
        echo '<div class="row ">';
        echo '<div class="form-group mt-2 col-lg-4 col-md-6 col-sm-12">';
        echo '<label for="fecha"><strong>Fecha</strong></label>';
        echo '<input type="date" class="form-control form-control-sm" id="fecha" name="fechaNew" placeholder="Fecha" required>';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-4 col-md-6 col-sm-12">';
        echo '<label for="fechaLimite"><strong>Fecha límite de inscripción</strong></label>';
        echo '<input type="date" class="form-control form-control-sm" id="fechaLimite" name="fechaLimiteNew" placeholder="fechaLimite">';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-4 col-md-6 col-sm-12">';
        echo '<label for="Urlimg"><strong>Selecciona ruta imagen</strong></label>';
        echo "<select id='Urlimg'class='form-select form-select-sm' name='Urlimg' >";
        echo "<option><strong> Seleccionar imagen</strong></option>";
        //mostramos las rutas de todas las imagenes
        $recurso = new CrudRecurso();
        $recurso->urlEventos();
        echo '</div>';
        echo '</div>';
        echo '<div class="row ">';
        echo '<input type=hidden name="eventoCrear" value="crear">';     
        echo '</div>';
        echo '<button type="submit" class="m-4 btn m-1  btn-primary">Crear</button>';
        echo '</form>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    echo '<hr>';
    //
    //..............RECURSOS..................
    //
    //mostramos los formularios para crear, modificar o eliminar recurso
    echo '<p class="mt-5"><strong> GESTION DE ARCHIVOS</strong></p>';
    echo '<div class="container">';
    echo '<div class="row col-12">';
    echo ' <form action=edicion.php method=POST class="border border-dark mt-4 col-lg-3 col-md-3 col-sm-12">';
    echo '<label class="fw-bold" for="rutaRecurso">Selecciona fichero</label>';
    echo "<select id='rutaRecurso'class='form-select form-select-md' name='rutaRecurso' >";
    echo "<option selected disabled value=''> Selecciona...</option>";
    $recurso = new CrudRecurso();
    $recurso->tiposRecursos();
    echo '<button type="submit" class="btn m-1  btn-success">Selecionar</button>';
    echo '</form>';
    //con la ruta del recurso tenemos que hacer otro select con los recursos de esa ruta
    if (isset($rutaRecurso)) {
        echo ' <form action=edicion.php method=POST class= "border border-dark btn-azulclaro mt-4 col-lg-2 col-md-2 col-sm-12">';
        $recursos = $recurso->nombresRecursos($rutaRecurso);
        echo '<input type=hidden name="rutaRecurso" value="' . $rutaRecurso . '">';
        echo '<button type="submit" class="btn m-1  btn-success">Selecionar</button>';
        echo '</form>';}
    if (isset($recursoSeleccionado) && isset($rutaRecurso)) {
        $datosRecurso = new CrudRecurso();
        $recurso = $datosRecurso->datosRecurso($recursoSeleccionado);
        $nombre = $recurso->get_rec_nombre();
        $anyo = $recurso->get_rec_anyo();
        $tipo = $recurso->get_rec_tipo();
        $url = $recurso->get_rec_url();
        $idEliminarRecurso = $recursoSeleccionado;
        $idModificarRecurso = $recursoSeleccionado;
        echo '<div class="row col-lg-7 col-md-7 col-sm-12">';
        echo ' <form action=edicion.php method=POST class="mt-4 btn-azulclaro border border-dark">';
        echo '<div class="row ">';
        echo '<div class="form-group mt-2 col-lg-4 col-md-4 col-sm-12">';
        echo '<label class="fw-bold" for="nombre">Nombre</label>';
        echo '<input type="text" class="form-control" id="nombre" name="nombreNew" value="' . $nombre . ' " placeholder=' . $nombre . ' >';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-2 col-md-2 col-sm-12">';
        echo '<label class="fw-bold" for="anyo">Año</label>';
        echo '<input type="number" class="form-control" id="anyo" min="1887" name="anyoNew" value=' . $anyo . ' placeholder="' . $anyo . '">';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-6 col-md-6 col-sm-12">';
        echo '<label class="fw-bold" for="rutaRecurso">Selecciona tipo del recurso</label>';
        echo "<select id='rutaRecurso'class='form-select form-select-md' name='recursoNew' required>";
        echo "<option selected disabled value=''> Selecciona...</option>";
        $recurso = new CrudRecurso();
        $recurso->tiposRecursos();
        echo '</div>';
        echo '</div>';
        echo "<input type=hidden name='urlNew' value='$url'>";
        echo '<div class="form-group mt-2">';
        echo '<input type=hidden name="recursoSeleccionado" value="' . $recursoSeleccionado . '">';
        echo '<input type=hidden name="rutaRecurso" value="' . $rutaRecurso . '">';
        echo "<button name='idModificarRecurso' value=' $idModificarRecurso ' type='submit' class='m-2 btn btn-septiembre'>Modificar</button>";
        echo "<button name='idEliminarRecurso' value='$idEliminarRecurso'type='submit' class='btn m-1 mx-5  btn-danger'>Eliminar</button>";
        echo '</form>';
        echo '</div>';
    } else {
        //formulario de crear nuevo recuso
        echo '<div class="row col-lg-7 col-md-7 col-sm-12">';
        echo ' <form action=edicion.php method=POST enctype="multipart/form-data" class="mt-4  border border-dark">';
        echo '<div class="row ">';
        echo '<div class="form-group mt-2 col-lg-6 col-md-6 col-sm-12">';
        echo '<label class="fw-bold" for="nombre">Nombre</label>';
        echo '<input type="text" class="form-control" id="nombre" name="nombreNew" aria-describedby="nombreHelp" placeholder="Nombre" required>';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-6 col-md-6 col-sm-12">';
        echo '<label class="fw-bold" for="anyo">Año</label>';
        echo '<input type="number" class="form-control" id="anyo" min="1900" name="anyoNew" placeholder="Año" required>';
        echo '</div>';
        echo '</div>';
        echo '<div class="row ">';
        echo '<div class="form-group mt-2 col-lg-6 col-md-6 col-sm-12">';
        echo '<label class="fw-bold" for="rutaRecurso">Selecciona tipo del recurso</label>';
        echo "<select id='rutaRecurso'class='form-select form-select-md' name='recursoNew' required>";
        echo "<option disabled value=''> Selecciona...</option>";
        $recurso = new CrudRecurso();
        $recurso->tiposRecursos();
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-6 col-md-6 col-sm-12">';
        echo '<label class="fw-bold" for="imagen">Archivo</label>';
        echo '<input type="file" class="form-control-file form-control-sm" id="imagen" name="imagenNew" placeholder="seleccionar" >';
        echo '<input type=hidden name="recursoCrear" value="crear">';
        echo '</div>';
        echo '</div>';
        echo '<button type="submit" class="m-2 btn m-1  btn-primary">Crear</button>';
        echo '</form>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<hr>';
    //
    //..............USUARIOS..................
    //
    //mostramos los formularios para crear, modificar o eliminar usuarios
    echo '<p class="mt-5"><strong> GESTION DE USUARIOS</strong></p>';
    echo '<div class="container">';
    echo '<div class="row">';
    echo ' <form action=edicion.php method=POST class="border border-dark mt-4 col-lg-2 col-md-4 col-sm-12">';
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
        echo '<div class="row col-lg-10 col-md-10 col-sm-12">';
        echo ' <form action=edicion.php method=POST class="mt-4 btn-azulclaro border border-dark">';
        echo '<div class="row ">';
        echo '<div class="form-group mt-2 col-lg-3 col-md-3 col-sm-12">';
        echo '<label class="fw-bold" for="login">Login</label>';
        echo '<input type="text" class="form-control" id="login" name="loginNew" value=' . $login . ' placeholder=' . $login . '>';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-3 col-md-3 col-sm-12">';
        echo '<label class="fw-bold" for="password">Password</label>';
        echo '<input type="text" class="form-control" id="password" name="passwordNew" value=' . $password . ' placeholder=' . $password . '>';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-6 col-md-6 col-sm-12">';
        echo '<label class="fw-bold" for="rol">Permisos (1=administrador 2=usuario)</label>';
        echo '<input type="number" class="form-control" min="1" max="2" id="rol" name="rolNew" value=' . $rol . ' placeholder="' . $rol . '">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<button name="idModificarUsuario" value="' . $idModificarUsuario . '" type="submit" class="mx-2 btn btn-septiembre">Modificar</button>';
        echo '<button name="idEliminarUsuario" value="' . $idEliminarUsuario . '" type="submit" class="btn m-1 mx-5 btn-danger">Eliminar</button>';
        echo '</form>';
        echo '</div>';
    } else {
        //formulario de crear nuevo usuario
        echo '<div class="row col-lg-10 col-md-10 col-sm-12">';
        echo ' <form action=edicion.php method=POST class=" mt-4 border border-dark">';
        echo '<div class="row ">';
        echo '<div class="form-group mt-2 col-lg-3 col-md-3 col-sm-12">';
        echo '<label class="fw-bold" for="login">Login</label>';
        echo '<input type="text" class="form-control" id="login" name="loginNew" aria-describedby="loginHelp" placeholder="login" required>';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-3 col-md-3 col-sm-12">';
        echo '<label class="fw-bold" for="password">Password</label>';
        echo '<input type="text" class="form-control" id="password" name="passwordNew" placeholder="password" required>';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-6 col-md-6 col-sm-12">';
        echo '<label class="fw-bold" for="rol">Permisos (1=administrador 2=usuario)</label>';
        echo '<input type="number" class="form-control" id="rol" name="rolNew" placeholder="Rol" required>';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<input type=hidden name="usuarioCrear" value="crear">';
        echo '</div>';
        echo '<button type="submit" class="m-2 btn m-1  btn-primary">Crear</button>';
        echo '</form>';
        echo '</div>';
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
    echo '<p class="mt-5"><strong> GESTION DE EVENTOS</strong></p>';
    echo '<div class="container">';
    echo '<div class="row col-12">';
    echo '<div class="row col-lg-3 col-md-3 col-sm-12">';
    echo ' <form action=edicion.php method=POST class="border border-dark mt-4 col-12">';
    $eventos = new CrudEventos();
    $eventos->nombresEventos();
    echo '<button type="submit" class="btn m-1  btn-success">Selecionar</button>';
    echo '</form>';
    echo '</form>';
    echo ' <form action=inscritos.php method=POST class="border border-dark mt-4 col-12">';
    $eventos = new CrudEventos();
    $eventos->nombresEventosSuscripcion();
    echo '<button type="submit" class="btn m-1  btn-success">Selecionar</button>';
    echo '</form>';
    echo '</div>';
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
        echo '<div class="row col-lg-9 col-md-9 col-sm-12">';
        echo ' <form action=edicion.php method=POST class="m-4 btn-azulclaro border border-dark">';
        echo '<div class="row ">';
        echo '<div class="form-group mt-2 col-lg-4 col-md-6 col-sm-12">';
        echo '<label for="Titulo"><strong>Titulo</strong></label>';
        echo '<input type="text" class="form-control" id="Titulo" name="TituloNew" value="' . $eve_titulo . ' " placeholder=' . $eve_titulo . '>';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-8 col-md-6 col-sm-12">';
        echo '<label for="Descripcion"><strong>Descripcion</strong></label>';
        echo '<input type="text" class="form-control" id="Descripcion" name="DescripcionNew" value="' . $eve_detalles . '" placeholder=' . $eve_detalles . '>';
        echo '</div>';
        echo '</div>';
        echo '<div class="row ">';
        echo '<div class="form-group mt-2 col-lg-4 col-md-6 col-sm-12">';
        echo '<label for="Fecha"><strong>Fecha</strong></label>';
        echo '<input type="date" class="form-control" id="Fecha" name="FechaNew" value="' . $fechaBBDD . '" >';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-4 col-md-6 col-sm-12">';
        echo '<label for="fechaLimite"><strong>Fecha límite de inscripción</strong></label>';
        echo '<input type="date" class="form-control" id="fechaLimite" name="fechaLimiteNew" value="' . $eve_fecha_limite_inscripcion . '">';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-4 col-md-6 col-sm-12">';
        echo '<label for="Urlimg"><strong>Selecciona imagen</strong></label>';
        echo "<select id='Urlimg'class='form-select form-select-sm' name='Urlimg' >";
        echo "<option value='$eve_url_img'> $eve_url_img</option>";
        //mostramos las rutas de todas las imagenes
        $recurso = new CrudRecurso();
        $recurso->urlEventos();
        echo '</div>';
        echo '<div class="form-group mt-2  col-12">';
        echo "<input class='mx-2 form-check-input' type='checkbox' name='suscripcionNew' id='validationFormCheck1' $eve_suscripcion>";
        echo '<label class="form-check-label" for="validationFormCheck1"><strong>';
        echo '  Se requiere inscribirse al evento';
        echo '</strong></label>';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group mt-2">';
        echo '<button type="submit" name="idModificarEvento" value="' . $idModificarEvento . '" class="mx-4 my-3 btn btn-septiembre">Modificar</button>';
        echo '<button type="submit" name="idEliminarEvento" value="' . $idEliminarEvento . '"class="btn mx-5 my-3  btn-danger">Eliminar</button>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
    } else {
        //formulario de crear nuevo evento
        echo '<div class="row col-lg-9 col-md-9 col-sm-12">';
        echo ' <form action=edicion.php method=POST enctype="multipart/form-data" class="col-12 mt-4 border border-dark">';
        echo '<div class="row ">';
        echo '<div class="form-group mt-2 col-lg-4 col-md-6 col-sm-12">';
        echo '<label for="Titulo"><strong>Titulo</strong></label>';
        echo '<input type="text" class="form-control" id="Titulo" name="TituloNew" aria-describedby="TituloHelp" placeholder="Titulo" required>';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-8 col-md-6 col-sm-12">';
        echo '<label for="Descripcion"><strong>Descripcion</strong></label>';
        echo '<input type="text" class="form-control" id="Descripcion" name="DescripcionNew" placeholder="Descripcion">';
        echo '</div>';
        echo '</div>';
        echo '<div class="row ">';
        echo '<div class="form-group mt-2 col-lg-4 col-md-6 col-sm-12">';
        echo '<label for="fecha"><strong>Fecha</strong></label>';
        echo '<input type="date" class="form-control form-control-sm" id="fecha" name="fechaNew" placeholder="Fecha" required>';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-4 col-md-6 col-sm-12">';
        echo '<label for="fechaLimite"><strong>Fecha límite de inscripción</strong></label>';
        echo '<input type="date" class="form-control form-control-sm" id="fechaLimite" name="fechaLimiteNew" placeholder="fechaLimite">';
        echo '</div>';
        echo '<div class="form-group mt-2 col-lg-4 col-md-6 col-sm-12">';
        echo '<label for="Urlimg"><strong>Selecciona ruta imagen</strong></label>';
        echo "<select id='Urlimg'class='form-select form-select-sm' name='Urlimg' >";
        echo "<option><strong> Seleccionar imagen</strong></option>";
        //mostramos las rutas de todas las imagenes
        $recurso = new CrudRecurso();
        $recurso->urlEventos();
        echo '</div>';
        echo '</div>';
        echo '<div class="row ">';
        echo '<input type=hidden name="eventoCrear" value="crear">';     
        echo '</div>';
        echo '<button type="submit" class="m-4 btn m-1  btn-primary">Crear</button>';
        echo '</form>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
}

require_once './plantillas/footer.php';
?>
</body>
</html>