<?php
    $esServidorDeDesarrollo = preg_match("/.*local$/i", $_SERVER['HTTP_HOST']);
?>
<!doctype html>
<html class="no-js" lang="">

<head>    
    <?php require_once('includes/head.php'); ?>
    <title>Talleres y cursos | Yurre Ugarte</title>
    <meta name="description" content="">
</head>

<body>
    <div id="grid-body">   

        <?php require_once('includes/gtm.php'); ?>

        <header class="header text-primary">

            <nav class="navbar navbar-expand-lg navbar-light bg-light text-left d-md-none">
              <a class="navbar-brand" href="index.php"><img src="img/yurre-ugarte-movil-es.svg" alt="Yurre Ugarte -  Escritora y guionista"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav menu-principal">
                  <li class="nav-item">
                    <a class="nav-link" href="libros.php">Libros</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="cortometrajes.php">Cortometrajes</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="talleres.php">Talleres y cursos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="autora.php">La autora</a>
                  </li>
                </ul>
                <div class="auxiliar">
                    <a href="#contacto" class="btn btn-secondary">Contacto</a>
                    <a href="#" class="btn btn-link">Euskera</a>
                </div>
              </div>
            </nav>

            <div class="auxiliar d-none d-md-block">
                <div class="container">
                    <a href="#contacto" class="btn btn-secondary">Contacto</a>
                    <a href="#" class="btn btn-link">Euskera</a>
                </div>
            </div>
        </header>

        <div class="grid-contenido">
            <div class="container">
                <div class="row">
                    <div class="d-none d-md-block col-md-4">
                        <div class="col-sticky">
                            <div class="yurre">
                                <a href="index.php"><img src="img/yurre-ugarte-es.svg" alt="Yurre Ugarte -  Escritora y guionista"></a>
                            </div>
                            <div class="menu navbar-light">
                                <ul class="navbar-nav menu-principal">
                                  <li class="nav-item">
                                    <a class="nav-link" href="libros.php">Libros</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="cortometrajes.php">Cortometrajes</a>
                                  </li>
                                  <li class="nav-item active">
                                    <a class="nav-link" href="talleres.php">Talleres y cursos</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="autora.php">La autora</a>
                                  </li>
                                </ul>
                            </div>                            
                        </div>
                    </div>
                    
                    <div class="col-md-8">
                        <div class="header-title">
                            <h1>Talleres y cursos</h1>                            
                        </div>
                        <p>Imparte talleres y cursos de:</p>
                        <div class="talleres">
                            <div class="talleres-item">
                                <a href="#" class="icono-talleres icono-estructura">
                                    Estructura<br> creativa
                                </a>
                            </div>
                            <div class="talleres-item">
                                <a href="#" class="icono-talleres icono-guion">
                                    Guión<br> cinematográfico
                                </a>
                            </div>
                        </div>

                    </div> 
                </div>              
            </div>
        </div>

        <footer class="footer" id="contacto">
            <div class="container">
                <div class="row">                    
                    <div class="d-none d-md-block col-md-4"></div>
                    <div class="col-md-8">
                        <div class=" footer-interior">
                            <div class="d-flex justify-content-between">
                                Yurre Ugarte
                                <a href="mailto:yurre.miren@gmail.com" class="btn btn-secondary ml-4">yurre.miren@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>               
            </div>
        </footer>

    </div>

    <?php require_once('includes/scripts.php'); ?>
</body>

</html>