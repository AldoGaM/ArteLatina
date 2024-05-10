<?php
    # Control de entrada sin el post
    if($_SERVER["REQUEST_METHOD"] != "POST"){
        header('Location: ../index.php');
    }
    # Si los campos obligatorios están vacíos
    $regreso = 'Location: ../registro.php';
    if(empty($_POST["usrname"])){
        header($regreso);
    }
    if(empty($_POST["mail"])){
        header($regreso);
    }
    if(empty($_POST["pwd"])){
        header($regreso);
    }
    if(empty($_POST["rptpwd"])){
        header($regreso);
    }
    if(empty($_POST["fname"])){
        header($regreso);
    }
    # Si la contraseña no coincide
    if($_POST["pwd"] != $_POST["rptpwd"]){
        header($regreso);
    }
    # Si hay passphrase y no hay respuesta o viceversa
    if(empty($_POST["passphrase"]) && !empty($_POST["pass_ans"])){
        header($regreso);
    }
    if(!empty($_POST["passphrase"]) && empty($_POST["pass_ans"])){
        header($regreso);
    }
    try{
        $usrname = $_POST["usrname"];
        $mail = $_POST["mail"];
        $pwd = $_POST["pwd"];
        $fecha_nac = $_POST["fecha_nac"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $passphrase = $_POST["passphrase"];
        $pass_ans = $_POST["pass_ans"];

        # Chequeo de los campos vacíos
        if(empty($fecha_nac)){
            $fname = null;
        }
        if(empty($lname)){
            $lname = null;
        }
        if(empty($passphrase)){
            $passphrase = null;
            $pass_ans = null;
        }

        require_once 'dbh-inc.php';

        $opciones = [
            'cost' => 12
        ];

        $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $opciones);

        $query = 'INSERT INTO usuario (nombre_usr, nombre, apellido, fecha_nac, password, passphrase, pass_ans) VALUES (?,?,?,?,?,?,?);';
        
        $stmt = $pdo->prepare($query);
        $stmt->execute([$usrname,$fname,$lname,$fecha_nac,$pwd,$passphrase,$pass_ans]);

        $pdo = null;
        $stmt = null;
        header('Location: ../index.php');
        die();

    }catch(PDOException $e){
        die("Query failed: " . $e->getMessage());
    }
