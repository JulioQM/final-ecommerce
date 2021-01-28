<?php 

    session_start(); 
    session_unset();
    session_destroy();
    //vaciar carrito

    header('location: ./Login/login.php');

?>