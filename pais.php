<?php
    require_once 'includes/session-config-inc.php';
    try{
        require_once 'includes/dbh-inc.php';
        $query = "SELECT * FROM pais";
        if(!empty($_GET["pais"])){
            $pais = $_GET["pais"];
            $query = $query . " WHERE nombre_pais = ?;";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$pais]);
            $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);

            $query_artistas_por_pais = "SELECT * FROM artista WHERE id_pais = ?;";
            $stmt_artist = $pdo->prepare($query_artistas_por_pais);
            $stmt_artist->execute([$respuesta["id_pais"]]);
            $resultados_artist = $stmt_artist->fetchAll(PDO::FETCH_ASSOC);
        }
        
        $query_paises = "SELECT * FROM pais;";
        $stmt_pais = $pdo->prepare($query_paises);
        $stmt_pais->execute();
        $resultados = $stmt_pais->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;
        $stmt_pais = null;
        $pdo = null;

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
            <div id="logo"><a href="./index.php"><img src="assets/images/logo.png" alt="Logo"></a></div>
            <h1>Arte Latina</h1>
            <div id="usuario">
                <a href="login.php">
                    <img src="#" alt="Foto de usuario">
                    <h3>Iniciar sesión</h3>
                </a>
            </div>
        </div>
        <nav>
            <ul id="barra-principal">
                <li><a href="./index.php">Inicio</a></li>
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
            <?php
                if(!empty($_GET["pais"])){
                    echo "<h2>Todos los artistas de " . $pais . "</h2>";
                    foreach($resultados_artist as $elem){
                        echo "<a href='artista.php?artista=" . $elem["nombre"] . "'>";
                            echo "<div class='results'>";
                                echo "<h2>Artista: " . htmlspecialchars($elem["nombre"]) . "</h2>";
                                echo "<p>" . htmlspecialchars($elem["descripcion"]) . "</p>";
                            echo "</div>";
                        echo "</a>";
                    }
                }else{
                    foreach($resultados as $elem){
                        echo "<a href='pais.php?pais=" . $elem["nombre_pais"] . "'>";
                            echo "<div class='results'>";
                                echo "<h2>País: " . htmlspecialchars($elem["nombre_pais"]) . "</h2>";
                            echo "</div>";
                        echo "</a>";
                    }
                }
            ?>
        </div>
        <div id="sidebar">
            <p>Lista de países:</p>
            <ul>
                <?php
                    foreach($resultados as $elem){
                        echo "<li><a href='pais.php?pais=".$elem["nombre_pais"]."'>".$elem["nombre_pais"]."</a></li>";
                    }
                ?>
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
