<?php
require_once "../controladores/autenticarLogin.php";

$autenticar = new AutenticarLogin();
$autenticar->autenticacion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios</title>
    <link rel="stylesheet" href="../assets/css/stylesInicio.css">
    <link rel="stylesheet" href="../assets/css/stylesInicio2.css">
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
</div>
<div class="main-container">

    <div class="left-container">
        <div class="left-container">
            
        </div>
    </div>

    <div class="right-container">
        <section id="formularios">
            <div id="form-header">
                <h3>Formularios</h3>
            </div>

            <?php
            // Include the database connection
            require_once "conexion.php";

            // Get the idEmpr of the current user
            $idEmpr = $_SESSION["idEmpr"];

            // Prepare the SQL statement to retrieve contact data for the current user
            $stmt = $conexion->prepare("SELECT nombre, email, telefono, comentario, nPedido FROM contacto WHERE nPedido = ?");
            if ($stmt === false) {
                die("Error en la preparación de la consulta de contacto: " . $conexion->error);
            }
            $stmt->bind_param("i", $idEmpr);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if there are any results
            if ($result->num_rows > 0) {
                // Fetch each row and generate HTML dynamically
                while ($row = $result->fetch_assoc()) {
                    echo '<div id="formulario-container">';
                    echo '<div id="formulario">';
                    echo '<div class="nombreCliente">';
                    echo '<h2>' . htmlspecialchars($row['nombre']) . '</h2>';
                    echo '</div>';
                    echo '<div class="emailCliente">';
                    echo '<h2>' . htmlspecialchars($row['email']) . '</h2>';
                    echo '</div>';
                    echo '<div class="tlfCliente">';
                    echo '<h2>' . htmlspecialchars($row['telefono']) . '</h2>';
                    echo '</div>';
                    echo '<div class="pedidoCliente">';
                    echo '<h2>' . htmlspecialchars($row['nPedido']) . '</h2>';
                    echo '</div>';
                    echo '<div class="informCliente">';
                    echo '<h2>' . htmlspecialchars($row['comentario']) . '</h2>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<br></br>';
                }
            } else {
                echo '<p>No hay formularios disponibles</p>';
            }

            // Close the statement and database connection
            $stmt->close();
            $conexion->close();
            ?>

        </section>
    </div>
</div>

<?php include "inc/footer.html"; ?>
</body>
</html>
