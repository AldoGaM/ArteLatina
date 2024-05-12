<?php
    require_once 'includes/session-config-inc.php';
    try{
        require_once 'includes/dbh-inc.php';
        $query = "SELECT * FROM artista";
        # Checar si se quiere uno en específico o la lista de todas
        if(!empty($_GET["artista"])){
            $artista = $_GET["artista"];
            $query = $query . " WHERE nombre = ?;";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$artista]);
            $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);

            $query_pais = "SELECT nombre_pais FROM pais WHERE id_pais = ?";
            $stmt_pais = $pdo->prepare($query_pais);
            $stmt_pais->execute([$respuesta["id_pais"]]);
            $pais = $stmt_pais->fetch(PDO::FETCH_ASSOC);

            $query_arte = "SELECT tipo FROM tipo_arte WHERE id_tipo_arte = ?;";
            $stmt_arte = $pdo->prepare($query_arte);
            $stmt_arte->execute([$respuesta["id_tipo_arte"]]);
            $tipo = $stmt_arte->fetch(PDO::FETCH_ASSOC);
        }else {
            $query = $query . ";";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        $pdo = null;
        $stmt = null;
        $stmt_pais = null;
        $stmt_arte = null;

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
                if(empty($_GET["artista"])){
                    echo "<h2>Lista de artistas:</h2>";
                    foreach($resultados as $elem){
                        echo "<a href='artista.php?artista=" . $elem["nombre"] . "'>";
                            echo "<div class='results'>";
                                echo "<h2>Artista: " . htmlspecialchars($elem["nombre"]) . "</h2>";
                                echo "<p>" . htmlspecialchars($elem["descripcion"]) . "</p>";
                            echo "</div>";
                        echo "</a>";
                    }
                }else{
                    echo "<div class='bibliografia'>";
                        $fecha = $respuesta["fecha_nac"];
                        echo "<img src='" . "#" . "' alt='" . $respuesta["nombre"] . "'>";
                        echo "<h2>" . $respuesta["nombre"] . "</h2>";
                        echo "<p>" . $respuesta["descripcion"] . "</p>";
                        echo "<p>Nacida en " . $pais["nombre_pais"] . "</p>";
                        if(!empty($fecha)){
                            echo "<p>El día: " . substr($fecha,8,2);
                            echo " de " . substr($fecha, 5, 2);
                            echo " de " . substr($fecha, 0,4) .  "</p>";
                        }
                        echo "<p>Se dedica a: " . $tipo["tipo"] . "</p>";
                    echo "</div>";
                }
            ?>
        </div>
        <div id="sidebar">
            <p>Similares:</p>
            <ul>
                <?php
                    if(empty($_GET["artista"])){
                        echo '<li><a href="pais.php">Países</a></li>';
                        echo '<li><a href="tipo.php">Ramas del arte</a></li>';
                    }else{
                        echo '<li><a href="pais.php?pais='.$pais["nombre_pais"].'">'.$pais["nombre_pais"].'</a></li>';
                        echo '<li><a href="tipo.php?tipo='.$tipo["tipo"].'">'.$tipo["tipo"].'</a></li>';
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
