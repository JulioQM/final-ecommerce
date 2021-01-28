<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="Assets/css/tienda/estilo.css">
    <link rel="stylesheet" href="Assets/css/tienda/bootstrap.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="Assets/css/tienda/sweetalert2.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="Assets/js/tienda/popper.min.js"></script>
    <title>Tienda Virtual</title>
</head>

<body><br>
    <?php
    $datosInventarios = json_decode(file_get_contents("https://module-inventory.herokuapp.com/products/"), true);
    $datosPublicidad = json_decode(file_get_contents("https://ecommerce-api-rest-2021.herokuapp.com/publicidades/"), true);
    ?>
    <header>
        <div class="container">
            <div class="row align-items-stretch justify-content-between">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                    <a class="navbar-brand" href="#">E-COMMERCE </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- <div class="navbar">
                        <a href="./index.html">INDEX</a>
                    </div> -->
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle img-fluid" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-car fas fa-cart-plus"></i></a>
                                <!-- <img src="img/cart.jpeg" class="nav-link dropdown-toggle img-fluid" height="70px" width="70px" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></img> -->
                                <div id="carrito" class="dropdown-menu">
                                    <a href="#" id="vaciar-carrito" class="btn btn-primary btn-block">Vaciar Carrito</a>
                                    <a href="#" id="procesar-pedido" class="btn btn-success btn-block">Procesar Compra</a>
                                    <table class="table">
                                    </table>
                                    <div id="div1">
                                        <table id="lista-carrito" class="table" style="overflow:auto;">
                                            <thead>
                                                <tr>
                                                    <th>Imagen</th>
                                                    <th>Nombre</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php

                    session_start();
                    if (isset($_SESSION['active'])) {
                    ?>
                        <span class="cliente"><?php echo $_SESSION['nombre']; ?></span>
                        <div class="login-icon">
                            <a href="./Views/salir.php" onclick="vaciarLocalStorage()" id="logout" title="Cerrar Sesión" style="text-decoration: none;"><i class="fas fa-user"></i></a>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="ingresar">
                            <a href="./Views/Login/login.php" class="ingresar-a">Ingresar</a>
                            <!-- <a href="./Views/Login/login.php"><i class="fas fa-sign-in-alt"></i></a> -->
                        </div>
                    <?php } ?>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 my-4 mx-auto ">

            <h1 class="tituloOferta">Últimas Ofertas </h1>
            <br>
            <div class="slideshow-container">

                <?php
                foreach ($datosPublicidad as $row => $value) {
                    $idpublicidad = $value["idpublicidad"];
                    $titulopublicidad = $value["titulo"];
                    $descripcionpublicidad = $value["descripcion"];
                    $estado = $value["estado"];
                    $imagen = $value["imagen"];
                    if ($estado == "0") {
                    } else {
                        echo "<img class='mySlides' src='$imagen' style='width:100%' height='550'>";
                    }
                }
                ?>

                <a class="prev" style="color:white;" onclick="plusDivs(-1)">&#10094;</a>
                <a class="next" style="color:white;" onclick="plusDivs(1)">&#10095;</a>
            </div>
        </div>

        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 my-4 mx-auto text-center">
            <hr class="linea">
            <h1 class="display-4 mt-4">Lista de Productos</h1>
            <p class="lead">Selecciona uno de nuestros productos y accede a un descuento</p>
        </div>

        <div class="container" id="lista-productos">

            <?php
            $aux = " ";
            $divAux = "<div class='card-deck text-center '>";
            $tamaño = sizeof($datosInventarios);

            foreach ($datosInventarios as $row => $value) {

                $id = $value["id"];
                $name = $value["name"];
                $price = $value["price"];
                $image = $value["image"];
                $description = $value["description"];
                $stock = $value["stock"];

                if ($stock > 0) {
                    $aux = "<div class='card-group  col-md-3 mt-4'>
                        <div class='card text-center border-info'>
                            <div class='card-header' style='background-color: #4f85c2;padding: 8px 10px 8px 10px;'>
                                <h4 class='my-0 font-weight-bold'>$name</h4>
                            </div>
                            <div class='card-body'>
                                <img src='$image'  class='card-img-top'>
                                <h2 class='card-title pricing-card-title precio' style='color:#B12704;'>$ <span class=''>$price</span></h2>
                                <ul class='list-unstyled mt-3 mb-4'>
                                    <li><h5>$description</h5></li>
                                    <li style='color:#007600'>Stock. <h5 id='stock' > $stock</h5></li>
                                   
                                </ul>
                                <a href='' class='btn btn-block btn-primary agregar-carrito' data-id='$id'>Comprar</a>
                            </div>
                        </div> 
                    </div>" . $aux;
                }
            }

            echo $divAux . $aux . " </div>"
            ?>

        </div>
        </div>
    </main>
    </br>
    </br>
    <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                <div class="col-sm col-lgF p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Integrantes
                    </h4>

                    <p class="stext-107 cl7 size-201">
                        • José Luis Parra <br>
                        • Steven Huertas <br>
                        • Julio Quinchiguango <br>
                        • Brayan Ortega <br>
                        • Willian Nazate <br>
                        • Hugo Salazar <br>
                    </p>
                </div>

                <div class="col-sm col-lg p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Descripción del<br> Proyecto:
                    </h4>
                    <p class="stext-107 cl7 size-201">
                    Proyecto en el cual desarrollaremos un Apirest de tipo E-COMERCE y lo consumiremos mediante un fronent
                    </p>
                </div>

                <div class="col-smF col-lg p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                    Contáctanos: 
                    </h4>

                    <p class="stext-107 cl7 size-201">
                    ¿Alguna Pregunta? Si necesita ayuda contáctenos en nuestra página  de Facebook, Instagram y Twitter
                    </p>

                    <div class="p-t-27">
                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fab fa-facebook-f"></i>

                        </a>

                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fab fa-instagram"></i>
                        </a>

                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fab fa-twitter-square"></i>
                        </a>
                    </div>
                </div>
            </div>


            <p class="stext-107 cl6 txt-center">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | Proyecto realizado por el grupo 7
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

            </p>
        </div>
        </div>
    </footer>
    <script src="Assets/js/tienda/jquery-3.4.1.min.js"></script>
    <script src="Assets/js/tienda/bootstrap.min.js"></script>
    <script src="Assets/js/tienda/sweetalert2.min.js"></script>
    <script src="Assets/js/tienda/carrito.js"></script>
    <script src="Assets/js/tienda/pedido.js"></script>

    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 3000); // Change image every 2 seconds
        }
    </script>
    <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            if (n > x.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = x.length
            }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex - 1].style.display = "block";
        }
    </script>
</body>

</html>