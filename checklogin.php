<?php 
session_start();
include("conexaoUsers.php");

$email = mysqli_real_escape_string($userConnect, $_POST['email']);
$pass = mysqli_real_escape_string($userConnect, $_POST['pass']);

$dados = "SELECT * FROM usuarios WHERE email = '$email' && senha = '$pass' ";
$result = mysqli_query($userConnect, $dados);
$busca = mysqli_fetch_assoc($result);

if(isset($busca)) {
    header("Location: userPage.php");
    $_SESSION['emailSession'] = $busca['email'];
    $_SESSION['idSession'] = $busca['id'];
    $_SESSION['nomeSession'] = $busca['nome'];
} else {
    header("Location: login.php");
}

mysqli_close($userConnect);

?>