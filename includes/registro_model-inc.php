<?php

declare(strict_types=1);



function getUsername (object $pdo, string $usrname){
    $query = "SELECT nombre_usr FROM usuario WHERE nombre_usr = ?;";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$usrname]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getMail (object $pdo, string $email){
    $query = "SELECT email FROM usuario WHERE email = ?;";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);
    echo $stmt->fetch(PDO::FETCH_ASSOC);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
