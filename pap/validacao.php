<?php
include("ligacao.php");
?>

<?php
if(isset($_GET['codigo'])){
	$codigo=$_GET['codigo'];
	$update="update utilizador set perfil=1 where cod_cliente='".$codigo."'";
	$result=mysqli_query($ligax,$update);
?>
<script> 
	alert("Confirmação realizada com sucesso. Efetue login!");
	location.href="index.php?pagina=login"; 
</script>	
<?php 
}
?>