<?php
    if($_SERVER["REQUEST_METHOD"] != "POST"){
        header("Location: ../index.php");
    }
    $regreso = "Location: ../login.php";
    if(empty($_POST["usrname"])){
        header($regreso);
    }
    if(empty($_POST["pwd"])){
        header($regreso);
    }
    
