<?php

class Inscrito_evento{

    protected $ins_id;
    protected $ins_nombre;
    protected $ins_apellidos;
    protected $ins_email;
    protected $ins_texto;
    protected $ins_eve_id;

    function __construct($ins_eve_id,$ins_nombre,$ins_apellidos,$ins_email,$ins_texto){
        $this->ins_eve_id=$ins_eve_id;
        $this->ins_nombre=$ins_nombre;
        $this->ins_email=$ins_email;
        $this->ins_apellidos=$ins_apellidos;
        $this->ins_texto=$ins_texto;
    }
    //hacemos las funciones get de los datos del usuario
    public function get_ins_nombre(){
        return $this->ins_nombre;
    }
    public function get_ins_apellidos(){
        return $this->ins_apellidos;
    }
    public function get_ins_email(){
        return $this->ins_email;

    }
    public function get_ins_texto(){
        return $this->ins_texto;

    }
    public function get_ins_eve_id(){
        return $this->ins_eve_id;

    }
    public function get_ins_id(){
        return $this->ins_id;

    }
    public function set_ins_id($ins_idExistente){
        $this->ins_id=$ins_idExistente;

    }
}