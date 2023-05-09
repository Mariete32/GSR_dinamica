<?php
require_once "./plantillas/require.php";
require_once './plantillas/header.php';
?>
<main>

  <div class="container">
    <div class="row col-12">
      <table class="table">
        <thead>
          <tr>
            <th scope="col"></th>
            <th class="text-center display-5" scope="col">CUOTAS 22/23</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $cuotas = new CrudCuotas();
          $cuotas->mapCuotas();
          ?>
          
        </tbody>
      </table>
    </div>
  </div>
  <?php
require_once './plantillas/footer.php';
?>
</body>

</html>