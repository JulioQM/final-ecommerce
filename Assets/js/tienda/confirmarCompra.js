//iva
valorIva = JSON.parse(localStorage.getItem("ivafinal"));
var mostrarIva = document.getElementById("mostrar-iva");
mostrarIva.innerHTML = "$" + valorIva.toString();

//subtotal
valorSubtotal = JSON.parse(localStorage.getItem("subtotal"));
var mostrarSubtotal = document.getElementById("mostrar-subtotal");
mostrarSubtotal.innerHTML = "$" + valorSubtotal.toString();

//total
valorTotal = JSON.parse(localStorage.getItem("pagoTotal"));
var mostrarTotal = document.getElementById("mostrar-total-final");
mostrarTotal.innerHTML = "$" + valorTotal.toFixed(2);


// columna productos
var nombres = JSON.parse(localStorage.getItem("productos"));
// for (i in nombres){
//     va =  nombres[i].id
//     console.log(va);
// }
var mostrarNombres = document.getElementById("mostrar-nombres");
for (i in nombres) {
    mostrarNombres.innerHTML += nombres[i].titulo + '<br>';
}

///// columna id producto
var idprod = document.getElementById("mostrar-id");
for (i in nombres) {
    // document.querySelector('#txtPassword').value;
    // document.getElementById("mostrar-id").value += nombres[i].id + '<br>';
    idprod.innerHTML += nombres[i].id + '<br>';
}

// columna cantidad
var mostrarCantidad = document.getElementById("mostrar-cantidad");
for (i in nombres) {
    mostrarCantidad.innerHTML += nombres[i].cantidad + '<br>';
}

// mostrar precio
var mostrarPrecio = document.getElementById("mostrar-precio");
for (i in nombres) {
    mostrarPrecio.innerHTML += nombres[i].precio + '<br>';
}

////// subtotal x producto
var subTProd = document.getElementById("mostrar-subTP");
for (i in nombres) {
    subTProd.innerHTML += (nombres[i].cantidad * nombres[i].precio) + '<br>';
}

// realizar Compra
function myFunction() {

}