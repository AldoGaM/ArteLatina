<?php
    require_once 'includes/session-config-inc.php';
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
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;700&display=swap" rel="stylesheet">
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
                <li><a href="obra.php">Obras</a></li>
                <li><a href="artista.php">Artistas</a></li>
                <li><a href="#">Contacto</a></li>
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
            <h2>Sobre nosotros</h2>
            <div class="intro">
                <div class="bibliografia">
                    <h3>Foto 1</h3>
                    <h3>Aldo García Moreno</h3>
                </div>
                <div class="bibliografia">
                    <h3>Foto 2</h3>
                    <h3>Daniela Rogríguez Flores</h3>
                </div>
            </div>
            <div id="contacto">
                <h2>Contacto</h2>
                <p>¿Tienes alguna pregunta o comentario? No dudes en ponerte en contacto con nosotros:</p>
                <ul>
                    <li><strong>Correo Electrónico:</strong> contacto@artelatina.com</li>
                    <li><strong>Teléfono:</strong> +1 (555) 123-4567</li>
                    <li><strong>Horario de Atención:</strong> Lunes a Viernes, 9:00 a.m. - 5:00 p.m.</li>
                    <li><strong>Dirección Postal:</strong> Calle Principal #123, Ciudad, País</li>
                </ul>
            </div>
        </div>
        <div id="sidebar">
            <p>Te invitamos a conocer un poco del arte de algunas artistas latinoamericanas</p>
            <ul>
            <li>
                <a href="tipo.php?tipo=arquitectura">Arquitectura</a></li>
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
                <li><a href="#"><img src="assets/images/facebook.png" alt="Facebook" class="icon"></a></li>
                <li><a href="#"><img src="assets/images/instagram.png" alt="Instagram" class="icon"></a></li>
                <li><a href="#"><img src="assets/images/tiktok.png" alt="Tik tok" class="icon"></a></li>
                <li><a href="#"><img src="assets/images/twitter.png" alt="Twitter/X" class="icon"></a></li>
            </ul>
        </div>
        <div id="nosotros">
            <ul>
                <li><a href="https://www.acatlan.unam.mx/">FES Acatlán</a></li>
                <li><a href="https://mac.acatlan.unam.mx/">MAC</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
