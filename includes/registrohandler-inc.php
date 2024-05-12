<?php
    
    require_once 'session-config-inc.php';
    # Control de entrada sin el post
    if($_SERVER["REQUEST_METHOD"] != "POST"){
        header('Location: ../index.php');
    }

    $usrname = $_POST["usrname"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $rptpwd = $_POST["rptpwd"];
    $fecha_nac = $_POST["fecha_nac"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $passphrase = $_POST["passphrase"];
    $pass_ans = $_POST["pass_ans"];
    
    try{
        require_once 'dbh-inc.php';
        require_once 'registro_model-inc.php';
        require_once 'registro_contr-inc.php';

        # Manejo de errores
        
        $errores = [];
        
        # Si hay campos vacíos
        if (checkInputs($usrname,$email,$pwd,$rptpwd,$fname)){
            $errores["campos_vacios"] = "Llena los campos obligatorios";
        }
        # si las contraseñas coinciden
        if (compararPwd($pwd, $rptpwd)){
            $errores["pwds_diferentes"] = "Las contraseñas no son iguales";
        }
        # si hay un passphrase pero no respuesta o viceversa
        if (comprobacionPassphrase($passphrase,$pass_ans)){
            $errores["pass_unmatched"] = "Llena o deja vacíos los campos de recuperación";
        }
        # si el email es válido
        if (checkMail($email)){
            $errores["email_invalido"] = "Email inválido";
        }
        # si el usuario ya existe
        if (usuarioExiste($pdo, $usrname)){
            $errores["existe_usr"] = "El usuario ya existe";
        }
        # si el email ya fue registrado
        if (mailRegistrado($pdo, $email)){
            $errores["mail_registrado"] = "El email ya está registrado";
        }
        # si hubo errores, que regrese a registro
        if ($errores){
            $_SESSION["errores_registro"] = $errores;
            header("Location: ../registro.php");
            die();
        }
        # aquí empieza el registro
        if (empty($fecha_nac)){
            $fecha_nac = null;
        }
        if (empty($lname)){
            $lname = null;
        }
        if (empty($passphrase)){
            $passphrase = null;
            $pass_ans = null;
        }
        $opciones = [
            'cost' => 12
        ];

        $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $opciones);
    
        $query = 'INSERT INTO usuario (nombre_usr, nombre, email, apellido, fecha_nac, password, passphrase, pass_ans) VALUES (?,?,?,?,?,?,?,?);';
            
        $stmt = $pdo->prepare($query);
        $stmt->execute([$usrname,$fname,$email,$lname,$fecha_nac,$hashedPwd,$passphrase,$pass_ans]);

        $pdo = null;
        $stmt = null;
        header('Location: ../index.php?signup=success');
        die();

    }catch(PDOException $e){
        die("Query failed: " . $e->getMessage());
    }
