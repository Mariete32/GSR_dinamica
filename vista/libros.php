<?php
require_once "./plantillas/require.php";
require_once './plantillas/header.php';
?>
  <?php
      $falleras= new CrudRecurso();
      $falleras->listadoLLibret();
      
      ?>


<?php
require_once './plantillas/footer.php';
?>
</body>

</html>