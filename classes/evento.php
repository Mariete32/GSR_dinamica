<?php

class Evento{
    protected $eve_id;
    protected $eve_fecha;
    protected $eve_fecha_limite_inscripcion;
    protected $eve_titulo;
    protected $eve_detalles;
    protected $eve_suscripcion;
    protected $eve_url_ima;

    function __construct($eve_fecha,$eve_fecha_limite_inscripcion,$eve_titulo,$eve_detalles,$eve_suscripcion,$eve_url_ima){
        $this->eve_fecha=$eve_fecha;
        $this->eve_fecha_limite_inscripcion=$eve_fecha_limite_inscripcion;
        $this->eve_titulo=$eve_titulo;
        $this->eve_detalles=$eve_detalles;
        $this->eve_suscripcion=$eve_suscripcion;
        $this->eve_url_ima=$eve_url_ima;
    }
    //hacemos las funciones get de los datos del usuario
    public function get_fecha(){
        return $this->eve_fecha;
    }
    public function get_eve_fecha_limite_inscripcion(){
        return $this->eve_fecha_limite_inscripcion;
    }
    public function get_eve_titulo(){
        return $this->eve_titulo;

    }
    public function get_eve_detalles(){
        return $this->eve_detalles;

    }
    public function get_eve_suscripcion(){
        return $this->eve_suscripcion;

    }
    public function get_eve_url_ima(){
        return $this->eve_url_ima;

    }
    public function get_eve_id(){
        return $this->eve_id;

    }
    public function set_eve_id($eve_id){
        $this->eve_id=$eve_id;

    }
}