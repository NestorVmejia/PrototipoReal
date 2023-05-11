<?php
    $host = "localhost";
    $User = "root";
    $pass = "";

    $db = "prueba2";
    
    $con = mysqli_connect($host, $User, $pass, $db);
    if (!$con) {
        echo "Conexión fallida";
    }
