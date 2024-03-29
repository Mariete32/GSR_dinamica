<?php
/*require_once 'C:/xampp/htdocs/Proyecto_falla/modelo/classes/Recurso.php';
require_once 'C:/xampp/htdocs/Proyecto_falla/modelo/classes/cargos.php';
require_once 'C:/xampp/htdocs/Proyecto_falla/controlador/BBDD/database.php';*/
class CrudRecurso{
    public function __construct()
    {}
//funcion que devuelve una clase evento con sus datos
public function datosRecurso($rec_id){
    $conexion = database::conexion();
    $consulta = "SELECT * FROM recurso WHERE rec_id= :rec_id";
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->bindValue(':rec_id', $rec_id);
    $consultaPreparada->execute();
    $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultado as $value) {
        $rec_nombre = $value["rec_nombre"];
        $rec_tipo = $value["rec_tipo"];
        $rec_anyo = $value["rec_anyo"];
        $rec_url = $value["rec_url"];
        $recurso = new Recurso($rec_nombre, $rec_anyo, $rec_tipo, $rec_url);
    }
    return $recurso;
}
//funcion que imprime las url de las imagenes de los directivos en un select
    public function listadoRecurso()
    {
        $directorio = "../imagenes/directiva"; // reemplaza "ruta/a/la/carpeta" con la ruta real de la carpeta que quieres leer
        $archivos = scandir($directorio);
        foreach ($archivos as $archivo) {
            // comprueba si el archivo es una imagen
            if (in_array(pathinfo($archivo, PATHINFO_EXTENSION), array('jpg', 'jpeg', 'png', 'gif'))) {
                $ruta= $directorio . '/' . $archivo ; // imprime la ruta completa del archivo
                echo "<option value=$ruta>" . $archivo . "</option>";
            }
        }
        echo "</select>";
    }
//funcion que imprime las url de las imagenes en un select del formulario eventos
    public function urlEventos()
    {
        $directorio = "../imagenes/imagenesEventos"; // reemplaza "ruta/a/la/carpeta" con la ruta real de la carpeta que quieres leer
        $directorio2 = "./imagenes/imagenesEventos"; //ruta para gusrdar en la base de datos
        $archivos = scandir($directorio);
        
        foreach ($archivos as $archivo) {
            // comprueba si el archivo es una imagen
            if (in_array(pathinfo($archivo, PATHINFO_EXTENSION), array('jpg', 'jpeg', 'png', 'gif'))) {
                $ruta= $directorio . '/' . $archivo ; // imprime la ruta completa del archivo
                $ruta2= $directorio2 . '/' . $archivo ;//ruta completa para la base de datos
                echo "<option value=$ruta2>" . $archivo . "</option>";
            }
        }
        echo "</select>";
    }

    //funcion que imprime el tipo de recurso en un select
    public function tiposRecursos()
    {
        $fm = "FM_imagen";
        $fmi = "FMI_imagen";
        $presidente = "P_imagen";
        $presidenteInfantil = "PI_imagen";
        $eventos ="Evento_imagen";
        $premios= "Premio_imagen";
        $bocetos = "Boceto_imagen";
        $llibrets = "pdf_llibret";
        echo "<option value=$eventos> Imagenes de eventos</option>";
        echo "<option value=$fm>Imagenes de fallera mayor</option>";
        echo "<option value=$fmi>Imagenes de fallera mayor infantil</option>";
        echo "<option value=$presidente>Imagenes de presidente</option>";
        echo "<option value=$presidenteInfantil>Imagenes de presidente infantil</option>";
        echo "<option value=$premios>Imagenes de premio de monumento</option>";
        echo "<option value=$bocetos>Imagenes de monumento</option>";
        echo "<option value=$llibrets>PDF de llibret</option>";
        echo "</select>";
    }

    //funcion que imprime los recursos de ese tipo en un select
public function nombresRecursos($tipoRecurso)
{
    $conexion = database::conexion();
    $consulta = "SELECT * FROM `recurso` WHERE `rec_tipo`='".$tipoRecurso."' ORDER BY `rec_anyo`";
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->execute();
    $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
    echo '<label class="fw-bold" for="recurso">Selecciona recurso</label>';
    echo "<select id='recurso'class='form-select form-select-md' name='recursoSeleccionado' >";
    echo "<option selected disabled value=''> Selecciona...</option>";
    foreach ($resultado as $value) {
        $id = $value['rec_id'];
        $nombre = $value['rec_nombre'];
        $anyo = $value['rec_anyo'];
        $tipo = $value['rec_tipo'];
        $url = $value['rec_url'];
        $url = "../$url";
        $nombreCompleto = $nombre . ' ' . $anyo ;
        echo "<option value=$id> $nombreCompleto </option>";
    }
    echo "</select>";
}

    //funcion que muestra las fotos de las FM y FMI en cards
    public function cardsFalleras()
    {
        $conexion = database::conexion();
        $consulta = "SELECT * FROM `recurso` WHERE `rec_tipo`='FM_imagen' || `rec_tipo`='FMI_imagen' ORDER BY `rec_anyo` DESC";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $value) {
            $id = $value['rec_id'];
            $nombre = $value['rec_nombre'];
            $anyo = $value['rec_anyo'];
            $tipo = $value['rec_tipo'];
            $url = $value['rec_url'];
            $url = "../$url";
            echo '<div class=" col-lg-4 col-md-6 col-sm-12">';
            echo '   <div class="card m-auto mt-4" style="width: 18rem; ">';
            echo '   <div style=" height: 370px;">';
            echo "<img src='$url' class='card-img-top mh-100' alt='...'>";
            echo '</div>';
            echo ' <div class="card-body">';
            if ($tipo=="FM_imagen") {
                
                echo "   <h5 class=' card-title text-center'>Fallera mayor $anyo</h5>";
            } else {
                echo "   <h5 class=' card-title text-center'>FM infantil $anyo</h5>";
            }
    echo '</div>';
    echo ' </div>';
    echo '  </div>';
        }
       
    }

    //funcion que muestra las fotos de presidentes en cards
    public function cardsPresidentes()
    {
        $conexion = database::conexion();
        $consulta = "SELECT * FROM `recurso` WHERE `rec_tipo`='P_imagen' || `rec_tipo`='PI_imagen' ORDER BY `rec_anyo` DESC";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $value) {
            $id = $value['rec_id'];
            $nombre = $value['rec_nombre'];
            $anyo = $value['rec_anyo'];
            $tipo = $value['rec_tipo'];
            $url = $value['rec_url'];
            $url = "../$url";
            echo '<div class="col-lg-4 col-md-6 col-sm-12">';
            echo '   <div class="card m-auto mt-4" style="width: 18rem; ">';
            echo '   <div style=" height: 370px;">';
            echo "<img src='$url' class='card-img-top mh-100' alt='...'>";
            echo '</div>';
            echo ' <div class="card-body">';
            if ($tipo=="P_imagen") {
                
                echo "   <h5 class=' card-title text-center'>Presidente $anyo</h5>";
            } else {
                echo "   <h5 class=' card-title text-center'>Presidente infantil $anyo</h5>";
            }
    echo '</div>';
    echo ' </div>';
    echo '  </div>';
        }
       
    }
//funcion que muestra las fotos de los premios en cards
public function cardsPremios()
{
    $conexion = database::conexion();
    $consulta = "SELECT * FROM `recurso` WHERE `rec_tipo`='Premio_imagen' ORDER BY `rec_anyo` DESC";
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->execute();
    $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultado as $value) {
        $id = $value['rec_id'];
        $nombre = $value['rec_nombre'];
        $anyo = $value['rec_anyo'];
        $tipo = $value['rec_tipo'];
        $url = $value['rec_url'];
        $url = "../$url";
        echo '<div class=" col-lg-3 col-md-4 col-sm-12">';
        echo '   <div class="card m-auto mt-4" style="width: 14rem; ">';
        echo '   <div style=" height: 370px;">';
        echo "<img src='$url' class='card-img-top mh-100' alt='...'>";
        echo '</div>';
        echo ' <div class="card-body">'; 
        echo "   <h5 class=' card-title text-center'>$anyo</h5>";
echo '</div>';
echo ' </div>';
echo '  </div>';
    }
   
}

//funcion que muestra los llibrets
public function listadoLLibret()
{
    $conexion = database::conexion();
    $consulta = "SELECT * FROM `recurso` WHERE `rec_tipo`='pdf_llibret' ORDER BY `rec_anyo` DESC";
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->execute();
    $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
    echo '<div class="accordion accordion-flush" id="accordionFlushExample">';
    foreach ($resultado as $value) {
        $id = $value['rec_id'];
        $nombre = $value['rec_nombre'];
        $anyo = $value['rec_anyo'];
        $tipo = $value['rec_tipo'];
        $url = $value['rec_url'];
        $url = "../$url";
        $titulo= $nombre." ".$anyo;
        
        echo ' <div class="accordion-item">';
        echo "  <h2 class='accordion-header' id='flush-heading$id'>";
        echo "   <button class='accordion-button collapsed d-block text-center' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapse$id' aria-expanded='false' aria-controls='flush-collapseOne'>";
        echo "      $nombre $anyo</button>";
        echo '  </h2>';
        echo "  <div id='flush-collapse$id' class='accordion-collapse collapse' aria-labelledby='flush-heading$id' data-bs-parent='#accordionFlushExample'>";
        echo "   <div class='accordion-body'><center><iframe class='libros' src='$url' allow='autoplay'></iframe>";     
        echo '   </div>';
        echo '  </div>';
        echo '</div>';
    }
   
}
//funcion que elimina el evento
public function eliminarRecurso($idrecurso)
{
    try {
        $conexion = database::conexion();
        $consulta = "DELETE FROM recurso WHERE  rec_id=:rec_id";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':rec_id', $idrecurso);
        $consultaPreparada->execute();
        $exito = 1;
        return $exito;
    } catch (exception $e) {
        $exito = 0;
        return $exito;
    }
}

//funcion que actualiza los valores en la base de datos
public static function editarRecurso($recurso)
{
    try {
        $conexion = database::conexion();
        $rec_id = $recurso->get_rec_id();
        $actualizacion = "UPDATE recurso SET rec_nombre=:rec_nombre, rec_anyo=:rec_anyo, rec_tipo=:rec_tipo, rec_url=:rec_url WHERE rec_id=$rec_id";
        $consultaPreparada = $conexion->prepare($actualizacion);
        $consultaPreparada->bindValue(':rec_nombre', $recurso->get_rec_nombre());
        $consultaPreparada->bindValue(':rec_anyo', $recurso->get_rec_anyo());
        $consultaPreparada->bindValue(':rec_tipo', $recurso->get_rec_tipo());
        $consultaPreparada->bindValue(':rec_url', $recurso->get_rec_url());
        $consultaPreparada->execute();
        $exito = 1;
        return $exito;
    } catch (exception $e) {
        $exito = 0;
        return $exito;
    }
}
//funcion que inserta un recurso en la bbdd
public function insertarRecurso($recurso)
{
    try {
        $conexion = Database::conexion();
        $insertar = $conexion->prepare('INSERT INTO recurso values(NULL,:rec_nombre,:rec_anyo,:rec_tipo,:rec_url)');
        $insertar->bindValue(':rec_nombre', $recurso->get_rec_nombre());
        $insertar->bindValue(':rec_anyo', $recurso->get_rec_anyo());
        $insertar->bindValue(':rec_tipo', $recurso->get_rec_tipo());
        $insertar->bindValue(':rec_url', $recurso->get_rec_url());
        $insertar->execute();
        $exito = 1;
        return $exito;
    } catch (exception $e) {
        $exito = 0;
        return $exito;
    }
}
}
