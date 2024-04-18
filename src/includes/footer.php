<!-- Cierre de divs -->
<!-- Marca el final de las secciones principales del HTML -->

</div> <!-- Cierre del div principal -->

</div> <!-- Cierre del otro div principal -->

<!-- Footer -->
<!-- Sección que contiene la información del pie de página -->

<footer class="footer"> <!-- Etiqueta que define el pie de página -->
    <div class="container-fluid"> <!-- Contenedor fluido para el pie de página -->

        <!-- Derechos de autor -->
        <!-- Información sobre los derechos de autor -->
        <div class="copyright float-right"> <!-- Derechos de autor, alineados a la derecha -->
            &copy; <!-- Símbolo de copyright -->
            <script>
                document.write(new Date().getFullYear()) // Año actual generado dinámicamente
            </script>
            <a href="#" target="_blank">Club Ángeles</a>. <!-- Enlace al Club Ángeles -->
        </div>

    </div>
</footer> <!-- Fin del pie de página -->

</div> <!-- Cierre del div principal -->

</div> <!-- Cierre del otro div principal -->

<!-- Modal para cambiar contraseña -->
<!-- Ventana emergente para cambiar la contraseña -->

<div id="nuevo_pass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document"> <!-- Diálogo modal para la ventana emergente -->
        <div class="modal-content"> <!-- Contenido de la ventana emergente -->
            <div class="modal-header bg-primary text-white"> <!-- Encabezado de la ventana emergente -->
                <h5 class="modal-title">Cambiar contraseña</h5> <!-- Título del modal -->
                <button class="close" data-dismiss="modal" aria-label="Close"> <!-- Botón de cerrar modal -->
                    <span aria-hidden="true">&times;</span> <!-- Icono de "x" para cerrar -->
                </button>
            </div>
            <div class="modal-body"> <!-- Cuerpo de la ventana emergente -->

                <!-- Formulario para cambiar contraseña -->
                <!-- Campo para ingresar la nueva contraseña -->
                <form method="post" id="frmPass"> <!-- Formulario para enviar la nueva contraseña -->
                    <div class="form-group">
                        <label for="actual"><i class="fas fa-key"></i> Contraseña Actual</label> <!-- Campo para la contraseña actual -->
                        <input id="actual" class="form-control" type="password" name="actual" placeholder="Contraseña actual" required>
                    </div>
                    <div class="form-group">
                        <label for="nueva"><i class="fas fa-key"></i> Contraseña Nueva</label> <!-- Campo para la nueva contraseña -->
                        <input id="nueva" class="form-control" type="password" name="nueva" placeholder="Contraseña nueva" required>
                    </div>
                    <button class="btn btn-primary btn-block" type="button" onclick="btnCambiar(event)">Cambiar</button> <!-- Botón para cambiar la contraseña -->
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<!-- Sección que contiene los scripts de JavaScript -->

<script src="../assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script> <!-- jQuery -->
<script src="../assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> <!-- Bootstrap -->
<script src="../assets/js/material-dashboard.js" type="text/javascript"></script> <!-- Material Dashboard -->
<script src="../assets/js/bootstrap-notify.js"></script> <!-- Bootstrap Notify -->
<script src="../assets/js/arrive.min.js"></script> <!-- Arrive.js -->
<script src="../assets/js/jquery.dataTables.min.js" crossorigin="anonymous"></script> <!-- DataTables -->
<script src="../assets/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> <!-- DataTables Bootstrap 4 -->
<script src="../assets/js/sweetalert2.all.min.js"></script> <!-- SweetAlert 2 -->
<script src="../assets/js/jquery-ui/jquery-ui.min.js"></script> <!-- jQuery UI -->
<script src="../assets/js/chart.min.js"></script> <!-- Chart.js -->
<script src="../assets/js/funciones.js"></script> <!-- Funciones adicionales -->
</body> <!-- Fin del cuerpo del documento HTML -->

</html> <!-- Fin del documento HTML -->
