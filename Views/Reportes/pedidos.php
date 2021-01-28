<?php
require_once("../Template/header.php");
require_once("../Template/nav.php");
// require_once("../Modals/modalUsuario.php");

?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="app-menu__icon fa fa-users"></i> PEDIDOS
                <!-- <button class="btn btn-primary" id="btn_facturar_venta" type="button" style="margin-left: 20px;"><i class="fas fa-plus-circle"></i> Mostrar PDF</button> -->
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="mt-3" id="respuesta">

        </div>
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tablePedidos">
                            <thead>
                                <tr>
                                    <th>Id Pedido</th>
                                    <th>Id Usuario</th>
                                    <th>Fecha Pedido</th>
                                    <th>Detalle</th>
                                    <!-- <th>cantidad</th> -->
                                    <th>Precio Total</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="detalle_venta">
                                <?php
                                $cabecera = json_decode(file_get_contents("https://ecommerce-api-rest-2021.herokuapp.com/Pedidos"), true);
                                // $cabecera = json_decode(file_get_contents("https://ecommerce-api-rest-2021.herokuapp.com/Pedidos"), true);

                                $detalle = json_decode(file_get_contents("https://ecommerce-api-rest-2021.herokuapp.com/DetallePedidos"), true);
                                // $detalle = json_decode(file_get_contents("https://ecommerce-api-rest-2021.herokuapp.com/DetallePedidos"), true);

                                for ($i = 0; $i < count($cabecera); $i++) {
                                    $idpedido=$cabecera[$i]['idpedido'];
                                    echo "<tr>";
                                    echo "<td>" . $cabecera[$i]["idpedido"] . "</td>";
                                    echo "<td id='idcliente'>" . $cabecera[$i]["idusuario"] . "</td>";
                                    echo "<td>" . date("d/m/Y", strtotime($cabecera[$i]["fechapedido"])) . "</td>";
                                    echo "<td>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Cod Producto</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio Unitario</th>
                                                    </tr>
                                                </thead>
                                                <body>
                                                    <tr>";
                                                        foreach($detalle as $row => $det){
                                                            $idpedidoDetalle=$det['idpedido'];
                                                            if ($idpedido == $idpedidoDetalle) {
                                                                echo "<tr>
                                                                        <td>".$det['codproducto']."</td>
                                                                        <td>".$det['cantidad']."</td>
                                                                        <td>".$det['preciounitario']."</td>
                                                                      <tr>";
                                                            }
                                                        }
                                    echo            "</tr>
                                                </body>
                                            </table>
                                          </td>";
                                    echo "<td>" . $cabecera[$i]["preciototal"] . "</td>";
                                    if ($cabecera[$i]["estado"] == 0) {
                                        echo "<td><span class='badge badge-danger'>Anulado</span></td>";
                                    } else {
                                        echo "<td><span class='badge badge-success'>Activo</span></td>";
                                    }
                                    echo '<td><div class="text-center">
                                            <button class="btn btn-primary btn-sm view_factura" type="button" cl="'.$cabecera[$i]["idusuario"].'" f="'.$cabecera[$i]['idpedido'].'" title="Ver Pedido" style="background: #2970bdd5; border-color: #4a88caec;"><i class="fas fa-eye"></i></button>
                                        </div></td>';
                                    echo "</tr>";
                                }
                                ?>
                                    <!-- <button class="btn btn-danger btn-sm" onClick="fntDelPedido('.$cabecera[$i]['idpedido'].')" title="Anular Pedido"><i class="far fa-trash-alt"></i></button> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require_once("../Template/footer.php");
?>