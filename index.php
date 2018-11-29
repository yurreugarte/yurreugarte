<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Plantilla HTML 5 - Bootstrap 4</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php // Place favicon.ico in the root directory ?>

    <link rel="stylesheet" href="css/my-theme.min.css">
    <?php 
        // https://github.com/h5bp/html5-boilerplate/blob/master/dist/doc/html.md#the-no-js-class
        // Si cargamos modernizr este script no es necesario
    ?>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
</head>

<body>
    <h1>HTML5 Boilerplate + Bootstrap 4</h1>
    <h2>CSS</h2>
    <p>El archivo <code>css/my-theme.min.css</code> no incluye todos los elementos de Bootstrap.</p>
    <p>Si necesitas añadir algún elemento de Bootstrap, lo encontrarás en el directorio <code>src/bootstrap/scss</code>.<br>Hazlo en el archivo <code>src/scss/my-theme.scss</code> y vuelve a generar el archivo <code>css/my-theme.min.css</code> a partir de él.</p>
    <h2>JavaScript</h2>
    <h3>Registro en analytics de enlaces externos y de descarga</h3>
    <p>El código básico de registro del tráfico del sitio web en analytics es de desarrollo propio y está añadido al archivo <code>/js/my-theme.min.js</code> por defecto.<br>
    Si para registrar el tráfico del sitio usamos GTM (Google Tag Manager) eliminaremos el archivo <code>src/js/adimedia-external-links-analytics.js</code> de <code>src/js/my-theme.js</code> y volveremos a generar el minificado.</p>
    <p>Consulta en el código fuente, al final de la página, las opciones de configuración.</p>
    <h3>Cómo añadir plugins de Bootstrap</h3>
    <p>El archivo <code>js/my-theme.min.js</code> no incluye ninguno de los plugins de Bootstrap.</p>
    <p>Si necesitas añadir algún plugin de Bootstrap, lo encontrarás en el directorio <code>src/bootstrap/js/dist</code>.<br>Hazlo en el archivo <code>src/js/my-theme.js</code> y vuelve a generar el archivo <code>js/my-theme.min.js</code> a partir de él.</p>
    <p>El orden de carga de los archivos es importante. Ten en cuenta las siguientes dependencias:</p>
    <ul>
        <li>Todos los plugins dependen del archivo <code>src/bootstrap/js/dist/util.js</code></li>
        <li>Dropdowns, popovers y tooltips dependen del archivo <code>src/js/vendor/popper.js</code></li>
        <li>Los popover dependen también de <code>src/bootstrap/js/dist/tooltip.js</code></li>
    </ul>
    <p>Si usas koala para generar el archivo <code>js/my-theme.min.js</code>, utiliza la instrucción <a href="https://github.com/oklai/koala/wiki/JS-CSS-minify-and-combine#combine-js-files" target="_blank">koala-prepend</a>.</p>
    <p>Si necesitas todos los plugins, <a href="https://getbootstrap.com/docs/4.1/getting-started/introduction/#js" rel="external">carga el archivo aunado y minificado de Bootstrap desde la CDN</a> en lugar de incluirlos en <code>js/my-theme.min.js</code>.<br>Como en el ejemplo, carga Bootstrap después de jQuery y Popper.js.</p>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<?php
$esServidorDeDesarrollo = preg_match("/.*local$/i", $_SERVER['HTTP_HOST']);
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
    <script src="src/js/adimedia-external-links-analytics.js"></script>
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
<?php
if ($esServidorDeDesarrollo === false) {
?>
    <?php // Google Analytics: change UA-XXXXX-Y to be your site's ID. ?>
    <script>
        window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>
<?php
}
?>
</body>

</html>