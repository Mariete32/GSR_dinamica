<?php
require_once 'C:/xampp/htdocs/Proyecto_falla/modelo/classes/presidente_infantil.php';
require_once 'C:/xampp/htdocs/Proyecto_falla/controlador/BBDD/database.php';
class CrudPresidenteInfantiles{
    public function __construct(){}
//funcion que imprime el nombre de las Presidentes en un select
public function nombresPresidentesInfantiles()
{
    $conexion = database::conexion();
    $consulta = "SELECT * FROM presidentes_infantiles";
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->execute();
    $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
    echo '<label for="presidenteInfantil">Presidente Infantil</label>';
    echo "<select id='presidenteInfantil' name='idPresidenteInfantil' class='form-select form-select-sm'>";
    echo "<option selected>Selecciona</option>";
    foreach ($resultado as $value) {
        $id = $value['id'];
        $nombre = $value['nombre'];
        $apellidos = $value['apellidos'];
        $anyo = $value['año'];
        $nombreCompleto = $nombre . ' ' . $apellidos . ' ' . $anyo;
        echo "<option value=$id>" . $nombreCompleto . "</option>";
    }
    echo "</select>";

}
//funcion que obtiene los presidenteInfantiles y los muestra por el id del presidente
    public function obtenerPresidentesInfantiles($id_presidente){
        $conexion = database::conexion();
        $consulta = "SELECT id_presidente_infantil FROM relacion_presidente_presidente_infantil WHERE id_presidente= :id_presidente";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':id_presidente', $id_presidente);
        $consultaPreparada->execute();
        //obtenemos un array con los id de los presidenteInfantils
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        //mostramos el nombre de los presidenteInfantils
        foreach ($resultado as $value) {
            $idpresidenteInfantil = $value["id_presidente_infantil"];
            $presidenteInfantil = $this->datospresidenteInfantil($idpresidenteInfantil);
            $this->imprimirNombrePresidenteInfantil($presidenteInfantil);
        }
        return $resultado;
    }

//funcion que devuelve una clase presidenteInfantil con sus datos por ID
    public function datosPresidenteInfantilId($id_presidente_infantil){
        $conexion = database::conexion();
        $consulta = "SELECT * FROM presidentes_infantiles WHERE id= :id_presidenteInfantil_infantil";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':id_presidenteInfantil_infantil', $id_presidente_infantil);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $value) {
            $nombre = $value["nombre"];
            $apellidos = $value["apellidos"];
            $imagen = $value["imagen"];
            $anyo = $value["año"];
            $presidenteInfantil = new PresidenteInfantil($nombre, $apellidos,$imagen, $anyo);
        }
        return $presidenteInfantil;
    }
//funcion que devuelve una clase presidenteInfantil con sus datos por año
    public function datosPresidenteInfantilAnyo($anyo){
        $conexion = database::conexion();
        $consulta = "SELECT * FROM presidentes_infantiles WHERE anyo= :anyo";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':anyo', $anyo);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $value) {
            $nombre = $value["nombre"];
            $apellidos = $value["apellidos"];
            $imagen = $value["imagen"];
            $id = $value["id"];
            $presidenteInfantil = new PresidenteInfantil($nombre, $apellidos,$imagen , $anyo, $id);
        }
        return $presidenteInfantil;
    }

//funcion que imprime los nombres de los presidenteInfantils
    public function imprimirNombrePresidenteInfantil($presidenteInfantil){
        $nombre = $presidenteInfantil->get_nombre();
        echo '<a href=presidenteInfantils_ficha.php?id=' . $presidenteInfantil->get_id() . '>' . $presidenteInfantil->get_nombre() . '</a><br>';
    }
//funcion que imprime los datos de los presidenteInfantils
    public function imprimirDatos($presidenteInfantil)
    {
        echo '<p><strong>Nombre: </strong>' . $presidenteInfantil->get_nombre() . '</p><br>';
        echo '<p><strong>Apellidos: </strong>' . $presidenteInfantil->get_apellidos() . '</p><br>';
        echo '<p><strong>imagen: </strong>' . $presidenteInfantil->get_imagen() . '</p><br>';
        echo '<p><strong>Año: </strong>' . $presidenteInfantil->get_anyo() . '</p><br>';
        echo '<a class="editar" href="presidenteInfantil_form.php?id=' . $presidenteInfantil->get_id() . '">editar</a>';
        echo '<a class="borrado" href="presidenteInfantil_ficha.php?idBorrar=' . $presidenteInfantil->get_id() . '">borrar</a>';
    }
//funcion que elimina el presidenteInfantil
    public function eliminarPresidenteInfantil($idpresidenteInfantil){
        try {
            $conexion = database::conexion();
            $consulta = "DELETE FROM presidentes_infantiles WHERE  id=:idpresidenteInfantil";
            $consultaPreparada = $conexion->prepare($consulta);
            $consultaPreparada->bindValue(':idpresidenteInfantil', $idpresidenteInfantil);
            $consulta = "DELETE FROM relacion_presidente_presidente_infantil WHERE  id=:idpresidenteInfantil";
            $consultaPreparada = $conexion->prepare($consulta);
            $consultaPreparada->bindValue(':idpresidenteInfantil', $idpresidenteInfantil);
            $consultaPreparada->execute();
            $exito = 1;
            return $exito;
        } catch (exception $e) {
            $exito = 0;
            return $exito;
        }
    }

//funcion que actualiza los valores en la base de datos y le pasamos un objeto tipo presidenteInfantil
    public static function editarPresidenteInfantil($presidenteInfantil){
        try {
            $conexion = database::conexion();
            $id = $presidenteInfantil->get_id();
            $actualizacion = "UPDATE presidentes_infantiles SET nombre=:nombre, apellidos=:apellidos,imagen=:imagen, anyo=:anyo,id=:id WHERE id=$id";
            $consultaPreparada = $conexion->prepare($actualizacion);
            $consultaPreparada->bindValue(':nombre', $presidenteInfantil->get_nombre());
            $consultaPreparada->bindValue(':apellidos', $presidenteInfantil->get_apellidos());
            $consultaPreparada->bindValue(':anyo_inicio', $presidenteInfantil->get_anyo_inicio());
            $consultaPreparada->bindValue(':id', $presidenteInfantil->get_id());
            $consultaPreparada->execute();
            $exito = 1;
            return $exito;
        } catch (exception $e) {
            $exito = 0;
            return $exito;
        }
    }

//funcion que inserta un presidenteInfantil en la bbdd pasandole un objeto tipo presidenteInfantil
    public function insertarPresidenteInfantil($presidenteInfantil){
        $conexion = Database::conexion();
        $insertar = $conexion->prepare('INSERT INTO presidentes_infantiles values(NULL,:nombre,:apellidos,:imagen:anyo)');
        $insertar->bindValue(':nombre', $presidenteInfantil->get_nombre());
        $insertar->bindValue(':apellidos', $presidenteInfantil->get_apellidos());
        $insertar->bindValue(':imagen', $presidenteInfantil->get_imagen());
        $insertar->bindValue(':anyo', $presidenteInfantil->get_anyo());
        $consultaPreparada->execute();
    }
}
