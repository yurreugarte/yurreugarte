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
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <?php // Add your site or application content here ?>
    <p>Hello world! This is HTML5 Boilerplate.</p>
    
<?php
$esServidorDeDesarrollo = preg_match("/.*local$/i", $_SERVER['HTTP_HOST']);
if ($esServidorDeDesarrollo) {
?>
    <script src="src/js/vendor/jquery-3.3.1.min.js"></script>
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
    <script src="src/js/my-script.js"></script>
<?php
} else {
?>
    <script src="js/my-theme.min.js"></script>
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