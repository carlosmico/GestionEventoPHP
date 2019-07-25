<?php
    //Accion de Logout
    session_start();
    session_unset();
    session_destroy();

    //Redirigimos al usuario a la vista index.php
    header("Location: index.php");
?>