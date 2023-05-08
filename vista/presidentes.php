<?php
require_once './plantillas/header.php';
?>
  <div class="container">
    <div class="row mt-3">
      <?php
      $presidentes= new CrudRecurso();
      $presidentes->cardsPresidentes();
      
      ?>
    </div>
  </div>
  <?php
require_once './plantillas/footer.php';
?>
</body>