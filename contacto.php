<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="anos_historia.js"></script>
  <link rel="stylesheet" href="estilos.css">
  <link rel="stylesheet" href="estilos2.css">
  <title>GSR</title>
</head>

<body>
  
  
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v14.0"
    nonce="IX9rRk67"></script>
  <header>
    <div class="container">
      <div class="row">
        <div class="align-self-center col-lg-2 col-md-2 col-sm-3 col-3">
          <img src="imagenes/escudo-falla.jpg" class="img-fluid rounded float-start"
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
              <image x="0" y="0" width="100%" height="100%" clip-path="url(#shape)" href="imagenes/loteria.jpeg"
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
    <nav class="navbar navbar-expand-lg navbar-light btn-azulclaro">
      <div class="container-fluid ">
        <a class="navbar-brand " href="index.html">INICIO</a>
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="historia.php">Historia</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="premios.php">Premios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="eventos.php">Eventos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="juntas.php">Juntas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="falleras_majores.php">Falleras mayores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="presidentes.php">Presidentes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="monumentos.php">Fallas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="libros.php">Llibrets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="directiva.php">Junta directiva</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="imagenes.php">Himno</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="programacion_fallera.php">Semana fallera</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="cuotas.php">Cuotas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="contacto.php">Contacto</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="login.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
              </svg>
              </a>
            </li>

            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="container">
    <div class="row ">

      <p class="text-center">Email: <strong> fallaguillemsorolla@hotmail.es</strong></p>
      <p class="text-center">Direcció:<strong> Calle en bany 32</strong> </p>
      <div class="text-center ">
        <div class="">
          <a class="m-2 link-light" href="https://www.facebook.com/guillemsorolla/">
            <img src="./imagenes/_facebook.png" class="rrss" alt="">
          </a>
          <a class="m-2 link-light" href="https://twitter.com/fguillemsor_rec">
            <img src="./imagenes/_twitter.png" class="rrss" alt="">
          </a>
          <a class="m-2 link-light" href="https://www.instagram.com/fallaguillemsorolla_recaredo/">
            <img src="./imagenes/Instagram_icon.png.webp" class="rrss" alt="">
          </a>
        </div>
      </div>

    </div>
  </div>
  <div>
    <center>
      <iframe class="mapa"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d380.3798082292185!2d-0.38298480690968867!3d39.472080741977145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd604f4f0d90e6bb%3A0x3a8f252dd79e103a!2sFalla%20Guillem%20Sorolla%20-%20Recaredo!5e0!3m2!1ses!2ses!4v1649858516384!5m2!1ses!2ses"
        width="80%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </center>
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