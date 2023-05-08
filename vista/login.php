<?php
if (isset($_SESSION["usuario"])) {
  header("Location: ./edicion.php");
}
?>
<?php
require_once './plantillas/header.php';
?>
  <center>
  <form action="./edicion.php" method="POST" class="form1 card1 mt-3 ">
    <div class="card_header1">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
        <path fill="none" d="M0 0h24v24H0z"></path>
        <path fill="currentColor" d="M4 15h2v5h12V4H6v5H4V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6zm6-4V8l5 4-5 4v-3H2v-2h8z"></path>
      </svg>
      <h1 class="form_heading1">Sign in</h1>
    </div>
    <div class="field1">
      <label class="label" for="usuario">usuario</label>
      <input class="input1" name="usuario" type="text" placeholder="Usuario" id="usuario">
    </div>
    <div class="field1">
      <label class="label" for="contraseña">contraseña</label>
      <input class="input1" name="contraseña" type="contraseña" placeholder="Contraseña" id="contraseña">
    </div>
    <div class="field1">
      <button class="button1">Log in</button>
    </div>
  </form>
  
  <?php
require_once './plantillas/footer.php';
?>
</body>

</html>