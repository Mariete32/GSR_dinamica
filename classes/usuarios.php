<?php

class Usuario{

    protected $user;
    protected $password;
    protected $id;

    function __construct($user,$password){
        $this->user=$user;
        $this->password=$password;
    }
    function set_id($idExistente){
        $this->id=$id;
    }
    //hacemos las funciones get de los datos del usuario
    public function get_user(){
        return $this->user;
    }
    public function get_password(){
        return $this->password;

    }
    public function get_id(){
        return $this->id;
    }
    
}

?>