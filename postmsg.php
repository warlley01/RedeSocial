<?php

include("conexao.php");

$msg = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

//Inserir no banco de dados
$dados = "INSERT INTO bdtabela (msg) VALUES ('$msg')";
$result = mysqli_query($conectar, $dados);


// retornar uma resposta após tentar post
if(mysqli_insert_id($conectar)) {
	header("Location: index.php");
} else {
	header("Location: index.php");
}

mysqli_close($conectar);