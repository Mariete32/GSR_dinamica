<?php
require_once './classes/Recurso.php';
require_once './classes/cargos.php';
require_once './BBDD/database.php';
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
        $recurso = new Recurso($rec_nombre, $rec_tipo, $rec_anyo, $rec_url);
    }
    return $recurso;
}
//funcion que imprime las url de las imagenes de los directivos en un select
    public function listadoRecurso()
    {
        $directorio = "./imagenes/directiva"; // reemplaza "ruta/a/la/carpeta" con la ruta real de la carpeta que quieres leer
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
//funcion que imprime las url de las imagenes de los eventos en un select
    public function urlEventos()
    {
        $directorio = "./imagenes/imagenesEventos"; // reemplaza "ruta/a/la/carpeta" con la ruta real de la carpeta que quieres leer
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
        echo "<option value=$eventos> Imagen de eventos</option>";
        echo "<option value=$directivas>Imagen de junta directiva</option>";
        echo "<option value=$premios>Imagen de premio de monumento</option>";
        echo "<option value=$bocetos>Imagen de monumento</option>";
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
    echo '<label for="recurso">Selecciona recurso</label>';
    echo "<select id='recurso'class='form-select form-select-sm' name='recursoSeleccionado' >";
    echo "<option selected>Selecciona</option>";
    foreach ($resultado as $value) {
        $id = $value['rec_id'];
        $nombre = $value['rec_nombre'];
        $anyo = $value['rec_anyo'];
        $tipo = $value['rec_tipo'];
        $url = $value['rec_url'];
        $nombreCompleto = $nombre . ' ' . $anyo ;
        echo "<option value=$id>" . $nombreCompleto . "</option>";
    }
    echo "</select>";
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
}
