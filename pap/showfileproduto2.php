<?php
include ('ligacao.php');
$query="select nome_foto2,formato_foto2,tamanho_foto2,dados_foto2 from 
artigo where cod_produto=".$_GET['cod_produto']; 
$result=mysqli_query($ligax,$query);
$row=mysqli_fetch_array($result);
$formato_foto=$row["formato_foto2"];
$nome_foto=$row["nome_foto2"];
$dados_foto=base64_decode($row["dados_foto2"]);
$tamanho_foto=$row["tamanho_foto2"];
header("Content-type:$formato_foto");
header("Content-lenght:$tamanho_foto");
header("Content-Disposition: inline; filename=$nome_foto");
header ("Content-Description: PHP Generated Data");
echo $dados_foto;
?>