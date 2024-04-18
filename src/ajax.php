<?php
require_once "../conexion.php";
session_start();

// Búsqueda de clientes por nombre
if (isset($_GET['q'])) {
    $datos = array();
    $nombre = $_GET['q'];
    $cliente = mysqli_query($conexion, "SELECT * FROM deportista WHERE nombre LIKE '%$nombre%'");
    while ($row = mysqli_fetch_assoc($cliente)) {
        // Recopila los datos del cliente
        $data['id'] = $row['id_deportista'];
        $data['label'] = $row['nombre'];
        $data['direccion'] = $row['direccion'];
        $data['telefono'] = $row['telefono'];
        array_push($datos, $data);
    }
    echo json_encode($datos);
    die();
} else if (isset($_GET['pro'])) {
    // Búsqueda de productos
    $datos = array();
    $nombre = $_GET['pro'];
    $hoy = date('Y-m-d');
    $producto = mysqli_query($conexion, "SELECT * FROM producto WHERE codigo LIKE '%" . $nombre . "%' OR descripcion LIKE '%" . $nombre . "%' AND vencimiento > '$hoy' OR vencimiento = '0000-00-00'");
    while ($row = mysqli_fetch_assoc($producto)) {
        // Recopila los datos del producto
        $data['id'] = $row['codproducto'];
        $data['label'] = $row['codigo'] . ' - ' .$row['descripcion'];
        $data['value'] = $row['descripcion'];
        $data['precio'] = $row['precio'];
        $data['existencia'] = $row['existencia'];
        array_push($datos, $data);
    }
    echo json_encode($datos);
    die();
} else if(isset($_GET['editarCliente'])){
    // Edita cliente
    $id_deportista = $_GET['id'];
    $sql = mysqli_query($conexion, "SELECT * FROM deportista WHERE id_deportista = $id_deportista");
    $data = mysqli_fetch_array($sql);
    echo json_encode($data);
    exit;
} else if (isset($_GET['editarUsuario'])) {
    // Edita usuario
    $idprofesor = $_GET['id'];
    $sql = mysqli_query($conexion, "SELECT * FROM profesor WHERE idprofesor = $idprofesor");
    $data = mysqli_fetch_array($sql);
    echo json_encode($data);
    exit;
} else if (isset($_GET['editarTipo'])) {
    // Edita tipo de producto
    $id = $_GET['id'];
    $sql = mysqli_query($conexion, "SELECT * FROM tipos WHERE id = $id");
    $data = mysqli_fetch_array($sql);
    echo json_encode($data);
    exit;
} else if (isset($_GET['editarPresent'])) {
    // Edita presentación de producto
    $id = $_GET['id'];
    $sql = mysqli_query($conexion, "SELECT * FROM sesion_deportiva WHERE id = $id");
    $data = mysqli_fetch_array($sql);
    echo json_encode($data);
    exit;
} else if (isset($_GET['editarLab'])) {
    // Edita laboratorio de producto
    $id = $_GET['id'];
    $sql = mysqli_query($conexion, "SELECT * FROM pagos WHERE id = $id");
    $data = mysqli_fetch_array($sql);
    echo json_encode($data);
    exit;
}
if (isset($_POST['regDetalle'])) {
   
} else if (isset($_POST['cambio'])) {
    // Cambia la contraseña del usuario
    if (empty($_POST['actual']) || empty($_POST['nueva'])) {
        $msg = 'Los campos estan vacios';
    } else {
        $id = $_SESSION['idUser'];
        $actual = md5($_POST['actual']);
        $nueva = md5($_POST['nueva']);
        $consulta = mysqli_query($conexion, "SELECT * FROM profesor WHERE clave = '$actual' AND idprofesor = $id");
        $result = mysqli_num_rows($consulta);
        if ($result == 1) {
            $query = mysqli_query($conexion, "UPDATE profesor SET clave = '$nueva' WHERE idprofesor = $id");
            if ($query) {
                $msg = 'ok';
            }else{
                $msg = 'error';
            }
        } else {
            $msg = 'dif';
        }
        
    }
    echo $msg;
    die();
    
}

