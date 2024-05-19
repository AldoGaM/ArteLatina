<?php
    ini_set('session.use_only_cookies', 1);
    ini_set('session.use_strict_mode', 1);

    session_set_cookie_params([
        'lifetime' => 1800,
        'domain' => '.localhost',
        'path' => '/',
        'secure' => true,
        'httponly' => true
    ]);

    session_start();
    if (!isset($_SESSION["id_usr"])){
        if (!isset($_SESSION["last_regeneration"])){
            regenSessionIdLoggedIn();
        }else{
            $interval = 30*60;
            if(time() - $_SESSION["last_regeneration"] > $interval){
                regenSessionIdLoggedIn();
            }
        }
    }else{
        if (!isset($_SESSION["last_regeneration"])){
            regenSessionId();
        }else{
            $interval = 30*60;
            if(time() - $_SESSION["last_regeneration"] > $interval){
                regenSessionId();
            }
        }
    }

    function regenSessionId(){
        session_regenerate_id(true);
        $_SESSION["last_regeneration"] = time();
    }
    function regenSessionIdLoggedIn(){
        session_regenerate_id(true);
        
        $nuevaSesionId = session_create_id();
        $usr_id = $_SESSION["id_usr"];
        
        $sesionId = $nuevaSesionId . "_" . $usr_id;
        
        session_id($sesionId);
        $_SESSION["last_regeneration"] = time();
    }
