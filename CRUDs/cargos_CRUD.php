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
    
    foreach ($resultado as $value) {
        $cargo = $value['car_tipo'];
        $car_id = $value['car_id'];
        echo "<option value=$car_id>" . $cargo . "</option>";
    }
    echo "</select>";
}
//funcion que devuelve el cargo actual
public function cargoActual($id)
{
    $conexion = database::conexion();
    $consulta = "SELECT car_tipo FROM cargos WHERE car_id=:car_id";
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->bindValue(':car_id', $id);
    $consultaPreparada->execute();
    $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultado as $value) {
        $cargo = $value['car_tipo'];
        
    }
    return $cargo;
}

}
