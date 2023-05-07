<?php

class PresidenteInfantil{

    protected $nombre;
    protected $apellidos;
    protected $anyo;
    protected $imagen;
    protected $id;

    function __construct($nombre,$apellidos,$imagen,$anyo){
        $this->nombre=$nombre;
        $this->anyo=$anyo;
        $this->apellidos=$apellidos;
        $this->imagen=$imagen;
    }
    //hacemos las funciones get de los datos del usuario
    public function get_nombre(){
        return $this->nombre;
    }
    public function get_apellidos(){
        return $this->apellidos;
    }
    public function get_anyo(){
        return $this->anyo;

    }
    public function get_imagen(){
        return $this->imagen;

    }
    public function get_id(){
        return $this->id;
    }
    public function set_id($idExistente){
        $this->id=$idExistente;

    }
}

?>