<?php
include ('ligacao.php');
$query="select nome_foto,formato_foto,tamanho_foto,dados_foto from 
banner where cod_banner=".$_GET['cod_banner']; 
$result=mysqli_query($ligax,$query);
$row=mysqli_fetch_array($result);
$formato_foto=$row["formato_foto"];
$nome_foto=$row["nome_foto"];
$dados_foto=base64_decode($row["dados_foto"]);
$tamanho_foto=$row["tamanho_foto"];
header("Content-type:$formato_foto");
header("Content-lenght:$tamanho_foto");
header("Content-Disposition: inline; filename=$nome_foto");
header ("Content-Description: PHP Generated Data");
echo $dados_foto;
?>