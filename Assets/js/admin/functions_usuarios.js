
var tableUsuarios;

document.addEventListener('DOMContentLoaded', function () {
    tableUsuarios = $('#tableUsuarios').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },/*
        "ajax": {
            "url": "http://192.168.0.108:3000/Usuarios",
            "dataSrc": ""
        },
        "columns": [
            {"data": "idusuario"},
            {"data": "idrol"},
            {"data": "nombre"},
            {"data": "correo"},
            {"data": "usuario"},
            {"data": "clave"},
            {"data": "estatus"}//,
            // {"data": "options"}
        ],*/
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 5,
        "order": [[0, "desc"]]
    });

    const formUsuario = document.forms['formUsuario'];
    formUsuario.onsubmit = function (e) {
        e.preventDefault();

        var idUser = document.querySelector('#idUser').value;
        var intIdUsuario = document.querySelector('#txtIdUsuario').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strCorreo = document.querySelector('#txtCorreo').value;
        var StrUsuario = document.querySelector('#txtUsuario').value;
        var strPassw = document.querySelector('#txtPassword').value;

        if (intIdUsuario == '' || strNombre == '' || strCorreo == '' || StrUsuario == '' || strPassw == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }

        var requestGet = new XMLHttpRequest();
        // var ajaxUrl = 'http://192.168.0.108:3000/Usuarios/' + idUser;
        var ajaxUrl = 'https://ecommerce-api-rest-2021.herokuapp.com/Usuarios/' + idUser;
        requestGet.open("GET", ajaxUrl, true);
        requestGet.send();
        requestGet.onreadystatechange = function () {

            if (requestGet.readyState == 4 && requestGet.status == 200) {
                var objData = JSON.parse(requestGet.responseText);

                if (idUser == objData[0].idusuario) {

                    var request = new XMLHttpRequest();
                    // var ajaxUrl = 'http://192.168.0.108:3000/Usuario/' + idUser;
                    var ajaxUrl = 'https://ecommerce-api-rest-2021.herokuapp.com/Usuarios/' + idUser;
                    var formData = JSON.stringify(formDataToJSON());
                    // console.log(formData);
                    request.open("PUT", ajaxUrl, true);
                    request.setRequestHeader("Content-type", "application/json");
                    request.send(formData);
                    request.onreadystatechange = function () {

                        if (request.readyState == 4 && request.status == 200) {
                            var objData = JSON.parse(request.responseText);
                            $('#modalFormUsuario').modal("hide");
                            formUsuario.reset();
                            swal({
                                title: "Usuario",
                                text: "Usuario Actualizado",
                                type: "success",
                            }, function () {
                                window.location.reload();
                            });

                        }
                        else {
                            swal({
                                title: "Error",
                                text: "Error!",
                                type: "error",
                            }, function () {
                                window.location.reload();
                            });
                        }
                        // location.reload();
                    }

                } else {

                    var request = new XMLHttpRequest();
                    // var ajaxUrl = 'http://192.168.0.108:3000/Usuario';
                    var ajaxUrl = 'https://ecommerce-api-rest-2021.herokuapp.com/Usuarios';
                    var formData = JSON.stringify(formDataToJSON());

                    request.open("POST", ajaxUrl, true);
                    request.setRequestHeader("Content-type", "application/json");
                    request.send(formData);
                    request.onreadystatechange = function () {

                        if (request.readyState == 4 && request.status == 200) {
                            var objData = JSON.parse(request.responseText);
                            $('#modalFormUsuario').modal("hide");
                            formUsuario.reset();
                            swal({
                                title: "Usuario",
                                text: "Usuario Creado",
                                type: "success",
                            }, function () {
                                window.location.reload();
                            });

                        }
                        else {
                            swal({
                                title: "Error",
                                text: "Error!",
                                type: "error",
                            }, function () {
                                window.location.reload();
                            });
                        }
                        // location.reload();
                    }

                }

            }

        }

    }
    // }

    function formDataToJSON() {
        const user = {};

        Array.from(formUsuario.elements).forEach(element => {
            if (element.name) user[element.name] = element.value
        })
        return user;
    }



}, false);


$('#tableUsuarios').DataTable();

//evento cuando se carga el html
window.addEventListener('load', function () {
    // fntEditRol();
    // fntDelRol();
}, false);

//funcion para editar el modal de informacion del usuario para editar
function fntEditUsuario(idPersona) {

    document.querySelector('#titleModal').innerHTML = "Actualizar Usuario";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";
    $('#btnActionForm').attr('style', 'background: #2970bdd5; border-color: #4d84bed5;');
    $("#txtIdUsuario").prop('disabled', true);

    var idPersona = idPersona;
    var request = new XMLHttpRequest();
    // var ajaxUrl = 'http://192.168.0.108:3000/Usuarios/' + idPersona;
    var ajaxUrl = 'https://ecommerce-api-rest-2021.herokuapp.com/Usuarios/' + idPersona;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {

        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);

            document.querySelector('#idUser').value = objData[0].idusuario;
            document.querySelector('#txtIdUsuario').value = objData[0].idusuario;
            document.querySelector('#listRol').value = objData[0].idrol;
            document.querySelector('#txtNombre').value = objData[0].nombre;
            document.querySelector('#txtCorreo').value = objData[0].correo;
            document.querySelector('#txtUsuario').value = objData[0].usuario;
            document.querySelector('#txtPassword').value = objData[0].clave;
            document.querySelector('#listStatus').value = objData[0].estatus;
            $('#listRol').selectpicker('render');

            if (objData[0].estatus == 1) {
                document.querySelector('#listStatus').value = 1;
            } else {
                document.querySelector('#listStatus').value = 0;
            }
            $('#listStatus').selectpicker('render');
        }

        $('#modalFormUsuario').modal('show');
    }

}

//funcin para eiminar usuario
function fntDelUsuario(idPersona) {

    var idUsuario = idPersona;
    swal({
        title: "Eliminar Usuario",
        text: "¿Está Seguro de Eliminar el Usuario?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Eliminar!",
        cancelButtonText: "Cancelar!",
        cloaseOnConfirm: false,
        cloaseOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {
            var request = new XMLHttpRequest();
            // var ajaxUrl = 'http://192.168.0.108:3000/Usuario/' + idPersona;
            var ajaxUrl = 'https://ecommerce-api-rest-2021.herokuapp.com/Usuarios/' + idPersona;
            var strData = "idUsuario=" + idUsuario;
            request.open("DELETE", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {

                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    swal({
                        title: "Eliminar!",
                        text: "Usuario Eliminado",
                        type: "success",
                    }, function () {
                        window.location.reload();
                    });
                    // location.reload();
                    // tableUsuarios.api().ajax.reload();
                } else {
                    swal({
                        title: "Atención!",
                        text: "Error!",
                        type: "error"
                    }, function () {
                        window.location.reload();
                    });
                }
            }
        }
    });
}

//para abrir el modal de nuevo usuario
function openModalUser() {

    document.querySelector('#idUser').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";
    document.querySelector('#formUsuario').reset();
    $('#btnActionForm').attr('style', 'background: #009688; border-color: none;');
    $("#txtIdUsuario").prop('disabled', false);
    $('#modalFormUsuario').modal('show');
}


