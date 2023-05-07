<?php

class Recurso{

    protected $rec_nombre;
    protected $rec_anyo;
    protected $rec_tipo;
    protected $rec_id;
    protected $rec_url;

    function __construct($rec_nombre,$rec_anyo,$rec_tipo,$rec_url){
        $this->rec_nombre=$rec_nombre;
        $this->rec_anyo=$rec_anyo;
        $this->rec_tipo=$rec_tipo;
        $this->rec_url=$rec_url;
    }
    //hacemos las funciones get de los datos del usuario
    public function get_rec_nombre(){
        return $this->rec_nombre;
    }
    
    public function get_rec_anyo(){
        return $this->rec_anyo;

    }
    public function get_rec_tipo(){
        return $this->rec_tipo;

    }
    public function get_rec_url(){
        return $this->rec_url;

    }
    public function get_rec_id(){
        return $this->rec_id;

    }
    public function set_rec_id($rec_idExistente){
        $this->rec_id=$rec_idExistente;

    }
}