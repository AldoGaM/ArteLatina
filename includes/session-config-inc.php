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
    echo session_id();
    if (!isset($_SESSION["last_regeneration"])){
        regenSessionId();
    }else{
        $interval = 30*60;
        if(time() - $_SESSION["last_regeneration"] > $interval){
            regenSessionId();
        }
    }

    function regenSessionId(){
        session_regenerate_id();
        $_SESSION["last_regeneration"] = time();
    }
