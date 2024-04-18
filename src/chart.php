<?php
include("../conexion.php");

// Acción para obtener productos con existencia baja
if ($_POST['action'] == 'sales') {
    $arreglo = array();
    $query = mysqli_query($conexion, "SELECT descripcion, existencia FROM producto WHERE existencia <= 10 ORDER BY existencia ASC LIMIT 10");
    while ($data = mysqli_fetch_array($query)) {
        // Recopila la descripción y existencia de productos con existencia baja
        $arreglo[] = $data;
    }
    echo json_encode($arreglo);
    die();
}

// Acción para obtener datos para gráfico polar
if ($_POST['action'] == 'polarChart') {
    $arreglo = array();
    $query = mysqli_query($conexion, "SELECT p.codproducto, p.descripcion, d.id_producto, d.cantidad, SUM(d.cantidad) as total FROM producto p INNER JOIN detalle_venta d WHERE p.codproducto = d.id_producto group by d.id_producto ORDER BY d.cantidad DESC LIMIT 5");
    while ($data = mysqli_fetch_array($query)) {
        // Recopila datos de los productos más vendidos
        $arreglo[] = $data;
    }
    echo json_encode($arreglo);
    die();
}
//
?>
