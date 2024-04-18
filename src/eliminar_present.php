<?php
// Inicia la sesión
session_start();

// Incluye el archivo de conexión a la base de datos
require("../conexion.php");

// Obtiene el ID del usuario de la sesión
$id_user = $_SESSION['idUser'];

// Define el permiso requerido
$permiso = 'presentacion';

// Consulta para verificar los permisos del usuario
$sql = mysqli_query($conexion, "SELECT p.*, d.* FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_profesor = $id_user AND p.nombre = '$permiso'");

// Obtiene los resultados de la consulta
$existe = mysqli_fetch_all($sql);

// Verifica si el usuario tiene los permisos requeridos
if (empty($existe) && $id_user != 1) {
    // Redirige a la página de permisos si no tiene los permisos necesarios
    header("Location: permisos.php");
}

// Verifica si se proporciona un ID para eliminar una presentación
if (!empty($_GET['id'])) {
    // Obtiene el ID de la presentación a eliminar
    $id = $_GET['id'];

    // Elimina la presentación de la base de datos
    $query_delete = mysqli_query($conexion, "DELETE FROM sesion_deportiva WHERE id = $id");

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);

    // Redirige de vuelta a la página de sesión deportiva
    header("Location: sesion_deportiva.php");
}
?>
