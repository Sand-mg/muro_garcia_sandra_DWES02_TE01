<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Vehículos</title>
</head>
    <body>

        <form name="input" action="scripts/valida.php" method="post">

            <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" /><br />
            <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" /><br />
            <label for="dni"> DNI:</label>
                <input type="text" name="dni" /><br />
            <label for="coches">Modelo de vehículo:</label>
                <select name ="coches">
                    <option value="Lancia Stratos">Lancia Stratos</option>
                    <option value="Audi Quattro">Audi Quattro</option>
                    <option value="Ford Escort RS1800">Ford Escort RS1800</option>
                    <option value="Subaru Impreza 555">Subaru Impreza 555</option>
                </select><br />
            <label for="fecha">Fecha de inicio de la reserva:</label>
                <input type="date" name="fecha" /><br />
            <label for="duracion">Duración de la reserva:</label>
                <input type="number" name="duracion" /><br />

            <input type="submit" value="Enviar" name="enviar"/>

        </form>

    </body>

</html>

