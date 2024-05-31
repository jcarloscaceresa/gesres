<?php

    $password = 'prueba';

    echo password_hash($password, algo: PASSWORD_DEFAULT);

    $passwordbd = password_hash($password, algo: PASSWORD_DEFAULT);

    if(password_verify($password, $passwordbd)){
        echo 'Pass correcta';
    }
    else{
        echo 'Pass incorrecta';
    }



?>