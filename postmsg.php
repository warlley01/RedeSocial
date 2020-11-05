<?php
$msg = "";
include("conexao.php");

//img upload
if (isset($_POST['upload'])) {
	$target = "./imagesUpload/".basename($_FILES['imgInput']['name']);

	$image = $_FILES['imgInput']['name'];
	
	$user = $_POST['userInput'];
	
	$text = $_POST['mensagem'];
	
	
	//Inserir no banco de dados
	$dados = "INSERT INTO bdtabela (msg, img, nome) VALUES ('$text', '$image', '$user')";
	$result = mysqli_query($conectar, $dados);
	
	// enviar imagem para pasta imagesUpload
	if (move_uploaded_file($_FILES['imgInput']['tmp_name'], $target)) {
		$msg = "Sucessfully";
	} else {
		$msg = "There was a problem uploading image";
	}
	
}
// retornar uma resposta após tentar post
if(mysqli_insert_id($conectar)) {
	header("Location: index.php");
} else {
	header("Location: index.php");
}

mysqli_close($conectar);