<?php

	//print_r($_REQUEST);
	//exit;
	//echo base64_encode('2');
	//exit;
	session_start();
	if(empty($_SESSION['active']))
	{
		header('location: ../');
	}

	// include "../../conexion.php";
	require_once '../pdf/vendor/autoload.php';
	use Dompdf\Dompdf;

	if(empty($_REQUEST['cl']) || empty($_REQUEST['f']))
	{
		echo "No es posible generar la factura.";
	}else{
		$codCliente = $_REQUEST['cl'];
		$codPedido = $_REQUEST['f'];
		$anulada = '';

		// $query = mysqli_query($conection,"SELECT f.numfactura, DATE_FORMAT(f.fecha, '%d/%m/%Y') as fecha, 
		// 									DATE_FORMAT(f.fecha,'%H:%i:%s') as  hora, f.codcliente, f.estatus,
		// 										 v.nombre as vendedor,
		// 										 cl.cedula, cl.nombre, cl.telefono,cl.direccion
		// 									FROM factura f
		// 									INNER JOIN usuario v
		// 									ON f.usuario = v.idusuario
		// 									INNER JOIN cliente cl
		// 									ON f.codcliente = cl.idcliente
		// 									WHERE f.numfactura = $codPedido AND f.codcliente = $codCliente  AND f.estatus != 10 ");
		
		$data = json_decode(file_get_contents("http://192.168.0.108:3000/PedidoCabecera/".$codCliente."-".$codPedido), true);


		if($data > 0){

			$pedido = $data[0]['idpedido'];
			// $factura = mysqli_fetch_assoc($query);
			// $num_factura = $factura['numfactura'];

			// if($data['estado'] == 0){
			// 	$anulada = '<img class="anulada" src="img/anulado.png" alt="Anulada">';
			// }

			// $query_productos = mysqli_query($conection,"SELECT p.descripcion,dt.cantidad,dt.precio_venta,(dt.cantidad * dt.precio_venta) as precio_total
			// 											FROM factura f
			// 											INNER JOIN detallefactura dt
			// 											ON f.numfactura = dt.numfactura
			// 											INNER JOIN producto p
			// 											ON dt.codproducto = p.codproducto
			// 											WHERE f.numfactura = $num_factura ");
			// $result_detalle = mysqli_num_rows($query_productos);

			$detalle = json_decode(file_get_contents("https://ecommerce-api-rest-2021.herokuapp.com/DetallePedidos/bypedido/".$pedido), true);

			ob_start();
		    include(dirname('__FILE__').'/factura.php');
		    $html = ob_get_clean();

			// instantiate and use the dompdf class
			$dompdf = new Dompdf();
			$dompdf->loadHtml($html);
			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('letter', 'portrait');
			// Render the HTML as PDF
			$dompdf->render();
			// Output the generated PDF to Browser
			$dompdf->stream('factura_'.$codPedido.'.pdf',array('Attachment'=>0));
			exit;
		}
	}

?>