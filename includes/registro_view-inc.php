<?php

declare(strict_types=1);

function comprobarErroresRegistro(){
    if(isset($_SESSION["errores_registro"])){
        $errores = $_SESSION["errores_registro"];
        foreach($errores as $err){
            echo "<p class='error'>" .$err . "</p>";
        }
        unset($_SESSION["errores_registro"]);
    }
}
