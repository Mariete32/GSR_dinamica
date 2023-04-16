<?php
require_once './classes/junta_directiva.php';
require_once './classes/cargos.php';
require_once './BBDD/database.php';
class CrudRecurso{
    public function __construct()
    {}

//funcion que imprime las url de las imagenes de los directivos en un select
    public function listadoRecurso()
    {
        $directorio = "./imagenes/directiva"; // reemplaza "ruta/a/la/carpeta" con la ruta real de la carpeta que quieres leer
        $archivos = scandir($directorio);
        
        foreach ($archivos as $archivo) {
            // comprueba si el archivo es una imagen
            if (in_array(pathinfo($archivo, PATHINFO_EXTENSION), array('jpg', 'jpeg', 'png', 'gif'))) {
                $ruta= $directorio . '/' . $archivo ; // imprime la ruta completa del archivo
                echo "<option value=$ruta>" . $archivo . "</option>";
            }
        }
        echo "</select>";
    }
//funcion que imprime las url de las imagenes de los eventos en un select
    public function urlEventos()
    {
        $directorio = "./imagenes/imagenesEventos"; // reemplaza "ruta/a/la/carpeta" con la ruta real de la carpeta que quieres leer
        $archivos = scandir($directorio);
        
        foreach ($archivos as $archivo) {
            // comprueba si el archivo es una imagen
            if (in_array(pathinfo($archivo, PATHINFO_EXTENSION), array('jpg', 'jpeg', 'png', 'gif'))) {
                $ruta= $directorio . '/' . $archivo ; // imprime la ruta completa del archivo
                echo "<option value=$ruta>" . $archivo . "</option>";
            }
        }
        echo "</select>";
    }

    //funcion que imprime las url de los recursos en un select
    public function urlRcursos()
    {
        $directivas = "./imagenes/directiva"; // reemplaza "ruta/a/la/carpeta" con la ruta real de la carpeta que quieres leer
        $directivaRuta = scandir($directivas);
        $eventos = "./imagenes/imagenesEventos"; // reemplaza "ruta/a/la/carpeta" con la ruta real de la carpeta que quieres leer
        $eventoRuta = scandir($eventos);
        $premios = "./imagenes/Premios"; // reemplaza "ruta/a/la/carpeta" con la ruta real de la carpeta que quieres leer
        $premioRuta = scandir($premios);
        $bocetos = "./imagenes/bocetos"; // reemplaza "ruta/a/la/carpeta" con la ruta real de la carpeta que quieres leer
        $bocetosRuta = scandir($bocetos);
        $llibrets = "./llibrets"; // reemplaza "ruta/a/la/carpeta" con la ruta real de la carpeta que quieres leer
        $llibretsRuta = scandir($llibrets);
        echo "<option value=$eventoRuta> Imagen de eventos</option>";
        echo "<option value=$directivaRuta>Imagen de junta directiva</option>";
        echo "<option value=$premioRuta>Imagen de premio de monumento</option>";
        echo "<option value=$bocetosRuta>Imagen de monumento</option>";
        echo "<option value=$llibretsRuta>PDF de llibret</option>";
        /*
        foreach ($archivos as $archivo) {
            // comprueba si el archivo es una imagen
            if (in_array(pathinfo($archivo, PATHINFO_EXTENSION), array('jpg', 'jpeg', 'png', 'gif'))) {
                $ruta= $directorio . '/' . $archivo ; // imprime la ruta completa del archivo
                echo "<option value=$ruta>" . $archivo . "</option>";
            }
        }*/
        echo "</select>";
    }
}
