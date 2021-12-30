<?php
    $esServidorDeDesarrollo = preg_match("/.*local$/i", $_SERVER['HTTP_HOST']);
?>
<!doctype html>
<html class="no-js" lang="">

<head>    
    <?php require_once('includes/head.php'); ?>
    <title>Libros | Yurre Ugarte</title>
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
                  <li class="nav-item active">
                    <a class="nav-link" href="libros.php">Libros</a>
                  </li>
                  <li class="nav-item">
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
                                  <li class="nav-item active">
                                    <a class="nav-link" href="libros.php">Libros</a>
                                  </li>
                                  <li class="nav-item">
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
                            <h1>Libros</h1>                            
                        </div>
                        <div class="lista-libros">
                            <div class="lista-libros-item">
                                <img src="img/libros-fascinable.jpg" alt="">
                                <h2 class="titulo">Fascinable</h2>
                                <p class="edicion">2021</p>
                                <p class="detalle">Colección de relatos</p>
                                <p class="boton"><a href="#" class="btn btn-info btn-sm text-white">Más info</a></p>
                            </div>
                            <div class="lista-libros-item">
                                <img src="img/libros-joana-maiz-es.jpg" alt="">
                                <h2 class="titulo">Joana Maiz</h2>
                                <p class="edicion">2019</p>
                                <p class="detalle">Cómic/novela gráfica. Dibujos: Joseba Larratxe</p>
                                <p class="boton"><a href="#" class="btn btn-info btn-sm text-white">Más info</a></p>
                            </div>


                            <div class="lista-libros-item">
                                <img src="img/libros-Naia-eta-Nabil-detektibeak.jpg" alt="">
                                <h2 class="titulo">Naia eta Nabil detektibeak</h2>
                                <p class="edicion">2014</p>
                                <p class="detalle">Album ilustrado. Dibujante: Eneko Ugarte</p>
                                <p class="boton"><a href="#" class="btn btn-info btn-sm text-white">Más info</a></p>
                            </div>

                            <div class="lista-libros-item">
                                <img src="img/libros-gata-alada.jpg" alt="">
                                <h2 class="titulo">La gata alada</h2>
                                <p class="edicion">2014</p>
                                <p class="detalle">Cómic/novela gráfica. Dibujos: Joseba Larratxe</p>
                                <p class="boton"><a href="#" class="btn btn-info btn-sm text-white">Más info</a></p>
                            </div>
                            <div class="lista-libros-item">
                                <img src="img/libros-itsasoa-maleta-batean.jpg" alt="">
                                <h2 class="titulo">Itsasoa maleta batean</h2>
                                <p class="edicion">2013</p>
                                <p class="detalle">Novela infantil/juvenil</p>
                                <p class="boton"><a href="#" class="btn btn-info btn-sm text-white">Más info</a></p>
                            </div>
                            <div class="lista-libros-item">
                                <img src="img/libros-todo-es-rojo.jpg" alt="">
                                <h2 class="titulo">Todo es rojo</h2>
                                <p class="edicion">2012</p>
                                <p class="detalle">Colección de relatos</p>
                                <p class="boton"><a href="#" class="btn btn-info btn-sm text-white">Más info</a></p>
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