<?php

session_start();
if (empty($_SESSION['active'])) {
  header('location: ../Login/login.php');
}
if ($_SESSION['rol'] == 2) {
  header('location: ../../index.php');
}
require_once("../../Config/Config.php");

?>
<!-- < ?php require_once("../../Config/Config.php"); ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8"> <!-- sirve para las tildes o caracteres especiales -->>
  <meta name="description" content="Tienda Virtual Smell"> <!-- para cuando se busque la pag en google-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- sirve para la compatibilidad del navegador edge -->
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- corresponde a la vista responsive -->
  <meta name="author" content="José Luis Parra Vite">
  <meta name="theme-color" content="#009688">
  <!-- <link rel="shortcut icon" href="< ?= base_url(); ?>/Assets/images/uploads/logo.png"> -->
  <title>E-Commerce</title>
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/Assets/css/admin/main.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/Assets/css/admin/bootstrap-select.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/Assets/css/admin/style.css">
</head>

<body class="app sidebar-mini">
  <!-- Navbar-->
  <header class="app-header">
    <a class="app-header__logo" href="../Home/home.php" style="font-family: Helvetica Neue;">E-COMMERCE</a>

    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"><i class="fas fa-bars"></i></a>
    <!-- Navbar Right Menu-->
      
    <ul class="app-nav">
      <!-- User Menu-->
      <span class="cliente" style="margin: 10px 35px 0 0; color: #ffffff; font-size: 15pt;"><?php echo $_SESSION['nombre']; ?></span>
      <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
          <li><a class="dropdown-item" href="<?= base_url(); ?>/opciones"><i class="fa fa-cog fa-lg"></i> Opciones</a></li>
          <li><a class="dropdown-item" href="<?= base_url(); ?>/perfil"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
          <li><a class="dropdown-item" href="../salir.php"><i class="fa fa-sign-out fa-lg"></i> Cerrar sesión</a></li>
        </ul>
      </li>
    </ul>
  </header>

  <!-- < ?php require_once("nav_admin.php"); ?> -->