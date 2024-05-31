<?php
class AutenticarLogin {
    private function redirigirLogin() {
        header("location: login.php");
        exit;
    }

    public function autenticacion() {
        session_start();
        if(empty($_SESSION["idEmpr"])) {
        $this->redirigirLogin();
    }

    
}
}

?>