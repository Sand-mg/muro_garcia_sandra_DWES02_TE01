<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar</title>
</head>
    <body>


<?php
//abrir sesión
session_start();
// Creación de Variable
    $_SESSION['validar'] = array(
            "nombre" => false,
            "apellido" => false,
            "dni" => false,
            "coche" => false,
            "fecha" => false,
            "duracion" => false
        );


//Validación


    //Importar archivo dónde están los datos.
    require 'bbdd.php';

    //Primera comprobación de que los campos nombre y apellido no estén vacíos y que se cumpla el modelo 23 para el DNI
    if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && validar_dni($_POST['dni'])) {

        //Se guardan los datos del usuario y se crea array con el usuario introducido.
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $usuario = array(
                        "nombre" => $nombre,
                        "apellido" => $apellido,
                        "dni" => $dni
                        );
        
        //Llama a la función que comprueba si el usuario está registrado.
        $usuario_valido = validar_usuario($usuario);

        //Primera comprobación de fecha superior a día actual y duración entre 1 y 30 días.
        if (($_POST['fecha'] > date("Y-m-d"))) {
            //Fecha validada
            $_SESSION['validar']['fecha'] = true;
            if (($_POST['duracion']) >= 1 && (($_POST['duracion']) <= 30)) {
            //Duración válida
            $_SESSION['validar']['duracion'] = true;

            //Guardamos el coche elegido del formulario.
            $coche_elegido = $_POST['coches'];
            
            //Comprobar si el modelo elegido está disponible.
            $coche_disponible = false;
            foreach($coches as $coche) {
                if ($coche['modelo'] === $coche_elegido) {
                    $coche_disponible = $coche['disponible'];
                    if ($coche_disponible) {
                        $_SESSION['validar']['coche'] = true;
                        echo var_dump($_SESSION['validar']);
                    }
                    break;
                }
            }
            }
        }

            //Si el usuario está registrado y el coche disponible la reserva es válida.
            if ($coche_disponible && $usuario_valido) {
                //Variables de sesión con datos de la reserva para mandar a la página de reserva válida
                
                $_SESSION['sesion'] = array();
                $_SESSION['sesion']['nombre'] = $nombre;
                $_SESSION['sesion']['apellido'] = $apellido;
                $_SESSION['sesion']['coche'] = $coche_elegido;
                //echo var_dump($_SESSION['sesion']);
                header("Location: reserva_valida.php");
            } else {
                echo "Reserva no válida";
                header("Location: reserva_ko.php");
            }
    }


    else {
        echo " reserva no valida";
        header("Location: reserva_ko.php");
    }

    //validar dni
        function validar_dni($dni){
            $letra = substr($dni, -1);
            $numeros = substr($dni, 0, -1);
            if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen($numeros) == 8 ){
                return true;
            }else{
                return false;
            }
        }

    //Usuario en bbdd o no. Registrado o no.
        function validar_usuario($usuario) {
            if (in_array($usuario, USUARIOS)) {
                $_SESSION['validar']['nombre'] = true;
                $_SESSION['validar']['apellido'] = true;
                $_SESSION['validar']['dni'] = true;
                //echo var_dump($_SESSION['validar']);
                return true;
            }
            else {
                echo "usuario no registrado";
                return false;
            }
        }

        ?>

    </body>

</html>









