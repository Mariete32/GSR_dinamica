<?php
require_once './plantillas/header.php';
?>

  <div class="container">
    <div class="row mt-3">
      <?php
      $falleras= new CrudRecurso();
      $falleras->cardsFalleras();
      
      ?>
    </div>
  </div>
  
  
  <footer class="btn-azulclaro footer">
    <div class="text-center">
      <p class="">Síguenos en: </p>
      <a class="mx-2 link-light" href="https://www.facebook.com/guillemsorolla/">
        <img src="./imagenes/_facebook.png" class="rrss" alt="">
      </a>
      <a class="mx-2 link-light" href="https://twitter.com/fguillemsor_rec">
        <img src="./imagenes/_twitter.png" class="rrss" alt="">
      </a>
      <a class="mx-2 link-light" href="https://www.instagram.com/fallaguillemsorolla_recaredo/">
        <img src="./imagenes/Instagram_icon.png.webp" class="rrss" alt="">
      </a>
    </div>
    <a class="mx-5 link-dark nav-link" href="aviso_legal.html">Aviso legal</a>

  </footer>

  <script src="bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>