<?php
require_once "./classes/inscritos.php";
require_once "./CRUDs/inscritos_CRUD.php";
require_once "./CRUDs/eventos_CRUD.php";

if (isset($_POST["Nombre"]) && isset($_POST["Apellidos"])) {
  $id=$_POST["eve_id"];
  $eve_id=intval($id);

  //creamos el objeto Inscrito_evento con los datos introducidos
  $inscrito = new Inscrito_evento($eve_id,$_POST["Nombre"], $_POST["Apellidos"], $_POST["Email"], $_POST["Texto"]);

  //insertamos el inscrito en la bbdd
  $crudInscrito = new CrudInscrito();
  $crudInscrito->insertarInscrito($inscrito);
  
}
?>
<?php
require_once './plantillas/header.php';
?>
  <div id="ww_720bcd72f1778" v='1.3' loc='id'
    a='{"t":"responsive","lang":"es","sl_lpl":1,"ids":["wl4500"],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"image","cl_font":"#FFFFFF","cl_cloud":"#FFFFFF","cl_persp":"#81D4FA","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722","sl_tof":"5"}'>
    Weather Data Source: <a href="https://sharpweather.com/es/tiempo_valencia/semana/" id="ww_720bcd72f1778_u"
      target="_blank">pronóstico para 7 dias Valencia</a></div>
  <script async src="https://app1.weatherwidget.org/js/?id=ww_720bcd72f1778"></script>
  <?php
  $fecha_actual = date('Y-m-d');

  $eventos = new CrudEventos();
  $eventos->eliminarEventosPasados($fecha_actual);
  $eventos->eventos();
  ?>

  <div class="container">
    <div class="row col-lg-12">
      <!-- action="https://formsubmit.co/d551e9122ec63de4621fdfbe72141e52" -->
      <form class="row g-3 mb-3" action=eventos.php  method="POST">
        <?php
        $eventos->eventosSuscripcion()
        ?>
        <div class="col-md-3">
          <label for="validationDefault01" class="form-label">Nombre</label>
          <input name="Nombre" type="text" class="form-control" id="validationDefault01" required>
        </div>
        <div class="col-md-3">
          <label for="validationDefault02" class="form-label">Apellidos</label>
          <input name="Apellidos" type="text" class="form-control" id="validationDefault02" required>
        </div>
        <div class="col-md-3">
          <label for="inputEmail4" class="form-label">Email</label>
          <input name="Email" type="email" class="form-control" id="inputEmail4">
        </div>
        <div class="input-group">
          <span class="input-group-text">Texto</span>
          <textarea name="Texto" class="form-control" aria-label="With textarea"></textarea>
        </div>

        <div class="col-12">
          <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
      </form>
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

</html>