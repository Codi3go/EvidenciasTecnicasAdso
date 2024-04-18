<?php
session_start(); // Inicia la sesión

include "../conexion.php"; // Incluye el archivo de conexión a la base de datos

$id_user = $_SESSION['idUser']; // Obtiene el ID del usuario de la sesión actual
$permiso = "sesion_deportiva"; // Define el nombre del permiso requerido para acceder a esta página

// Consulta si el usuario tiene el permiso necesario
$sql = mysqli_query($conexion, "SELECT p.*, d.* FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_profesor = $id_user AND p.nombre = '$permiso'");
$existe = mysqli_fetch_all($sql);

// Si el usuario no tiene el permiso y no es el administrador (id 1), lo redirige a la página de permisos
if (empty($existe) && $id_user != 1) {
    header('Location: permisos.php');
}

// Si se envió un formulario, procesa los datos
if (!empty($_POST)) {
    $alert = "";
    // Verifica si alguno de los campos está vacío
    if (empty($_POST['nombre']) || empty($_POST['nombre_corto'])) {
        $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Todos los campos son obligatorios
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
    } else {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $nombre_corto = $_POST['nombre_corto'];
        $result = 0;

        // Si no se proporcionó un ID, se está insertando un nuevo registro
        if (empty($id)) {
            // Verifica si ya existe una presentación con el mismo nombre
            $query = mysqli_query($conexion, "SELECT * FROM sesion_deportiva WHERE nombre = '$nombre'");
            $result = mysqli_fetch_array($query);

            if ($result > 0) {
                $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        La Presentación ya existe
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            } else {
                // Inserta la nueva presentación en la base de datos
                $query_insert = mysqli_query($conexion, "INSERT INTO sesion_deportiva(nombre, nombre_corto) values ('$nombre', '$nombre_corto')");

                if ($query_insert) {
                    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Presentación registrada
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                } else {
                    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error al registrar
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                }
            }
        } else { // Si se proporcionó un ID, se está actualizando un registro existente
            $sql_update = mysqli_query($conexion, "UPDATE sesion_deportiva SET nombre = '$nombre', nombre_corto = '$nombre_corto' WHERE id = $id");

            if ($sql_update) {
                $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Presentación modificada
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            } else {
                $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error al modificar
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            }
        }
    }
    mysqli_close($conexion); // Cierra la conexión a la base de datos
}

include_once "includes/header.php"; // Incluye el encabezado de la página
?>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo (isset($alert)) ? $alert : ''; ?> <!-- Muestra cualquier alerta generada -->
                <!-- Formulario para agregar o editar presentaciones -->
                <form action="" method="post" autocomplete="off" id="formulario">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre" class="text-dark font-weight-bold">Nombre</label>
                                <input type="text" placeholder="Ingrese Nombre" name="nombre" id="nombre" class="form-control">
                                <input type="hidden" name="id" id="id">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre" class="text-dark font-weight-bold">Nombre Corto</label>
                                <input type="text" placeholder="Ingrese Nombre Corto" name="nombre_corto" id="nombre_corto" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <!-- Cronómetro -->
                            <div id="cronometro">00:00:00</div>
                            <!-- Botones para controlar el cronómetro -->
                            <button type="button" onclick="startStop()" class="btn btn-primary">Iniciar / Detener Cronómetro</button>
                            <button type="button" onclick="resetTimer()" class="btn btn-secondary">Reiniciar Cronómetro</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mt-4">
                            <!-- Botón para enviar el formulario -->
                            <input type="submit" value="Registrar" class="btn btn-primary" id="btnAccion">
                            <!-- Botón para limpiar el formulario -->
                            <input type="button" value="Nuevo" class="btn btn-success" id="btnNuevo" onclick="limpiar()">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="tbl">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Nombre Corto</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../conexion.php";

                            $query = mysqli_query($conexion, "SELECT * FROM sesion_deportiva");
                            $result = mysqli_num_rows($query);
                            if ($result > 0) {
                                while ($data = mysqli_fetch_assoc($query)) { ?>
                                    <tr>
                                        <td><?php echo $data['id']; ?></td>
                                        <td><?php echo $data['nombre']; ?></td>
                                        <td><?php echo $data['nombre_corto']; ?></td>
                                        <td style="width: 200px;">
                                            <!-- Enlaces para editar y eliminar sesion_deportiva -->
                                            <a href="#" onclick="editarPresent(<?php echo $data['id']; ?>)" class="btn btn-primary"><i class='fas fa-edit'></i></a>
                                            <form action="eliminar_present.php?id=<?php echo $data['id']; ?>" method="post" class="confirmar d-inline">
                                                <button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "includes/footer.php"; ?> <!-- Incluye el pie de página -->

<script>
    var startTime, endTime;
    var running = false;

    function startStop() {
        if (!running) {
            startTime = new Date().getTime();
            running = true;
            updateTime();
        } else {
            endTime = new Date().getTime();
            running = false;
        }
    }

    function resetTimer() {
        document.getElementById('cronometro').innerHTML = '00:00:00';
        running = false;
    }

    function updateTime() {
        var currentTime;
        if (running) {
            currentTime = new Date().getTime();
        } else {
            currentTime = endTime;
        }

        var timeDiff = currentTime - startTime;

        var hours = Math.floor(timeDiff / 3600000);
        var minutes = Math.floor((timeDiff % 3600000) / 60000);
        var seconds = Math.floor((timeDiff % 60000) / 1000);

        hours = padZero(hours);
        minutes = padZero(minutes);
        seconds = padZero(seconds);

        document.getElementById('cronometro').innerHTML = hours + ":" + minutes + ":" + seconds;

        if (running) {
            setTimeout(updateTime, 1000);
        }
    }

    function padZero(num) {
        if (num < 10) {
            return "0" + num;
        }
        return num;
    }
</script>
