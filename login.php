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
            <h2>Iniciar sesión</h2>
            <form action="./includes/login-inc.php" method="post">
                <label for="usrname">Nombre de usuario: </label>
                <input type="text" name="usrname"><br>
                <label for="pwd">Contraseña: </label>
                <input type="password" name="pwd"><br>
                <input type="submit" value="Iniciar sesión">
            </form>
            <p>También puedes <a href="registro.php">registrarte</a></p>
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
