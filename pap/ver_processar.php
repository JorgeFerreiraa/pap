 


<?php
include('ligacao.php');
 
if(isset($_POST["processar"])){
$observacao=$_POST['observacao'];
$data=date('Y-m-d G:i:s');
$cod=$_GET['num'];
$process = " Update encomenda set data_processamento='".$data."', observacao='".$observacao."', estado=1 where cod_encomenda=$cod;";
		$r = mysqli_query($ligax, $process);	
} 
$cod=$_GET['num'];
$verificar = " Select * from encomenda, utilizador where utilizador.cod_cliente like encomenda.cod_cliente and encomenda.cod_encomenda = $cod;"; $result3 = mysqli_query($ligax, $verificar);
$registo = mysqli_fetch_assoc($result3);
?>
<form name="" method="post">
<table border=0 width="80%" align="center">
<tr><td align="center"><img style="border:block;
		border-radius:50%;
		height:100px;
		width:100px;
		margin:10px auto;
		object-fit:cover;
		object-position:50% 50%" src="img/loog.jpg"></td>
<td></td></td><td><table>

	<tr><td>N&uacute;mero de Encomenda: <?php echo $registo["cod_encomenda"] ?> </td></tr>
	<tr><td>Data da Encomenda: <?php echo $registo["data_encomenda"]?> </td></tr>
	<tr><td>Data de Processamento: <?php echo $registo["data_processamento"]?> </td></tr>
	<tr><td>C&oacute;digo utilizador: <?php echo $registo["cod_cliente"] ?> </td></tr>
	<tr><td>Nome utilizador: <?php echo $registo["nome"] ?> </td></tr>
	<tr><td>Estado: <?php echo $registo["estado"]?> </td></tr>
	</table>
</td></tr>
<tr><td>Ex.mo(s) Sr.(s) <?php  echo $registo["nome"]; ?></td></tr>

<!--<tr><td>Número de Contribuinte: <?php // echo $registo["nif_utilizador"]; ?></td></tr> -->
<!--<tr><td>Telefone: <?php // echo $registo["telefone_utilizador"]; ?></td></tr> -->

<tr>
<td>Local: <?php  echo $registo["localidade"]; ?></td>
<!--<td>Localidade: <?php //echo $registo["localidade_utilizador"]; ?></td>-->
<!--<td colspan="2" align="center">Código Postal:<?php  //echo $registo["cod_postal_utilizador"]; ?></td>-->
</tr>
</table>
<hr>
<p></p>
<table border=1 width="80%" align="center">
<tr><td align="center">C&oacute;digo Produto:</td><td align="center">Nome Produto</td><td align="center">Tamanho</td><td align="center">Descri&ccedil;&atilde;o</td>
<td align="center">Quantidade</td><td align="center">Pre&ccedil;o Unit&aacute;rio</td><td align="center">Iva</td><td align="center">Pre&ccedil;o Total</td></tr>
<?php
$verificar = " Select *, produto_encomenda.prod_quant*(preco_venda+(preco_venda*artigo.iva_produto/100)) as total from encomenda,produto_encomenda,artigo where encomenda.cod_encomenda like '$cod' and encomenda.cod_encomenda like produto_encomenda.cod_encomenda and produto_encomenda.cod_produto like artigo.cod_produto;";

$result2 = mysqli_query($ligax, $verificar);

while ($registo=mysqli_fetch_array($result2)){
		$cod_prod=$registo['cod_produto'];
		$nome_prod=$registo['nome_produto'];
		$desc=$registo['descricao_produto'];
		$preco=$registo['preco_produto'];
		$tamanho=$registo['tamanho'];
		$iva=$registo['iva_produto'];
		$quant_prod=$registo['prod_quant'];
		
		echo"<tr><td align=center >$cod_prod</td><td align=center >$nome_prod</td><td align=center >$tamanho</td><td align=center>$desc</td>";
		
		echo"<td align=center> $quant_prod";
		echo"</td><td align=center>$preco &euro;</td>";
		echo"</td><td align=center>$iva %</td>";
		echo "<td align=center>".round($registo['total'],2)." &euro;</td></tr>";
	}
	
?>
</table>
<?php
 $verificar = " Select total,(encomenda.total*0.23) as valor_iva,(encomenda.total-(encomenda.total*0.23))as valor_s_iva  from encomenda where cod_encomenda like '$cod';";
 $result = mysqli_query($ligax, $verificar);
 $registo = mysqli_fetch_assoc($result);

?>
<?php
	$verificar = " Select * from encomenda where encomenda.cod_encomenda='$cod';";
 $result3 = mysqli_query($ligax, $verificar);
 $registo = mysqli_fetch_assoc($result3);
 ?>
 <table border=0 width='80%' align='center'>
<tr><td>Observa&ccedil;&otilde;es:</td><td align="right"><textarea  name="observacao" COLS=90 ROWS=4 > <?php echo $registo['observacao']?></textarea> </td></tr>
</table>
<p align="center"> Se a quantidade de produto estiver representada com cor vermelha significa que a quantidade existente em stock n&atilde;o chega para satisfazer a encomenda.</p>
<input type="hidden" name="cod" value="<?php echo $cod?>">

<?php if($registo['estado']==0){ ?>
<p align='center'><input type='submit' name='processar' value='Processar'></p>
<?php } ?>

</form>
	<?php
	
	if($ligax) mysqli_close($ligax);
	
?>