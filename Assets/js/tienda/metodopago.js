valorTotal = JSON.parse(localStorage.getItem('pagoTotal'));

//Variables para tarjeta de credito
var numerot;
var nombret;
var mest;
var añot;
var cvvt;
//Variables para transferencia
var comprobantet;
var filet;
//Variables para credito directo
var plazot;
var plazotext;
var combo;




var tarjeta = document.getElementById(formulario);
var mostrarTotal = document.getElementById('mostrar-total');
mostrarTotal.innerHTML = '<b>Total a pagar:</b> $' + valorTotal.toFixed(2);

//Imput numero tarjeta
formulario.numeroTarjeta.addEventListener('keyup', (e) => {
    let valorImput = e.target.value;

    formulario.numeroTarjeta.value = valorImput
        //Elimina caracteres que no sean digitos 0-9
        .replace(/\D/g, '')
        //Agrupar los numeros de 4 en 4
        .replace(/([0-9]{4})/g, '$1 ')
        //Elimina el ultimo espacio
        .trim();

    if (valorImput[0] == 4) {
        document.getElementById("visa").style.display = 'inline';
        document.getElementById("master").style.display = 'none';
        document.getElementById("otro").style.display = 'none';
    } else {
        document.getElementById("otro").style.display = "inline";
        document.getElementById("master").style.display = "inline";
        document.getElementById("visa").style.display = "inline";
        if (valorImput[0] == 5) {
            document.getElementById("master").style.display = "inline";
            document.getElementById("visa").style.display = 'none';
            document.getElementById("otro").style.display = 'none';
        }
        if (valorImput[0] == 3) {
            document.getElementById("master").style.display = "none";
            document.getElementById("visa").style.display = 'none';
            document.getElementById("otro").style.display = 'inline';
        }
    }



});

//Imput nombre tarjeta
formulario.nombreTarjeta.addEventListener('keyup', (e) => {
    let valorImput = e.target.value;

    formulario.nombreTarjeta.value = valorImput
        //Eliminar numeros
        .replace(/([0-9])/g, '');
});

//Imput CVV
formulario.cvvTarjeta.addEventListener('keyup', (e) => {
    let valorImput = e.target.value;

    formulario.cvvTarjeta.value = valorImput
        //Eliminar numeros
        .replace(/\D/g, '');
});

//Rellenar select del mes
for (let i = 1; i <= 12; i++) {
    let opcion = document.createElement('option');
    opcion.value = i;
    opcion.innerText = i;
    formulario.selectMes.appendChild(opcion);
}

//Rellenar select del año
for (let i = 2020; i <= 2030; i++) {
    let opcion = document.createElement('option');
    opcion.value = i;
    opcion.innerText = i;
    formulario.selectAño.appendChild(opcion);
}

//Imput Comprobante de pago
document.getElementById("comprobante").addEventListener('keyup', (e) => {
    let valorImput = e.target.value;

    document.getElementById("comprobante").value = valorImput
        //Eliminar numeros
        .replace(/\D/g, '');
});

//Evento BOTON CONFIRMAR PAGO TARJETA DE CREDITO
document.getElementById('boton-tarjeta').addEventListener('click', (c) => { confirmarPagoC(c) });
function confirmarPagoC(c) {

    numerot = document.getElementById("numeroTarjeta").value;
    nombret = document.getElementById("nombreTarjeta").value;
    mest = document.getElementById("selectMes").value;
    añot = document.getElementById("selectAño").value;
    cvvt = document.getElementById("cvvTarjeta").value;

    if(numerot === "" || nombret === "" || mest === "" || añot === "" || cvvt === ""){
        alert("Complete todos los campos")
    }else{
        if (validar_tarjeta()) {

            guardar_pago_tarjeta();
            c.preventDefault();
            
            location.href = "./confirmarCompra.php";
        } else {
            swal("Error","Ingrese datos del pago.","error");
        }
    }

}


//Evento BOTON CONFIRMAR PAGO TRANSFERENCIA
document.getElementById('boton-transferencia').addEventListener('click', (t) => { confirmarPagoT(t) });
function confirmarPagoT(t) {

    comprobantet = document.getElementById("comprobante").value;
    filet = document.getElementById("filet").files;


    if (validar_transferencia()) {

        guardar_pago_trasnferencia()

        t.preventDefault();

        location.href = "./confirmarCompra.php";
    } else {
        swal("Error","Ingrese datos del pago.","error");
    }


}

//Evento BOTON CONFIRMAR PAGO CREDITO DIRECTO
document.getElementById('boton-credito').addEventListener('click', (d) => { confirmarPagoD(d) });
function confirmarPagoD(d) {

    combo = document.getElementById("plazo");
    plazot = combo.options[combo.selectedIndex].value;
    plazotext=combo.options[combo.selectedIndex].text;


    if (validar_credito()) {

        guardar_pago_credito()

        d.preventDefault();

        location.href = "./confirmarCompra.php";
    } else {
        swal("Error","Ingrese datos del pago.","error");
    }


}


//Validar tarjeta
function validar_tarjeta() {
    if (numerot.length != 19) {
        return false;
    }
    if (nombret.length < 6) {
        return false;
    }
    if (mest.length == 3) {
        return false;
    }
    if (añot.length == 3) {
        return false;
    }
    if (cvvt.length != 3) {
        return false;
    }
    return true;

}

//Validar transferencia
function validar_transferencia() {
    if (comprobantet.length < 10) {
        return false;
    }
    if (filet.length == 0) {
        return false;
    }
    return true;
}

//Validar credito directo
function validar_credito() {
    if (plazot == 0) {
        return false;
    }
    return true;
}


//Local storage

//Guardar pago TARJETA DE CREDITO en localStorage 
function guardar_pago_tarjeta() {


    let pago = {
        metodo: 'Tarjeta de crédito',
        nombre: nombret,
        numero: numerot.substring(0,4)+'XXXX XXXX '+numerot.substring(15,19),

    }

    localStorage.setItem("pago", JSON.stringify(pago));

};

//Guardar pago TRANSFERENCIA en localStorage 
function guardar_pago_trasnferencia() {
    let pago = {
        metodo: 'Transferencia',
        comprobante: comprobantet
    }
    localStorage.setItem("pago", JSON.stringify(pago));
};

//Guardar pago CREDITO DIRECTO en localStorage 
function guardar_pago_credito() {
    let pago = {
        metodo: 'Crédito directo',
        plazo: plazotext
    }
    localStorage.setItem("pago", JSON.stringify(pago));
};

//Obtener pago de localStorage
function obtener_pago_loca() {
    if (localStorage.getItem("pago")) {
        let nombre = JSON.parse(localStorage.getItem("pago"));
        console.log(nombre);
    } else {
        console.log('no hay');

    }

}


