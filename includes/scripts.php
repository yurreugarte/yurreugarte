    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<?php
if ($esServidorDeDesarrollo) {
?>
    <script src="src/js/vendor/popper.js"></script>
    <script src="src/bootstrap/js/dist/util.js"></script>
    <script src="src/bootstrap/js/dist/alert.js"></script>
    <script src="src/bootstrap/js/dist/button.js"></script>
    <script src="src/bootstrap/js/dist/carousel.js"></script>
    <script src="src/bootstrap/js/dist/collapse.js"></script>
    <script src="src/bootstrap/js/dist/dropdown.js"></script>
    <script src="src/bootstrap/js/dist/modal.js"></script>
    <script src="src/bootstrap/js/dist/tooltip.js"></script>
    <script src="src/bootstrap/js/dist/popover.js"></script>
    <script src="src/bootstrap/js/dist/scrollspy.js"></script>
    <script src="src/bootstrap/js/dist/tab.js"></script>
    <script src="src/js/plugins.js"></script>
    <script src="src/js/adimedia-external-links.js"></script>
    <script src="src/js/my-script.js"></script>
<?php
} else {
?>
    <script src="js/my-theme.min.js"></script>
<?php
}
?>
<script type="text/javascript">
    RWD.config.enlacesVentanaNueva.mensaje = 'Se abrirá en ventana nueva';
    RWD.config.enlacesVentanaNueva.carpetasDescargas = ['documents', 'images'];
    RWD.config.enlacesVentanaNueva.extensionesArchivosDescargables = ["pdf", "doc", "docx", "zip", "odt", "xls", "xlsx"];
    RWD.config.enlacesVentanaNueva.clasesCssExcluidas = ['galeria', 'baner'];
    RWD.config.enlacesVentanaNueva.subdominiosExcluidos = ['subdomain.com'];
</script>