<?php

    function comprobarErroresLogin(){
        if(isset($_SESSION["errores_login"])){
            $errores = $_SESSION["errores_login"];
            foreach($errores as $err){
                echo "<p class='error'>" .$err . "</p>";
            }
            unset($_SESSION["errores_login"]);
        }
    }
