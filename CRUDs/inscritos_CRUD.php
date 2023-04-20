<?php
require_once "./classes/inscritos.php";
require_once './BBDD/database.php';

class CrudInscrito{
    public function __construct()
    {}

//funcion que extrae el id de la bbdd si existe nombre y apellidos
    public function obtenerIdInscrito($inscrito)
    {
        $conexion = database::conexion();
        $consulta = 'SELECT * FROM inscritos_eventos WHERE ins_nombre=:ins_nombre AND ins_apellidos=:ins_apellidos';
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindvalue(":ins_nombre", $inscrito->get_ins_nombre());
        $consultaPreparada->bindvalue(":ins_apellidos", $inscrito->get_ins_apellidos());
        $consultaPreparada->execute();
        $id=0;
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $id = $fila["id"];
        }
        return $id;
    }

//funcion que nos imprime los inscritos a un eventos
    public function obtenerListaInscritos($idEvento)
    {
        $conexion = database::conexion();
        $consulta = "SELECT * FROM inscritos_eventos WHERE ins_eve_id=:ins_eve_id";
        $consulta_preparada = $conexion->prepare($consulta);
        $consulta_preparada->bindParam(':ins_eve_id', $idEvento);
        $consulta_preparada->execute();
        $resultado = $consulta_preparada->fetchAll(PDO::FETCH_ASSOC);
        $contador=0;
        foreach ($resultado as $valor) {
            $contador++;
            $nombre = $valor["ins_nombre"];
            $apellidos = $valor["ins_apellidos"];
            $email = $valor["ins_email"];
            $texto = $valor["ins_texto"];
            echo"$contador - $nombre $apellidos, $email, $texto";
            echo"<br>";            //$inscrito = new Inscrito_evento($nombre, $apellidos, $email, $texto);
        }
        //return $inscrito;
    }

//funcion que elimina el inscrito
    public function eliminarInscrito($ins_id)
    {
        $conexion = database::conexion();
        $consulta = "DELETE FROM inscritos_eventos WHERE  ins_id=:ins_id";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':ins_id', $ins_id);
        $consultaPreparada->execute();
    }

//funcion que inserta un inscrito en la bbdd
    public function insertarInscrito($inscrito){
        $conexion = Database::conexion();
        $insertar = $conexion->prepare('INSERT INTO inscritos_eventos values(NULL,:ins_eve_id,:ins_nombre,:ins_apellidos,:ins_email, :ins_texto)');
        $insertar->bindValue(':ins_eve_id', $inscrito->get_ins_eve_id());
        $insertar->bindValue(':ins_nombre', $inscrito->get_ins_nombre());
        $insertar->bindValue(':ins_apellidos', $inscrito->get_ins_apellidos());
        $insertar->bindValue(':ins_email', $inscrito->get_ins_email());
        $insertar->bindValue(':ins_texto', $inscrito->get_ins_texto());
        $insertar->execute();
    }

//funcion que actualiza los valores en la base de datos
    public static function editarInscrito($inscrito){
        try {
            $conexion = database::conexion();
            $id = $inscrito->get_ins_id();
            $actualizacion = "UPDATE inscritos_eventos SET ins_nombre=:ins_nombre, ins_apellidos=:ins_apellidos, ins_email=:ins_email,ins_texto=:ins_texto WHERE ins_id=$id";
            $consultaPreparada = $conexion->prepare($actualizacion);
            $consultaPreparada->bindValue(':ins_nombre', $inscrito->get_ins_nombre());
            $consultaPreparada->bindValue(':ins_apellidos', $inscrito->get_ins_apellidos());
            $consultaPreparada->bindValue(':ins_email', $inscrito->get_ins_email());
            $consultaPreparada->bindValue(':ins_texto', $inscrito->get_ins_texto());
            $consultaPreparada->bindValue(':id', $inscrito->get_id());
            $consultaPreparada->execute();
            $exito = 1;
            return $exito;
        } catch (exception $e) {
            $exito = 0;
            return $exito;
        }
    }
}
