<?php 
    session_start();

    unset(
        $_SESSION['emailSession'],
        $_SESSION['idSession'],
        $_SESSION['nomeSession']
    );

    header("Location: index.php");

?>