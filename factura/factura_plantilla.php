<?php
$subtotal 	= 0;
$iva 	 	= 0;
$impuesto 	= 0;
$tl_sniva   = 0;
$total 		= 0;
//print_r($configuracion); 
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
				<td class="logo_factura" >
					<div>
						<img src="img/logo.png">
					</div>
				</td>
				<td class="info_empresa">
					<?php
					// if ($result_config > 0) {
					// 	$iva = $configuracion['iva'];
					?>
					<!-- <div style="width: 50%; margin-left: 25%;">  -->
					<div class="title-head"> 
						<span class="h2" >E-COMMERCE</span>
						<p >Ibarra - Sector el Olivo</p>
						<p >RUC: 0031004048144</p>
						<p >Teléfono: 0991929394</p>
						<p >Email: ecommerce@gmail.com</p>
					</div>
					<br><br>
					<div class="title-head round">
						<span class="h3">Factura</span>
						<p >No. Factura: <strong>000001</strong></p>
						<p >Fecha: 27/01/2021</p>
						<p >Hora: 00:25</p>
					</div>
					<br><br>
					<div class="title-head round">
						<span class="h3" >Cliente</span>
						<table class="datos_cliente">
							<thead>
								<tr>
									<td>Nombre:</td>
									<td>Correo:</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Juan Peres</td>
									<td>juanperes@@gmail.com</td>
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
		<!-- <table id="factura_cliente">
			<!-- <tr>
				<td class="info_cliente">
					<div class="round">
						<span class="h3">Cliente</span>
						<table class="datos_cliente">
							<tr>
								<td><label>Nombre:</label>
									<p>Juan Peres</p>
								</td>
								<td><label>Correo:</label>
									<p>juanperes@@gmail.com</p>
								</td>
							</tr>
							<!-- <tr>
								<td><label>Cedula:</label>
									<p>< ?php echo $factura['cedula']; ?></p>
								</td>
								<td><label>Teléfono:</label>
									<p>< ?php echo $factura['telefono']; ?></p>
								</td>
							</tr> -- >
						</table>
					</div>
				</td>

			</tr> -- >
		</table> -->

		<table id="factura_detalle">
			<thead>
				<tr>
					<th class="textcenter" width="100px" >Cantidad</th>
					<th class="textcenter">Descripción</th>
					<th class="textcenter" width="150px"  >Precio Unitario.</th>
					<th class="textcenter" width="150px"  > Precio Total</th>
				</tr>
			</thead>
			<tbody id="detalle_productos">

				<?php

				// if ($result_detalle > 0) {

				// 	while ($row = mysqli_fetch_assoc($query_productos)) {
				?>
						<tr >
							<td>4</td>
							<td class="textledft">teclado Genius</td>
							<td>1.45</td>
							<td>5.8</td>
						</tr>
						<tr >
							<td>4</td>
							<td class="textledft">teclado Genius</td>
							<td>1.45</td>
							<td>5.8</td>
						</tr>
						<tr >
							<td>4</td>
							<td class="textledft">teclado Genius</td>
							<td>1.45</td>
							<td>5.8</td>
						</tr>
						<tr >
							<td>4</td>
							<td class="textledft">teclado Genius</td>
							<td>1.45</td>
							<td>5.8</td>
						</tr>
						<tr >
							<td>4</td>
							<td class="textledft">teclado Genius</td>
							<td>1.45</td>
							<td>5.8</td>
						</tr>
						<!-- <tr>
							<td class="textcenter">< ?php echo $row['cantidad']; ?></td>
							<td>< ?php echo $row['descripcion']; ?></td>
							<td class="textright">< ?php echo $row['precio_venta']; ?></td>
							<td class="textright">< ?php echo $row['precio_total']; ?></td>
						</tr> -->
				<?php
				// 		$precio_total = $row['precio_total'];
				// 		$subtotal = round($subtotal + $precio_total, 2);
				// 	}
				// }

				// $impuesto 	= round($subtotal * ($iva / 100), 2);
				// $tl_sniva 	= round($subtotal - $impuesto, 2);
				// $total 		= round($tl_sniva + $impuesto, 2);
				?>
			</tbody>
			<tfoot id="detalle_totales">
				<tr>
					<td></td>
					<td></td>
					<td class="textcenter"><span  >SUBTOTAL Q.</span></td>
					<td class="textcenter"><span  >5.10</span></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td class="textcenter"><span  >IVA (12 %)</span></td>
					<td class="textcenter"><span  >0.70</span></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td class="textcenter"><span  >TOTAL Q.</span></td>
					<td class="textcenter"><span  >5.8</span></td>
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