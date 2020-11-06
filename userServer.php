<?php
session_start();
include("conexaoUsers.php");

if(isset($_SESSION['idSession'])){

$id = $_SESSION['idSession'];
$email = $_SESSION['emailSession'];

$select = "SELECT fotoPerfil FROM usuarios WHERE id = '$id'";
$result = mysqli_query($userConnect, $select);
$valor = mysqli_fetch_assoc($result);

//echo $valor['fotoPerfil'];


if(empty($valor)){
    $imgUrl = './imagesUpload/' . $valor = 'user_default.png';
}else {
    $imgUrl = './imagesUpload/' . $valor['fotoPerfil']; 
}

$select = "SELECT nome, email FROM usuarios WHERE id = '$id'";
$result = mysqli_query($userConnect, $select);
$valor = mysqli_fetch_assoc($result);

$nome = $valor['nome'];
$email = $valor['email'];

} else {
    echo "sessão não existe";
}

//session_unset();