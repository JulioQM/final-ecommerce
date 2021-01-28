<?php
$subtotal 	= 0;
$iva 	 	= 0;
$impuesto 	= 0;
$tl_sniva   = 0;
$total 		= 0;

// require_once("./generaFactura.php");
// $data = json_decode(file_get_contents("http://192.168.0.108:3000/PedidoCabecera/3-3"), true);
// $detalle = json_decode(file_get_contents("https://ecommerce-api-rest-2021.herokuapp.com/DetallePedidos/bypedido/3"), true);

// print_r($data); 
// print_r($detalle); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Factura</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<!-- < ?php echo $anulada; ?> -->
	<!-- <div id="page_pdf" style="width:1500px;"> -->
	<div id="page_pdf">
		<table id="factura_head">
			<tr>
				<td class="logo_factura">
					<div>
						<img src="img/logo.png">
					</div>
				</td>
				<td class="info_empresa">
					<?php
					// if ($result_config > 0) {
					// 	$iva = $configuracion['iva'];
					?>
					<div class="title-head">
						<span class="h2">E-COMMERCE</span>
						<p>Ibarra - Sector el Olivo</p>
						<p>RUC: 0031004048144</p>
						<p>Teléfono: 0991929394</p>
						<p>Email: ecommerce@gmail.com</p>
					</div>
					<br><br>
					<div class="title-head round">
						<span class="h3">Factura</span>
						<p>No. Factura: <strong><?= $data[0]['idpedido']; ?></strong></p>
						<p>Fecha: <?= $data[0]['fecha']; ?></p>
						<p>Hora: <?= $data[0]['hora']; ?></p>
					</div>
					<br><br>
					<div class="title-head round" style="width: 70%; margin-left: 15%;">
						<span class="h3">Cliente</span>
						<table class="datos_cliente">
							<thead>
								<tr>
									<td>Nombre:</td>
									<td>Correo:</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?= $data[0]['nombre']; ?></td>
									<td><?= $data[0]['nombre']; ?>@gmail.com</td>
								</tr>
							</tbody>
						</table>
					</div>
					<?php
					// }
					?>
				</td>

			</tr>
		</table>

		<table id="factura_detalle">
			<thead>
				<tr>
					<th class="textcenter" width="100px">Cantidad</th>
					<th class="textcenter">Descripción</th>
					<th class="textcenter" width="150px">Precio Unitario.</th>
					<th class="textcenter" width="150px"> Precio Total</th>
				</tr>
			</thead>
			<tbody id="detalle_productos">

				<?php

				if ($detalle > 0) {
					foreach ($detalle as $row => $det) {
				?>
						<tr>
							<td><?= $det['cantidad'] ?></td>
							<td class="textledft"><?= $det['codproducto'] ?></td>
							<td><?= $det['preciounitario'] ?></td>
							<td><?= $det['subtotalunit'] ?></td>
						</tr>

				<?php
						// $precio_total = $row['precio_total'];
						// $subtotal = round($subtotal + $precio_total, 2);
					}
				}

				$impuesto 	= round($data[0]['preciototal'] * (0.12), 2);
				$tl_sniva 	= round($data[0]['preciototal'] - $impuesto, 2);
				// $total 		= round($tl_sniva + $impuesto, 2);
				?>
			</tbody>
			<tfoot id="detalle_totales">
				<tr>
					<td></td>
					<td></td>
					<td class="textcenter"><span>SUBTOTAL Q.</span></td>
					<td class="textcenter"><span><?= $tl_sniva ?></span></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td class="textcenter"><span>IVA (12 %)</span></td>
					<td class="textcenter"><span><?= $impuesto ?></span></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td class="textcenter"><span>TOTAL Q.</span></td>
					<td class="textcenter"><span><?= $data[0]['preciototal'] ?></span></td>
				</tr>
			</tfoot>
		</table>
		<div>
			<!-- <p class="nota">Si usted tiene preguntas sobre esta factura, <br>pongase en contacto con nombre, teléfono y Email</p> -->
			<h4 class="label_gracias">¡Gracias por su compra!</h4>
		</div>

	</div>

</body>

</html>