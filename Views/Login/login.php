<?php

$alert = '';
session_start();
if (!empty($_SESSION['active'])) {
	header('location: ../Home/home.php');
} else {
	if (!empty($_POST)) {
		if (empty($_POST['usuario']) || empty($_POST['clave'])) {
			$alert = 'Ingrese su usuario y su contraseña!';
		} else {
			// echo $data[0]['nombre'];
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

				if (($_POST['usuario'] == $data[0]['usuario']) && ($_POST['clave'] == $data[0]['clave']) && ($data[0]['idrol'] == 2)) {
					// if ($data[0]['idrol'] == 2) {
					// session_destroy();
					// header("location: http://jlpv.tonohost.com/tienda_virtual/dashboard");
					header("location: ../../index.php");
					// } else {
					// }
				} else if (($_POST['usuario'] == $data[0]['usuario']) && ($_POST['clave'] == $data[0]['clave']) && ($data[0]['idrol'] != 2)) {
					header('location: ../Home/home.php');
				} else {
					$alert = "El usuario o la contraseña son Incorrectos!";
					session_destroy();
					// header('location: #');
				}
			}
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../Assets/css/admin/Login.css">
	<title>Login-Mecanica</title>
	<script src="https://kit.fontawesome.com/cad3e4a900.js" crossorigin="anonymous"></script>
</head>

<body>

	<div class="login-box">
		<img class="avatar" src="../../Assets/images/uploads/Usuario.png">
		<h1>Iniciar Sesión</h1>
		<form action="" method="post">
			<!--Nombre de usuario   -->
			<label for="usuario">Nombre del Usuario</label>
			<input type="text" name="usuario" placeholder="Usuario">
			<!--Contraseña de usuario   -->
			<label for="clave">Contraseña del Usuario</label>
			<input type="password" name="clave" placeholder="Contraseña"><br><br>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
			<input type="submit" value="Ingresar">

		</form>
	</div>

</body>

</html>