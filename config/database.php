<?php
#Configurando BD
    define('DB_HOST', 'localhost');
    define('DB_USER', 'eloi');
    define('DB_PASS', '1234');
    define('DB_NAME', 'meu_database');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

#Verificando a existencia de erro de conexão com o BD
    if($conn->connect_error){
        die('Connection Failed' . $conn->connect_error);
    }


?>

