<?php
if (empty($_SESSION['active'])) {
    header('Location: ../'); // Redirecciona si la sesión no está activa
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Encabezado del documento HTML -->
    <meta charset="utf-8" /> <!-- Codificación de caracteres -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Compatibilidad con IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> <!-- Ajuste de la vista en dispositivos móviles -->
    <meta name="description" content="" /> <!-- Descripción del sitio -->
    <meta name="author" content="" /> <!-- Autor del sitio -->
    <title>Panel de Administración</title> <!-- Título de la página -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet" /> <!-- Hoja de estilos Material Dashboard -->
    <link href="../assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" /> <!-- Hoja de estilos para DataTables -->
    <link rel="stylesheet" href="../assets/js/jquery-ui/jquery-ui.min.css"> <!-- Hoja de estilos jQuery UI -->
    <link rel="stylesheet" href="../assets/css/css-adicional.css"> <!-- Hoja de estilos adicional -->
    <script src="../assets/js/all.min.js" crossorigin="anonymous"></script> <!-- Biblioteca de iconos Font Awesome -->
</head>

<body>
    <!-- Cuerpo del documento HTML -->
    <div class="wrapper">
        <!-- Envoltorio principal -->

        <!-- Barra lateral -->
        <div class="sidebar" data-color="purple" data-background-color="blue" data-image="../assets/img/sidebar.jpg">
            <!-- Barra lateral con opciones de color y fondo -->
            <div class="logo bg-primary">
                <a href="./" class="simple-text logo-normal">
                    Control y registro <!-- Logo y nombre del sitio -->
                </a>
            </div>
            <div class="sidebar-wrapper">
                <!-- Contenedor de la barra lateral -->
                <ul class="nav">
                    <!-- Lista de opciones de navegación -->
                    <li class="nav-item">
                        <!-- Elemento de la lista -->
                        <a class="nav-link d-flex" href="profesores.php">
                            <!-- Enlace de navegación -->
                            <i class="fas fa-chalkboard-teacher mr-2 fa-2x"></i> <!-- Icono de profesor -->
                            <p> Profesores</p> <!-- Texto de la opción -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="sesion_deportiva.php">
                            <i class="fas fa-stopwatch mr-2 fa-2x"></i> <!-- Icono de cronómetro -->
                            <p> Sesión deportiva</p> <!-- Texto de la opción -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="registrar_deportista.php">
                            <i class="fas fa-user-plus mr-2 fa-2x"></i> <!-- Icono de agregar usuario -->
                            <p> Registrar Deportista</p> <!-- Texto de la opción -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="info_deportista.php">
                            <i class="fas fa-info-circle mr-2 fa-2x"></i> <!-- Icono de información -->
                            <p> Información del deportista</p> <!-- Texto de la opción -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="pagos.php">
                            <i class="fas fa-dollar-sign mr-2 fa-2x"></i> <!-- Icono de pagos -->
                            <p> Pagos</p> <!-- Texto de la opción -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="informacion.php">
                            <i class="fas fa-eye mr-2 fa-2x"></i> <!-- Icono de ojo -->
                            <p> Info-Ángeles</p> <!-- Texto de la opción -->
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Fin de la barra lateral -->

        <!-- Panel principal -->
        <div class="main-panel">
            <!-- Navbar -->
            <!-- Barra de navegación superior -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">Club deportivo Ángeles</a> <!-- Marca del sitio -->
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">

                        <ul class="navbar-nav">
                            <!-- Lista de opciones de la barra de navegación -->
                            <li class="nav-item dropdown">
                                <!-- Elemento de la lista con desplegable -->
                                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user"></i> <!-- Icono de usuario -->
                                    <p class="d-lg-none d-md-block">
                                        Cuenta
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <!-- Menú desplegable -->
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#nuevo_pass">Perfil</a> <!-- Opción de perfil -->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="salir.php">Cerrar Sesión</a> <!-- Opción de cerrar sesión -->
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Fin de la barra de navegación -->

            <!-- Contenido -->
            <div class="content bg">
                <!-- Contenedor del contenido principal -->
                <div class="container-fluid"> <!-- Contenedor fluido -->
