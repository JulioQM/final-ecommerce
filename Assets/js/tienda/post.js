
//post_producto()

post_fetch();
//Obtener detalle pedido

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

function post_fetch() {
    
    for (let index = 0; index < Object.keys(obtener_producto()).length; index++) {
        fetch("https://ecommerce-api-rest-2021.herokuapp.com/DetallePedidos", {
        
        method: "POST", 
        body: JSON.stringify(obtener_producto()[0]),
        headers:{
            'Content-Type': 'application/json; charset=utf-8'
          }
      }).then(res => res.json())
      .then(data=> console.log(data))
      ;
        
    }
    
}



function post_productoff() {
    console.log(obtener_producto());
    var http = new XMLHttpRequest();
    var url = "https://ecommerce-api-rest-2021.herokuapp.com/DetallePedidos";

    http.open("POST", url, true);
    http.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    http.onreadystatechange = function () {
        if (http.readyState == 4 && http.status == 200) {
            //aqui obtienes la respuesta de tu peticion
            alert(http.responseText);
        }
    }
    http.send(JSON.stringify(obtener_producto));
}


