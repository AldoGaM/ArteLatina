<?php
    require_once 'includes/session-config-inc.php';
    
    try{
        require_once 'includes/dbh-inc.php';
        $query = "SELECT * FROM tipo_arte";
        if (!empty($_GET["tipo"])){
            $tipo = $_GET["tipo"];
            $query = $query . " WHERE tipo = ?;";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$tipo]);
            $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $query_artistas_por_tipo = "SELECT * FROM artista WHERE id_tipo_arte = ?;";
            $stmt_tipo = $pdo->prepare($query_artistas_por_tipo);
            $stmt_tipo->execute([$respuesta["id_tipo_arte"]]);
            $resultados_artist = $stmt_tipo->fetchAll(PDO::FETCH_ASSOC);

        }else{
            $query = $query . ";";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        $pdo = null;
        $stmt = null;
        $stmt_tipo = null;

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
                <?php
                    if (isset($_SESSION["id_usr"])){
                        echo "<h3>" . $_SESSION["fname_usr"] . "</h3>";
                        echo "<h4><a href='includes/logout.php'>" . "Cerrar sesión" . "</a></h4>";
                    }else{
                ?>
                <a href="login.php">
                    <h3>Iniciar sesión</h3>
                </a>
                <?php
                    }
                ?>
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
                if(!empty($_GET["tipo"])){
                    echo "<h2>Todos los artistas de " . $tipo . "</h2>";
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
                        echo "<a href='tipo.php?tipo=" . $elem["tipo"] . "'>";
                            echo "<div class='results'>";
                                echo "<h2>Rama de arte: " . htmlspecialchars($elem["tipo"]) . "</h2>";
                            echo "</div>";
                        echo "</a>";
                    }
                }
            ?>
        </div>
        <div id="sidebar">
            <p>Las ramas del arte:</p>
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
