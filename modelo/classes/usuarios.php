<?php

class Usuario{

    protected $user_login;
    protected $user_password;
    protected $user_id;
    protected $user_rol;

    function __construct($user_login,$user_password,$user_rol){
        $this->user_login=$user_login;
        $this->user_password=$user_password;
        $this->user_rol=$user_rol;

    }
    function set_user_id($user_idExistente){
        $this->user_id=$user_idExistente;
    }
    //hacemos las funciones get de los datos del usuario
    public function get_user_login(){
        return $this->user_login;
    }
    public function get_user_password(){
        return $this->user_password;

    }
    public function get_user_rol(){
        return $this->user_rol;
    }
    public function get_user_id(){
        return $this->user_id;
    }
    
}

?>