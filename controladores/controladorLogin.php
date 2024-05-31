<?php
session_start();
if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["usuario"]) and !empty($_POST["password"])){
        $usuario=$_POST["usuario"];
        $password=$_POST["password"];
        $stmt = $conexion->prepare("SELECT * FROM empresa WHERE email=?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $datos = $result->fetch_object();
            $passwordEncriptada = $datos->contrasena;
            if(password_verify($password, $passwordEncriptada)){
                $_SESSION["idEmpr"] = $datos->idEmpr;
                $_SESSION["nombre"] = $datos->nombre;
                header("location: inicio.php");
            } else {
                echo 'Contraseña incorrecta';
            }
        } else {
            echo 'Usuario no encontrado';
        }
        $stmt->close();
    } else {
        echo "Campos vacíos";
    }
}
?>