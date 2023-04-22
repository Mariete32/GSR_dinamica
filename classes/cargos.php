<?php
require_once "./classes/Junta_directiva.php";

class car_tipo extends Junta_directiva{

    protected $car_tipo;
    protected $car_id;
    protected $car_nivel;
    public function __construct($jun_nombre,$jun_apellidos,$jun_img,$jun_anyo,$jun_car_tipo_id, $car_tipo, $car_id,$car_nivel)
    {

        parent::__construct($jun_nombre,$jun_apellidos,$jun_img,$jun_anyo,$jun_car_tipo_id);

        $this->car_tipo = $car_tipo;

        $this->car_id = $car_id;
        $this->car_nivel = $car_nivel;

    }

    public function get_car_id(){
        return $this->car_id;

    }

    public function get_car_nivel(){
        return $this->car_nivel;

    }
    public function get_car_tipo(){
        return $this->car_tipo;

    }
    public function set_car_id($car_id){
        $this->car_id=$car_id;

    }
}
?>