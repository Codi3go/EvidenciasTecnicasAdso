<?php
session_start();
require_once "../conexion.php";

// Obtener el ID del usuario de la URL
$id = $_GET['id'];

// Consultar todos los permisos disponibles
$sqlpermisos = mysqli_query($conexion, "SELECT * FROM permisos");

// Consultar el usuario específico por su ID
$profesores = mysqli_query($conexion, "SELECT * FROM profesor WHERE idprofesor = $id");

// Verificar si el usuario existe
$resultUsuario = mysqli_num_rows($profesores);
if (empty($resultUsuario)) {
    header("Location: profesores.php");
}

// Obtener los permisos asignados al usuario
$consulta = mysqli_query($conexion, "SELECT * FROM detalle_permisos WHERE id_profesor = $id");
$datos = array();
foreach ($consulta as $asignado) {
    $datos[$asignado['id_permiso']] = true;
}

// Procesar el formulario de asignación de permisos
if (isset($_POST['permisos'])) {
    $id_user = $_GET['id'];
    $permisos = $_POST['permisos'];

    // Eliminar todos los permisos previamente asignados al usuario
    mysqli_query($conexion, "DELETE FROM detalle_permisos WHERE id_profesor = $id_user");

    // Asignar los nuevos permisos seleccionados
    if ($permisos != "") {
        foreach ($permisos as $permiso) {
            $sql = mysqli_query($conexion, "INSERT INTO detalle_permisos(id_profesor, id_permiso) VALUES ($id_user,$permiso)");
        }
        $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Permisos Asignados
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
    }
}

// Incluir el encabezado de la página
include_once "includes/header.php";
?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card shadow-lg">
            <div class="card-header card-header-primary">
                Permisos
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <?php echo (isset($alert)) ? $alert : '' ; ?>
                    <?php while ($row = mysqli_fetch_assoc($sqlpermisos)) { ?>
                        <div class="form-check form-check-inline m-4">
                            <label for="permisos" class="p-2 text-uppercase"><?php echo $row['nombre']; ?></label>
                            <input id="permisos" type="checkbox" name="permisos[]" value="<?php echo $row['id']; ?>" <?php
                                                                                                                        if (isset($datos[$row['id']])) {
                                                                                                                            echo "checked";
                                                                                                                        }
                                                                                                                        ?>>
                        </div>
                    <?php } ?>
                    <br>
                    <button class="btn btn-primary btn-block" type="submit">Modificar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once "includes/footer.php"; ?>
