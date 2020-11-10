<?php
session_start();
include("conexaoUsers.php");

$id = $_SESSION['idSession'];

if(isset($_POST['submitBtn'])) {
    $enviar = "./imagesUpload/".basename($_FILES['inputImg']['name']); 
    move_uploaded_file($_FILES['inputImg']['tmp_name'], $enviar);
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['pass'];
    $img = $_FILES['inputImg']['name'];

    if(!empty($img)){
        $dados = "UPDATE usuarios SET fotoPerfil = '$img' WHERE id = '$id' ";
        $result = mysqli_query($userConnect, $dados);
        echo "<h2>Imagem Atualizada</h2>" . '<br>';
    }else {
        echo "<h2>Nenhuma imagem enviada</h2>" . '<br>';
    }

    if(!empty($nome || $email || $senha)) {
        $updat = "UPDATE ususarios SET nome = '$nome', email = '$email', senha = '$senha' ";
        $resultado = mysqli_query($userConnect, $updat);
    } else {
        echo "<h2>Nenhum campo alterado</h2>";
    }
}


mysqli_close($userConnect);