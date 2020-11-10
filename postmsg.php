<?php
session_start();
include("conexao.php");
include("conexaoUsers.php");


if (isset($_POST['upload'])) {
	$target = "./imagePost/".basename($_FILES['imgInput']['name']);

	$image = $_FILES['imgInput']['name'];	
	$text = $_POST['mensagem'];
	
	$id = $_SESSION['idSession'];

	$select = "SELECT nome FROM usuarios WHERE id = '$id' "; 
	$result = mysqli_query($userConnect, $select);
	$valor = mysqli_fetch_assoc($result);
	
	$user = $valor['nome'];

	//Inserir no banco de dados
	$dados = "INSERT INTO bdtabela (msg, img, nome) VALUES ('$text', '$image', '$user')";
	$result = mysqli_query($conectar, $dados);
	
	// enviar imagem para pasta imagesUpload
	if (move_uploaded_file($_FILES['imgInput']['tmp_name'], $target)) {		
	} else {
		echo "Erro ao enviar imagem";
	}
	
}
// retornar uma resposta após tentar post
if(mysqli_insert_id($conectar)) {
	header("Location: index.php");
} else {
	header("Location: index.php");
}

mysqli_close($conectar);
mysqli_close($userConnect);