<?php
require_once "C:/xampp/htdocs/Proyecto_falla/modelo/classes/usuarios.php";
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
    public function obtenerDatosUsuario($id)
    {
        $conexion = database::conexion();
        $consulta = "SELECT * FROM usuarios WHERE user_id=:user_id";
        $consulta_preparada = $conexion->prepare($consulta);
        $consulta_preparada->bindParam(':user_id', $id);
        $consulta_preparada->execute();
        $resultado = $consulta_preparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $valor) {
            $user = $valor["user_login"];
            $password = $valor["user_password"];
            $rol = $valor["user_rol"];
            $usuario = new Usuario($user, $password, $rol);
        }
        return $usuario;
    }
//funcion que imprime los usuarios de ese tipo en un select
public function nombresUsuarios()
{
    $conexion = database::conexion();
    $consulta = "SELECT * FROM `usuarios` ";
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->execute();
    $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
    echo '<label class="fw-bold" for="recurso">Selecciona usuario</label>';
    echo "<select id='recurso'class='form-select form-select-md' name='usuarioSeleccionado' >";
    echo "<option selected disabled value=''> Selecciona...</option>";    //quitamos el primer elemento de administrador para que no se pueda modificar o eliminar
    array_shift($resultado);
    foreach ($resultado as $value) {
        $id = $value['user_id'];
        $login = $value['user_login'];
        $pass = $value['user_password'];
        $rol = $value['user_rol'];
        echo "<option value=$id>" . $login . "</option>";
    }
    echo "</select>";
}
//funcion que elimina el usuario
    public function eliminarUsuario($id)
    {
        $conexion = database::conexion();
        $consulta = "DELETE FROM usuarios WHERE  user_id=:user_id";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':user_id', $id);
        $consultaPreparada->execute();
    }

//funcion que inserta un usuario en la bbdd
    public function insertarUsuario($usuario)
    {
        $conexion = Database::conexion();
        $insertar = $conexion->prepare('INSERT INTO `usuarios` values(NULL,:user_login,:user_password,:user_rol)');
        $insertar->bindValue(':user_login', $usuario->get_user_login());
        $insertar->bindValue(':user_password', $usuario->get_user_password());
        $insertar->bindValue(':user_rol', $usuario->get_user_rol());
        $insertar->execute();
    }

//funcion que actualiza los valores en la base de datos
    public static function editarUsuario($usuario)
    {
        try {
            $conexion = database::conexion();
            $id = $usuario->get_user_id();
            $actualizacion = "UPDATE usuarios SET user_login=:user_login, user_password=:user_password, user_rol=:user_rol WHERE user_id=$id";
            $consultaPreparada = $conexion->prepare($actualizacion);
            $consultaPreparada->bindValue(':user_login', $usuario->get_user_login());
            $consultaPreparada->bindValue(':user_password', $usuario->get_user_password());
            $consultaPreparada->bindValue(':user_rol', $usuario->get_user_rol());
            $consultaPreparada->execute();
            $exito = 1;
            return $exito;
        } catch (exception $e) {
            $exito = 0;
            return $exito;
        }
    }
}
