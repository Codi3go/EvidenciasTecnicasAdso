<?php
    // Inicia la sesión para poder destruirla
    session_start();
    
    // Destruye la sesión actual del usuario
    session_destroy();

    // Redirige al usuario a la página de inicio
    header('location: ../');
?>
