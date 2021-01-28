<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/tienda/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/css/tienda/estilo.css">
    <script src="../Assets/js/tienda/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="../Assets/css/tienda/sweetalert2.min.css">

    <title>Carrito de Compras</title>

</head>

<body>
    <header>
        <div class="container">
            <div class="row justify-content-between mb-5">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                    <!-- <a class="navbar-brand" href="../index.php">E-COMMERCE</a>
                    < ?php
                    session_start();
                    if (isset($_SESSION['active'])) {
                    ?>
                        <span class="cliente">< ?php echo $_SESSION['nombre']; ?></span>
                    < ?php
                    }
                    ?> -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php
                    session_start();
                    if (isset($_SESSION['active'])) {
                    ?>
                        <div class="login-icon" style="margin: 5px 15px 5px 15px;">
                            <a href="../index.php" id="logout" title="Regresar"><i class="fas fa-arrow-circle-left"></i></a>
                        </div>
                        <span class="cliente" style="font-size: 15pt;"><?php echo $_SESSION['nombre']; ?></span>
                    <?php } else { ?>
                        <a class="navbar-brand" href="../index.php">E-COMMERCE</a>
                    <?php } ?>
                </nav>
            </div>
        </div>
    </header>

    <br>

    <main>
        <!-- For demo purpose -->
        <div class="row ">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4">Realizar Compra</h1>
            </div>
        </div> <!-- End -->
        <div class="container py-5">

            <div class="row mt-3">
                <div class="col">
                    <div class="contenedorCompra">
                        <form id="procesar-pago" action="#" method="post">


                            <div id="carrito" class="form-group table-responsive">
                                <table class="form-group table" id="lista-compra">
                                    <thead>
                                        <tr>
                                            <th scope="col">Imagen</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Sub Total</th>
                                            <th scope="col">Eliminar</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tr>
                                        <th colspan="4" scope="col" class="text-right">SUB TOTAL:</th>
                                        <th scope="col">
                                            <p id="subtotal"></p>
                                        </th>
                                        <!-- <th scope="col"></th> -->
                                    </tr>
                                    <tr>
                                        <th colspan="4" scope="col" class="text-right">IVA:</th>
                                        <th scope="col">
                                            <p id="igv"></p>
                                        </th>
                                        <!-- <th scope="col"></th> -->
                                    </tr>
                                    <tr>
                                        <th colspan="4" scope="col" class="text-right">TOTAL:</th>
                                        <th scope="col">
                                            <input id="total" name="monto" class="font-weight-bold border-0" readonly style="background-color: white;"></input>
                                        </th>
                                        <!-- <th scope="col"></th> -->
                                    </tr>

                                </table>
                            </div>

                            <div class="row justify-content-center" id="loaders">
                                <!--<img id="cargando" src="img/cargando.gif" width="220">-->
                            </div>

                            <div class="row justify-content-between">
                                <div class="col-md-4 mb-2">
                                    <a href="../index.php" class="btn btn-info btn-block">Seguir comprando</a>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <button href="#" class="btn btn-success btn-block" id="procesar-compra">Realizar compra</button>
                                </div>
                            </div>

                            <!-- CONCATENAR DATOS EN INPUT -->
                            <textarea name="detalleCompra" id="detalleCompra" cols="50" rows="10" hidden></textarea>

                        </form>

                    </div>
                </div>


            </div>

        </div>
    </main>
    </div>
    <footer class="bg3 p-t-75 p-b-32">
        <div class="containerF">
            <div class="rowF">
                <div class="col-smF col-lg-F p-b-50">
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

                <div class="col-smF col-lg-F p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Descripcion del<br> Proyecto:
                    </h4>
                    <p class="stext-107 cl7 size-201">
                        Proyecto en el cual crearemos un Apirest E-COMERCE y lo consumiremos mediante un fronent
                    </p>
                </div>

                <div class="col-smF col-lg-F p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Contactanos:
                    </h4>

                    <p class="stext-107 cl7 size-201">
                        ¿Alguna Pregunta? Si necesita ayuda contactenos en nuestra pag de Facebook, Instagram y Twitter
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
                </script> All rights reserved | This project is made for the group 7
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

            </p>
        </div>
        </div>
    </footer>
    <script src="../Assets/js/tienda/carrito.js"></script>
    <script src="../Assets/js/tienda/compra.js"></script>
    <!-- <a href="../../Assets/js/tienda/bootstrap.min.js"></a> -->
    <script src="../Assets/js/tienda/jquery-3.4.1.min.js"></script>
    <script src="../Assets/js/tienda/bootstrap.min.js"></script>
    <script src="../Assets/js/tienda/sweetalert2.min.js"></script>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2.3.2/dist/email.min.js"></script>

    <!-- <script src="../Assets/js/tienda/pedido.js"></script> -->
</body>

</html>