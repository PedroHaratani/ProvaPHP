<?php

    $host = "localhost";
    $user = "root";
    $pass = "123456";
    $dbname = "horaCalc";
    $port = 3306;

    try {

        $conn = new PDO("mysql:host=$host;dbname=".$dbname,$user,$pass);
    }catch (PDOExceprion $err){
        echo 'Erro de conexão com o banco de dados ' .$err->getMessage();

    }

?>
