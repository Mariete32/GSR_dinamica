<?php
require_once './classes/junta_directiva.php';
require_once './classes/cargos.php';
require_once './BBDD/database.php';
class CrudCargos
{
    public function __construct(){}
//funcion que devuelve una lista de los cargos
public function listaCargos(){
    $conexion = database::conexion();
    $consulta = "SELECT car_id, car_tipo FROM cargos";
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->execute();
    $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
    echo '<div class="mt-1 col-lg-2 col-md-4 col-sm-12>';
    echo'<p  class="text-center"><strong> Leyenda Cargos</strong></p>';
    
    foreach ($resultado as $value) {
        $car_id = $value["car_id"];
        $car_tipo = $value["car_tipo"];
        echo"<p > $car_id - $car_tipo</p>";
    }
    echo '</div>';
}

}
