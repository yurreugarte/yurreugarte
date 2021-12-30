    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php // Place favicon.ico in the root directory ?>
<?php
if ($esServidorDeDesarrollo === false) {
?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-XXXXXXX');</script>
    <!-- End Google Tag Manager -->
<?php
}
?>

<?php
if ($esServidorDeDesarrollo) {
?>    
    <link rel="stylesheet" href="css/my-theme.css?v01">
<?php
} else {
?>
    <link rel="stylesheet" href="css/my-theme.min.css?v01">
<?php
}
?>


    <?php 
        // https://github.com/h5bp/html5-boilerplate/blob/master/dist/doc/html.md#the-no-js-class
        // Si cargamos modernizr este script no es necesario
    ?>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>