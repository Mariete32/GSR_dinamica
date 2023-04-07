<?php
require_once './classes/fallera_mayor.php';
require_once './BBDD/database.php';
class CrudEventos
{
    public function __construct(){}


    //funcion que devuelve una clase fallera con sus datos
    public function datosFalleraAnyo($anyo)
    {
        $conexion = database::conexion();
        $consulta = "SELECT * FROM falleras_mayores WHERE anyo= :anyo";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':anyo', $anyo);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $value) {
            $nombre = $value["nombre"];
            $apellidos = $value["apellidos"];
            $imagen = $value["imagen"];
            $año = $value["año"];
            $fallera = new FalleraMayor($nombre, $apellidos, $imagen, $año, $id_fallera);
        }
        return $fallera;
    }

//funcion que imprime el nombre de las falleras en un select
    public function nombresFalleras()
    {
        $conexion = database::conexion();
        $consulta = "SELECT * FROM falleras_mayores";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        echo '<label for="fallera">Fallera</label>';
        echo "<select id='fallera'class='form-select form-select-sm' name='idFallera' >";
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
//funcion que devuelve una clase fallera con sus datos
    public function datosFalleraID($id)
    {
        $conexion = database::conexion();
        $consulta = "SELECT * FROM falleras_mayores WHERE id= :id";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':id', $id);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $value) {
            $nombre = $value["nombre"];
            $apellidos = $value["apellidos"];
            $imagen = $value["imagen"];
            echo "<img src='data:image/jpeg; base64,". base64_encode($imagen)."'>";


            $año = $value["año"];
            $fallera = new FalleraMayor($nombre, $apellidos,$año, $imagen);
        }
        return $fallera;
    }

//funcion que imprime los nombres de los falleras_mayores pasandole un objeto tipo Fallera com parametro
    public function imprimirNombrefallera($fallera)
    {
        $nombre = $fallera->get_nombre();
        echo '<a href=fallera_ficha.php?id=' . $fallera->get_id() . '>' . $fallera->get_nombre() . '</a><br>';
    }
//funcion que imprime los datos de los falleras_mayores pasandole un objeto tipo Fallera com parametro
    public function imprimirDatos($fallera)
    {
        echo '<p><strong>Nombre: </strong>' . $fallera->get_nombre() . '</p><br>';
        echo '<p><strong>Apellidos: </strong>' . $fallera->get_apellidos() . '</p><br>';
        echo '<p><strong>imagen: </strong>' . $fallera->get_imagen() . '</p><br>';
        echo '<p><strong>Año: </strong>' . $fallera->get_año() . '</p><br>';
        echo '<a class="editar" href="falleras_mayores_form.php?id=' . $fallera->get_id() . '">editar</a>';
        echo '<a class="borrado" href="falleras_mayores_ficha.php?idBorrar=' . $fallera->get_id() . '">borrar</a>';
    }
//funcion que elimina el fallera
    public function eliminarfallera($idfallera)
    {
        try {
            $conexion = database::conexion();
            $consulta = "DELETE FROM falleras_mayores WHERE  id=:idfallera";
            $consultaPreparada = $conexion->prepare($consulta);
            $consultaPreparada->bindValue(':idfallera', $idfallera);
            //$consulta = "DELETE FROM presidentes_falleras_mayores WHERE  id_fallera=:idfallera";
            //$consultaPreparada = $conexion->prepare($consulta);
            //$consultaPreparada->bindValue(':id_fallera', $idfallera);
            $consultaPreparada->execute();
            $exito = 1;
            return $exito;
        } catch (exception $e) {
            $exito = 0;
            return $exito;
        }
    }

//funcion que actualiza los valores en la base de datos
    public static function editarfallera($fallera){
        try {
            $conexion = database::conexion();
            $id = $fallera->get_id();
            $actualizacion = "UPDATE falleras_mayores SET nombre=:nombre, apellidos=:apellidos, imagen=:imagen, año=:anyo, id=:id WHERE id=$id";
            $consultaPreparada = $conexion->prepare($actualizacion);
            $consultaPreparada->bindValue(':nombre', $fallera->get_nombre());
            $consultaPreparada->bindValue(':apellidos', $fallera->get_apellidos());
            $consultaPreparada->bindValue(':imagen', $fallera->get_imagen());
            $consultaPreparada->bindValue(':anyo', $fallera->get_anyo());
            $consultaPreparada->bindValue(':id', $fallera->get_id());
            $consultaPreparada->execute();
            $exito = 1;
            return $exito;
        } catch (exception $e) {
            $exito = 0;
            return $exito;
        }
    }

//funcion que inserta un fallera en la bbdd
    public function insertarFallera($fallera,$imagenSize,$imagenTemp_name){
        var_dump($fallera);
        //$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/proyecto_falla/imagenes/';fallerasMayores
        $carpeta_destino='imagenes/fallerasMayores/';
        $ruta= $carpeta_destino.$fallera->get_imagen();

        move_uploaded_file($imagenTemp_name,$ruta);
        try {
            $conexion = Database::conexion();

            //$archivo_objetivo=fopen($ruta,"rb");
            echo$ruta;
            //$contenido=fread($archivo_objetivo,filesize($ruta));//$imagenSize
            //le decimos que escape la barras laterales de la ruta
            //$contenido=addcslashes($contenido,"/");
            //fclose($archivo_objetivo);
            
            //$imagen_base64 = base64_encode($archivo_objetivo);
            //$insertar = 'INSERT INTO falleras_mayores values(NULL,:nombre,:apellidos,"'.$imagen_base64.'",:anyo)';

            $insertar = $conexion->prepare('INSERT INTO falleras_mayores values(NULL,:nombre,:apellidos,:imagen,:anyo)');
            $insertar->bindValue(':nombre', $fallera->get_nombre());
            $insertar->bindValue(':apellidos', $fallera->get_apellidos());
            $insertar->bindValue(':imagen', $ruta);
            $insertar->bindValue(':anyo', $fallera->get_anyo());
            $insertar->execute();
            //$resultado=mysql_query($conexion,$insertar);
            $exito = 1;
            echo $exito;
            return $exito;
        } catch (exception $e) {
            $exito = 0;
            echo $exito;
            return $exito;
        }
        echo $exito;
    }
}
?>