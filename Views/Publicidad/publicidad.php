<?php
require_once("../Template/header.php");
require_once("../Template/nav.php");
require_once("../Modals/modalPublicidad.php");

?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-dashboard"></i> PUBLICIDAD
                <button class="btn btn-primary" type="button" onclick="openModalPublicidad();" style="margin-left: 20px;"><i class="fas fa-plus-circle"></i> Nuevo</button>
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
                        <table class="table table-hover table-bordered" id="tableUsuarios">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <!-- <th>Imagen</th> -->
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                // $data = json_decode(file_get_contents("http://192.168.0.108:3000/Publicidades"), true);
                                $data = json_decode(file_get_contents("https://ecommerce-api-rest-2021.herokuapp.com/Publicidades"), true);
                                
                                for ($i = 0; $i < count($data); $i++) {
                                    echo "<tr>";
                                    echo "<th>" .$data[$i]["idpublicidad"]. "</th>";
                                    echo "<th>" .$data[$i]["titulo"]. "</th>";
                                    echo "<th>" .$data[$i]["descripcion"] . "</th>";
                                    if ($data[$i]["estado"] == 0) {
                                        echo "<th><span class='badge badge-danger'>Inactiva</span></th>";
                                    } else {
                                        echo "<th><span class='badge badge-success'>Activa</span></th>";
                                    }
                                    echo '<th><div class="text-center">
                                            <button class="btn btn-info btn-sm" onClick="fntViewPublicidad('.$data[$i]["idpublicidad"].')" title="Ver"><i class="far fa-eye"></i></button>
                                            <button class="btn btn-primary btn-sm" onClick="fntEditPublicidad('.$data[$i]["idpublicidad"].')" title="Editar" style="background: #2970bdd5; border-color: #4a88caec;"><i class="fas fa-pencil-alt"></i></button>
                                            <button class="btn btn-danger btn-sm" onClick="fntDelPublicidad('.$data[$i]['idpublicidad'].')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
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