<?php
include ('ligacao.php');
$query="select nome_foto3,formato_foto3,tamanho_foto3,dados_foto3 from 
artigo where cod_produto=".$_GET['cod_produto']; 
$result=mysqli_query($ligax,$query);
$row=mysqli_fetch_array($result);
$formato_foto=$row["formato_foto3"];
$nome_foto=$row["nome_foto3"];
$dados_foto=base64_decode($row["dados_foto3"]);
$tamanho_foto=$row["tamanho_foto3"];
header("Content-type:$formato_foto");
header("Content-lenght:$tamanho_foto");
header("Content-Disposition: inline; filename=$nome_foto");
header ("Content-Description: PHP Generated Data");
echo $dados_foto;
?>