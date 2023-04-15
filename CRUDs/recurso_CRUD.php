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
        echo '<label for="Urlimg">Selecciona ruta imagen</label>';
        echo "<select id='Urlimg'class='form-select form-select-sm' name='Urlimg' >";
        echo "<option > Selecciona...</option>";
        foreach ($archivos as $archivo) {
            // comprueba si el archivo es una imagen
            if (in_array(pathinfo($archivo, PATHINFO_EXTENSION), array('jpg', 'jpeg', 'png', 'gif'))) {
                $ruta= $directorio . '/' . $archivo ; // imprime la ruta completa del archivo
                echo "<option value=$ruta>" . $ruta . "</option>";
            }
        }
        echo "</select>";
    }
//funcion que imprime las url de las imagenes de los eventos en un select
    public function urlEventos()
    {
        $directorio = "./imagenes/imageneseventos"; // reemplaza "ruta/a/la/carpeta" con la ruta real de la carpeta que quieres leer
        $archivos = scandir($directorio);
        echo '<label for="Urlimg">Selecciona ruta imagen</label>';
        echo "<select id='Urlimg'class='form-select form-select-sm' name='Urlimg' >";
        echo "<option > Selecciona...</option>";
        foreach ($archivos as $archivo) {
            // comprueba si el archivo es una imagen
            if (in_array(pathinfo($archivo, PATHINFO_EXTENSION), array('jpg', 'jpeg', 'png', 'gif'))) {
                $ruta= $directorio . '/' . $archivo ; // imprime la ruta completa del archivo
                echo "<option value=$ruta>" . $ruta . "</option>";
            }
        }
        echo "</select>";
    }
}
