<?php
    $esServidorDeDesarrollo = preg_match("/.*local$/i", $_SERVER['HTTP_HOST']);
?>
<!doctype html>
<html class="no-js" lang="">

<head>    
    <?php require_once('includes/head.php'); ?>
    <title>Yurre Ugarte</title>
    <meta name="description" content="">
</head>

<body class="home">
    <div id="grid-body">   

        <?php require_once('includes/gtm.php'); ?>

        <header class="header text-primary">
            <div class="auxiliar">
                <a href="#" class="btn btn-secondary">Contacto</a>
                <a href="#" class="btn btn-link">Euskera</a>
            </div>
        </header>

        <div class="grid-contenido">
            <div class="home-contenido">
                <div class="home-contenido-left">
                    <div class="yurre">
                        <img src="img/yurre-ugarte-es.svg" alt="Yurre Ugarte -  Escritora y guionista">
                    </div>
                    <div class="menu">
                        <ul class="menu-principal">
                            <li><a href="libros.php">Libros</a></li>
                            <li><a href="cortometrajes.php">Cortometrajes</a></li>
                            <li><a href="talleres.php">Talleres y cursos</a></li>
                            <li><a href="autora.php">La autora</a></li>
                        </ul>
                    </div>
                </div>
                <div class="home-contenido-right">
                    <img src="img/home-img.jpg" alt="">
                </div>                
            </div>
        </div>

        <footer class="footer">   
			<div class="footer-contenido">
				<div class="footer-texto">
					Yurre Ugarte
					<a href="mailto:yurre.miren@gmail.com" class="btn btn-secondary ml-4">yurre.miren@gmail.com</a>
				</div>                
			</div>		
        </footer>

    </div>

    <?php require_once('includes/scripts.php'); ?>
</body>

</html>