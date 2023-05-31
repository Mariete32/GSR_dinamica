<?php
session_start();
$conectado = (isset($_SESSION["usuario"])) ? "style='background-color: #9cfbb6;'" : "style='background-color: #e3f2fd;'";
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="anos_historia.js"></script>
  <script src='https://www.google.com/recaptcha/api.js?render=6Lf1IxMmAAAAAKQk9zDeJJChjInjij542C1QSVGN'></script>
<script>
    grecaptcha.ready(function() {
    grecaptcha.execute('6Lf1IxMmAAAAAKQk9zDeJJChjInjij542C1QSVGN', {action: 'formulario'})
    .then(function(token) {
    var recaptchaResponse = document.getElementById('recaptchaResponse');
    recaptchaResponse.value = token;
    });});
</script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link active rel="stylesheet" href="../estilazos.css">
  <link active rel="stylesheet" href="../login.css">
  <link active rel="stylesheet" href="../footer.css">
  <title>GSR</title>
</head>

<body style='background-image: linear-gradient(180deg, rgba(255, 221, 144, 0.01), #ffe6c9 85%), radial-gradient(ellipse at top left, rgba(255, 129, 129, 0.5), transparent 50%), radial-gradient(ellipse at top right, rgba(255, 155, 79, 0.5), transparent 50%), radial-gradient(ellipse at center right, rgba(182, 197, 253, 0.5), transparent 50%), radial-gradient(ellipse at center left, rgba(253, 182, 200, 0.5), transparent 50%);'>


  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v14.0"
    nonce="IX9rRk67"></script>
  <header>
    <div class="container">
      <div class="row my-1">
        <div class="align-self-center col-lg-2 col-md-2 col-sm-3 col-3">
          <img src="../imagenes/escudo-falla.png" class="img-fluid rounded float-start"
            alt="falla Guillem Sorolla i Recaredo">
        </div>
        <div class="align-self-center text-center col-lg-8 col-md-8 col-sm-6 col-6">
          <p class="display-4" id="nombreFalla">Falla Guillem Sorolla i Recaredo</p>
          <p class="h3" id="historia"></p>
        </div>
        <div class="align-self-center col-lg-2 col-md-2 col-sm-3 col-3">
          <div class="text-center align-self-bottom">LOTERIA</div>
          <a href="https://www.labrujitagenerosa.es/loteria-empresas-verlot.php?GadMS=1">
            <svg class="align-self-center col-12" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500"
              width="300px" id="blobSvg" filter="blur(0px)" style="opacity: 1;" transform="rotate(-9)">
              <image x="0" y="0" width="100%" height="100%" clip-path="url(#shape)" href="../imagenes/loteria.jpeg"
                preserveAspectRatio="none"></image>
              <defs>
                <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                  <stop offset="0%" style="stop-color: rgb(133, 106, 71);"></stop>
                  <stop offset="100%" style="stop-color: rgb(133, 106, 71);"></stop>
                </linearGradient>
              </defs>
              <clipPath id="shape">
                <path id="blob" fill="url(#gradient)">
                  <animate attributeName="d" dur="2300ms" repeatCount="indefinite"
                    values="M440.5,320.5Q418,391,355.5,442.5Q293,494,226,450.5Q159,407,99,367Q39,327,31.5,247.5Q24,168,89,125.5Q154,83,219.5,68Q285,53,335.5,94.5Q386,136,424.5,193Q463,250,440.5,320.5Z;M453.78747,319.98894Q416.97789,389.97789,353.96683,436.87838Q290.95577,483.77887,223.95577,447.43366Q156.95577,411.08845,105.64373,365.97789Q54.33169,320.86732,62.67444,252.61056Q71.01719,184.3538,113.01965,135.21007Q155.02211,86.06634,220.52211,66.46683Q286.02211,46.86732,335.5,91.94472Q384.97789,137.02211,437.78747,193.51106Q490.59704,250,453.78747,319.98894Z;M411.39826,313.90633Q402.59677,377.81265,342.92059,407.63957Q283.24442,437.46649,215.13648,432.5428Q147.02853,427.61911,82.23325,380.9572Q17.43796,334.29529,20.45223,250.83809Q23.46649,167.38089,82.5856,115.05707Q141.70471,62.73325,212.19045,63.73015Q282.67618,64.72705,352.67308,84.79839Q422.66998,104.86972,421.43486,177.43486Q420.19974,250,411.39826,313.90633Z;M440.5,320.5Q418,391,355.5,442.5Q293,494,226,450.5Q159,407,99,367Q39,327,31.5,247.5Q24,168,89,125.5Q154,83,219.5,68Q285,53,335.5,94.5Q386,136,424.5,193Q463,250,440.5,320.5Z;">
                  </animate>
                </path>
              </clipPath>
            </svg>
          </a>
        </div>
      </div>
    </div>
    <?php
    echo "<div  $conectado><div class='container '>  <nav class='navbar p-0 navbar-expand-sm navbar-light' >";
    ?>
      <div class="container-fluid ">
        <a class="navbar-brand " href="../index.php">INICIO</a>
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav mx-5 ">
            <li class="nav-item  ">
              <a class="nav-link my-2 active" aria-current="page" href="historia.php">Historia</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link my-2 active" aria-current="page" href="premios.php">Premios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link my-2 active " aria-current="page" href="eventos.php">Eventos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link my-2 active " aria-current="page" href="falleras_majores.php">Falleras mayores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link my-2 active " aria-current="page" href="presidentes.php">Presidentes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link my-2 active " aria-current="page" href="monumentos.php">Fallas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link my-2 active " aria-current="page" href="libros.php">Llibrets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link my-2 active " aria-current="page" href="directiva.php">Junta directiva</a>
            </li>
            <li class="nav-item">
              <a class="nav-link my-2 active " aria-current="page" href="imagenes.php">Himno</a>
            </li>
            <li class="nav-item">
              <a class="nav-link my-2 active " aria-current="page" href="cuotas.php">Cuotas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link my-2 active " aria-current="page" href="contacto.php">Contacto</a>
            </li>

            <?php
            // cambiamos el icono de login por el de logout y editar con se esta logueado
            if (isset($_SESSION["usuario"])) {
                echo '<li class="nav-item">';
                echo '<a class="nav-link my-2 active " aria-current="page" href="edicion.php"><img src="..//imagenes/editar.png" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"></img>';
                echo '</a>';
                echo ' </li>';
                echo '<li class="nav-item">';
                echo '<a class="nav-link my-2 active " aria-current="page" href="logout.php"><img src="..//imagenes/log-out-.png" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"></img>';
                echo '</a>';
                echo ' </li>';

            } else {
                echo '<li class="nav-item">';
                echo '<a class="nav-link my-2 active " aria-current="page" href="login.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">';
                echo '<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>';
                echo '<path d="M12 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>';
                echo '<path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>';
                echo '</svg>';
                echo '</a>';
                echo ' </li>';
            }
            ?>
              </li>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    </div>
    </div>
    </header>
    <main class="my-1">