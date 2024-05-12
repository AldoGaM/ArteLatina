<?php

declare(strict_types=1);

function getUser (object $pdo, string $usrname){
    $query = "SELECT * FROM usuario WHERE nombre_usr = ?;";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$usrname]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
