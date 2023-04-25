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
    <?php
echo "<nav class='navbar navbar-expand-lg navbar-light' $conectado>";
?>
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

            <?php
            // cambiamos el icono de login por el de logout y editar con se esta logueado
              if (isset($_SESSION["usuario"])) {
                  echo '<li class="nav-item">';
                  echo '<a class="nav-link active" aria-current="page" href="edicion.php"><img src="./imagenes/editar.png" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"></img>';
                  echo '</a>';
                  echo ' </li>';
                  echo '<li class="nav-item">';
                  echo '<a class="nav-link active" aria-current="page" href="logout.php"><img src="./imagenes/log-out-.png" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"></img>';
                  echo '</a>';
                  echo ' </li>';

              } else {
                  echo '<li class="nav-item">';
                  echo '<a class="nav-link active" aria-current="page" href="login.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">';
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
  </header>
  <div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
          <span class="text-center w-100">1910-1919</span>
        </button>
      </h2>
      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
        data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <center>
            <div class="container">
              <div class="row col-lg-8 col-md-10 col-sm-12">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-touch="true" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                      aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                      aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                      aria-label="Slide 3"></button>
                    
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <h5>1912</h5>
                      <img src="imagenes/bocetos/1912.jpg" class="d-block " alt="1912">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1913</h5>
                      <img src="imagenes/bocetos/1913.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1915</h5>
                      <img src="imagenes/bocetos/1915.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1916</h5>
                      <img src="imagenes/bocetos/1916.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </center>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
          <span class="text-center w-100">1920-1929</span>
        </button>
      </h2>
      <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
        data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <center>
            <div class="container">
              <div class="row col-lg-8 col-md-10 col-sm-12">
                <div id="carouselExampleCaptions1" class="carousel slide" data-bs-touch="true" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="0" class="active"
                      aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="1"
                      aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="2"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="3"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="4"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="5"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="6"
                      aria-label="Slide 3"></button>
                  
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <h5>1921</h5>
                      <img src="imagenes/bocetos/1921.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1922</h5>
                      <img src="imagenes/bocetos/1922.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1925</h5>
                      <img src="imagenes/bocetos/1925.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1926</h5>
                      <img src="imagenes/bocetos/1926.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1927</h5>
                      <img src="imagenes/bocetos/1927.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1928</h5>
                      <img src="imagenes/bocetos/1928.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1929</h5>
                      <img src="imagenes/bocetos/1929.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>

                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions1"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions1"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </center>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
          <span class="text-center w-100">1930-1939</span>
        </button>
      </h2>
      <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
        data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <center>
            <div class="container">
              <div class="row col-lg-8 col-md-10 col-sm-12">
                <div id="carouselExampleCaptions2" class="carousel slide" data-bs-touch="true" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="0" class="active"
                      aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="1"
                      aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="2"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="3"
                      aria-label="Slide 3"></button>
                    
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <h5>1930</h5>
                      <img src="imagenes/bocetos/1930.jpg" class="d-block col-6" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1931</h5>
                      <img src="imagenes/bocetos/1931.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1933</h5>
                      <img src="imagenes/bocetos/1933.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1934</h5>
                      <img src="imagenes/bocetos/1934.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions2"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions2"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </center>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
          <span class="text-center w-100">1940-1949</span>
        </button>
      </h2>
      <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
        data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <center>
            <div class="container">
              <div class="row col-lg-8 col-md-10 col-sm-12">
                <div id="carouselExampleCaptions4" class="carousel slide" data-bs-touch="true" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions4" data-bs-slide-to="0" class="active"
                      aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions4" data-bs-slide-to="1"
                      aria-label="Slide 2"></button>
                                        
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      
                      <h5>1942</h5>
                      <img src="imagenes/bocetos/1942.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                      <div class="carousel-item">
                      <h5>1944</h5>
                      <img src="imagenes/bocetos/1944.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions4"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions4"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </center>
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingFive">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
          <span class="text-center w-100">1950-1959</span>
        </button>
      </h2>
      <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive"
        data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <center>
            <div class="container">
              <div class="row col-lg-8 col-md-10 col-sm-12">
                <div id="carouselExampleCaptions5" class="carousel slide" data-bs-touch="true" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions5" data-bs-slide-to="0" class="active"
                      aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions5" data-bs-slide-to="1"
                      aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions5" data-bs-slide-to="2"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions5" data-bs-slide-to="3"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions5" data-bs-slide-to="4"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions5" data-bs-slide-to="5"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions5" data-bs-slide-to="6"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions5" data-bs-slide-to="7"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions5" data-bs-slide-to="8"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions5" data-bs-slide-to="9"
                      aria-label="Slide 3"></button>

                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <h5>1950</h5>
                      <img src="imagenes/bocetos/1950.jpg" class="d-block col-6" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1951</h5>
                      <img src="imagenes/bocetos/1951.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1952</h5>
                      <img src="imagenes/bocetos/1952.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1953</h5>
                      <img src="imagenes/bocetos/1953.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1954</h5>
                      <img src="imagenes/bocetos/1954.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1955</h5>
                      <img src="imagenes/bocetos/1955.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1956</h5>
                      <img src="imagenes/bocetos/1956.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1957</h5>
                      <img src="imagenes/bocetos/1957.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1958</h5>
                      <img src="imagenes/bocetos/1958.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1959</h5>
                      <img src="imagenes/bocetos/1959.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>

                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions5"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions5"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </center>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingSix">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
          <span class="text-center w-100">1960-1969</span>
        </button>
      </h2>
      <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix"
        data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <center>
            <div class="container">
              <div class="row col-lg-8 col-md-10 col-sm-12">
                <div id="carouselExampleCaptions6" class="carousel slide" data-bs-touch="true" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions6" data-bs-slide-to="0" class="active"
                      aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions6" data-bs-slide-to="1"
                      aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions6" data-bs-slide-to="2"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions6" data-bs-slide-to="3"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions6" data-bs-slide-to="4"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions6" data-bs-slide-to="5"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions6" data-bs-slide-to="6"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions6" data-bs-slide-to="7"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions6" data-bs-slide-to="8"
                      aria-label="Slide 3"></button>
                    
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <h5>1960</h5>
                      <img src="imagenes/bocetos/1960.jpg" class="d-block col-6" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1961</h5>
                      <img src="imagenes/bocetos/1961.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1962</h5>
                      <img src="imagenes/bocetos/1962.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1963</h5>
                      <img src="imagenes/bocetos/1963.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1964</h5>
                      <img src="imagenes/bocetos/1964.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1965</h5>
                      <img src="imagenes/bocetos/1965.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1966</h5>
                      <img src="imagenes/bocetos/1966.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1967</h5>
                      <img src="imagenes/bocetos/1967.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1968</h5>
                      <img src="imagenes/bocetos/1968.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions6"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions6"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </center>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingSeven">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
          <span class="text-center w-100">1970-1979</span>
        </button>
      </h2>
      <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven"
        data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <center>
            <div class="container">
              <div class="row col-lg-8 col-md-10 col-sm-12">
                <div id="carouselExampleCaptions7" class="carousel slide" data-bs-touch="true" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions7" data-bs-slide-to="0" class="active"
                      aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions7" data-bs-slide-to="1"
                      aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions7" data-bs-slide-to="2"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions7" data-bs-slide-to="3"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions7" data-bs-slide-to="4"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions7" data-bs-slide-to="5"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions7" data-bs-slide-to="6"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions7" data-bs-slide-to="7"
                      aria-label="Slide 3"></button>
                    

                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <h5>1972</h5>
                      <img src="imagenes/bocetos/1972.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1973</h5>
                      <img src="imagenes/bocetos/1973.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1974</h5>
                      <img src="imagenes/bocetos/1974.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1975</h5>
                      <img src="imagenes/bocetos/1975.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1976</h5>
                      <img src="imagenes/bocetos/1976.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1977</h5>
                      <img src="imagenes/bocetos/1977.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1978</h5>
                      <img src="imagenes/bocetos/1978.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1979</h5>
                      <img src="imagenes/bocetos/1979.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>

                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions7"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions7"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </center>
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingOcho">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#flush-collapseOcho" aria-expanded="false" aria-controls="flush-collapseOcho">
          <span class="text-center w-100">1980-1989</span>
        </button>
      </h2>
      <div id="flush-collapseOcho" class="accordion-collapse collapse" aria-labelledby="flush-headingOcho"
        data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <center>
            <div class="container">
              <div class="row col-lg-8 col-md-10 col-sm-12">
                <div id="carouselExampleCaptions8" class="carousel slide" data-bs-touch="true" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions8" data-bs-slide-to="0" class="active"
                      aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions8" data-bs-slide-to="1"
                      aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions8" data-bs-slide-to="2"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions8" data-bs-slide-to="3"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions8" data-bs-slide-to="4"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions8" data-bs-slide-to="5"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions8" data-bs-slide-to="6"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions8" data-bs-slide-to="7"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions8" data-bs-slide-to="8"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions8" data-bs-slide-to="9"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions8" data-bs-slide-to="10"
                      aria-label="Slide 3"></button>


                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <h5>1980-1989</h5>
                      <img src="imagenes/bocetos/1980.jpg" class="d-block col-6" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>1980</h5>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1981</h5>
                      <img src="imagenes/bocetos/1981.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">

                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1982</h5>
                      <img src="imagenes/bocetos/1982.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1983</h5>
                      <img src="imagenes/bocetos/1983.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1984</h5>
                      <img src="imagenes/bocetos/1984.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1985</h5>
                      <img src="imagenes/bocetos/1985.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1986</h5>
                      <img src="imagenes/bocetos/1986.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1987</h5>
                      <img src="imagenes/bocetos/1987.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1988</h5>
                      <img src="imagenes/bocetos/1988.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1988</h5>
                      <img src="imagenes/bocetos/1988-i.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1989</h5>
                      <img src="imagenes/bocetos/1989.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>

                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions8"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions8"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </center>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingNueve">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#flush-collapseNueve" aria-expanded="false" aria-controls="flush-collapseNueve">
          <span class="text-center w-100">1990-1999</span>
        </button>
      </h2>
      <div id="flush-collapseNueve" class="accordion-collapse collapse" aria-labelledby="flush-headingNueve"
        data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <center>
            <div class="container">
              <div class="row col-lg-8 col-md-10 col-sm-12">
                <div id="carouselExampleCaptions9" class="carousel slide" data-bs-touch="true" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions9" data-bs-slide-to="0" class="active"
                      aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions9" data-bs-slide-to="1"
                      aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions9" data-bs-slide-to="2"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions9" data-bs-slide-to="3"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions9" data-bs-slide-to="4"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions9" data-bs-slide-to="5"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions9" data-bs-slide-to="6"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions9" data-bs-slide-to="7"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions9" data-bs-slide-to="8"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions9" data-bs-slide-to="9"
                      aria-label="Slide 3"></button>

                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <h5>1990</h5>
                      <img src="imagenes/bocetos/1990.jpg" class="d-block col-6" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1991</h5>
                      <img src="imagenes/bocetos/1991.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1992</h5>
                      <img src="imagenes/bocetos/1992.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1993</h5>
                      <img src="imagenes/bocetos/1993.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1994</h5>
                      <img src="imagenes/bocetos/1994.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1995</h5>
                      <img src="imagenes/bocetos/1995.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1996</h5>
                      <img src="imagenes/bocetos/1996.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1997</h5>
                      <img src="imagenes/bocetos/1997.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1998</h5>
                      <img src="imagenes/bocetos/1998.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>1999</h5>
                      <img src="imagenes/bocetos/1999.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>

                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions9"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions9"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </center>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingDiez">
        <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse"
          data-bs-target="#flush-collapseDiez" aria-expanded="false" aria-controls="flush-collapseDiez">
          <span class="text-center w-100">2000-2009</span>
        </button>
      </h2>
      <div id="flush-collapseDiez" class="accordion-collapse collapse" aria-labelledby="flush-headingDiez"
        data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <center>
            <div class="container">
              <div class="row col-lg-8 col-md-10 col-sm-12">
                <div id="carouselExampleCaptions10" class="carousel slide" data-bs-touch="true" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions10" data-bs-slide-to="0"
                      class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions10" data-bs-slide-to="1"
                      aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions10" data-bs-slide-to="2"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions10" data-bs-slide-to="3"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions10" data-bs-slide-to="4"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions10" data-bs-slide-to="5"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions10" data-bs-slide-to="6"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions10" data-bs-slide-to="7"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions10" data-bs-slide-to="8"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions10" data-bs-slide-to="9"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions10" data-bs-slide-to="10"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions10" data-bs-slide-to="11"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions10" data-bs-slide-to="12"
                      aria-label="Slide 3"></button>

                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <h5>2000</h5>
                      <img src="imagenes/bocetos/2000.jpg" class="d-block col-6" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2001</h5>
                      <img src="imagenes/bocetos/2001.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2002</h5>
                      <img src="imagenes/bocetos/2002.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2003</h5>
                      <img src="imagenes/bocetos/2003.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2004</h5>
                      <img src="imagenes/bocetos/2004.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2005</h5>
                      <img src="imagenes/bocetos/2005.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2006</h5>
                      <img src="imagenes/bocetos/2006.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2007</h5>
                      <img src="imagenes/bocetos/2007.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2007 infantil</h5>
                      <img src="imagenes/bocetos/2007-i.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2008</h5>
                      <img src="imagenes/bocetos/2008.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2008 infantil</h5>
                      <img src="imagenes/bocetos/2008-i.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2009</h5>
                      <img src="imagenes/bocetos/2009.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2009 infantil</h5>
                      <img src="imagenes/bocetos/2009-i.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions10"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions10"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </center>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingOnce">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#flush-collapseOnce" aria-expanded="false" aria-controls="flush-collapseOnce">
          <span class="text-center w-100">2010-2019</span>
        </button>
      </h2>
      <div id="flush-collapseOnce" class="accordion-collapse collapse" aria-labelledby="flush-headingOnce"
        data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <center>
            <div class="container">
              <div class="row col-lg-8 col-md-10 col-sm-12">
                <div id="carouselExampleCaptions11" class="carousel slide" data-bs-touch="true" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="0"
                      class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="1"
                      aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="2"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="3"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="4"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="5"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="6"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="7"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="8"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="9"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="10"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="11"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="12"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="13"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="14"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="15"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="16"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="17"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="18"
                      aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="19"
                      aria-label="Slide 3"></button>

                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <h5>2010</h5>
                      <img src="imagenes/bocetos/2010.jpg" class="d-block col-6" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2010 infantil</h5>
                      <img src="imagenes/bocetos/2010-i.jpg" class="d-block col-6" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2011</h5>
                      <img src="imagenes/bocetos/2011.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2011 infantil</h5>
                      <img src="imagenes/bocetos/2011-i.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2012</h5>
                      <img src="imagenes/bocetos/2012.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2012 infantil</h5>
                      <img src="imagenes/bocetos/2012-i.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2013</h5>
                      <img src="imagenes/bocetos/2013.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2013 infantil</h5>
                      <img src="imagenes/bocetos/2013-i.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2014</h5>
                      <img src="imagenes/bocetos/2014.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2014 infantil</h5>
                      <img src="imagenes/bocetos/2014-i.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2015</h5>
                      <img src="imagenes/bocetos/2015.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2015 infantil</h5>
                      <img src="imagenes/bocetos/2015-i.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2016</h5>
                      <img src="imagenes/bocetos/2016.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2016 infantil</h5>
                      <img src="imagenes/bocetos/2016-i.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2017</h5>
                      <img src="imagenes/bocetos/2017.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2017 infantil</h5>
                      <img src="imagenes/bocetos/2017-i.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2018</h5>
                      <img src="imagenes/bocetos/2018.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2018 infantil</h5>
                      <img src="imagenes/bocetos/2018-i.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2019</h5>
                      <img src="imagenes/bocetos/2019.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2019 infantil</h5>
                      <img src="imagenes/bocetos/2019-i.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions11"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions11"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </center>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingDoce">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#flush-collapseDoce" aria-expanded="false" aria-controls="flush-collapseDoce">
          <span class="text-center w-100">2020-2022</span>
        </button>
      </h2>
      <div id="flush-collapseDoce" class="accordion-collapse collapse" aria-labelledby="flush-headingDoce"
        data-bs-parent="#accordionFlushExample12">
        <div class="accordion-body">
          <center>
            <div class="container">
              <div class="row col-lg-8 col-md-10 col-sm-12">
                <div id="carouselExampleCaptions12" class="carousel slide" data-bs-touch="true" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions12" data-bs-slide-to="0"
                      class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions12" data-bs-slide-to="1"
                      aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions12" data-bs-slide-to="2"
                      aria-label="Slide 3"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions12" data-bs-slide-to="3"
                      aria-label="Slide 3"></button>
                    
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <h5>2021</h5>
                      <img src="imagenes/bocetos/2021.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2021 infantil</h5>
                      <img src="imagenes/bocetos/2021-i.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2022</h5>
                      <img src="imagenes/bocetos/2022.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <h5>2022 infantil</h5>
                      <img src="imagenes/bocetos/2022-i.jpg" class="d-block " alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions12"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions12"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </center>
        </div>
      </div>
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