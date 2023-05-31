<?php
/*require_once 'C:/xampp/htdocs/Proyecto_falla/modelo/classes/junta_directiva.php';
require_once 'C:/xampp/htdocs/Proyecto_falla/modelo/classes/cargos.php';
require_once 'C:/xampp/htdocs/Proyecto_falla/controlador/BBDD/database.php';*/
class CrudDirectiva
{
    public function __construct()
    {}

//funcion que imprime la junta directiva actual en una tabla
    public function directivosActuales()
    {
        $conexion = database::conexion();
        $consulta = "SELECT d.jun_nombre, d.jun_apellidos, d.jun_anyo, c.car_tipo, c.car_id 
        FROM directiva d 
        INNER JOIN cargos c ON d.jun_cargo_id = c.car_id 
        WHERE d.jun_anyo = (SELECT MAX(jun_anyo) FROM directiva) 
        ORDER BY d.jun_anyo 
        DESC LIMIT 22"; 
        //La cláusula WHERE filtra los registros en función de la condición especificada. 
        //En este caso, se seleccionarán solo aquellos registros en los que el valor de jun_anyo en la tabla 
        //directiva sea igual al máximo valor de jun_anyo en la misma tabla. Esto asegura que solo se tomen 
        //los registros correspondientes al año más alto.
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        $presidenteInfantil = "";
        $presidente = "";
        $secretario = "";
        $vicesecretario = "";
        $vicepresidente1 = "";
        $vicepresidente2 = "";
        $vicepresidente3 = "";
        $vicepresidente4 = "";
        $tesorero = "";
        $contador = "";
        $vicecontador = "";
        $festejos = "";
        $diversas = "";
        $eventos = "";
        $protocolo = "";
        $deportes = "";
        $bar = "";
        $casal = "";
        $infantiles = "";
        $bibliotecario = "";
        $falleraMayor = "";
        $falleraMayorInfantil = "";
        foreach ($resultado as $value) {
            $nombre = $value['jun_nombre'];
            $apellidos = $value['jun_apellidos'];
            $anyo = $value['jun_anyo'];
            $tipo = $value['car_tipo'];
            $id = $value['car_id'];
            if ($id == 1) {$presidente = $nombre . " " . $apellidos;}
            if ($id == 2) {$secretario = $nombre . " " . $apellidos;}
            if ($id == 3) {$vicesecretario = $nombre . " " . $apellidos;}
            if ($id == 4) {$vicepresidente1 = $nombre . " " . $apellidos;}
            if ($id == 5) {$vicepresidente2 = $nombre . " " . $apellidos;}
            if ($id == 6) {$vicepresidente3 = $nombre . " " . $apellidos;}
            if ($id == 7) {$vicepresidente4 = $nombre . " " . $apellidos;}
            if ($id == 8) {$tesorero = $nombre . " " . $apellidos;}
            if ($id == 9) {$contador = $nombre . " " . $apellidos;}
            if ($id == 10) {$vicecontador = $nombre . " " . $apellidos;}
            if ($id == 11) {$festejos = $nombre . " " . $apellidos;}
            if ($id == 12) {$diversas = $nombre . " " . $apellidos;}
            if ($id == 13) {$eventos = $nombre . " " . $apellidos;}
            if ($id == 14) {$protocolo = $nombre . " " . $apellidos;}
            if ($id == 15) {$deportes = $nombre . " " . $apellidos;}
            if ($id == 16) {$bar = $nombre . " " . $apellidos;}
            if ($id == 17) {$casal = $nombre . " " . $apellidos;}
            if ($id == 18) {$infantiles = $nombre . " " . $apellidos;}
            if ($id == 19) {$bibliotecario = $nombre . " " . $apellidos;}
            if ($id == 20) {$falleraMayor = $nombre . " " . $apellidos;}
            if ($id == 21) {$falleraMayorInfantil = $nombre . " " . $apellidos;}
            if ($id == 22) {$presidenteInfantil = $nombre . " " . $apellidos;}
        }
        echo '<p class="text-center mt-3"><strong>PRESIDENCIA</strong></p>';
        echo '<div class="table-responsive m-3">';
        echo '<table class=" mx-auto col-12 table table-striped table-bordered border-dark table-striped table-hover">';
        echo '<thead class="border-2">';
        echo '    <tr>';
        echo "        <th class='text-center border-2'>Presidente</th>";
        echo "       <th class='text-center border-2'>Presidente infantil</th>";
        echo "       <th class='text-center border-2'>Fallera mayor</th>";
        echo "      <th class='text-center border-2'>Fallera mayor infantil</th>";
        echo '   </tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '    <tr>';
        echo "       <td class='text-center border-2'>$presidente</td>";
        echo "       <td class='text-center border-2'>$presidenteInfantil</td>";
        echo "       <td class='text-center border-2'>$falleraMayor</td>";
        echo "       <td class='text-center border-2'>$falleraMayorInfantil</td>";
        echo '   </tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';

        echo '<p class="text-center mt-3"><strong>ADMINSITRACIÓN</strong></p>';
        echo '<div class="table-responsive m-3">';
        echo '<table class="mx-auto col-12 table table-striped table-hover table-bordered border-dark">';
        echo '<thead>';
        echo '    <tr>';
        echo "        <th class='text-center border-2'>Secretario/a</th>";
        echo "        <th class='text-center border-2'>Vicepresidente/a</th>";
        echo "        <th class='text-center border-2'>Vicepresidente/a 1</th>";
        echo "        <th class='text-center border-2'>Vicepresidente/a 2</th>";
        echo "        <th class='text-center border-2'>Vicepresidente/a 3</th>";
        echo "        <th class='text-center border-2'>Vicepresidente/a 4</th>";
        echo "        <th class='text-center border-2'>Tesorero/a</th>";
        echo "        <th class='text-center border-2'>Contador/a</th>";
        echo "        <th class='text-center border-2'>Vicecontador/a</th>";
        echo "        <th class='text-center border-2'>Bibliotecario/a</th>";

        echo '   </tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '    <tr>';
        echo "       <td class='text-center border-2'>$secretario</td>";
        echo "       <td class='text-center border-2'>$vicesecretario</td>";
        echo "       <td class='text-center border-2'>$vicepresidente1</td>";
        echo "       <td class='text-center border-2'>$vicepresidente2</td>";
        echo "       <td class='text-center border-2'>$vicepresidente3</td>";
        echo "       <td class='text-center border-2'>$vicepresidente4</td>";
        echo "       <td class='text-center border-2'>$tesorero</td>";
        echo "       <td class='text-center border-2'>$contador</td>";
        echo "       <td class='text-center border-2'>$vicecontador</td>";
        echo "       <td class='text-center border-2'>$bibliotecario</td>";

        echo '   </tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';

        echo '<p class="text-center mt-3"><strong>DELEGADOS</strong></p>';
        echo '<div class="table-responsive m-3">';
        echo '<table class="mx-auto col-12 table table-striped table-hover table-bordered border-dark">';
        echo '<thead>';
        echo '    <tr>';
        echo "        <th class='text-center border-2'>Festejos</th>";
        echo "        <th class='text-center border-2'>Actividades diversas</th>";
        echo "        <th class='text-center border-2'>Eventos</th>";
        echo "        <th class='text-center border-2'>Protocolo</th>";
        echo "        <th class='text-center border-2'>Deportes</th>";
        echo "        <th class='text-center border-2'>Bar</th>";
        echo "        <th class='text-center border-2'>Casal</th>";
        echo "        <th class='text-center border-2'>Infantiles</th>";
        echo '   </tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '    <tr>';
        echo "       <td class='text-center border-2'>$festejos</td>";
        echo "       <td class='text-center border-2'>$diversas</td>";
        echo "       <td class='text-center border-2'>$eventos</td>";
        echo "       <td class='text-center border-2'>$protocolo</td>";
        echo "       <td class='text-center border-2'>$deportes</td>";
        echo "       <td class='text-center border-2'>$bar</td>";
        echo "       <td class='text-center border-2'>$casal</td>";
        echo "       <td class='text-center border-2'>$infantiles</td>";
        echo '   </tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';

    }

//funcion que imprime los años en un select
    public function anyos()
    {
        $conexion = database::conexion();
        $consulta = "SELECT DISTINCT jun_anyo FROM directiva ORDER BY jun_anyo DESC";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        echo '<label for="directiva"><strong>seleciona año</strong></label>';
        echo "<select id='directiva'class='form-select form-select-md' name='anyos' >";
        if (isset($_POST["anyos"])) {
            $anyos = $_POST["anyos"];
            echo "<option selected>$anyos</option>";
        } else {
            echo "<option selected disabled value=''>Seleccionar</option>";
        }

        foreach ($resultado as $value) {
            $anyo = $value['jun_anyo'];
            echo "<option value=$anyo>" . $anyo . "</option>";
        }
        echo "</select>";
    }
//funcion que imprime el nombre de los directivos en un select
    public function nombresDirectivos($anyo)
    {
        $conexion = database::conexion();
        $consulta = "SELECT * FROM directiva WHERE jun_anyo=$anyo";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        echo '<label for="directivos"><strong>Selecciona directivo</strong></label>';
        echo "<select id='directivos'class='form-select form-select-MD' name='directivo' >";
        echo "<option selected disabled value=''>Seleccionar</option>";
        foreach ($resultado as $value) {
            $id = $value['jun_id'];
            $nombre = $value['jun_nombre'];
            $apellidos = $value['jun_apellidos'];
            $nombreCompleto = $nombre . ' ' . $apellidos;
            echo "<option value=$id>" . $nombreCompleto . "</option>";
        }
        echo "</select>";
    }

//funcion que devuelve una clase directivo con sus datos
    public function datosDirectivoID($id)
    {
        $conexion = database::conexion();
        $consulta = "SELECT * FROM directiva WHERE jun_id= :jun_id";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':jun_id', $id);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $value) {
            $jun_nombre = $value["jun_nombre"];
            $jun_apellidos = $value["jun_apellidos"];
            $jun_img = $value["jun_img"];
            $jun_anyo = $value["jun_anyo"];
            $jun_cargo_id = $value["jun_cargo_id"];

            $directivo = new Junta_directiva($jun_nombre, $jun_apellidos, $jun_img, $jun_anyo, $jun_cargo_id);
        }
        return $directivo;
    }

    
//funcion que elimina el directivo
    public function eliminarDirectivo($idDirectivo)
    {
        try {
            $conexion = database::conexion();
            $consulta = "DELETE FROM directiva WHERE  jun_id=:jun_id";
            $consultaPreparada = $conexion->prepare($consulta);
            $consultaPreparada->bindValue(':jun_id', $idDirectivo);
            $consultaPreparada->execute();
            $exito = 1;
            return $exito;
        } catch (exception $e) {
            $exito = 0;
            return $exito;
        }
    }

//funcion que actualiza los valores en la base de datos
    public static function editarDirectivo($directivo)
    {
        try {
            $conexion = database::conexion();
            $jun_id = $directivo->get_jun_id();
            $actualizacion = "UPDATE directiva SET jun_id=:jun_id, jun_nombre=:jun_nombre, jun_apellidos=:jun_apellidos, jun_img=:jun_img, jun_anyo=:jun_anyo, jun_cargo_id=:jun_cargo_id WHERE jun_id=$jun_id";
            $consultaPreparada = $conexion->prepare($actualizacion);
            $consultaPreparada->bindValue(':jun_id', $directivo->get_jun_id());
            $consultaPreparada->bindValue(':jun_nombre', $directivo->get_jun_nombre());
            $consultaPreparada->bindValue(':jun_apellidos', $directivo->get_jun_apellidos());
            $consultaPreparada->bindValue(':jun_img', $directivo->get_jun_img());
            $consultaPreparada->bindValue(':jun_anyo', $directivo->get_jun_anyo());
            $consultaPreparada->bindValue(':jun_cargo_id', $directivo->get_jun_cargo_id());
            $consultaPreparada->execute();
            $exito = 1;
            return $exito;
        } catch (exception $e) {
            $exito = 0;
            return $exito;
        }
    }

//funcion que inserta un directivo en la bbdd
    public function insertarDirectivo($directivo)
    {
        try {
            $conexion = Database::conexion();
            $insertar = $conexion->prepare('INSERT INTO directiva values(NULL,:jun_nombre,:jun_apellidos,:jun_img,:jun_anyo,:jun_cargo_id)');
            $insertar->bindValue(':jun_nombre', $directivo->get_jun_nombre());
            $insertar->bindValue(':jun_apellidos', $directivo->get_jun_apellidos());
            $insertar->bindValue(':jun_img', $directivo->get_jun_img());
            $insertar->bindValue(':jun_anyo', $directivo->get_jun_anyo());
            $insertar->bindValue(':jun_cargo_id', $directivo->get_jun_cargo_id());
            $insertar->execute();
            $exito = 1;
            return $exito;
        } catch (exception $e) {
            $exito = 0;
            return $exito;
        }
    }
}
