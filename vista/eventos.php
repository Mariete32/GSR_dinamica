<?php
require_once "./plantillas/require.php";
/*require_once "../modelo/classes/inscritos.php";
require_once "../controlador/CRUDs/inscritos_CRUD.php";
require_once "../controlador/CRUDs/eventos_CRUD.php";*/

if (isset($_POST["Nombre"]) && isset($_POST["Apellidos"])) {
  $id=$_POST["eve_id"];
  $eve_id=intval($id);

  //creamos el objeto Inscrito_evento con los datos introducidos
  $inscrito = new Inscrito_evento($eve_id,$_POST["Nombre"], $_POST["Apellidos"], $_POST["Email"], $_POST["Texto"]);

  //insertamos el inscrito en la bbdd
  $crudInscrito = new CrudInscrito();
  $crudInscrito->insertarInscrito($inscrito);
  
}
//se comprueba recaptcha
if (isset($_POST['action']) && ($_POST['action'] == 'process')) {

  $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify'; 
  $recaptcha_secret = '6Le8JBMmAAAAAAz0gOKUDcYeAMcjhH0A4ryzrl7t'; 
  $recaptcha_response = $_POST['recaptcha_response']; 
  $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response); 
  $recaptcha = json_decode($recaptcha); 
  
  if($recaptcha->score >= 0.7){
  
    // código para procesar los campos y enviar el form
  
  } else {
  
    // código para lanzar aviso de error en el envío
  
  }
  
  }

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
      <form class="row g-3 mb-3 border-dark" action=eventos.php  method="POST">
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
        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

        <div class="col-12">
          <button class="btn btn-primary" type="submit">Enviar</button>
        </div>

      </form>
    </div>
  </div>

  <?php
require_once './plantillas/footer.php';
?>
</body>

</html>