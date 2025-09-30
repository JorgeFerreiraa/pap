<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.img-perfil{
		border:block;
		border-radius:50%;
		height:184px;
		width:184px;
		margin:10px auto;
	}
</style>
</head>
</html>

<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Shopping Cart</h2>
					<div class="page_link">
						<a href="index.html">Home</a>
						<a href="cart.html">Cart</a>
					</div>
				</div>
			</div>
		</div>
	</section>
		<section class="cart_area">
		<div class="container">

<?php

//a variável $cod_cliente fica com o valor da variável de sessão se o cliente estiver autenticado senão fica com ""


if (isset($_SESSION["cod_cliente"])) $cod_cliente= $_SESSION["cod_cliente"];
else $cod_cliente="";
// Clicou em adicionar na lista de produtos; Vai actualizar o carrinho de compras


	

	// Alterar quantidade de produto a encomendar
	
	if(isset($_POST["submit_update"])) {
		
		$prod_quant=$_POST["prod_quant"]; //variável que vem do formulário do listar_produto.php
	//	$promocao_produto=$_POST["promocao_produto"]; //variável que vem do formulário do listar_produto.php
		$cod=$_POST["cod_produto"]; //variável que vem do formulário do listar_produto.php vem escondida pelo metodo hydden
		$cod_cor=$_POST["cod_cor"];
		$tamanho=$_POST["tamanho"];
	
		if($_POST["prod_quant"]>0 ){ //prod_quant>0
			$acresc = "update carrinho  set cc_quantidade = ".$prod_quant." where (cc_cod_cliente like '".$cod_cliente."' or cc_sessionid like '".session_id()."') and 
			cc_cod_produto=$cod and cc_cod_cor='".$cod_cor."' and cc_tamanho='".$tamanho."';";
			mysqli_query($ligax,$acresc) || die(mysqli_error($ligax));
		//	echo $acresc;
		
		} else { //prod_quant=0
			$del = "delete from carrinho where (cc_cod_cliente like '".$cod_cliente."' or cc_sessionid like '".session_id()."') and cc_cod_produto=$cod and 
			cc_cod_produto=$cod and cc_cod_cor='".$cod_cor."' and cc_tamanho='".$tamanho."';";
			//echo $del;
			mysqli_query($ligax,$del) || die(mysqli_error($ligax));
		}
	}
	
	// Foi dada a ordem de encomendar
	
	if(isset($_POST["encomendar"])) { 
		if(!isset($_SESSION["perfil"]) || $_SESSION["status"]!=1){ // O cliente não está autenticado mas para encoemndar tem de o fazer
			echo "<font color=\"red\"><alert>Tem de estar registado para efectuar encomendas</alert></font><br>";
			echo "<b><a href=\"index.php?pagina=registar\">Registar</a></b>";
		} else { // O cliente já está autenticado
			$consulta="select * from carrinho where (cc_cod_cliente like '".$cod_cliente."' or cc_sessionid like '".session_id()."');";
			$resultado=mysqli_query($ligax,$consulta);
			if($re=mysqli_fetch_assoc($resultado)!=0){
				//É criado o registo da encomenda na tabela encomenda
				$insere="insert into encomenda (data_encomenda,cod_cliente) values (NOW(),'".$_SESSION["cod_cliente"]."')";
				mysqli_query($ligax,$insere) || die(mysqli_error($ligax));
				$order_id=mysqli_insert_id($ligax); //ultimo registo inserido
				
				//São inseridos na tabela produto_encomenda os produtos que se encontram no carrinho
				$insere="insert into produto_encomenda (cod_encomenda,cod_produto,prod_quant, preco_venda, tamanho, cod_cor) Select $order_id, carrinho.cc_cod_produto, carrinho.cc_quantidade, artigo.preco_produto, cc_tamanho, cc_cod_cor from carrinho, artigo where carrinho.cc_cod_produto like artigo.cod_produto and carrinho.cc_sessionid like '".session_id()."';";
				
				mysqli_query($ligax,$insere) || die(mysqli_error($ligax));
				
				 $stock="select * from produto_encomenda where cod_encomenda=$order_id;";
				$res=mysqli_query($ligax,$stock);

				//É atualizado o stock de cada produto que foi encomendado
				while($r = mysqli_fetch_assoc($res)) {
				$cod=$r['cod_produto'];
				$cod_cor=$r['cod_cor'];
				$tamanho=$r['tamanho'];
				$s="select * from produto_tamanho_cor where cod_produto=$cod and cod_cor='".$cod_cor."' and tamanho='".$tamanho."'";

				$rp=mysqli_query($ligax,$s);
				$ri = mysqli_fetch_assoc($rp);
				$q=$ri['quantidade'];
				$quant=$r['prod_quant'];
				$s="update  produto_tamanho_cor set quantidade=$q-$quant where cod_produto=$cod and cod_cor='".$cod_cor."' and tamanho='".$tamanho."'";
				mysqli_query($ligax,$s);

				}
				//São eliminados os produtos do carrinho
				$delete="delete from carrinho where cc_sessionid like '".session_id()."'";
				mysqli_query($ligax,$delete) || die(mysqli_error($ligax));
				$total="select sum(preco_venda*prod_quant) as total from produto_encomenda where cod_encomenda=$order_id;";
				$calc_tot=mysqli_query($ligax,$total);
				if($registo = mysqli_fetch_assoc($calc_tot)) {
					$consulta="update encomenda set total='".$registo['total']."' where cod_encomenda=$order_id";
					mysqli_query($ligax,$consulta);
				}
				echo "A sua encomenda foi efectuada.\n";
				echo "Aguarde por favor.\n";
				
			} else {
				echo "Insira produtos no carrinho";
			}
		}
	}

	//Mostra os produtos que estão no carrinho

	if(isset($_SESSION["cod_cliente"])){ 	
			$consulta="select *, carrinho.cc_quantidade * artigo.preco_produto as total from carrinho,artigo where (cc_cod_cliente like '".$cod_cliente."' or carrinho.cc_sessionid like '".session_id()."') and artigo.cod_produto=carrinho.cc_cod_produto;";
	} else {
			$consulta="select *, carrinho.cc_quantidade * artigo.preco_produto as total from carrinho,artigo where cc_sessionid like '".session_id()."' and artigo.cod_produto=carrinho.cc_cod_produto";
	}
	

?>
		


	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
				<?php
					$resultado = mysqli_query($ligax,$consulta);
					if(mysqli_num_rows($resultado)>0){
				?>
			
			
			<div class="cart_inner">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Produto</th>
								
								<th scope="col">Preço</th>
								<th scope="col">Tamanho</th>
								<th scope="col">Cor</th>
								<th scope="col">Quantidade</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
					<?php

					while($registo = mysqli_fetch_assoc($resultado)) {
						$cod_cor=$registo['cc_cod_cor'];
						$tamanho=$registo['cc_tamanho'];
						$select_nome_cor="select nome_cor from cor where cod_cor='".$cod_cor."'";
						
						$result_cor=mysqli_query($ligax,$select_nome_cor);
						$registo_cor=mysqli_fetch_assoc($result_cor);
						$nome_cor=$registo_cor['nome_cor'];
					
					
					?>

					<form action="index.php?pagina=carrinho" method="POST">
						<tr>
								<td>
									<div class="media">
										<div class="img-perfil">

										 <img style="border:block;
		border-radius:50%;
		height:100px;
		width:100px;
		margin:10px auto;
		object-fit:cover;
		object-position:50% 50%" src="showfileproduto.php?cod_produto=<?php echo $registo["cod_produto"];?>" alt="IMG">
										</div>
										<div class="media-body">
											<p><?php echo $registo["nome_produto"]; ?></p>
										</div>
									</div>
								</td>
								<td>

									<h5><?php echo $registo["preco_produto"]; ?>€</h5>
								</td>
								<td>
									<h5><center><?php echo $tamanho; ?></center></h5>
								</td>
								<td>
									<h5><center><?php echo $nome_cor; ?></center></h5>
								</td>
								<input name='cod_produto' value="<?php echo $registo['cod_produto']; ?>" type='hidden'>
							<input name='cod_cor' value="<?php echo $cod_cor; ?>" type='hidden'>
							<input name='tamanho' value="<?php echo $tamanho; ?>" type='hidden'>
								<td>
									<div class="product_count">
							<input class="sizefull s-text7 p-l-22 p-r-22" name='prod_quant' value="<?php echo $registo['cc_quantidade']; ?>" min='0' type='number'>
									</div>
								
									<button name='submit_update' type='submit' class="flex-c-m size17 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
						Atualizar
					</button>
								</td>
								<td>
									<h5><?php if ($registo["promocao_produto"]!=0){ ?>
							
							<?php echo "<td>".round($registo["total"]-((($registo["total"])* $registo["promocao_produto"])/100),2)."&euro;</td>" ?>
							
							<?php }else{ ?>
							
							<?php echo "<td>".round($registo["total"],2)."&euro;</td>" ?>
							
							<?php } ?></h5>
								</td>
							</tr>
							
							

		
					
				</div>
							</td>
						</tr>
</form>
						<?php } ?>
					<tr class="bottom_button">
								<td>
												<form action='index.php?pagina=carrinho' method='POST'>
				<div class="checkout_btn_inner">
					<button class="main_btn" name='encomendar' type='Submit' class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Encomendar
					</button>
				</div>
			</form>
								</td>
								<td>

								</td>
								<td>

								</td>
								<td>
									<div class="cupon_text">
										<input type="text" placeholder="Código de desconto">
										<a class="main_btn" href="#">Apply</a>
									
									</div>
								</td>
								<td>
									<h5>Subtotal</h5>
								</td>
								<td>
									<h5><?php
				$consulta="select sum(carrinho.cc_quantidade * artigo.preco_produto) as total from carrinho,artigo where cc_sessionid like '".session_id()."' and artigo.cod_produto=carrinho.cc_cod_produto group by cc_sessionid;";
				
				$resultado = mysqli_query($ligax,$consulta);
				if($registo = mysqli_fetch_assoc($resultado)) {
					?>
				
					
					<span class="m-text21 w-size20 w-full-sm">
						<?php echo "<td>".round($registo["total"],2)."&euro;</td>" ?>
					</span>


				<?php } ?></h5>
								</td>
							</tr>
							
							
							<tr class="out_button_area">
								<td>

								</td>
								<td>

								</td>
								<td>

								</td>
								<td>
						
									
									
								</td>
							</tr>
						
					</table>
				</div>
			</div>
					</table>
				</div>
			</div>
					
	
				
			</div>
			
			
		




				
				
				

				
				
				
				
				

				<!--  -->
				
			
			
			</div>
			<?php } else {
			echo "N&atildeo existem produtos no carrinho de compras!";
			} ?>
		</div>
	</section>









	</div>
	</section>