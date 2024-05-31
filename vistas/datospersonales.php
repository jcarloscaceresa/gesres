<?php
include_once "../controladores/autenticarLogin.php";

$autenticar = new AutenticarLogin();
$autenticar->autenticacion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Personales</title>
    <link rel="stylesheet" href="../assets/css/stylesInicio.css">
    
    

    
</head>
<body>
    <div>
        <?php
        echo "Bienvenido, " . $_SESSION["nombre"];
        ?>
    </div>

    <div id="logo">
        <img alt="Logo1" class="Logo1" src="../assets/img/GesResLogo1.png">
    </div>
        <div id="header">
        <header> 
               
            <ul class="menu">
                <li><a href="inicio.php">Reseñas</a></li>
                <li><a href="analisis.php">Análisis</a></li>
                <li><a href="formularios.php">Formularios</a></li>
                <li><a href="datospersonales.php">Datos Personales</a></li>
                <li><a href="../controladores/controladorLogout.php">Cerrar Sesión</a></li>
            </ul>
        </header>

        <?php
            require_once "conexion.php";

            // Obtener el idEmpr de la sesión
            if (isset($_SESSION["idEmpr"])) {
                $idEmpr = $_SESSION["idEmpr"];

                // Preparar la consulta SQL para obtener los datos del usuario
                $stmt = $conexion->prepare("SELECT nif, web, sector, email, nombre, metodo FROM empresa WHERE idEmpr = ?");
                if ($stmt === false) {
                    die("Error en la preparación de la consulta: " . $conexion->error);
                }
                $stmt->bind_param("i", $idEmpr);
                $stmt->execute();
                $result = $stmt->get_result();
                
                // Verificar si se obtuvieron resultados
                if ($result->num_rows === 0) {
                    die("Usuario no encontrado");
                }
                
                // Obtener los datos del usuario
                $datos = $result->fetch_assoc();
                
                // Cerrar la consulta
                $stmt->close();
            } else {
                die("Error: Sesión no iniciada");
            }
        ?>

        </div>
        <div class="main-container">
       
        <section id="container">
        <div id="form-header">
            <h3>Datos Personales</h3>
        </div>
        <div id="contenedorDatos">
            <div id="izquierda">
                <img alt="Logo1" class="Logo1 centrar-logo" src="../assets/img/GesResLogo1.png">
            </div>
            <div id="derecha">
                <div class="input-group full-width">
                    <label for="namelabel">Nombre</label>
                    <input type="text" id="namelabel" value="<?php echo htmlspecialchars($datos['nombre']); ?>" readonly>
                </div>

        <!-- Contenedor para los otros tres grupos, más pequeños -->
                <div class="small-inputs">
            <!-- Grupo de NIF/CIF -->
                    <div class="input-group">
                        <label for="nif">NIF/CIF</label>
                        <input type="text" id="nif" value="<?php echo htmlspecialchars($datos['nif']); ?>" readonly>
                    </div>

            <!-- Grupo de Sector -->
                    <div class="input-group">
                        <label for="sector">Sector</label>
                        <input type="text" id="sector" value="<?php echo htmlspecialchars($datos['sector']); ?>" readonly>
                    </div>

            <!-- Grupo de Usuario -->
                    <div class="input-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" id="usuario" value="<?php echo htmlspecialchars($datos['nombre']); ?>" readonly>
                    </div>
                </div>
             </div>
            
        </div>  
        <div id="abajo">
            <div>
                <label for="correo">Correo electrónico</label> <br>
                <input type="email" id="email" value="<?php echo htmlspecialchars($datos['email']); ?>" readonly>
                <button>Modificar contraseña<a href=""></a></button>
            </div>
            <div class="input-group full-width">
                <label for="correo">Web</label> <br>
                <input type="text" id="namelabel" value="<?php echo htmlspecialchars($datos['web']); ?>" readonly>
            </div>
            <div class="input-group full-width">
                <label for="correo">Reseñas Google</label> <br>
                <input type="text" id="namelabel" readonly>
            </div>
            <div class="input-group full-width">
                <label for="correo">Reseñas Truspilot
                </label> <br>
                <input type="text" id="namelabel" readonly>
            </div>
            </div>


       
            
        </section>
        
        
        </div>   

        <?php include "inc/footer.html"; ?>

        
        
</body>
</html>