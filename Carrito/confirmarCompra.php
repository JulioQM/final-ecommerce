<!doctype html>
<html>
<?php

session_start();
// if (empty($_SESSION['active'])) {
//   header('location: index.php');
// }

$alert = '';
if (!empty($_POST)) {
    if (empty($_POST['usuario']) || empty($_POST['clave'])) {
        $alert = 'Ingrese su usuario y su contraseña!';
    } else {

        $user = $_POST['usuario'];
        $pass = $_POST['clave'];
        // $data = json_decode(file_get_contents("http://192.168.0.108:3000/Usuario/" . $user . "-" . $pass), true);
        $data = json_decode(file_get_contents("https://ecommerce-api-rest-2021.herokuapp.com/Usuario/" . $user . "-" . $pass), true);

        if (empty($data)) {
            $alert = "El usuario o la contraseña son Incorrectos!";
            session_destroy();
        } else {

            $_SESSION['active'] = true;
            $_SESSION['idUser'] = $data[0]['idusuario'];
            $_SESSION['nombre'] = $data[0]['nombre'];
            $_SESSION['correo'] = $data[0]['correo'];
            $_SESSION['usuario'] = $data[0]['usuario'];
            $_SESSION['clave'] = $data[0]['clave'];
            $_SESSION['rol'] = $data[0]['idrol'];

            if (($_POST['usuario'] == $data[0]['usuario']) && ($_POST['clave'] == $data[0]['clave'])) {
                // if ($data[0]['idrol'] == 2) {
                // session_destroy();
                // header("location: http://jlpv.tonohost.com/tienda_virtual/dashboard");
                header("location: #");
                // } else {
                // }
            } else {
                $alert = "El usuario o la contraseña son Incorrectos!";
                session_destroy();
                // header('location: #');
            }
        }
    }
}
?>
<?php require_once("../Config/Config.php"); ?>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Snippet - BBBootstrap</title>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="../Assets/css/tienda/estilo.css">
    <style>
        body {
            background-color: #eeeeee
        }

        .green {
            color: rgb(15, 207, 143);
            font-weight: 680
        }

        @media(max-width:567px) {
            .mobile {
                padding-top: 40px
            }
        }
    </style>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'></script>
</head>

<body>

    <?php

    $datosPedido = json_decode(file_get_contents("https://ecommerce-api-rest-2021.herokuapp.com/pedidos/byultimopedido"), true);

    ?>
    <header>
        <div class="container">
            <div class="row justify-content-between mb-5">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg3">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php
                    // session_start();
                    if (isset($_SESSION['active'])) {
                    ?>
                        <div class="login-icon" style="margin: 5px 15px 5px 15px;">
                            <a href="./compra.php" id="logout" title="Regresar"><i class="fas fa-arrow-circle-left"></i></a>
                        </div>
                        <span class="cliente" style="font-size: 15pt;"><?php echo $_SESSION['nombre']; ?></span>
                    <?php } else { ?>
                        <a class="navbar-brand" href="../index.php">E-COMMERCE</a>
                    <?php } ?>


                    <!-- < ?php
                    // session_start();
                    if (isset($_SESSION['active'])) {
                    ?>
                        <span class="cliente">< ?php echo $_SESSION['nombre']; ?></span>
                        <!- <div class="login-icon">
                        <a href="../index.php" onclick="vaciarLocalStorage()" id="logout"><i class="fas fa-user"></i></a>
                    </div> -- >
                    < ?php
                    }
                    ?> -->
                    <!-- <div class="login-icon head-mp">
                        <a href="./compra.php"><i class="fas fa-arrow-circle-left"></i></a>
                    </div> -->
                </nav>
            </div>
        </div>
    </header>
    <br>
    <div class="container rounded bg-white">
        <div class="row d-flex justify-content-center pb-5" style="margin-left: 0px; margin-right: 0px; width: 1000px;">
            <div class="col-sm-5 col-md-5 ml-1" style="margin-left: 0px;padding-left: 10px;width: 425px;">
                <div class="py-4 d-flex flex-row">
                    <h5><span class="fa fa-check-square-o"></span><b>COZA</b> STORE | </h5><span class="pl-2">Pago</span>
                </div>
                <?php
                foreach ($datosPedido as $row => $value) {
                    $idpedido = $value["idpedido"];
                    $id = intval($idpedido) + 1;

                    echo "  <div class='py-4 d-flex flex-row'>
                    <h4>ID Pedido: </h4>
                    <h4 class='green'>  $id </h4>
                </div>";
                }
                ?>



                <h4>DETALLE DEL PEDIDO</h4>
                <div class="d-flex pt-2">
                    <div>
                        <p><b>Fecha del pedido.</b></p>
                    </div>

                </div>
                <p>Su orden será registrada con la siguiente fecha: </p>
                <div class="rounded bg-light d-flex">
                    <div class="p-2">
                        <script>
                            var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                            var f = new Date();
                            document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                        </script>
                    </div>
                    <div class="ml-auto p-2">Pendiente confirmación</div>
                </div>
                <hr>
                <div class="pt-2">
                    <div class="d-flex">
                        <div>
                            <p><b>Método  de pago.</b></p>
                        </div>
                        <div class="ml-auto p-2">
                            <a href="metodopago.php" class="text-primary"><i class="fa fa-plus-circle text-primary"></i>Ingresar metodo de pago </a>
                        </div>
                    </div>
                    <div id="html"></div>
                    <form class="pb-3">

                    </form>
                    <form class="pb-3">

                    </form>
                    <div> <input type="button" value="Proceder con el pago" onclick="myFunction()" class="btn btn-primary btn-block"> </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-4 offset-md-1 mobile" style="margin-left: 50px;">
                <div class="py-4 d-flex justify-content-end">

                </div>
                <div class="bg-light rounded d-flex flex-column">
                    <div class="p-2 ml-3">
                        <h4>Detalle de la orden</h4>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th width="45%">Productos</th>
                                <th width="45%">Cantidad</th>
                                <th width="45%">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="45%">
                                    <p id="mostrar-nombres"></p>
                                </td>
                                <td width="45%">
                                    <p id="mostrar-cantidad"></p>
                                </td>
                                <td width="45%">
                                    <p id="mostrar-precio"></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="border-top px-4 mx-3"> </div>

                    <div class="border-top px-4 mx-3"></div>
                    <div class="p-2 d-flex pt-3">
                        <div class="col-8">SUBTOTAL </div>
                        <div class="ml-auto">
                            <h5 id="mostrar-subtotal"></h5>
                        </div>
                    </div>
                    <div class="p-2 d-flex">
                        <div class="col-8">IVA 12% <span class="fa fa-question-circle text-secondary"></span></div>
                        <div class="ml-auto">
                            <h5 id="mostrar-iva"></h5>
                        </div>
                    </div>
                    <div class="border-top px-4 mx-3"></div>
                    <div class="p-2 d-flex pt-3">
                        <div class="col-8"><b>Total</b>
                        </div>
                        <div class="ml-auto">
                            <h5 id="mostrar-total-final"></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                <div class="col-sm col-lg p-b-50" style="max-width:30%">
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

                <div class="col-sm col-lg p-b-50" style="max-width:30%">
                    <h4 class="stext-301 cl0 p-b-30">
                        Descripción del<br> Proyecto:
                    </h4>
                    <p class="stext-107 cl7 size-201">
                        Proyecto en el cual desarrollaremos un Apirest de tipo E-COMERCE y lo consumiremos mediante un fronent
                    </p>
                </div>

                <div class="col-sm col-lg p-b-50" style="max-width:30%">
                    <h4 class="stext-301 cl0 p-b-30">
                        Contáctanos:
                    </h4>

                    <p class="stext-107 cl7 size-201">
                        ¿Alguna Pregunta? Si necesita ayuda contáctenos en nuestra página de Facebook, Instagram y Twitter
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
    <script src="../Assets/js/tienda/jquery-3.4.1.min.js"></script>
    <script src="../Assets/js/tienda/bootstrap.min.js"></script>
    <!-- <script src="../Assets/js/tienda/sweetalert2.min.js"></script> -->
    <script src="../Assets/js/tienda/carrito.js"></script>
    <script src="../Assets/js/tienda/pedido.js"></script>
    <script src="../Assets/js/tienda/cliente.js"></script>
    <script src="../Assets/js/tienda/confirmarCompra.js"></script>
    <script src="../Assets/js/tienda/confirmar.js"></script>
    <script src="../Assets/js/tienda/post.js"></script>
</body>

</html>