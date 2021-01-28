
//registrar cliente
const formRegistro = document.forms['formRegistro'];
formRegistro.onsubmit = function (e) {
    e.preventDefault();

    // var intIdUsuario = document.querySelector('#txtIdUsuario').value;
    var strNombreCli = document.querySelector('#txtNombreCli').value;
    var strCorreoCli = document.querySelector('#txtCorreoCli').value;
    var StrUsuarioCli = document.querySelector('#txtUsuarioCli').value;
    var strPasswCli = document.querySelector('#txtPasswordCli').value;

    if (strNombreCli == '' || strCorreoCli == '' || StrUsuarioCli == '' || strPasswCli == '') {
        swal("Atención", "Todos los campos son obligatorios.", "error");
        return false;
    }

    var request = new XMLHttpRequest();
    // var ajaxUrl = 'http://192.168.0.108:3000/Usuario';
    var ajaxUrl = 'https://ecommerce-api-rest-2021.herokuapp.com/Usuarios';
    var formData = JSON.stringify(formDataToJSON());
    console.log(formData);
    request.open("POST", ajaxUrl, true);
    request.setRequestHeader("Content-type", "application/json");
    request.send(formData);
    request.onreadystatechange = function () {

        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);
            // $('#modalFormUsuario').modal("hide");
            formRegistro.reset();
            // document.querySelector('#resuesta-cli').innerHTML = "Usuario Creado";
            swal({
                title: "Usuario",
                text: "Usuario Creado",
                icon: "success"
            });
            // .then(window.location.reload());
            
        }
        else {
            // document.querySelector('#resuesta-cli').innerHTML = "Error al crear usuario";
            // swal({
            //     title: "Error",
            //     text: "Error!",
            //     icon: "error",
            // }.then((willDelete) => {
            // , function () {
            //     window.location.reload();
            // });
        }
        
        // location.reload();
    }

}
// }

function formDataToJSON() {
    const user = {};

    Array.from(formRegistro.elements).forEach(element => {
        if (element.name) user[element.name] = element.value
    })
    return user;
}


