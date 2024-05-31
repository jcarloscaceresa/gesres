<?php
include_once "../controladores/autenticarLogin.php";

$autenticar = new AutenticarLogin();
$autenticar->autenticacion();

// Conectar a la base de datos
require_once "conexion.php";

// Obtener ID de la empresa desde la sesión
$idEmpr = $_SESSION["idEmpr"];

// Preparar la consulta SQL para obtener las reseñas del usuario autenticado
$stmt = $conexion->prepare("SELECT idRes, fecha, estado, cliente, razon, valoracion, comentario FROM resena WHERE empresaIdEmpr = ?");
if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conexion->error);
}
$stmt->bind_param("i", $idEmpr);
$stmt->execute();
$result = $stmt->get_result();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../assets/css/stylesInicio.css">
    <link rel="stylesheet" href="../assets/css/stylesInicio2.css">
    <script src="../assets/js/scripts.js"></script>
    <!-- iconos de bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .unread {
            background-color: white;
        }
    </style>
    <script>
    // Función principal que llama a todas las funciones de filtro
    function applyFilters() {
        filterByStars();
        filterByDate();
        filterByReason();
        filterByState();
    }

    // Función de filtro por estrellas
    function filterByStars() {
        // Obtener todas las reseñas
        var reseñas = document.querySelectorAll('#formularios #formulario-container');

        // Obtener los checkboxes de estrellas
        var checkboxes = document.querySelectorAll('input[name="Estrellas"]:checked');
        var starsToDisplay = [];

        // Obtener los valores de los checkboxes seleccionados
        checkboxes.forEach(function(checkbox) {
            starsToDisplay.push(parseInt(checkbox.value));
        });

        // Iterar sobre cada reseña
        reseñas.forEach(function(reseña) {
            // Obtener el número de estrellas de esta reseña
            var estrellas = reseña.querySelectorAll('.bi-star-fill').length;

            // Mostrar u ocultar la reseña dependiendo del número de estrellas seleccionadas
            if (starsToDisplay.length === 0 || starsToDisplay.includes(estrellas)) {
                reseña.style.display = 'block'; // Mostrar la reseña
            } else {
                reseña.style.display = 'none'; // Ocultar la reseña
            }
        });
    }

    // Función de filtro por fecha
    function filterByDate() {
        // Obtener todas las reseñas
        var reseñas = document.querySelectorAll('#formularios #formulario-container');

        // Obtener la fecha seleccionada
        var fechaSeleccionada = new Date(document.querySelector('#date input[type="date"]').value);

        // Iterar sobre cada reseña
        reseñas.forEach(function(reseña) {
            // Obtener la fecha de esta reseña
            var fechaReseña = new Date(reseña.querySelector('.emailCliente h2').textContent);

            // Comparar si la fecha de la reseña coincide con la fecha seleccionada
            if (fechaSeleccionada.toDateString() === fechaReseña.toDateString()) {
                reseña.style.display = 'block'; // Mostrar la reseña
            } else {
                reseña.style.display = 'none'; // Ocultar la reseña
            }
        });
    }

    // Función de filtro por razón
    function filterByReason() {
        // Obtener todas las razones seleccionadas
        var razonesSeleccionadas = [];
        var checkboxes = document.querySelectorAll('#reason input[type="checkbox"]:checked');
        checkboxes.forEach(function(checkbox) {
            razonesSeleccionadas.push(checkbox.value);
        });

        // Obtener todas las reseñas
        var reseñas = document.querySelectorAll('#formularios #formulario-container');

        // Si al menos una razón está seleccionada, filtrar reseñas
        if (razonesSeleccionadas.length > 0) {
            reseñas.forEach(function(reseña) {
                // Obtener la razón de esta reseña
                var razon = reseña.querySelector('.pedidoCliente h2').textContent;

                // Mostrar u ocultar la reseña según si coincide con alguna razón seleccionada
                if (razonesSeleccionadas.includes(razon)) {
                    reseña.style.display = 'block'; // Mostrar la reseña
                } else {
                    reseña.style.display = 'none'; // Ocultar la reseña
                }
            });
        } else {
            // Si ninguna razón está seleccionada, mostrar todas las reseñas
            reseñas.forEach(function(reseña) {
                reseña.style.display = 'block'; // Mostrar todas las reseñas
            });
        }
    }

// Función de filtro por estado
function filterByState() {
    // Obtener todos los checkboxes de estado
    var checkboxes = document.querySelectorAll('#estado input[type="checkbox"]');

    // Array para almacenar los estados seleccionados
    var selectedStates = [];

    // Iterar sobre cada checkbox para obtener los estados seleccionados
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            selectedStates.push(checkbox.value.toLowerCase()); // Agregar el estado a la lista de estados seleccionados
        }
    });

    // Obtener todas las reseñas
    var reseñas = document.querySelectorAll('#formularios #formulario-container');

    // Iterar sobre cada reseña
    reseñas.forEach(function(reseña) {
        // Obtener el estado de esta reseña
        var estado = reseña.querySelector('.tlfCliente h2').textContent.toLowerCase(); // Convertir a minúsculas

        // Mostrar u ocultar la reseña dependiendo del estado
        if (selectedStates.length === 0 || selectedStates.includes(estado)) {
            reseña.style.display = 'block'; // Mostrar la reseña
        } else {
            reseña.style.display = 'none'; // Ocultar la reseña
        }
    });
}

// Agregar evento change a todos los filtros
var checkboxes = document.querySelectorAll('input[type="checkbox"], input[type="date"]');
checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', applyFilters);
});

// Filtrar reseñas al cargar la página
applyFilters();
</script>


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
        <div id="date">
            <label>Fecha</label><br>
            <input type="date" value="" oninput="filterByDate()">
        </div>
        <div id="stars">
            <label>Estrellas</label><br>
            <input type="checkbox" id="0estrellas" name="Estrellas" value="0estrellas" onclick="filterByStars(0)">
            <label for="0estrellas">Todas</label><br>
            <input type="checkbox" id="1estrella" name="Estrellas" value="1estrella" onclick="if(this.checked) filterByStars(1); else filterByStars(0);">
            <label for="1estrella">1 Estrella</label><br>
            <input type="checkbox" id="2estrellas" name="Estrellas" value="2estrellas" onclick="if(this.checked) filterByStars(2); else filterByStars(0);">
            <label for="2estrellas">2 Estrellas</label><br>
            <input type="checkbox" id="3estrellas" name="Estrellas" value="3estrellas" onclick="if(this.checked) filterByStars(3); else filterByStars(0);">
            <label for="3estrellas">3 Estrellas</label><br>
            <input type="checkbox" id="4estrellas" name="Estrellas" value="4estrellas" onclick="if(this.checked) filterByStars(4); else filterByStars(0);">
            <label for="4estrellas">4 Estrellas</label><br>
            <input type="checkbox" id="5estrellas" name="Estrellas" value="5estrellas" onclick="if(this.checked) filterByStars(5); else filterByStars(0);">
            <label for="5estrellas">5 Estrellas</label><br>
        </div>
        <div id="reason">
            <label>Razón</label><br>
            <input type="checkbox" id="DefectoProducto" name="Razon" value="Defecto producto" onclick="filterByReason('Defecto producto')">
            <label for="DefectoProducto">Defecto producto</label><br>
            <input type="checkbox" id="RetrasoPedido" name="Razon" value="Retraso pedido" onclick="filterByReason('Retraso pedido')">
            <label for="RetrasoPedido">Retraso pedido</label><br>
            <input type="checkbox" id="AtencionRecibida" name="Razon" value="Atención Recibida" onclick="filterByReason('Atención Recibida')">
            <label for="AtencionRecibida">Atención Recibida</label><br>
            <input type="checkbox" id="ComentarioGeneral" name="Razon" value="Comentario General" onclick="filterByReason('Comentario General')">
                <label for="ComentarioGeneral">Comentario General</label><br>
                <input type="checkbox" id="Contento" name="Razon" value="Contento" onclick="filterByReason('Contento')">
                <label for="Contento">Contento</label><br>
            </div>

            <div id="estado">
                <label>Estado</label><br>
                <input type="checkbox" id="Completado" name="Estado" value="pendiente" onchange="filterByState()">
                <label for="Completado">Pendiente</label><br>
                <input type="checkbox" id="Analizando" name="Estado" value="leida" onchange="filterByState()">
                <label for="Analizando">Leída</label><br>
                <input type="checkbox" id="EnNegociacion" name="Estado" value="contestada" onchange="filterByState()">
                <label for="EnNegociacion">Contestada</label><br>
            </div>

        </div>
        <div class="right-container">
            <section id="formularios">
                <div id="form-header">
                    <h3>Reseñas</h3>
                </div>
                    <?php
                    // Verificar si se obtuvieron resultados
                    if ($result->num_rows > 0) {
                        // Fetch each row and generate HTML dynamically
                        while ($row = $result->fetch_assoc()) {
                            echo '<div id="formulario-container">';
                            echo '<div id="formulario">';
                            echo '<div class="nombreCliente">';
                            echo '<h2>' . htmlspecialchars($row['cliente']) . '</h2>';
                            echo '</div>';
                            echo '<div class="emailCliente">';
                            echo '<h2>' . htmlspecialchars($row['fecha']) . '</h2>';
                            echo '</div>';
                            echo '<div class="tlfCliente">';
                            echo '<h2>' . htmlspecialchars($row['estado']) . '</h2>';
                            echo '</div>';
                            echo '<div class="pedidoCliente">';
                            echo '<h2>' . htmlspecialchars($row['razon']) . '</h2>';
                            echo '</div>';
                            echo '<div id="calificacion">';
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $row['valoracion']) {
                                    echo '<i class="bi bi-star-fill star"></i>'; // Agrega la clase bi-star-fill
                                } else {
                                    echo '<i class="bi bi-star star"></i>';
                                }
                            }
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
                    
                    $stmt->close();
                    $conexion->close();
                    ?>
                
                
            </section>
        </div>
    </div>
    <?php include "inc/footer.html"; ?>
</body>
</html>
