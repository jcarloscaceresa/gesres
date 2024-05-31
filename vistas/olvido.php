<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="../assets/js/scripts.js"></script>
    
</head>
<body>
    
    <a href="inicio.php">
        <img alt= "LogoTipo" class="logo" src="../assets/img/GesResLogo2.png">
    </a>
    <section id="container">
        <div id="form-header">
            <h3>Recuperar contraseña</h3>
        </div>

        <form action="restablecerCorreo.php" method="post" onsubmit="return validarFormulario()">
        <div class="olvido" >
            <a id="olvidocontrasena">Por favor, introduce tu dirección de correo electrónico. Te enviaremos un email para restablecer tu contraseña</a>
            </div>
            <div class="input-container">
                <input type="email" id="nombre" name="nombre" placeholder="Email" required>
            </div>
            <div>
                <input href="restablecerContraseña.php" class="button" type="submit" value="Enviar">
            </div>
        </form>
    </section>
    <?php include "inc/footer.html"; ?>
</body>
</html>
