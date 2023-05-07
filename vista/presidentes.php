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

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>