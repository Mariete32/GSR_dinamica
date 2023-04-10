<?php
require_once './classes/evento.php';
require_once './BBDD/database.php';
class CrudEventos
{
    public function __construct(){}

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
        //hacemos una carda por evento
        foreach ($resultado as $value) {
            $id = $value['eve_id'];
            //cambiamos el formato de la fecha
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
            echo "        <div id='flush-collapse$id' class='accordion-collapse collapse' aria-labelledby='flush-heading$id'";
            echo '        data-bs-parent="#accordionFlushExample">';
            echo '          <div class="accordion-body p-1">';
            echo "            <p'>$detalles</p>";
            echo '          </div>';
            echo '        </div>';
            echo '      </div>';
            echo '  </div>';
            echo ' </div>';
            echo ' </div>';
        }
        echo '</div>';
        echo '</div>';
    }
//funcion que devuelve una clase evento con sus datos
    public function datosEvento($eve_id){
        $conexion = database::conexion();
        $consulta = "SELECT * FROM eventos WHERE eve_id= :eve_id";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':eve_id', $eve_id);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $value) {
            $fecha = $value["eve_fecha"];
            $fechaLimite = $value["eve_fecha_limite_inscripcion"];
            $eve_titulo = $value["eve_titulo"];
            $eve_detalles = $value["eve_detalles"];
            $suscripcion = $value["eve_suscripcion"];
            $url = $value["eve_url_img"];
            $evento = new Evento($fecha, $fechaLimite, $eve_titulo, $eve_detalles, $suscripcion, $url);
        }
        return $evento;
    }
//funcion que imprime el nombre de las eventos en un select
public function eventosSuscripcion()
{
    $conexion = database::conexion();
    $consulta = "SELECT * FROM `eventos` WHERE `eve_suscripcion`= True";
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->execute();
    $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
    echo "<div class='col-md-3'>";
    echo '<label for="evento">Evento</label>';
    echo "<select id='evento' class='form-select form-select-md mt-2' name='eve_id' >";
    foreach ($resultado as $value) {
        $id = $value["eve_id"];
        //cambiamos el formato de la fecha
        $fecha = $value["eve_fecha"];
        $fecha = date('d-m-Y', strtotime($fecha));

        $fechaLimite = $value["eve_fecha_limite_inscripcion"];
        $eve_titulo = $value["eve_titulo"];
        $eve_detalles = $value["eve_detalles"];
        $suscripcion = $value["eve_suscripcion"];
        $url = $value["eve_url_img"];
        echo "<option value=$id> $eve_titulo $fecha </option>";
    }
    echo "</select>";
    echo"</div>";
}

//funcion que elimina el evento
    public function eliminarEvento($idEvento)
    {
        try {
            $conexion = database::conexion();
            $consulta = "DELETE FROM eventos WHERE  eve_id=:eve_id";
            $consultaPreparada = $conexion->prepare($consulta);
            $consultaPreparada->bindValue(':eve_id', $eve_id);
            $consultaPreparada->execute();
            $exito = 1;
            return $exito;
        } catch (exception $e) {
            $exito = 0;
            return $exito;
        }
    }

//funcion que actualiza los valores en la base de datos
    public static function editarEvento($evento)
    {
        try {
            $conexion = database::conexion();
            $eve_id = $evento->get_eve_id();
            $actualizacion = "UPDATE eventos SET eve_fecha=:eve_fecha, eve_fecha_limite_inscripcion=:eve_fecha_limite_inscripcion, eve_titulo=:eve_titulo, eve_detalles=:eve_detalles, eve_suscripcion=:eve_suscripcion, eve_url_img=:eve_url_img WHERE eve_id=$eve_id";
            $consultaPreparada = $conexion->prepare($actualizacion);
            $consultaPreparada->bindValue(':eve_fecha', $evento->get_eve_fecha());
            $consultaPreparada->bindValue(':eve_fecha_limite_inscripcion', $evento->get_eve_fecha_limite_inscripcion());
            $consultaPreparada->bindValue(':eve_titulo', $evento->get_eve_titulo());
            $consultaPreparada->bindValue(':eve_detalles', $evento->get_eve_detalles());
            $consultaPreparada->bindValue(':eve_suscripcion', $evento->get_eve_suscripcion());
            $consultaPreparada->bindValue(':eve_url_img', $evento->get_eve_url_img());
            $consultaPreparada->execute();
            $exito = 1;
            return $exito;
        } catch (exception $e) {
            $exito = 0;
            return $exito;
        }
    }

//funcion que inserta un evento en la bbdd
    public function insertarEvento($evento)
    {
        try {
            $conexion = Database::conexion();
            $insertar = $conexion->prepare('INSERT INTO eventos values(NULL,:eve_fecha,:eve_fecha_limite_inscripcion,:eve_titulo,:eve_detalles,:eve_suscripcion,:eve_url_img)');
            $insertar->bindValue(':eve_fecha', $evento->get_eve_fecha());
            $insertar->bindValue(':eve_fecha_limite_inscripcion', $evento->get_eve_fecha_limite_inscripcion());
            $insertar->bindValue(':eve_titulo', $evento->get_eve_titulo());
            $insertar->bindValue(':eve_detalles', $evento->get_eve_detalles());
            $insertar->bindValue(':eve_suscripcion', $evento->get_eve_suscripcion());
            $insertar->bindValue(':eve_url_img', $evento->get_eve_url_img());
            $insertar->execute();
            $exito = 1;
            return $exito;
        } catch (exception $e) {
            $exito = 0;
            return $exito;
        }
    }
}
