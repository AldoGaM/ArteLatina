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

        $query_obra = "SELECT * FROM obra WHERE nombre_obra LIKE ?;";
        $stmt_obra = $pdo->prepare($query_obra);
        $stmt_obra->execute(["%".$busqueda."%"]);
        $resultados_obra = $stmt_obra->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt_artist = null;
        $stmt_pais = null;
        $stmt_tipo = null;
        $stmt_obra = null;

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
                <li><a href="index.php">Inicio</a></li>
                <li><a href="#">Compra</a></li>
                <li><a href="artista.php">Artistas</a></li>
                <li><a href="./contacto.php">Contacto</a></li>
            </ul>
        </nav>
        <div class="search-option">
            <form action="search.php" method="get">
                <input type="search" name="busqueda" placeholder="Buscar">
                <button type="submit"><img src="assets/images/search-icon.png" alt="Buscar"></button>
            </form>
        </div>
    </header>
    <main>
        <div id="principal">
            <h3>Resultados</h3>
            <?php
                # Si no hay resultados que coincidan
                if(empty($resultados_artist) && empty($resultados_pais) && empty($resultados_tipo) && empty($resultados_obra)){
                    echo "<div class='results'>";
                    echo "<p>No hubo resultados</p>";
                    echo "</div>";
                }else{
                    # Lista de artistas
                    foreach($resultados_artist as $elem){
                        echo "<a href='artista.php?artista=" . $elem["nombre"] . "'>";
                            echo "<div class='results'>";
                                echo "<h2>Artista: " . htmlspecialchars($elem["nombre"]) . "</h2>";
                                echo "<p>" . htmlspecialchars($elem["descripcion"]) . "</p>";
                            echo "</div>";
                        echo "</a>";
                    }
                    # Lista de países
                    foreach($resultados_pais as $elem){
                        echo "<a href='pais.php?pais=" . $elem["nombre_pais"] . "'>";
                            echo "<div class='results'>";
                                echo "<h2>País: " . htmlspecialchars($elem["nombre_pais"]) . "</h2>";
                            echo "</div>";
                        echo "</a>";
                    }
                    # Lista de tipos de arte
                    foreach($resultados_tipo as $elem){
                        echo "<a href='tipo.php?tipo=" . $elem["tipo"] . "'>";
                            echo "<div class='results'>";
                                echo "<h2>Rama del arte: " . htmlspecialchars($elem["tipo"]) . "</h2>";
                            echo "</div>";
                        echo "</a>";
                    }
                    # Lista de obras
                    foreach($resultados_obra as $elem){
                        echo "<a href='obra.php?obra=" . $elem["nombre_obra"] . "'>";
                            echo "<div class='results'>";
                                echo "<h2>Obra: " . htmlspecialchars($elem["nombre_obra"]) . "</h2>";
                            echo "</div>";
                        echo "</a>";
                    }
                }
            ?>

        </div>
        <div id="sidebar">
            <p>Te invitamos a conocer un poco del arte de algunas artistas latinoamericanas</p>
            <ul>
                <li><a href="tipo.php?tipo=arquitectura">Arquitectura</a></li>
                <li><a href="tipo.php?tipo=cine">Cine</a></li>
                <li><a href="tipo.php?tipo=danza">Danza</a></li>
                <li><a href="tipo.php?tipo=escultura">Escultura</a></li>
                <li><a href="tipo.php?tipo=literatura">Literatura</a></li>
                <li><a href="tipo.php?tipo=musica">Música</a></li>
                <li><a href="tipo.php?tipo=pintura">Pintura</a></li>
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
