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
<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Finalizar Compra</title>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="../Assets/css/tienda/estilo.css">
 
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type='text/javascript'>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</head>

<!-- <body oncontextmenu='return false' class='snippet-body'> -->

<body>
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
                        <!-- <div class="login-icon">
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
    <div class="container py-5" style=" margin-bottom:10px;">
        <!-- For demo purpose -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4">Finalizar Compra</h1>
            </div>
        </div> <!-- End -->
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                            <!-- Credit card form tabs -->
                            <div class="container-total">
                                <h4 id="mostrar-total"></h4>
                            </div>

                        </div> <!-- End -->
                        <!-- Credit card form content -->

                        <?php
                        if (isset($_SESSION['active'])) {
                        ?>

                            <div class="tab-content">
                                <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                    <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Tarjeta de Crédito </a> </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Transferencia </a> </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fab fa-cc-amex "></i> Crédito </a> </li>
                                </ul>
                                <!-- Opcion de tarjeta de credito-->
                                <div id="credit-card" class="tab-pane fade show active pt-3">
                                    <form action="" role="form" id="formulario" class="formulario">
                                        <div class="form-group"> <label for="username">
                                                <h6>Titular</h6>
                                            </label> <input type="text" name="username" id="nombreTarjeta" placeholder="Titular de la tarjeta" required class="form-control "> </div>
                                        <div class="form-group"> <label for="cardNumber">
                                                <h6>Número de tarjeta</h6>
                                            </label>
                                            <div class="input-group"> <input type="text" name="cardNumber" id="numeroTarjeta" maxlength="19" placeholder="Ingrese número" autocomplete="off" class="form-control " required>
                                                <div class="input-group-append"> <span class="input-group-text text-muted"> <i id="visa" class="fab fa-cc-visa mx-1"></i> <i id="master" class="fab fa-cc-mastercard mx-1"></i> <i id="otro" class="fab fa-cc-amex mx-1"></i> </span> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group"> <label><span class="hidden-xs">


                                                            <!-- Fecha de expiracion-->
                                                            <h6>Fecha de expiración</h6>
                                                        </span></label>

                                                    <div class="input-group">
                                                        <select name="mes" id="selectMes" class="form-control">
                                                            <option disabled selected>Mes</option>
                                                        </select>

                                                        &nbsp&nbsp&nbsp&nbsp <select name="año" id="selectAño" class="form-control">
                                                            <option disabled selected>Año</option>
                                                        </select>

                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4"> <label data-toggle="tooltip" title="Tres digitos en la parte trasera de su tarjeta">
                                                        <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                    </label> <input type="text" id="cvvTarjeta" maxlength="3" required class="form-control"> </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a ><button type="button" id="boton-tarjeta" class="subscribe btn btn-primary btn-block shadow-sm"> Confirmar Pago </button></a>

                                        </div>
                                    </form>
                                </div> <!-- End -->


                                <!-- Transaccion info -->
                                <div id="paypal" class="tab-pane fade pt-5">

                                    <hr>
                                    <div>
                                        <?php
                                        $datosCuentas = json_decode(file_get_contents("https://svr-ctas.herokuapp.com/cuentasS"), true);
                                        $aux = " ";
                                        $divAux = "<div class='card-deck text-center '>";
                                        $tamaño = sizeof($datosCuentas);

                                        foreach ($datosCuentas as $row => $value) {

                                            $nrocuenta = $value["nrocuenta"];
                                            $nombre = $value["nombre"];
                                            $tipocuenta = $value["tipocuenta"];
                                            $cedulacl = $value["cedulacl"];
                                            $nombrecl = $value["nombrecl"];
                                            $apellidocl = $value["apellidocl"];
                                            $saldo = $value["saldo"];
                                            $estado = $value["estado"];
                                        }
                                        $aux = "

                                                <h6>Banco </h6>
                                                $nombre
                                                <h6>Nombre </h6>
                                                $nombrecl   &nbsp $apellidocl


                                            <h6>Tipo de cuenta </h6> ";
                                        if ($tipocuenta == 1) {
                                            $aux = $aux . "Corriente";
                                        } else {
                                            $aux = $aux . "Ahorros";
                                        }
                                        $aux = $aux .
                                            "<h6>Número de cuenta</h6>" . $nrocuenta;

                                        echo  $aux;
                                        ?>
                                    </div>
                                    <hr>
                                    <div class="form-group"> <label for="username">
                                            <h6><br>Ingrese número de comprobante de pago</h6>
                                        </label> <input type="text" name="numero" id="comprobante" placeholder="Ingrese número de comprobante" maxlength="15" required class="form-control "> </div>
                                    <form action="datosImagen.php" method="post" enctype="multipart/form-data">
                                        <h6><br>Fotografía del comprobante</h6>
                                        <input type="file" id="filet" name="imagen" size="20"><br><br>
                                        


                                    </form>


                                    <a > <br><button type="button" id="boton-transferencia" class="btn btn-primary "><i class="fas fa-mobile-alt mr-2"></i> Pagar con transferencia</button> </a>
                                    <p class="text-muted"> Nota: Este proceso puede tardar hasta comprobar el número de comprobante. </p>



                                </div> <!-- End -->
                                <!-- credito directo info -->
                                <div id="net-banking" class="tab-pane fade pt-3">
                                    <div class="form-group "> <label for="cbbPlazo">
                                            <h6>Seleccione el plazo del crédito directo</h6>
                                        </label> <select class="form-control" id="plazo" >
                                            <option value="0" selected disabled>--Por favor elija un plazo--</option>
                                            <option value="1">3 meses sin interés</option>
                                            <option value="2">6 meses sin interés</option>
                                            <option value="3">9 meses sin interés</option>
                                            <option value="4">12 meses mas interés</option>
                                            <option value="5">24 meses mas interés</option>

                                        </select> </div>
                                    <div class="form-group">
                                        <a > <button type="button" id="boton-credito" class="btn btn-primary "><i class="fab fa-cc-amex"></i> Proceder al pago</button> </a>

                                    </div>
                                    <p class="text-muted">Nota: Al hacer click en botón "Proceder al pago" esta automáticamente aceptando los términos y condiciones de la empresa, los cuales nos permiten acceder a sus datos personales. </p>
                                </div> <!-- End -->
                                <!-- End -->
                            </div>

                        <?php
                        } else {
                        ?>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#login" role="tab" aria-controls="home" aria-selected="true">Iniciar Sesión</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#registro" role="tab" aria-controls="profile" aria-selected="false">Crear cuenta</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="home-tab">
                                    <br>
                                    <form action="" method="post">
                                        <!-- <input type="hidden" id="txtIdUsuario" name="idusuario" value="7">
                                    <input type="hidden" id="listRol" name="idrol" value="2"> -->
                                        <div class="form-group">
                                            <label for="txtEmail">Usuario</label>
                                            <input type="text" class="form-control" id="txtEmail" name="usuario">
                                        </div>
                                        <div class="form-group">
                                            <label for="txtPassword">Contraseña</label>
                                            <input type="password" class="form-control" id="txtPassword" name="clave">
                                        </div>
                                        <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
                                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                                    </form>

                                </div>
                                <div class="tab-pane fade" id="registro" role="tabpanel" aria-labelledby="profile-tab">
                                    <br>
                                    <form id="formRegistro" name="formRegistro">
                                        <input type="hidden" id="txtIdUsuario" name="idusuario" value="15">
                                        <input type="hidden" id="listRol" name="idrol" value="2">
                                        <div class="row">
                                            <div class="col col-md-6 form-group">
                                                <label for="txtNombre">Nombres</label>
                                                <input type="text" class="form-control valid validText" id="txtNombreCli" name="nombre" required>
                                            </div>
                                            <div class="col col-md-6 form-group">
                                                <label for="txtCorreo">Correo</label>
                                                <input type="email" class="form-control valid validEmail" id="txtCorreoCli" name="correo" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-6 form-group">
                                                <label for="txtUsuario">Usuario</label>
                                                <input type="text" class="form-control valid validText" id="txtUsuarioCli" name="usuario" required>
                                            </div>
                                            <div class="col col-md-6 form-group">
                                                <label for="txtPassword">Contraseña</label>
                                                <input type="password" class="form-control valid validText" id="txtPasswordCli" name="clave" required>
                                            </div>
                                            <input type="hidden" id="listStatus" name="estatus" value="1">
                                        </div>
                                        <button id="btnActionForm" class="btn btn-primary" type="submit">
                                            <i class="fa fa-fw fa-lg fa-check-circle"></i>
                                            <span id="btnText">Registrar</span>
                                            <p id="resuesta-cli"></p>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        <?php
                        }
                        ?>

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
    <!-- <script type="text/javascript" src="< ?= base_url(); ?>/Assets/js/plugins/sweetalert.min.js"></script> -->
    <!-- <script src="< ?= base_url(); ?>/Assets/js/admin/functions_usuarios.js"></script> -->

    <script src="../Assets/js/tienda/jquery-3.4.1.min.js"></script>
    <script src="../Assets/js/tienda/bootstrap.min.js"></script>
    <!-- <script src="../Assets/js/tienda/sweetalert2.min.js"></script> -->
    <script src="Assets/js/tienda/sweetalert2.min.js"></script>
    <script src="../Assets/js/tienda/carrito.js"></script>
    <script src="../Assets/js/tienda/pedido.js"></script>
    <script src="../Assets/js/tienda/cliente.js"></script>
    <script src="../Assets/js/tienda/metodopago.js"></script>
</body>

</html>