<?php
require_once "./classes/inscritos.php";
require_once "./CRUDs/inscritos_CRUD.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$inscrito= new CrudInscrito();
$inscrito->obtenerListaInscritos($_POST["eve_id"]);
?>
</body>
</html>