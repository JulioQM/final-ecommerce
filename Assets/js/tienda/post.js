


function obtener_producto() {
    if (localStorage.getItem("productos")) {
        let nombre = JSON.parse(localStorage.getItem("productos"));
        var arreglado = nombre.map(item => {
            return {
                idpedido: 1,
                codproducto: 'prxxa',
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
async function obtener_pedido() {
    var pedido;
    let response = await fetch('https://ecommerce-api-rest-2021.herokuapp.com/Pedidos', { method: 'GET' })
    let result = await response.json();
    if (result != null) {

        var pedarreglado = {
            idusuario: document.getElementById("idusuario").value,
            idpedido: result[0].idpedido+1,
            iva: 'true',
            metododepago: JSON.parse(localStorage.getItem('pago')).metodo,
            preciototal: document.getElementById('mostrar-total-final').textContent,
            estado: '1'
        };
        console.log(pedarreglado);
        return(pedarreglado);
    } else {
        console.log('no hay');
    }
}




function post_detallePedido() {

    for (let index = 0; index < Object.keys(obtener_producto()).length; index++) {
        fetch("https://ecommerce-api-rest-2021.herokuapp.com/DetallePedidos", {

            method: "POST",
            body: JSON.stringify(obtener_producto()[0]),
            headers: {
                'Content-Type': 'application/json; charset=utf-8'
            }
            
        }).then(res => res.json())
            .then(data => console.log(data))
            ;

    }
    swal("Compra","Compra realizada con éxito!","success");

}


function post_pedido() {
            fetch("https://ecommerce-api-rest-2021.herokuapp.com/Pedidos", {

            method: "POST",
            body: JSON.stringify(obtener_pedido()[0]),
            headers: {
                'Content-Type': 'application/json; charset=utf-8'
            }
        }).then(res => res.json())
            .then(data => console.log(data))
            ;
}