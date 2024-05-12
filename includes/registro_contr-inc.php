<?php

function checkInputs (string $usrname, string $email, string $pwd, string $rptpwd, string $fname){
    # Si los campos obligatorios están vacíos
    if(empty($usrname) || empty($email) || empty($pwd) || empty($rptpwd) || empty($fname)){
        return true;
    }
    return false;
}

function compararPwd(string $pwd, string $rptpwd){
    if ($pwd != $rptpwd){
        return true;
    }
    return false;
}

function comprobacionPassphrase(string $passphrase, string $pass_ans){
    if (empty($passphrase) && !empty($pass_ans) || !empty($passphrase) && empty($pass_ans)){
        return true;
    }
    return false;
}

function checkMail(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    return false;
}

function usuarioExiste(object $pdo, string $usrname){
    if (getUsername($pdo, $usrname)){
        return true;
    }
    return false;
}

function mailRegistrado(object $pdo, string $usrname){
    if (getMail($pdo, $usrname)){
        return true;
    }
    return false;
}
