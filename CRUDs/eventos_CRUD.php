<?php
require_once './classes/evento.php';
require_once './BBDD/database.php';
class CrudEventos
{
    public function __construct()
    {}

    //funcion que devuelve una clase fallera con sus datos
    public function datosEventos($anyo)
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

//funcion que imprime los eventos en tarjetas ($fecha, $fechaLimite, $titulo, $detalles, $suscripcion, $url);
    public function eventos(){
        $conexion = database::conexion();
        $consulta = "SELECT * FROM eventos ORDER BY `eve_fecha`";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        echo '<div class="container ">';
        echo '<center>';
        echo '<div class="row col-12">';
        foreach ($resultado as $value) {
            $id = $value['eve_id'];
            $fecha = $value['eve_fecha'];
            $fecha = date('d-m-Y', strtotime($fecha));
            $mes = date("m", strtotime($fecha));
            $fechaLimite = $value['eve_fecha_limite_inscripcion'];
            $titulo = $value['eve_titulo'];
            $detalles = $value['eve_detalles'];
            $suscripcion = $value['eve_suscripcion'];
            $url = $value['eve_url_img'];
            if ($mes == 1) {$mes = "enero";}
            if ($mes == 2) {$mes = "febrero";}
            if ($mes == 3) {$mes = "marzo";}
            if ($mes == 4) {$mes = "abril";}
            if ($mes == 5) {$mes = "mayo";}
            if ($mes == 6) {$mes = "junio";}
            if ($mes == 7) {$mes = "julio";}
            if ($mes == 8) {$mes = "agosto";}
            if ($mes == 9) {$mes = "septiembre";}
            if ($mes == 10) {$mes = "octubre";}
            if ($mes == 11) {$mes = "noviembre";}
            if ($mes == 12) {$mes = "diciembre";}
            echo "<div class='card text-center col-lg-3 col-md-4 col-sm-12 m-auto mt-2' style='width: 18rem; '>";
            echo "  <div class='card-body  pb-4'>";
            echo "   <div class='card-border-top btn-$mes'></div>";
            echo "<div class='m-1'>";
            echo "<img src='$url' class='w-100 h-100' style='max-width: 150px'></div>";            
            echo "   <div class='card-title img h-50 btn-azulclaro d-flex align-items-center'>";
            echo "     <h3 class='mx-auto'>$fecha</h3>";
            echo '   </div>';
            if ($fechaLimite) {
                //cambiamos el formato de la fecha
                $fechaLimite = date('d-m-Y', strtotime($fechaLimite));
                $fondo = "danger";
                echo "     <h5 class='card-title img h-50 w-100 m-2 btn-$fondo '>fecha límite de inscripción $fechaLimite</h5>";
            }
            echo '  <div class="accordion accordion-flush m-4" id="accordionFlushExample">';
            echo '      <div class="accordion-item">';
            echo "       <h2 class='accordion-header' id='flush-heading$id'>";
            echo '         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"';
            echo "           data-bs-target='#flush-collapse$id' aria-expanded='false' aria-controls='flush-collapse$id'>";
            echo "           <span class='text-center w-100'>$titulo</span>";
            echo '         </button>';
            echo '       </h2>';
            echo "       <div id='flush-collapse$id' class='accordion-collapse collapse' aria-labelledby='flush-heading$id'";
            echo '        data-bs-parent="#accordionFlushExample">';
            echo '        <div class="accordion-body">';
            echo "          <p>$detalles</p>";
            echo '        </div>';
            echo '      </div>';
            echo '    </div>';
            echo '  </div>';
            echo ' </div>';
            echo '  </div>';
        }
    }
//funcion que devuelve una clase evento con sus datos
    public function datosEventoID($id){
        $conexion = database::conexion();
        $consulta = "SELECT * FROM eventos WHERE id= :id";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':id', $id);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $value) {
            $fecha = $value["eve_fecha"];
            $fechaLimite = $value["eve_fecha_limite_inscripcion"];
            $titulo = $value["eve_titulo"];
            $detalles = $value["eve_detalles"];
            $suscripcion = $value["eve_suscripcion"];
            $url = $value["eve_url_img"];
            $evento = new Evento($fecha, $fechaLimite, $titulo, $detalles, $suscripcion, $url);
        }
        return $evento;
    }
//funcion que imprime el nombre de las falleras en un select
public function eventosSuscripcion()
{
    $conexion = database::conexion();
    $consulta = "SELECT * FROM `eventos` WHERE `eve_suscripcion`= True";
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->execute();
    $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
    echo "<div class='col-md-3'>";
    echo  "    <label for='validationDefault02' class='form-label'>Dia del evento</label>";
    echo "     <input name='Dia' type='text' placeholder='DD/MM/AAAA' class='form-control' id='validationDefault02' required></div>";
    echo "<label for='evento'>Fallera</label>";
    
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
    public static function editarfallera($fallera)
    {
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
    public function insertarFallera($fallera, $imagenSize, $imagenTemp_name)
    {
        var_dump($fallera);
        //$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/proyecto_falla/imagenes/';fallerasMayores
        $carpeta_destino = 'imagenes/fallerasMayores/';
        $ruta = $carpeta_destino . $fallera->get_imagen();

        move_uploaded_file($imagenTemp_name, $ruta);
        try {
            $conexion = Database::conexion();

            //$archivo_objetivo=fopen($ruta,"rb");
            echo $ruta;
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
