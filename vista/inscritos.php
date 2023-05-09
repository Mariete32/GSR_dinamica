<?php
require_once "./plantillas/require.php";
/*require_once "../modelo/classes/inscritos.php";
require_once "../controlador/CRUDs/inscritos_CRUD.php";*/

require_once './plantillas/header.php';

$inscrito= new CrudInscrito();
$inscrito->obtenerListaInscritos($_POST["eve_id"]);

require_once './plantillas/footer.php';
?>
</body>
</html>