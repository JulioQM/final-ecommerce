var tablePedidos;

document.addEventListener('DOMContentLoaded', function () {
    tablePedidos = $('#tablePedidos').dataTable({
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

    // const formUsuario = document.forms['formUsuario'];
    // formUsuario.onsubmit = function (e) {
    //     e.preventDefault();

    //     var idUser = document.querySelector('#idUser').value;
    //     var intIdUsuario = document.querySelector('#txtIdUsuario').value;
    //     var strNombre = document.querySelector('#txtNombre').value;
    //     var strCorreo = document.querySelector('#txtCorreo').value;
    //     var StrUsuario = document.querySelector('#txtUsuario').value;
    //     var strPassw = document.querySelector('#txtPassword').value;

    //     if (intIdUsuario == '' || strNombre == '' || strCorreo == '' || StrUsuario == '' || strPassw == '') {
    //         swal("Atención", "Todos los campos son obligatorios.", "error");
    //         return false;
    //     }

    //     var requestGet = new XMLHttpRequest();
    //     // var ajaxUrl = 'http://192.168.0.108:3000/Usuarios/' + idUser;
    //     var ajaxUrl = 'https://ecommerce-api-rest-2021.herokuapp.com/Usuarios/' + idUser;
    //     requestGet.open("GET", ajaxUrl, true);
    //     requestGet.send();
    //     requestGet.onreadystatechange = function () {

    //         if (requestGet.readyState == 4 && requestGet.status == 200) {
    //             var objData = JSON.parse(requestGet.responseText);



    //                 var request = new XMLHttpRequest();
    //                 // var ajaxUrl = 'http://192.168.0.108:3000/Usuario';
    //                 var ajaxUrl = 'https://ecommerce-api-rest-2021.herokuapp.com/Usuarios';
    //                 var formData = JSON.stringify(formDataToJSON());

    //                 request.open("POST", ajaxUrl, true);
    //                 request.setRequestHeader("Content-type", "application/json");
    //                 request.send(formData);
    //                 request.onreadystatechange = function () {

    //                     if (request.readyState == 4 && request.status == 200) {
    //                         var objData = JSON.parse(request.responseText);
    //                         $('#modalFormUsuario').modal("hide");
    //                         formUsuario.reset();
    //                         swal({
    //                             title: "Usuario",
    //                             text: "Usuario Creado",
    //                             type: "success",
    //                         }, function () {
    //                             window.location.reload();
    //                         });

    //                     }
    //                     else {
    //                         swal({
    //                             title: "Error",
    //                             text: "Error!",
    //                             type: "error",
    //                         }, function () {
    //                             window.location.reload();
    //                         });
    //                     }
    //                     // location.reload();
    //                 }



    //         }

    //     }

    // }


    // function formDataToJSON() {
    //     const user = {};

    //     Array.from(formUsuario.elements).forEach(element => {
    //         if (element.name) user[element.name] = element.value
    //     })
    //     return user;
    // }



}, false);


$('#tablePedidos').DataTable();

//evento cuando se carga el html
window.addEventListener('load', function () {
    // fntEditRol();
    // fntDelRol();
}, false);


function mostrarDetalle() {
    // document.getElementById('detalle_ped').style = 'display:block';
    document.getElementById("detalle_ped");
}

$(document).ready(function () {

    //Facturar Venta
    $('#btn_facturar_venta').click(function (e) {
        e.preventDefault();

        var rows = $('#detalle_venta tr').length;
        if (rows > 0) {
            var action = 'procesarVenta';
            var codCliente = $('#idcliente').val();

            $.ajax({
                url: 'ajax.php',
                type: "POST",
                async: true,
                data: { action: action, codCliente: codCliente },
                success: function (response) {
                    //console.log(response);

                    if (response != 'error') {
                        var info = JSON.parse(response);
                        console.log(info);

                        //generarPDF(info.idusuario, info.idpedido);
                        location.reload();
                    } else {
                        console.log('no data');
                    }
                },
                error: function (error) {
                }
            });
        } else {
            // console.log("no vale tu wbd");
        }
    });


    //Ver factura
    $('.view_factura').click(function (e) {
        e.preventDefault();
        var codCliente = $(this).attr('cl');
        var numPedido = $(this).attr('f');

        generarPDF(codCliente, numPedido);
    });

});

//Generar PDF para la factura
function generarPDF(cliente, factura) {
    var ancho = 1000;
    var alto = 800;
    //Calcular posicion x,y para centrar la venta
    var x = parseInt((window.screen.width / 2) - (ancho / 2));
    var y = parseInt((window.screen.height / 2) - (alto / 2));

    $url = '../../factura/generaFactura.php?f=' + factura+'&cl=' + cliente;
    window.open($url, "Factura", "left=" + x + ",top=" + y + ",height=" + alto + ",width=" + ancho + ",scrollbar=si,location=no,resizable=si,menubar=no");
}

