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
                <li><a href="#">Artistas</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div id="principal">
            <h2>Registro</h2>
            <form action="./includes/registrohandler-inc.php" method="post" id="registro">
                <label for="usrname">Nombre de usuario (obligatorio): </label>
                <input type="text"name="usrname"><br>
                <label for="mail">E-mail (obligatorio): </label>
                <input type="email" name="mail"><br>
                <label for="pwd">Contraseña (obligatorio): </label>
                <input type="password" name="pwd"><br>
                <label for="rptpwd">Repetir contraseña (obligatorio): </label>
                <input type="password" name="rptpwd"><br>
                <label for="fname">Nombre (obligatorio): </label>
                <input type="text" name="fname"><br>
                <label for="lname">Apellido(s): </label>
                <input type="text" name="lname"><br>
                <label for="fecha_nac">Fecha de nacimiento: </label>
                <input type="date" name="fecha_nac"><br>
                <p>Para recuperar contraseña, usa la siguiente frase:</p>
                <label for="passphrase">Frase: </label>
                <input type="text" name="passphrase"><br>
                <label for="pass-ans">Respuesta: </label>
                <input type="password" name="pass_ans"><br>
                <input type="submit" value="Registrarse">
            </form>
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
