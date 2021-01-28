<?php 

    //RETORNA LA URL DEL PROYECTO
    // const BASE_URL = "http://localhost/JL/AD/ejemplos-ws/navegacion";

    function base_url(){
        return "http://localhost/final-ecommerce";
        // return "http://localhost/JL/AD/ejemplos-ws/navegacionV7/navegacion2";
        // return "http://192.168.0.106/JL/AD/ejemplos-ws/navegacion";
    }

    //zona horaria
    date_default_timezone_set('America/Guayaquil');

    //delimitadores decimal y millar ej: 24.1989,00
    const SPD = ",";
    const SPM = ".";

    //símbolo de moneda
    const SMONEY = "$";


?> 