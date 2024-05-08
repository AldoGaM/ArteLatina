<?php
    # Control de entrada sin el post
    if($_SERVER["REQUEST_METHOD"] != "GET"){
        header('Location: index.php');
    }
    # Si los campos obligatorios están vacíos
    if(empty($_GET["busqueda"])){
        header("Location: index.php");
    }
    try{
        $busqueda = $_GET["busqueda"];

        require_once 'includes/dbh-inc.php';

        $query_artist = "SELECT * FROM artista WHERE nombre LIKE ?;";
        $stmt_artist = $pdo->prepare($query_artist);
        $stmt_artist->execute(["%".$busqueda."%"]);
        $resultados_artist = $stmt_artist->fetchAll(PDO::FETCH_ASSOC);

        $query_pais = "SELECT * FROM pais WHERE nombre_pais LIKE ?;";
        $stmt_pais = $pdo->prepare($query_pais);
        $stmt_pais->execute(["%".$busqueda."%"]);
        $resultados_pais = $stmt_pais->fetchAll(PDO::FETCH_ASSOC);

        $query_tipo = "SELECT * FROM tipo_arte WHERE tipo LIKE ?;";
        $stmt_tipo = $pdo->prepare($query_tipo);
        $stmt_tipo->execute(["%".$busqueda."%"]);
        $resultados_tipo = $stmt_tipo->fetchAll(PDO::FETCH_ASSOC);

        $query_obra = "SELECT * FROM tipo_arte WHERE tipo LIKE ?;";
        $stmt_obra = $pdo->prepare($query_obra);
        $stmt_obra->execute(["%".$busqueda."%"]);
        $resultados_obra = $stmt_obra->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;

    }catch(PDOException $e){
        die("Query failed: " . $e->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arte Latina</title>
    <link rel="stylesheet" href="assets/styles/index-style-mobile.css">
    <link rel="stylesheet" href="assets/styles/index-style-tab.css" media="screen and (min-width: 600px)">
    <link rel="stylesheet" href="assets/styles/index-style-desktop.css" media="screen and (min-width: 820px)">
</head>
<body>
    <header>
        <div id="inicio">
            <div id="logo"><a href="#"><img src="assets/images/logo.png" alt="Logo"></a></div>
            <h1>Arte Latina</h1>
            <div id="usuario">
                <img src="#" alt="Foto de usuario">
                <h3>Iniciar sesión</h3>
            </div>
        </div>
        <nav>
            <ul id="barra-principal">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Compra</a></li>
                <li><a href="#">Artistas</a></li>
                <li><a href="./contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div id="principal">
            <h3>Resultados</h3>

            <?php
                if(empty($resultados_artist) && empty($resultados_pais) && empty($resultados_tipo)){
                    echo $inicio_div = "<div class='results'>";
                    echo "<p>No hubo resultados</p>";
                    echo $fin_div = "</div>";
                }else{
                    foreach($resultados_artist as $elem){
                        echo $inicio_div;
                        echo htmlspecialchars($elem["nombre"]) . "<br>";
                        echo $fin_div;
                    }
                    foreach($resultados_pais as $elem){
                        echo $inicio_div;
                        echo htmlspecialchars($elem["nombre_pais"]) . "<br>";
                        echo $fin_div;
                    }
                    foreach($resultados_tipo as $elem){
                        echo $inicio_div;
                        echo htmlspecialchars($elem["tipo"]) . "<br>";
                        echo $fin_div;
                    }
                    foreach($resultados_obra as $elem){
                        echo $inicio_div;
                        echo htmlspecialchars($elem["nombre_obra"]) . "<br>";
                        echo $fin_div;
                    }
                }
            ?>

        </div>
        <div id="sidebar">
            <p>Te invitamos a conocer un poco del arte de algunas artistas latinoamericanas</p>
            <ul>
                <li><a href="#">Arquitectura</a></li>
                <li><a href="#">Cine</a></li>
                <li><a href="#">Danza</a></li>
                <li><a href="#">Escultura</a></li>
                <li><a href="#">Literatura</a></li>
                <li><a href="#">Muralismo</a></li>
                <li><a href="#">Música</a></li>
                <li><a href="#">Pintura</a></li>
                <li><a href="#">Teatro</a></li>
            </ul>
        </div>
    </main>
    <footer>
        <div id="redes-sociales">
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Tik tok</a></li>
            </ul>
        </div>
        <div id="nosotros">
            <ul>
                <li><a href="#">FES Acatlán</a></li>
                <li><a href="#">MAC</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
