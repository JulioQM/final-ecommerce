
var tableUsuarios;

document.addEventListener('DOMContentLoaded', function () {
    // tableUsuarios = $('#tableUsuarios').dataTable({
    //     "aProcessing": true,
    //     "aServerSide": true,
    //     "language": {
    //         "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    //     },
    //     "resonsieve": "true",
    //     "bDestroy": true,
    //     "iDisplayLength": 5,
    //     "order": [[0, "desc"]]
    // });

    /*if (document.querySelector("#foto")) {
        var foto = document.querySelector("#foto");
        foto.onchange = function (e) {
            var uploadFoto = document.querySelector("#foto").value;
            var fileimg = document.querySelector("#foto").files;
            var nav = window.URL || window.webkitURL;
            var contactAlert = document.querySelector('#form_alert');
            if (uploadFoto != '') {
                var type = fileimg[0].type;
                var name = fileimg[0].name;
                if (type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png') {
                    contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';
                    if (document.querySelector('#img')) {
                        document.querySelector('#img').remove();
                    }
                    document.querySelector('.delPhoto').classList.add("notBlock");
                    foto.value = "";
                    return false;
                } else {
                    contactAlert.innerHTML = '';
                    if (document.querySelector('#img')) {
                        document.querySelector('#img').remove();
                    }
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                    var objeto_url = nav.createObjectURL(this.files[0]);
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src=" + objeto_url + ">";
                }
            } else {
                alert("No selecciono foto");
                if (document.querySelector('#img')) {
                    document.querySelector('#img').remove();
                }
            }
        }
    }

    if (document.querySelector(".delPhoto")) {
        var delPhoto = document.querySelector(".delPhoto");
        delPhoto.onclick = function (e) {
            removePhoto();
        }
    }*/


    const formPublicidad = document.forms['formPublicidad'];
    formPublicidad.onsubmit = function (e) {
        e.preventDefault();

        var idPubli = document.querySelector('#idPublicidad').value;
        var intIdPublicidad = document.querySelector('#txtPublicidad').value;
        var strTitulo = document.querySelector('#txtTitulo').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var intEstado = document.querySelector('#listStatus').value;
        var strImagen = document.querySelector('#txtImagen').value;

        if (intIdPublicidad == '' || strTitulo == '' || strDescripcion == '' || intEstado == '' || strImagen == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }

        var requestGet = new XMLHttpRequest();
        // var ajaxUrl = 'http://192.168.0.108:3000/Publicidades/' +idPubli;
        var ajaxUrl = 'https://ecommerce-api-rest-2021.herokuapp.com/Publicidades/' +idPubli;
        requestGet.open("GET", ajaxUrl, true);
        requestGet.send();
        requestGet.onreadystatechange = function () {

            if (requestGet.readyState == 4 && requestGet.status == 200) {
                var objData = JSON.parse(requestGet.responseText);

                if (idPubli == objData[0].idpublicidad) {

                    var request = new XMLHttpRequest();
                    // var ajaxUrl = 'http://192.168.0.108:3000/Publicidad/' +idPubli;
                    var ajaxUrl = 'https://ecommerce-api-rest-2021.herokuapp.com/Publicidades/' +idPubli;
                    var formData = JSON.stringify(formDataToJSON());
                    
                    console.log(formData);
                    
                    request.open("PUT", ajaxUrl, true);
                    request.setRequestHeader("Content-type", "application/json");
                    request.send(formData);
                    request.onreadystatechange = function () {

                        if (request.readyState == 4 && request.status == 200) {
                            var objData = JSON.parse(request.responseText);
                            $('#modalFormPublicidad').modal("hide");
                            formPublicidad.reset();
                            swal({
                                title: "Publicidad", 
                                text: "Publicidad Actualizada", 
                                type: "success"
                            }, function() {
                                window.location.reload();
                            });

                        }
                        else {
                            swal({
                                title: "Error", 
                                text: "Error!", 
                                type: "error"
                            }, function() {
                                window.location.reload();
                            });                        }

                    }

                } else {

                    var request = new XMLHttpRequest();
                    // var ajaxUrl = 'http://192.168.0.108:3000/Publicidad';
                    var ajaxUrl = 'https://ecommerce-api-rest-2021.herokuapp.com/Publicidades';
                    var formData = JSON.stringify(formDataToJSON());

                    request.open("POST", ajaxUrl, true);
                    request.setRequestHeader("Content-type", "application/json");
                    request.send(formData);
                    request.onreadystatechange = function () {

                        if (request.readyState == 4 && request.status == 200) {
                            var objData = JSON.parse(request.responseText);
                            $('#modalFormPublicidad').modal("hide");
                            formPublicidad.reset();
                            swal({
                                title: "Publicidad", 
                                text: "Publicidad Creada", 
                                type: "success"
                            }, function() {
                                window.location.reload();
                            });

                        }
                        else {
                            swal({
                                title: "Error", 
                                text: "Error!", 
                                type: "error"
                            }, function() {
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

        Array.from(formPublicidad.elements).forEach(element => {
            if (element.name) user[element.name] = element.value
        })
        return user;
    }


}, false);

function fntViewPublicidad(idpublicidad){
    let request = new XMLHttpRequest();
    // let ajaxUrl = 'http://192.168.0.108:3000/Publicidades/' +idpublicidad;
    let ajaxUrl = 'https://ecommerce-api-rest-2021.herokuapp.com/Publicidades/' +idpublicidad;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            // if(objData[0].estado) {
                let estado = objData[0].estado == 1 ? 
                '<span class="badge badge-success">Activo</span>' : 
                '<span class="badge badge-danger">Inactivo</span>';
                document.querySelector("#lblPublicidad").innerHTML = objData[0].idpublicidad;
                document.querySelector("#lblTitulo").innerHTML = objData[0].titulo;
                document.querySelector("#lblDescripcion").innerHTML = objData[0].descripcion;
                document.querySelector("#lblEstado").innerHTML = estado;
                document.querySelector("#imgPublicidad").innerHTML = '<img src="'+objData[0].imagen+'" style="width: 300px;"></img>';
                $('#modalViewCategoria').modal('show');
            // }else{
            //     swal("Error", objData.msg , "error");
            // }
        }
    }
}

$('#tableUsuarios').DataTable();

//evento cuando se carga el html
window.addEventListener('load', function () {
    // fntEditRol();
    // fntDelRol();
}, false);

//funcion para editar publicidad
function fntEditPublicidad(idpublicidad) {

    document.querySelector('#titleModal').innerHTML = "Actualizar Publicidad";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";
    $('#btnActionForm').attr('style', 'background: #2970bdd5; border-color: #4d84bed5;');
    $("#txtPublicidad").prop('disabled', true);

    var idpublicidad = idpublicidad;
    var request = new XMLHttpRequest();
    // var ajaxUrl = 'http://192.168.0.108:3000/Publicidades/' +idpublicidad;
    var ajaxUrl = 'https://ecommerce-api-rest-2021.herokuapp.com/Publicidades/' +idpublicidad;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            
            var objData = JSON.parse(request.responseText);
            // console.log(objData[0].titulo);

            document.querySelector('#idPublicidad').value = objData[0].idpublicidad; 
            document.querySelector('#txtPublicidad').value = objData[0].idpublicidad; 
            document.querySelector('#txtTitulo').value = objData[0].titulo; 
            document.querySelector('#txtDescripcion').value = objData[0].descripcion;
            document.querySelector('#listStatus').value = objData[0].estado;
            document.querySelector('#txtImagen').value = objData[0].imagen;
            // document.querySelector('#foto_actual').value = objData[0].imagen;
            // console.log(objData[0].imagen);
            if (objData[0].estado == 1) {
                document.querySelector('#listStatus').value = 1;
            } else {
                document.querySelector('#listStatus').value = 0;
            }
            $('#listStatus').selectpicker('render');

            /*if (document.querySelector("#img")) {
                document.querySelector("#img").src = objData[0].imagen;
            } else {
                document.querySelector(".prevPhoto").innerHTML = "<img id='img' src=" +objData[0].imagen+">";
            }*/
        }

        $('#modalFormPublicidad').modal('show');
    }
}

//funcion para eliminar la foto
/*function removePhoto() {
    document.querySelector('#foto').value = "";
    document.querySelector('.delPhoto').classList.add("notBlock");
    document.querySelector('#img').remove();
}*/

//funcin para eiminar publicidad
function fntDelPublicidad(idpublicidad) {

    var idpublicidad = idpublicidad;
    swal({
        title: "Eliminar Usuario",
        text: "¿Está Seguro de Eliminar la Publicidad?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar!",
        cloaseOnConfirm: false,
        cloaseOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {
            var request = new XMLHttpRequest();
            // var ajaxUrl = 'http://192.168.0.108:3000/Publicidad/' +idpublicidad;
            var ajaxUrl = 'https://ecommerce-api-rest-2021.herokuapp.com/Publicidades/' +idpublicidad;
            var strData = "idpublicidad=" + idpublicidad;
            request.open("DELETE", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {

                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    swal({
                        title: "Eliminar!",
                        text: "Publicidad Eliminada",
                        type: "success",
                    }, function () {
                        window.location.reload();
                    });

                } else {
                    swal("Atención!", "Error!", "error");
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

//para abrir el modal de nueva publicidad
function openModalPublicidad() {

    document.querySelector('#idPublicidad').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva Publicidad";
    document.querySelector('#formPublicidad').reset();
    $('#btnActionForm').attr('style', 'background: #009688; border-color: none;');
    $("#txtPublicidad").prop('disabled', false);
    $('#modalFormPublicidad').modal('show');
    // removePhoto();
}


