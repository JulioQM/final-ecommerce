
var tableRoles;

document.addEventListener('DOMContentLoaded', function () {
    tableRoles = $('#tableRoles').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },/*
        "ajax": {
            "url": "http://192.168.0.108:3000/Roles",
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


    //nuevo rol
    const formRol = document.forms['formRol'];
    formRol.onsubmit = function (e) {
        e.preventDefault();

        // console.log(JSON.stringify(formDataToJSON()));

        var idRol = document.querySelector('#idRol').value;
        var intIdRol = document.querySelector('#txtIdRol').value;
        var strRol = document.querySelector('#txtRol').value;

        if (intIdRol == '' || strRol == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }

        var requestGet = new XMLHttpRequest();
        // var ajaxUrl = 'http://192.168.0.108:3000/Roles/' + idRol;
        var ajaxUrl = 'https://ecommerce-api-rest-2021.herokuapp.com/Roles/' + idRol;
        requestGet.open("GET", ajaxUrl, true);
        requestGet.send();
        requestGet.onreadystatechange = function () {

            if (requestGet.readyState == 4 && requestGet.status == 200) {
                var objData = JSON.parse(requestGet.responseText);

                if (idRol == objData[0].idrol) {

                    var request = new XMLHttpRequest();
                    // var ajaxUrl = 'http://192.168.0.108:3000/Rol/' +idRol;
                    var ajaxUrl = 'https://ecommerce-api-rest-2021.herokuapp.com/Roles/' +idRol;
                    var formData = JSON.stringify(formDataToJSON());

                    request.open("PUT", ajaxUrl, true);
                    request.setRequestHeader("Content-type", "application/json");
                    request.send(formData);
                    request.onreadystatechange = function () {

                        if (request.readyState == 4 && request.status == 200) {
                            var objData = JSON.parse(request.responseText);
                            $('#modalFormRol').modal("hide");
                            formRol.reset();
                            swal({
                                title: "Rol",
                                text: "Rol Actualizado",
                                type: "success",
                            }, function () {
                                window.location.reload();
                            });
                            // location.reload();
                            // tableUsuarios.api().ajax.reload();
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
                    }

                } else {

                    var request = new XMLHttpRequest();
                    // var ajaxUrl = 'http://192.168.0.108:3000/Rol';
                    var ajaxUrl = 'https://ecommerce-api-rest-2021.herokuapp.com/Roles';
                    var formData = JSON.stringify(formDataToJSON());

                    request.open("POST", ajaxUrl, true);
                    request.setRequestHeader("Content-type", "application/json");
                    request.send(formData);
                    request.onreadystatechange = function () {

                        if (request.readyState == 4 && request.status == 200) {
                            var objData = JSON.parse(request.responseText);
                            $('#modalFormRol').modal("hide");
                            formRol.reset();
                            swal({
                                title: "Rol", 
                                text: "Rol Creado", 
                                type: "success"
                            }, function() {
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
                    }
                }

            }
        }



    }


    function formDataToJSON() {
        const user = {};
        Array.from(formRol.elements).forEach(element => {
            if (element.name) user[element.name] = element.value
        })
        return user;
    }


}, false);




$('#tableRoles').DataTable();

//evento cuando se carga el html
window.addEventListener('load', function () {
    // fntEditRol();
    // fntDelRol();
}, false);

//funcion para editar rol
function fntEditRol(idrol) {

    document.querySelector('#titleModal').innerHTML = "Actualizar Rol";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";
    $('#btnActionForm').attr('style', 'background: #2970bdd5; border-color: #4d84bed5;');
    $("#txtIdRol").prop('disabled', true);

    var idrol = idrol;
    var request = new XMLHttpRequest();
    // var ajaxUrl = 'http://192.168.0.108:3000/Roles/' + idrol;
    var ajaxUrl = 'https://ecommerce-api-rest-2021.herokuapp.com/Roles/' + idrol;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            //console.log(request.responseText);
            var objData = JSON.parse(request.responseText);

            document.querySelector('#idRol').value = objData[0].idrol;
            document.querySelector('#txtIdRol').value = objData[0].idrol;
            document.querySelector('#txtRol').value = objData[0].rol;
            document.querySelector('#listStatus').value = objData[0].estado;

            if (objData[0].estado == 1) {
                document.querySelector('#listStatus').value = 1;
            } else {
                document.querySelector('#listStatus').value = 0;
            }
            $('#listStatus').selectpicker('render');

            $('#modalFormRol').modal('show');
        }
    }
    $('#modalFormRol').modal('show');
}

//funcion para eliminar rol
function fntDelRol(idrol) {

    var idrol = idrol;
    swal({
        title: "Eliminar Rol",
        text: "¿Está Seguro de Eliminar el Rol?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Eliminar!",
        cancelButtonText: "Cancelar!",
        cloaseOnConfirm: false,
        cloaseOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {
            var request = new XMLHttpRequest();
            // var ajaxUrl = 'http://192.168.0.108:3000/Rol/' + idrol;
            var ajaxUrl = 'https://ecommerce-api-rest-2021.herokuapp.com/Roles/' + idrol;
            var strData = "idrol=" + idrol;
            request.open("DELETE", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {

                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    swal({
                        title: "Eliminar!",
                        text: "Rol Eliminado",
                        type: "success",
                    }, function () {
                        window.location.reload();
                    });

                } else {
                    swal({
                        title: "Atención!",
                        text: "Error!",
                        type: "error",
                    }, function () {
                        window.location.reload();
                    });
                }
            }
        }
    });
}


//para abrir el modal de nuevo usuario
function openModalRol() {

    document.querySelector('#idRol').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Rol";
    document.querySelector('#formRol').reset();
    $('#btnActionForm').attr('style', 'background: #009688; border-color: none;');
    $("#txtIdRol").prop('disabled', false);
    $('#modalFormRol').modal('show');
}


