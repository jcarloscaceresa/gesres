<?php
include_once("../vistas/conexion.php");
    if(!empty($_POST["contacto"])){
        if(empty($_POST["nombre"]) or empty($_POST["email"]) or empty($_POST["telefono"]) or empty($_POST["nPedido"]) or empty($_POST["comentario"])) {
            echo 'Uno de los campos está vacío';
        }
        else{
            $nombre=$_POST["nombre"];
            $email=$_POST["email"];
            $telefono=$_POST["telefono"];
            $nPedido=$_POST["nPedido"];
            $comentario=$_POST["comentario"];
            $stmt = $conexion->prepare("INSERT INTO contacto (nombre, email, telefono, comentario, nPedido) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $nombre, $email, $telefono, $comentario, $nPedido);
            
            if($stmt->execute()) {
                header("location: ../vistas/thanks.php");
             exit();
            } else {
                echo 'Error al procesar el formulario';
        }
        }
    }

?>