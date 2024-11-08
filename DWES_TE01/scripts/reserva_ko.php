<?php
session_start();

    //echo var_dump($_SESSION['validar']);

$validar = $_SESSION['validar'];

// Función para determinar el color de fondo según el estado de validación
function obtenerColor($campo) {
    global $validar;
    return $validar[$campo] ? 'background-color: #d4edda;' : 'background-color: #f8d7da;';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Vehículos</title>
</head>

    <body>

        <form name="input" action="valida.php" method="post">

            <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" style="<?= obtenerColor('nombre'); ?>"/><br />
            <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" style="<?= obtenerColor('apellido'); ?>"/><br />
            <label for="dni"> DNI:</label>
                <input type="text" name="dni" style="<?= obtenerColor('dni'); ?>"/><br />
            <label for="coches">Modelo de vehículo:</label>
                <select name ="coches" style="<?= obtenerColor('coche'); ?>">
                    <option value="Lancia Stratos">Lancia Stratos</option>
                    <option value="Audi Quattro">Audi Quattro</option>
                    <option value="Ford Escort RS1800">Ford Escort RS1800</option>
                    <option value="Subaru Impreza 555">Subaru Impreza 555</option>
                </select><br />
            <label for="fecha">Fecha de inicio de la reserva:</label>
                <input type="date" name="fecha" style="<?= obtenerColor('fecha'); ?>"/><br />
            <label for="duracion">Duración de la reserva:</label>
                <input type="number" name="duracion" style="<?= obtenerColor('duracion'); ?>"/><br />

            <input type="submit" value="Enviar" name="enviar"/>

        </form>

    </body>

</html>