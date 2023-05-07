<?php
require_once 'C:/xampp/htdocs/Proyecto_falla/modelo/classes/presidente.php';
require_once 'C:/xampp/htdocs/Proyecto_falla/controlador/BBDD/database.php';
class CrudPresidentes{
    public function __construct(){}

//funcion que obtiene los presidentes y los muestra
    //public function obtenerpresidente($idPelicula){
        //$conexion = database::conexion();
        //$consulta = "SELECT id_presidente FROM peliculas_presidentes WHERE id_pelicula= :idPelicula";
        //$consultaPreparada = $conexion->prepare($consulta);
        //$consultaPreparada->bindValue(':idPelicula', $idPelicula);
        //$consultaPreparada->execute();
        //obtenemos un array con los id de los presidentes
        //$resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        //mostramos el nombre de los presidentes
        //foreach ($resultado as $value) {
         //   $idpresidente = $value["id_presidente"];
         //   $presidente = $this->datospresidente($idpresidente);
         //   $this->imprimirNombrepresidente($presidente);
       // }
    //}
//funcion que imprime el nombre de las Presidentes en un select
public function nombresPresidentes()
{
    $conexion = database::conexion();
    $consulta = "SELECT * FROM presidentes";
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->execute();
    $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
    echo '<label for="presidente">Presidente</label>';
    echo "<select id='presidente' name='idPresidente' class='form-select form-select-sm'>";
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
//funcion que devuelve una clase presidente con sus datos por ID
    public function datosPresidenteId($id_presidente){
        $conexion = database::conexion();
        $consulta = "SELECT * FROM presidentes WHERE id= :id_presidente";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':id_presidente', $id_presidente);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $value) {
            $nombre = $value["nombre"];
            $apellidos = $value["apellidos"];
            $imagen = $value["imagen"];
            $anyo = $value["año"];
            $presidente = new Presidente($nombre, $apellidos,$imagen, $anyo);
        }
        return $presidente;
    }
//funcion que devuelve una clase presidente con sus datos por año
    public function datosPresidenteAnyo($anyo){
        $conexion = database::conexion();
        $consulta = "SELECT * FROM presidentes WHERE anyo= :anyo";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':anyo', $anyo);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $value) {
            $nombre = $value["nombre"];
            $apellidos = $value["apellidos"];
            $imagen = $value["imagen"];
            $id = $value["id"];
            $presidente = new presidente($nombre, $apellidos,$imagen , $anyo, $id);
        }
        return $presidente;
    }

//funcion que imprime los nombres de los presidentes
    public function imprimirNombrePresidente($presidente){
        $nombre = $presidente->get_nombre();
        echo '<a href=presidentes_ficha.php?id=' . $presidente->get_id() . '>' . $presidente->get_nombre() . '</a><br>';
    }
//funcion que imprime los datos de los presidentes
    public function imprimirDatos($presidente)
    {
        echo '<p><strong>Nombre: </strong>' . $presidente->get_nombre() . '</p><br>';
        echo '<p><strong>Apellidos: </strong>' . $presidente->get_apellidos() . '</p><br>';
        echo '<p><strong>imagen: </strong>' . $presidente->get_imagen() . '</p><br>';
        echo '<p><strong>Año: </strong>' . $presidente->get_anyo() . '</p><br>';
        echo '<a class="editar" href="presidentes_form.php?id=' . $presidente->get_id() . '">editar</a>';
        echo '<a class="borrado" href="presidentes_ficha.php?idBorrar=' . $presidente->get_id() . '">borrar</a>';
    }
//funcion que elimina el presidente
    public function eliminarPresidente($idpresidente){
        try {
            $conexion = database::conexion();
            $consulta = "DELETE FROM presidentes WHERE  id=:idpresidente";
            $consultaPreparada = $conexion->prepare($consulta);
            $consultaPreparada->bindValue(':idpresidente', $idpresidente);
            $consulta = "DELETE FROM relacion_presidente_presidente_infantil WHERE  id_presidente=:idpresidente";
            $consultaPreparada = $conexion->prepare($consulta);
            $consultaPreparada->bindValue(':idpresidente', $idpresidente);
            $consultaPreparada->execute();
            $exito = 1;
            return $exito;
        } catch (exception $e) {
            $exito = 0;
            return $exito;
        }
    }

//funcion que actualiza los valores en la base de datos y le pasamos un objeto tipo presidente
    public static function editarPresidente($presidente){
        try {
            $conexion = database::conexion();
            $id = $presidente->get_id();
            $actualizacion = "UPDATE presidentes SET nombre=:nombre, apellidos=:apellidos,imagen=:imagen, anyo=:anyo,id=:id WHERE id=$id";
            $consultaPreparada = $conexion->prepare($actualizacion);
            $consultaPreparada->bindValue(':nombre', $presidente->get_nombre());
            $consultaPreparada->bindValue(':apellidos', $presidente->get_apellidos());
            $consultaPreparada->bindValue(':anyo_inicio', $presidente->get_anyo_inicio());
            $consultaPreparada->bindValue(':id', $presidente->get_id());
            $consultaPreparada->execute();
            $exito = 1;
            return $exito;
        } catch (exception $e) {
            $exito = 0;
            return $exito;
        }
    }

//funcion que inserta un presidente en la bbdd pasandole un objeto tipo presidente
    public function insertarPresidente($presidente){
        $conexion = Database::conexion();
        $insertar = $conexion->prepare('INSERT INTO presidentes values(NULL,:nombre,:apellidos,:imagen:anyo)');
        $insertar->bindValue(':nombre', $presidente->get_nombre());
        $insertar->bindValue(':apellidos', $presidente->get_apellidos());
        $insertar->bindValue(':imagen', $presidente->get_imagen());
        $insertar->bindValue(':anyo', $presidente->get_anyo());
        $consultaPreparada->execute();
    }
}
