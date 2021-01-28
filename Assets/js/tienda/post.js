
post_pedido();

function obtener_producto() {
    if (localStorage.getItem("productos")) {
        let nombre = JSON.parse(localStorage.getItem("productos"));
        var arreglado = nombre.map(item => {
            return {
                idpedido: document.getElementById("idpedido").textContent,
                codproducto: item.id,
                cantidad: item.cantidad,
                preciounitario: item.precio,
                subtotal: parseFloat(item.precio) * item.cantidad
            };
        });
        return arreglado;
    } else {
        console.log('no hay');
    }
}
function obtener_pedido() {

    var pedarreglado = {
        idusuario: document.getElementById("idusuario").value,
        iva: 'true',
        metododepago: JSON.parse(localStorage.getItem('pago')).metodo,
        preciototal: (document.getElementById('mostrar-total-final').textContent).substring(1),
        estado: '1'
    };
    return (pedarreglado);


}




function post_detallePedido() {

    for (let index = 0; index < Object.keys(obtener_producto()).length; index++) {

        fetch("https://ecommerce-api-rest-2021.herokuapp.com/DetallePedidos", {

            method: "POST",
            body: JSON.stringify(obtener_producto()[index]),
            headers: {
                'Content-Type': 'application/json; charset=utf-8'
            }
        }).then(res => res.json())
            .then(data => console.log(data))
            ;

    }
    // location.href("../index.php");
    // swal({
    //     title: "Compra",
    //     text: "Su compra se ha realizado con éxito!",
    //     type: "success",
    // }, function () {
    //     window.location.href("../index.php");
    // });

}


function post_pedido() {
    // console.log(JSON.stringify(obtener_pedido()));
    fetch("https://ecommerce-api-rest-2021.herokuapp.com/Pedidos", {

        method: "POST",
        body: JSON.stringify(obtener_pedido()),
        headers: {
            'Content-Type': 'application/json; charset=utf-8'
        }
    }).then(res => res.json())
        .then(data => console.log(data))
        ;


}




