<?php
include("ligacao.php");
if(isset($_GET['cod_utilizador'])) {
if(isset($_GET['pag'])) { $pag=$_GET['pag']; } else $pag=1;
$cod_utilizador = $_GET['cod_client'];
$desativar = "Update utilizador set perfil = -1 WHERE cod_utilizador='".$cod_utilizador."'";
$result = mysqli_query($ligax, $desativar);
}
header("Location: index.php?pagina=listarutilizadores&pag=$pag");
?>