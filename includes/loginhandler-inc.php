<?php

    require_once 'session-config-inc.php';

    if($_SERVER["REQUEST_METHOD"] != "POST"){
        header("Location: ../index.php");
    }
    $usrname = $_POST["usrname"];
    $pwd = $_POST["pwd"];
    try{
        require_once 'dbh-inc.php';
        require_once 'login_model-inc.php';
        require_once 'login_contr-inc.php';
        
        # manejo de errores
        $errores = [];
        if (comprobarInputs($usrname, $pwd)){
            $errores["campos_vacios"] = "Llena los campos";
        }
        $resultado = getUser($pdo, $usrname);
        if (usuarioInvalido($resultado)){
            $errores["login_error"] = "Usuario y/o contraseña inválidos";
        }
        if (!usuarioInvalido($resultado) && pwdInvalido($pwd, $resultado["password"])){
            $errores["login_error"] = "Usuario y/o contraseña inválidos";
        }
        if ($errores){
            $_SESSION["errores_login"] = $errores;
            header("Location: ../login.php");
            die();
        }

        $nuevaSesionId = session_create_id();
        $sesionId = $nuevaSesionId . "_" . $resultado["id_usuario"];
        session_id($sesionId);
        
        $_SESSION["id_usr"] = $resultado["id_usuario"];
        $_SESSION["usrname"] = htmlspecialchars($resultado["nombre_usr"]);
        $_SESSION["fname_usr"] = htmlspecialchars($resultado["nombre"]);
        $_SESSION["last_regeneration"] = time();
        header("Location: ../index.php");
        $pdo = null;
        $stmt = null;
        die();

    }catch (PDOException $e){
        die("Query failed: " . $e->getMessage());
    }
    
