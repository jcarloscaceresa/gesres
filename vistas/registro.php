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
            <h3>Registro</h3>
        </div>

        <form method="POST" class="formulario">

        <?php
            include_once("conexion.php");
            include_once("../controladores/controladorRegistro.php");
        ?>
            <div class="input-container">
                <input type="text" id="nombre" name="nombre" placeholder="Nombre de la empresa" required>
            </div>
            <div class="input-group">
                <div class="input-container1">
                    <input type="text" name="nif" placeholder="NIF/CIF" required>
                </div>
                <div class="input-container1">
                    <select class="select-registro" name="sector" id="sector" required>
                        <option value="" disabled selected>Sector</option>
                        <option value="tecnologia">Tecnología</option>
                        <option value="salud">Salud</option>
                        <option value="educacion">Educación</option>
                        <option value="industria">Industria</option>
                        <option value="hosteleria">Hostelería</option>
                    </select>
                </div>
            </div>

            <div class="input-container">
                <input type="text" id="enlace" name="enlace" placeholder="Enlace a tu web" required>
            </div>

            <div class="input-container">
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            
            <div class="input-container" id="password-container">
                <input type="password" id="password" name="password" placeholder="Contraseña" required>
                <img src="../assets/img/ojoabierto.png" id="password-toggle" onclick="togglePasswordVisibility()">
            </div>
            <div class="input-container" id="password-container">
                <input type="password" id="password" name="repetirPassword" placeholder="Repetir Contraseña" required>
                <img src="../assets/img/ojoabierto.png" id="password-toggle" onclick="togglePasswordVisibility1()">
            </div>
            
            <div>
                <input type="checkbox" id="terminos" name="terminos" required>
                <label for="terminos">Acepto los términos y condiciones de uso</label>
            </div>
          
            <div>
                <input class="button" type="submit" value="Registrar" name="registro">
            </div>
            <script src="../assets/js/code.js"></script>
            
        </form>
    </section>
    <?php include "inc/footer.html"; ?>
</body>
</html>
