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

		// $data = json_decode(file_get_contents("http://192.168.0.108:3000/PedidoCabecera/".$codCliente."-".$codPedido), true);
		$data = json_decode(file_get_contents("https://ecommerce-api-rest-2021.herokuapp.com/PedidoCabecera/".$codCliente."-".$codPedido), true);


		if($data > 0){

			$pedido = $data[0]['idpedido'];
			
			// $detalle = json_decode(file_get_contents("http://192.168.0.108:3000/PedidoDetalle/".$pedido), true);
			$detalle = json_decode(file_get_contents("https://ecommerce-api-rest-2021.herokuapp.com/DetallePedidos/bypedido/".$codPedido), true);

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