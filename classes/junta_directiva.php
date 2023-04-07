<?php

class Junta_directiva{

    protected $jun_nombre;
    protected $jun_apellidos;
    protected $jun_anyo;
    protected $jun_img;
    protected $jun_id;
    protected $jun_cargo_id;

    function __construct($jun_nombre,$jun_apellidos,$jun_img,$jun_anyo,$jun_cargo_id){
        $this->jun_nombre=$jun_nombre;
        $this->jun_anyo=$jun_anyo;
        $this->jun_apellidos=$jun_apellidos;
        $this->imagen=$imagen;
        $this->jun_cargo_id=$jun_cargo_id;
    }
    //hacemos las funciones get de los datos del usuario
    public function get_jun_nombre(){
        return $this->jun_nombre;
    }
    public function get_jun_apellidos(){
        return $this->jun_apellidos;
    }
    public function get_jun_anyo(){
        return $this->jun_anyo;

    }
    public function get_imagen(){
        return $this->imagen;

    }
    public function get_jun_cargo_id(){
        return $this->jun_cargo_id;

    }
    public function get_jun_id(){
        return $this->jun_id;

    }
    public function set_jun_id($jun_idExistente){
        $this->jun_id=$jun_idExistente;

    }
}