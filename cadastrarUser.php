<?php

include("conexaoUsers.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); // Atenção!!! "usar post para teste, esse modo não é seguro"
$senha = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);

$senha = md5($senha);
$dados = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')"; 
$result = mysqli_query($userConnect, $dados);

if($result === FALSE){
    die(mysqli_error($userConnect));
} else {
    header("Location: login.php");
}

mysqli_close($userConnect);

?>