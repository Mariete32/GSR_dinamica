<?php
/*require_once 'C:/xampp/htdocs/Proyecto_falla/modelo/classes/fallera_infantil.php';
require_once 'C:/xampp/htdocs/Proyecto_falla/controlador/BBDD/database.php';*/
class CrudFallerasInfantiles{
    public function __construct(){}
//funcion que imprime el nombre de las Presidentes en un select
public function nombresFallerasMayoresInfantiles()
{
    $conexion = database::conexion();
    $consulta = "SELECT * FROM falleras_infantiles";
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->execute();
    $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
    echo '<label for="falleraInfantil">Fallera Infantil</label>';
    echo "<select id='falleraInfantil' name='idFalleraMayorInfantil' class='form-select form-select-sm'>";
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
    //funcion que devuelve una clase fallera_infantil con sus datos por año
    public function datosfalleraInfantilAnyo($anyo){
        $conexion = database::conexion();
        $consulta = "SELECT * FROM fallera_infantiles WHERE anyo= :anyo";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':anyo', $anyo);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $value) {
            $nombre = $value["nombre"];
            $apellidos = $value["apellidos"];
            $imagen = $value["imagen"];
            $anyo = $value["año"];
            $fallera_infantil = new FalleraInfantil($nombre, $apellidos,$imagen, $anyo, $id_fallera_infantil);
        }
        return $fallera_infantil;
    }

    //funcion que devuelve una clase fallera_infantil con sus datos por ID
    public function datosFalleraInfantilId($id_fallera_infantil){
        $conexion = database::conexion();
        $consulta = "SELECT * FROM falleras_infantiles WHERE id= :id_fallera_infantil";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':id_fallera_infantil', $id_fallera_infantil);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $value) {
            $nombre = $value["nombre"];
            $apellidos = $value["apellidos"];
            $imagen = $value["imagen"];
            $anyo = $value["año"];
            $fallera_infantil = new FalleraInfantil($nombre, $apellidos,$imagen, $anyo);
        }
        return $fallera_infantil;
    }

//funcion que imprime los nombres de los fallera_infantiles pasandole un objeto tipo fallera_infantil com parametro
    //public function imprimirNombrefallera_infantil($fallera_infantil){
        //$nombre = $fallera_infantil->get_nombre();
        //echo '<a href=fallera_infantiles_ficha.php?id=' . $fallera_infantil->get_id() . '>' . $fallera_infantil->get_nombre() . '</a><br>';
    //}
//funcion que imprime los datos de los fallera_infantiles pasandole un objeto tipo fallera_infantil com parametro
    public function imprimirDatos($fallera_infantil)
    {
        echo '<p><strong>Nombre: </strong>' . $fallera_infantil->get_nombre() . '</p><br>';
        echo '<p><strong>Apellidos: </strong>' . $fallera_infantil->get_apellidos() . '</p><br>';
        echo '<p><strong>año: </strong>' . $fallera_infantil->get_anyo() . '</p><br>';
        echo '<a class="editar" href="fallera_infantiles_form.php?id=' . $fallera_infantil->get_id() . '">editar</a>';
        echo '<a class="borrado" href="fallera_infantiles_ficha.php?idBorrar=' . $fallera_infantil->get_id() . '">borrar</a>';
    }
//funcion que elimina el fallera_infantil
    public function eliminarfallera_infantil($idfallera_infantil){
        try {
            $conexion = database::conexion();
            $consulta = "DELETE FROM fallera_infantiles WHERE  id=:idfallera_infantil";
            $consultaPreparada = $conexion->prepare($consulta);
            $consultaPreparada->bindValue(':idfallera_infantil', $idfallera_infantil);
            $consultaPreparada->execute();
            $exito = 1;
            return $exito;
        } catch (exception $e) {
            $exito = 0;
            return $exito;
        }
    }

//funcion que actualiza los valores en la base de datos
    public static function editarfalleraInfantil($idfallera_infantil){
        try {
            $conexion = database::conexion();
            $id = $fallera_infantil->get_id();
            $actualizacion = "UPDATE fallera_infantiles SET nombre=:nombre, apellidos=:apellidos, imagen=:imagen, anyo=:anyo, id=:id WHERE id=$idfallera_infantil";
            $consultaPreparada = $conexion->prepare($actualizacion);
            $consultaPreparada->bindValue(':nombre', $idfallera_infantil->get_nombre());
            $consultaPreparada->bindValue(':apellidos', $idfallera_infantil->get_apellidos());
            $consultaPreparada->bindValue(':imagen', $idfallera_infantil->get_imagen());
            $consultaPreparada->bindValue(':anyo', $idfallera_infantil->get_anyo());
            $consultaPreparada->bindValue(':id', $idfallera_infantil->get_id());
            $consultaPreparada->execute();
            $exito = 1;
            return $exito;
        } catch (exception $e) {
            $exito = 0;
            return $exito;
        }
    }

//funcion que inserta un fallera_infantil en la bbdd
    public function insertarfallera_infantil($fallera_infantil){
        $conexion = Database::conexion();
        $insertar = $conexion->prepare('INSERT INTO fallera_infantiles values(NULL,:nombre,:apellidos,:imagen,:anyo)');
        $insertar->bindValue(':nombre', $fallera_infantil->get_nombre());
        $insertar->bindValue(':apellidos', $fallera_infantil->get_apellidos());
        $insertar->bindValue(':imagen', $fallera_infantil->get_imagen());
        $insertar->bindValue(':anyo', $fallera_infantil->get_anyo());
        $insertar->execute();
    }
}
