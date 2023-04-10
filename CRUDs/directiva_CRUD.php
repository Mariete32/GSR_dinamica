<?php
require_once './classes/junta_directiva.php';
require_once './classes/cargos.php';
require_once './BBDD/database.php';
class CrudDirectiva
{
    public function __construct(){}

//funcion que imprime la junta directiva actual en una tabla
    public function directivosActuales(){
        $conexion = database::conexion();
        $consulta = "SELECT directiva.jun_nombre, directiva.jun_apellidos, directiva.jun_anyo, cargos.car_tipo, cargos.car_id FROM directiva JOIN cargos ON directiva.`jun_cargo_id` = cargos.car_id ORDER BY directiva.jun_anyo DESC LIMIT 22";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        $presidenteInfantil ="";
        $falleraMayorInfantil = "";
        $presidente ="";
        foreach ($resultado as $value) {
            $nombre = $value['jun_nombre'];
            $apellidos = $value['jun_apellidos'];
            $anyo = $value['jun_anyo'];
            $tipo = $value['car_tipo'];
            $id = $value['car_id'];
            if ($id==1) {$presidente =$nombre." ".$apellidos;}
            if ($id==2) {$secretario =$nombre." ".$apellidos;}
            if ($id==3) {$vicesecretario =$nombre." ".$apellidos;}
            if ($id==4) {$vicepresidente1 =$nombre." ".$apellidos;}
            if ($id==5) {$vicepresidente2 =$nombre." ".$apellidos;}
            if ($id==6) {$vicepresidente3 =$nombre." ".$apellidos;}
            if ($id==7) {$vicepresidente4 =$nombre." ".$apellidos;}
            if ($id==8) {$tesorero =$nombre." ".$apellidos;}
            if ($id==9) {$contador =$nombre." ".$apellidos;}
            if ($id==10) {$vicecontador =$nombre." ".$apellidos;}
            if ($id==11) {$festejos =$nombre." ".$apellidos;}
            if ($id==12) {$diversas =$nombre." ".$apellidos;}
            if ($id==13) {$eventos =$nombre." ".$apellidos;}
            if ($id==14) {$protocolo =$nombre." ".$apellidos;}
            if ($id==15) {$deportes =$nombre." ".$apellidos;}
            if ($id==16) {$bar =$nombre." ".$apellidos;}
            if ($id==17) {$casal =$nombre." ".$apellidos;}
            if ($id==18) {$infantiles =$nombre." ".$apellidos;}
            if ($id==19) {$bibliotecario =$nombre." ".$apellidos;}
            if ($id==20) {$falleraMayor =$nombre." ".$apellidos;}
            if ($id==21) {$falleraMayorInfantil =$nombre." ".$apellidos;}
            if ($id==22) {$presidenteInfantil =$nombre." ".$apellidos;}            
        }    
        echo '<div class="table-responsive m-3">';    
        echo '<table class=" mx-auto col-12 table table-striped table-hover">';
        echo '<thead>';
        echo '    <tr>';
        echo "        <th class='text-center'>Presidente</th>";
        echo "       <th class='text-center'>Presidente infantil</th>";
        echo "       <th class='text-center'>Fallera mayor</th>";
        echo "      <th class='text-center'>Fallera mayor infantil</th>";
        echo '   </tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '    <tr>';
        echo "       <td class='text-center'>$presidente</td>";
        echo "       <td class='text-center'>$presidenteInfantil</td>";
        echo "       <td class='text-center'>$falleraMayor</td>";
        echo "       <td class='text-center'>$falleraMayorInfantil</td>";
        echo '   </tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';

        echo '<p class="text-center mt-3"><strong>ADMINSITRACIÓN</strong></p>';
        echo '<div class="table-responsive m-3">';
        echo '<table class="mx-auto col-12 table table-striped table-hover">';
        echo '<thead>';
        echo '    <tr>';
        echo "        <th class='text-center'>Secretario/a</th>";
        echo "        <th class='text-center'>Vicepresidente/a</th>";
        echo "        <th class='text-center'>Vicepresidente/a 1</th>";
        echo "        <th class='text-center'>Vicepresidente/a 2</th>";
        echo "        <th class='text-center'>Vicepresidente/a 3</th>";
        echo "        <th class='text-center'>Vicepresidente/a 4</th>";
        echo "        <th class='text-center'>Tesorero/a</th>";
        echo "        <th class='text-center'>Contador/a</th>";
        echo "        <th class='text-center'>Vicecontador/a</th>";
        echo "        <th class='text-center'>Bibliotecario/a</th>";

        echo '   </tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '    <tr>';
        echo "       <td class='text-center'>$secretario</td>";
        echo "       <td class='text-center'>$vicesecretario</td>";
        echo "       <td class='text-center'>$vicepresidente1</td>";
        echo "       <td class='text-center'>$vicepresidente2</td>";
        echo "       <td class='text-center'>$vicepresidente3</td>";
        echo "       <td class='text-center'>$vicepresidente4</td>";
        echo "       <td class='text-center'>$tesorero</td>";
        echo "       <td class='text-center'>$contador</td>";
        echo "       <td class='text-center'>$vicecontador</td>";
        echo "       <td class='text-center'>$bibliotecario</td>";

        echo '   </tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';

        echo '<p class="text-center mt-3"><strong>DELEGADOS</strong></p>';
        echo '<div class="table-responsive m-3">';
        echo '<table class="mx-auto col-12 table table-striped table-hover">';
        echo '<thead>';
        echo '    <tr>';
        echo "        <th class='text-center'>Festejos</th>";
        echo "        <th class='text-center'>Actividades diversas</th>";
        echo "        <th class='text-center'>Eventos</th>";
        echo "        <th class='text-center'>Protocolo</th>";
        echo "        <th class='text-center'>Deportes</th>";
        echo "        <th class='text-center'>Bar</th>";
        echo "        <th class='text-center'>Casal</th>";
        echo "        <th class='text-center'>Infantiles</th>";
        echo '   </tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '    <tr>';
        echo "       <td class='text-center'>$festejos</td>";
        echo "       <td class='text-center'>$diversas</td>";
        echo "       <td class='text-center'>$eventos</td>";
        echo "       <td class='text-center'>$protocolo</td>";
        echo "       <td class='text-center'>$deportes</td>";
        echo "       <td class='text-center'>$bar</td>";
        echo "       <td class='text-center'>$casal</td>";
        echo "       <td class='text-center'>$infantiles</td>";
        echo '   </tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';

    }
//funcion que devuelve una clase evento con sus datos
    public function datosEvento($eve_id){
        $conexion = database::conexion();
        $consulta = "SELECT * FROM directiva WHERE eve_id= :eve_id";
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
            $consulta = "DELETE FROM directiva WHERE  eve_id=:eve_id";
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
            $consultaPreparada->bindValue(':eve_fecha', $evento->get_nombre());
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
