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
            <h3>Formulario de Contacto</h3>
        </div>
        <p>¡Hola! Queremos conocerte mejor. Por favor, comparte algunos detalles para que podamos ofrecerte la mejor experiencia posible.</p>

        <form action="../controladores/controladorContacto.php" method="POST" onsubmit="return validarFormulario()">
            <?php
                include_once("conexion.php");
                include_once("../controladores/controladorContacto.php");
            ?>
            <div class="input-container">
                <input type="text" id="nombre" name="nombre" placeholder="Nombre completo">
                <span id="errorNombre" class="error"></span>
            </div>
            <div class="input-container">
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="input-group">
                <div class="input-container1">
                    <input type="text" name="telefono" placeholder="Teléfono">
                </div>
                <div class="input-container1">
                    <input type="text" name="nPedido" placeholder="Nº pedido/identificador">
                </div>
            </div>
            <div id="box">
                <textarea name="comentario" placeholder="Comentario o datos adicionales" rows="4"></textarea>
            </div>
            <br>
            <div>
                <input class="button" type="submit" value="Enviar" name="contacto">
            </div>
        </form>
    </section>
    <?php include "inc/footer.html"; ?>
</body>
</html>
