<?php
    session_start();
        $nombre = $_SESSION['sesion']['nombre'];
        $apellido = $_SESSION['sesion']['apellido'];
        $coche_elegido = $_SESSION['sesion']['coche'];


//Muestra mensaje con nombre y apellido e imagen del coche seleccionado.

echo "La reserva de '$nombre $apellido' es válida";
$ruta_img = seleccionar_img($coche_elegido);
?>
<br/><img src="<?=$ruta_img ?>" alt ="Imagen Coche" width= 400px height= 200px/>

<?php
//Mostrar imagen de coche elegido.
        function seleccionar_img($coche_elegido) {
            switch ($coche_elegido) {
                case "Lancia Stratos":
                    return "../img/lancia_stratos.jpg";
                case "Audi Quattro":
                    return "../img/audi_quattro.jpg";
                case "Ford Escort RS1800":
                    return "../img/ford_escort_rs1800.jpg";
                case "Subaru Impreza 555":
                    return "../img/subaru_impreza_555.jpg";
            } 
        }
?>
