<?php 
    session_start();

    unset(
        $_SESSION['emailSession'],
        $_SESSION['idSession']
    );

    header("Location: index.php");

?>