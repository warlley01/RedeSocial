<?php

include("conexao.php");

$selecionar = "SELECT * FROM bdtabela";
$result = mysqli_query($conectar, $selecionar);

if($result === FALSE) {
    die(mysqli_error($conectar));
}


$buscar = mysqli_fetch_all($result);

foreach($result as $buscar) {
    $id[] = $buscar['id'];
    $pont[] = $buscar['pontos'];
    $busc[] = $buscar['msg'];
    $user[] = $buscar['nome'];
}

$msgpont = array_combine($pont, $busc);


krsort($msgpont);

foreach($msgpont as $chave => $valor) {
    //echo "Indice[" . $chave . "] " . $valor . " <br>";
    $ponts[] = $chave;
    $msg[] = $valor;  
}

$nomeid = array_combine($id, $user);

foreach($nomeid as $idd => $nomes){
    //echo "Id[" . $idd . "] " . $nomes . " <br>";
    $iduser[] = $idd;
    $users[] = $nomes;
}

mysqli_close($conectar);

/*
$pontos = 5;
$id = 0;

if(1 > 0) {
    $updat = "UPDATE bdtabela SET pontos='$pontos' WHERE id='1'";
    $result = mysqli_query($conectar, $updat); 
}

if($result === FALSE) {
    die(mysqli_error($conectar));
}


$selec = "SELECT pontos FROM bdtabela";
$result = mysqli_query($conectar, $selec);

$all = mysqli_fetch_all($result);

foreach($result as $all){
    $total[] = $all['pontos'];
}

$maior = max($total);

echo $maior;

*/



/*
$contador = 0;

while($teste = mysqli_fetch_array($result)) {
    $buscar = $teste['msg'];
    
    $arraybusca[$contador] = $buscar;
    
    $contador++;
    
}


$cont = $contador;

for($contador = 0; $contador < $cont; $contador++){
    $resultbusc[0] = $arraybusca[$contador];
}




*/




