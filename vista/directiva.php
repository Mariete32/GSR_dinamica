<?php
require_once './plantillas/header.php';
?>
<main>
<?php
  require_once "../controlador/CRUDs/directiva_CRUD.php";
  $directiva = new CrudDirectiva();
  $directiva->directivosActuales();

require_once './plantillas/footer.php';
?>
</main>
</body>

</html>
