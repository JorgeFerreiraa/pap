<?php
include ('ligacao.php');
$query="select nome_foto,tipo_foto,tamanho_foto,dados_foto from 
marca where cod_marca=".$_GET['cod_marca']; 
$result=mysqli_query($ligax,$query);
$row=mysqli_fetch_array($result);
$tipo_foto=$row["tipo_foto"];
$nome_foto=$row["nome_foto"];
$dados_foto=base64_decode($row["dados_foto"]);
$tamanho_foto=$row["tamanho_foto"];
header("Content-type:$tipo_foto");
header("Content-lenght:$tamanho_foto");
header("Content-Disposition: inline; filename=$nome_foto");
header ("Content-Description: PHP Generated Data");
echo $dados_foto;
?>