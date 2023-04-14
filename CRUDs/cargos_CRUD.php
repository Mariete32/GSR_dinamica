<?php
require_once './classes/junta_directiva.php';
require_once './classes/cargos.php';
require_once './BBDD/database.php';
class CrudCargos
{
    public function __construct(){}

//funcion que imprime los cargos en un select
public function listadoCargos()
{
    $conexion = database::conexion();
    $consulta = "SELECT  car_id, car_tipo FROM cargos";
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->execute();
    $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
    echo '<label for="cargos">Selecciona cargo</label>';
    echo "<select id='cargos'class='form-select form-select-sm' name='cargoId' >";
    echo "<option > Selecciona...</option>";
    foreach ($resultado as $value) {
        $cargo = $value['car_tipo'];
        $car_id = $value['car_id'];
        echo "<option value=$car_id>" . $cargo . "</option>";
    }
    echo "</select>";
}
}
