<?php

    if(!empty($_POST["registro"])){
        if(empty($_POST["nombre"]) or empty($_POST["nif"]) or empty($_POST["sector"]) or empty($_POST["enlace"]) or empty($_POST["email"]) or empty($_POST["password"])) {
            echo 'Uno de los campos está vacío';
        }
        if($_POST["password"] == $_POST["repetirPassword"]){
            $nombre=$_POST["nombre"];
            $nif=$_POST["nif"];
            $sector=$_POST["sector"];
            $enlace=$_POST["enlace"];
            $email=$_POST["email"];
            $password=$_POST["password"];
            $passwordEncriptada = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conexion->prepare("INSERT INTO empresa(nif, web, sector, email, nombre, contrasena) VALUES(?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $nif, $enlace, $sector, $email, $nombre, $passwordEncriptada);
            if ($stmt->execute()) {
                header("location: ../vistas/login.php");
            } else {
                echo 'Error en el registro';
            }
            $stmt->close();
        } else {
            echo 'Las contraseñas no son iguales';
        }
    
    }

?>