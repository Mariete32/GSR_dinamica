<?php

class Cuota{

    protected $id;
    protected $titulo;
    protected $precio;


    function __construct($titulo,$precio){
        $this->titulo=$titulo;
        $this->precio=$precio;
    }
    //hacemos las funciones get de los datos del usuario
    public function get_titulo(){
        return $this->titulo;
    }
    public function get_precio(){
        return $this->precio;
    }

    public function get_id(){
        return $this->id;

    }
    public function set_id($idExistente){
        $this->id=$idExistente;

    }
}