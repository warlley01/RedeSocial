<?php
session_start();
include("conexaoUsers.php");

$id = $_SESSION['idSession'];

$select = "SELECT fotoPerfil FROM usuarios WHERE id = '$id'";
$result = mysqli_query($userConnect, $select);
$valor = mysqli_fetch_assoc($result);

//echo $valor['fotoPerfil'];

$imgUrl = './imagesUpload/' . $valor['fotoPerfil']; 

$select = "SELECT nome, email FROM usuarios WHERE id = '$id'";
$result = mysqli_query($userConnect, $select);
$valor = mysqli_fetch_assoc($result);

$nome = $valor['nome'];
$email = $valor['email'];