<?php

declare(strict_types=1);

function comprobarInputs(string $usrname, string $pwd){
    if (empty($usrname) || empty($pwd)){
        return true;
    }
    return false;
}

function usuarioInvalido (bool|array $resultado){
    if (!$resultado){
        return true;
    }
    return false;
}


function pwdInvalido (string $pwd, string $hashedpwd){
    if (!password_verify($pwd, $hashedpwd)){
        return true;
    }
    return false;
}
