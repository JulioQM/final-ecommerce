<?php
require_once("../Template/header.php");
require_once("../Template/nav.php");
require_once("../Modals/modalUsuario.php");

?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="app-menu__icon fa fa-users"></i>  USUARIOS
                <button class="btn btn-primary" type="button" onclick="openModalUser();" style="margin-left: 20px;"><i class="fas fa-plus-circle"></i> Nuevo</button>
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
                        <table class="table table-hover table-bordered" id="tableUsuarios">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Rol</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Usuario</th>
                                    <th>Clave</th>
                                    <th>Status</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // $data = json_decode(file_get_contents("http://192.168.0.108:3000/Usuarios"), true);
                                $data = json_decode(file_get_contents("https://ecommerce-api-rest-2021.herokuapp.com/usuarios"), true);

                                for ($i = 0; $i < count($data); $i++) {
                                    echo "<tr>";
                                    echo "<th>" .$data[$i]["idusuario"]. "</th>";
                                    if ($data[$i]["idrol"] == 1) {
                                        echo "<th>Administrador</th>";
                                    } else {
                                        echo "<th>Cliente</th>";
                                    }
                                    echo "<th>" .$data[$i]["nombre"]. "</th>";
                                    echo "<th>" .$data[$i]["correo"]. "</th>";
                                    echo "<th>" .$data[$i]["usuario"]. "</th>";
                                    echo "<th>" .$data[$i]["clave"]. "</th>";
                                    if ($data[$i]["estatus"] == 0) {
                                        echo "<th><span class='badge badge-danger'>Inactivo</span></th>";
                                    } else {
                                        echo "<th><span class='badge badge-success'>Activo</span></th>";
                                    }
                                    echo '<th><div class="text-center">
                                            <button class="btn btn-primary btn-sm" onClick="fntEditUsuario('.$data[$i]["idusuario"].')" title="Editar" style="background: #2970bdd5; border-color: #4a88caec;"><i class="fas fa-pencil-alt"></i></button>
                                            <button class="btn btn-danger btn-sm" onClick="fntDelUsuario('.$data[$i]['idusuario'].')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
                                        </div></th>';
                                    echo "</tr>";
                                }
                                ?>
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