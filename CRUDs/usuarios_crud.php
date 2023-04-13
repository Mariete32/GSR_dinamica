<?php
require_once "./classes/usuarios.php";
class CrudUsuario
{
    public function __construct()
    {}

//funcion que extrae el rol de la bbdd si existe el user_login y contraseña
    public function obtenerRolUsuario($login, $password)
    {
        $conexion = database::conexion();
        $consulta = 'SELECT * FROM usuarios WHERE user_login=:user_login AND user_password=:user_password';
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindvalue(":user_login", $login);
        $consultaPreparada->bindvalue(":user_password", $password);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $id = $fila["user_id"];
            $rol= $fila["user_rol"];
            $login=$fila["user_login"];
            $password=$fila["user_password"];
            $usuario = new Usuario($login, $password, $rol);
        }
        return $usuario;
    }

//funcion que nos devuelve la clase usuario con el user y contraseña pasandole el ID
    public function obtenerUserPassword($id)
    {
        $conexion = database::conexion();
        $consulta = "SELECT * FROM usuarios WHERE id=:id";
        $consulta_preparada = $conexion->prepare($consulta);
        $consulta_preparada->bindParam(':id', $id);
        $consulta_preparada->execute();
        $resultado = $consulta_preparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $valor) {
            $user = $valor["user"];
            $password = $valor["password"];
            $usuario = new Usuario($user, $password);
        }
        return $usuario;
    }

//funcion que elimina el usuario
    public function eliminarUsuario($id)
    {
        $conexion = database::conexion();
        $consulta = "DELETE FROM usuarios WHERE  id=:id";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':id', $id);
        $consultaPreparada->execute();
    }

//funcion que inserta un usuario en la bbdd
    public function insertarUsuario($usuario)
    {
        $conexion = Database::conexion();
        $insertar = $conexion->prepare('INSERT INTO usuarios values(NULL,:user,:password,FALSE)');
        $insertar->bindValue(':user', $usuario->user());
        $insertar->bindValue(':password', $usuario->get_password());
        $consultaPreparada->execute();
    }

//funcion que actualiza los valores en la base de datos
    public static function editarUsuario($usuario)
    {
        try {
            $conexion = database::conexion();
            $id = $usuario->get_id();
            $actualizacion = "UPDATE usuarios SET user=:user, password=:password, id=:id WHERE id=$id";
            $consultaPreparada = $conexion->prepare($actualizacion);
            $consultaPreparada->bindValue(':user', $usuario->user());
            $consultaPreparada->bindValue(':password', $usuario->get_password());
            $consultaPreparada->bindValue(':id', $usuario->get_id());
            $consultaPreparada->execute();
            $exito = 1;
            return $exito;
        } catch (exception $e) {
            $exito = 0;
            return $exito;
        }
    }
}
