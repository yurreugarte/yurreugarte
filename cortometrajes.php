<?php
    $esServidorDeDesarrollo = preg_match("/.*local$/i", $_SERVER['HTTP_HOST']);
?>
<!doctype html>
<html class="no-js" lang="">

<head>    
    <?php require_once('includes/head.php'); ?>
    <title>Cortometrajes | Yurre Ugarte</title>
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
                  <li class="nav-item active">
                    <a class="nav-link" href="cortometrajes.php">Cortometrajes</a>
                  </li>
                  <li class="nav-item">
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
                                  <li class="nav-item active">
                                    <a class="nav-link" href="cortometrajes.php">Cortometrajes</a>
                                  </li>
                                  <li class="nav-item">
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
                            <h1>Cortometrajes</h1>                            
                        </div>

                        <!-- 4:3 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/89922699?h=cdb26080cb"></iframe>
                        </div>
                        <p class="mt-3">Edición especial, "recap" con extractos de los cortometrajes que escribíó y dirigió</p>
                        <hr class="mt-2 mb-5">
                        <p><strong>Shopping around, A windy picnic, Siesta y Sallysnake</strong> (1987-1990) fueron realizados en la City and East London College de Londres, participando en diversas muestras de video internacionales.</p>
                        <p><strong>Amore Eroa</strong> (1991) fue realizado en Bilbao y obtuvo el Premio del Público en el Festival de Madrid de Cine y Video dirigido por Mujeres.</p>
                        <p><strong>Sueño rojo 35</strong> (2003) fue fruto de la colaboración con la ESCIVI de Andoain, y se estrenó en el Circulo de Bellas Artes de Madrid, dentro de la selección anual de la SGAE.</p>

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