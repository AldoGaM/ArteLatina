<?php
    $regreso = "Location: ./registro.php";
    if(!isset($_POST["usrname"])){
        header($regreso);
    }
    if(!isset($_POST["mail"])){
        header($regreso);
    }
    if(!isset($_POST["pwd"])){
        header($regreso);
    }
    if(!isset($_POST["rptpwd"])){
        header($regreso);
    }
    if(!isset($_POST["fecha_nac"])){
        header($regreso);
    }

