<?php
/*require_once "C:/xampp/htdocs/Proyecto_falla/modelo/classes/usuarios.php";*/
class CrudCuotas
{
    public function __construct()
    {}

//funcion que imprime las cuotas en una tabla
public function mapCuotas()
{
    $conexion = database::conexion();
    $consulta = "SELECT * FROM `cuotas` ";
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->execute();
    $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultado as $value) {
        $id = $value['cuota_id'];
        if ($id==12) {
            $titulo = "Niños 0-2 años";
        }
        if ($id==13) {
            $titulo = "Niños 2-4 años";
        }
        if ($id==14) {
            $titulo = "Niños 4-14 años";
        }
        if ($id==15) {
            $titulo = "Niños 14-16 años";
        }
        if ($id==16) {
            $titulo = "Niños 16-18 años";
        }
        if ($id==17) {
            $titulo = "Adultos";
        }
        $precio = $value['cuota_precio'];
        echo "<tr class='border border-bottom border-dark'>";
        echo "   <th class='text-center h2' scope='row'>$titulo</th>";
        echo "    <td class='text-center h2'>$precio €</td>";
        echo "  </tr>";
    }
    echo "</select>";
}
//funcion que elimina el Cuota
    public function eliminarCuota($id)
    {
        $conexion = database::conexion();
        $consulta = "DELETE FROM Cuotas WHERE  cuota_id=:cuota_id";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':cuota_id', $id);
        $consultaPreparada->execute();
    }
//---------------falta por hacer aqui abajo-------------------
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
