<?php
require_once "./plantillas/require.php";
require_once './plantillas/header.php';
?>
<div class="container">
    <div class="row mt-3 justify-content-evenly">
      <?php
      $premios= new CrudRecurso();
      $premios->cardsPremios();
      
      ?>
    </div>
  </div>
<?php
require_once './plantillas/footer.php';
?>
</body>

</html>