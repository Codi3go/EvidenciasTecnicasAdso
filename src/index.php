<?php
// Requiere el archivo de conexión a la base de datos
require "../conexion.php";

// Consulta para obtener el total de profesores
$profesores = mysqli_query($conexion, "SELECT * FROM profesor");
$total['profesores'] = mysqli_num_rows($profesores);

// Consulta para obtener el total de clientes
$deportistas = mysqli_query($conexion, "SELECT * FROM deportista");
$total['deportista'] = mysqli_num_rows($deportistas);

// Inicia la sesión
session_start();

// Incluye el encabezado de la página
include_once "includes/header.php";
?>

<?php
// Consulta para obtener los datos de los vídeos
$consulta = "SELECT * FROM misvideos";
$resultados = mysqli_query($conexion, $consulta);

// Recorre los resultados de la consulta
while ($fila = mysqli_fetch_array($resultados)) {
    // Obtiene los datos de cada vídeo
    $nombre = $fila['nombre'];
    $sinopsis = $fila['sinopsis'];
    $url = $fila['url'];

    // Define la visión y la misión del club deportivo
    $vision = "Ser reconocidos como el mejor club deportivo de la región, promoviendo el desarrollo integral de nuestros deportistas.";
    $mision = "Brindar oportunidades de formación deportiva de calidad, inculcando valores de respeto, disciplina y trabajo en equipo.";
}
?>

<div class="video-container">
    <!-- Muestra el vídeo -->
    <video src="<?php echo $url; ?>" autoplay muted loop></video>
    <div class="content">
        <!-- Muestra el título y la sinopsis del vídeo -->
        <h1><?php echo $nombre; ?></h1>
        <p><?php echo $sinopsis; ?></p>
        <!-- Muestra la visión y la misión del club deportivo -->
        <h2>Visión</h2>
        <p><?php echo $vision; ?></p>
        <h2>Misión</h2>
        <p><?php echo $mision; ?></p>
    </div>
</div>

<?php
// Incluye el pie de página
include_once "includes/footer.php";
?>
