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
                <img src="#" alt="Foto de usuario">
                <h3>Iniciar sesión</h3>
            </div>
        </div>
        <nav>
            <ul id="barra-principal">
                <li><a href="./index.php">Inicio</a></li>
                <li><a href="#">Compra</a></li>
                <li><a href="#">Artistas</a></li>
                <li><a href="./contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div id="principal">
            <h1><?php
                if(isset($_GET["artista"])){
                    echo $_GET["artista"];
                }else{
                    echo "Título";
                }
            ?></h1>
            <div class="intro">
                <div class="bibliografia">
                    <img src="#" alt="País en cuestión">
                    <h2>País</h2>
                </div>
            </div>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde tempora nostrum nobis reprehenderit deserunt pariatur nihil dolorum debitis expedita, tenetur placeat! Praesentium enim hic earum libero veritatis totam molestias voluptate!</p>
        </div>
        <div id="sidebar">
            <p>Similares:</p>
            <ul>
                <li><a href="#">Década</a></li>
                <li><a href="#">País</a></li>
                <li><a href="#">Tipo de arte</a></li>
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
