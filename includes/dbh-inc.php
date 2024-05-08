<?php
    $dsn = "mysql:host=localhost;dbname=proyectodw";
    $dbusername = "dbconnection";
    $dbpassword = "123Acatlan";

    try{
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e){
        echo "Conexión fallida: " . $e->getMessage();
    }
