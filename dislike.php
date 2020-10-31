<?php

include("conexao.php");

//selecionar user
$selec = "SELECT * FROM bdtabela WHERE id = 1";
$result = mysqli_query($conectar, $selec);

if($result === FALSE){
    die(mysqli_error($conectar));
}

$busca = mysqli_fetch_assoc($result);

$pontos = $busca['pontos'];
$id = $busca['id'];

$pontnew = $pontos - 1;

//se pontos for iguais adicionar 1

$select = "SELECT * FROM bdtabela WHERE pontos = '$pontnew' ";
$query = mysqli_query($conectar, $select);
$busc = mysqli_fetch_all($query);

foreach($query as $busc) {
    if(mysqli_num_rows($busc) == 0){
        //echo "ja existe"; 
        $pontnew = $pontos -2;
    }
}


// fim do teste

$updat = "UPDATE bdtabela SET pontos = '$pontnew' WHERE id = '$id' ";
$result = mysqli_query($conectar, $updat);

if($result === FALSE) {
    die(mysqli_error($conectar));
} else {
    header("Location: index.php");
} 



mysqli_close($conectar);