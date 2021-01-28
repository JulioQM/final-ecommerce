

  function obtener_pago_loca() {
    if (localStorage.getItem("pago")) {
        let nombre = JSON.parse(localStorage.getItem("pago"));
        return nombre;
    } else {
        console.log('no hay');

    }
}

display(obtener_pago_loca(),"");

function display(obj,sp) {
 for (n in obj) {
  if (typeof obj[n] == 'object') {
   display(obj[n],n+".");
  }else{
   html.innerHTML+="<p>"+obj[n];
  }
 }
}



