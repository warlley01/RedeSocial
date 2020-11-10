<?php
session_start();
include("conexaoUsers.php");
include("conexao.php");

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
    //echo "sessão não existe";
    $email = null;
}

/*
$nome = $_SESSION['nomeSession']; 
$selecionar = "SELECT img FROM bdtabela WHERE nome = '$nome' ";
$result = mysqli_query($conectar, $selecionar);
$total = mysqli_fetch_assoc($result);

$imageUrl = './imagePost/' . $total['img'];

*/


mysqli_close($userConnect);
mysqli_close($conectar);
