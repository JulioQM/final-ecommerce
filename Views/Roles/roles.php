<?php
require_once("../Template/header.php");
require_once("../Template/nav.php");
require_once("../Modals/modalRol.php");

?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
            <i class="fas fa-users-cog"></i> ROLES
                <button class="btn btn-primary" type="button" onclick="openModalRol();" style="margin-left: 20px;"><i class="fas fa-plus-circle"></i> Nuevo</button>
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
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableRoles">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // $data = json_decode(file_get_contents("http://192.168.0.108:3000/Roles"), true);
                                $data = json_decode(file_get_contents("https://ecommerce-api-rest-2021.herokuapp.com/Roles"), true);

                                for ($i = 0; $i < count($data); $i++) {
                                    echo "<tr>";
                                    echo "<th>" .$data[$i]["idrol"]. "</th>";
                                    echo "<th>" .$data[$i]["rol"]. "</th>";
                                    echo "<th>" .$data[$i]["estado"]. "</th>";
                                    echo '<th><div class="text-center">
                                            <button class="btn btn-primary btn-sm" onClick="fntEditRol('.$data[$i]["idrol"].')" title="Editar" style="background: #2970bdd5; border-color: #4a88caec;"><i class="fas fa-pencil-alt"></i></button>
                                            <button class="btn btn-danger btn-sm" onClick="fntDelRol('.$data[$i]['idrol'].')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
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