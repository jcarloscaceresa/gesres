<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GesRes</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="../assets/js/scripts.js"></script>
</head>
<body>
    
    <img alt= "LogoTipo" class="logo" src="../assets/img/GesResLogo2.png">
    <section id="container">
        <div id="form-header">
            <h3>Iniciar sesión</h3>
        </div>
        <?php
        include_once "conexion.php";
        include_once "../controladores/controladorLogin.php";
        ?>

        <form method="post" action="">
            <div class="input-container">
                <input type="text" id="nombre" name="usuario" placeholder="Email">
                <span id="errorNombre" class="error"></span>
            </div>
            
            <div class="input-container" id="password-container">
                <input type="password" id="password" name="password" placeholder="Contraseña">
                <img src="../assets/img/ojoabierto.png" id="password-toggle" onclick="togglePasswordVisibility()">
            </div>
            <div class="olvido" >
            <a href="olvido.php" id="olvidocontrasena">¿Has olvidado tu contaseña?</a>
            </div>

            <div class="olvido" >
            <a href="registro.php" id="olvidocontrasena">Regístrate</a>
            </div>
            <div>
                <input href="thanks.php" name="btningresar" class="button" type="submit" value="Acceder">
            </div>
            <script src="../assets/js/code.js"></script>
        </form>
    </section>
    <?php include_once "inc/footer.html"; ?>
</body>
</html>
