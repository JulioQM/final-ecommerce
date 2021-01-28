<?php
require_once("../Template/header.php");
require_once("../Template/nav.php");
require_once("../Modals/modalUsuario.php");

?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> HOME</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">Dashboard</div>
        <a href="../../index.php" target="_blank"> Tienda Virtual</a>
      </div>
    </div>
  </div>
</main>
<!-- <main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="app-menu__icon fa fa-users"></i>  HOME
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">

                </div>
            </div>
        </div>
    </div>
</main> -->

<?php
require_once("../Template/footer.php");
?>