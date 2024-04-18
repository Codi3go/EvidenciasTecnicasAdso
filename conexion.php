<?php
    // Definición de los parámetros de conexión
    $host = "localhost"; // Nombre del servidor de la base de datos
    $user = "root"; // Nombre de usuario de la base de datos
    $clave = ""; // Contraseña de usuario de la base de datos
    $bd = "angeles"; // Nombre de la base de datos

    // Establecer la conexión con la base de datos utilizando MySQLi
    $conexion = mysqli_connect($host, $user, $clave, $bd);

    // Verificar si la conexión fue exitosa
    if (mysqli_connect_errno()) {
        echo "No se pudo conectar a la base de datos"; // Mostrar mensaje de error en caso de fallo en la conexión
        exit(); // Finalizar el script
    }

    // Seleccionar la base de datos a utilizar
    mysqli_select_db($conexion, $bd) or die("No se encuentra la base de datos");

    // Establecer el juego de caracteres a utf8 para la conexión
    mysqli_set_charset($conexion, "utf8");
?>
