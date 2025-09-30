<?php 
if (isset($_SESSION["cod_cliente"])) $cod_cliente= $_SESSION["cod_cliente"];
else $cod_cliente="";
// Clicou em adicionar na lista de produtos; Vai actualizar o carrinho de compras

	if(isset($_POST["add"])){ //clicou em adicionar na página listar_produto.php
		$prod_quant=$_POST["prod_quant"]; //variável que vem do formulário do listar_produto.php
		$cod=$_POST["cod_produto"]; //variável que vem do formulário do listar_produto.php vem escondida pelo metodo hydden
		

	
		if($cod_cliente!=""){ //cliente autenticado
			$consulta="select count(*) as existe from carrinho where (cc_cod_cliente like '".$cod_cliente."' or cc_sessionid like '".session_id()."') and cc_cod_produto=$cod;";
		} else { // ainda não efectuou login
			$consulta="select count(*) as existe from carrinho where cc_sessionid like '".session_id()."' and cc_cod_produto=$cod;";
		}
			
		$resultado=mysqli_query($ligax,$consulta); // vai procurar na tabela carrinho algum pedido daquele produto
		if($resultado) { 
			$nr=mysqli_fetch_assoc($resultado);

			if($nr["existe"]!=0){ // o produto já existe no carrinho, loga acrescenta a esse registo apenas a nova quantidade 
				$acresc="update carrinho set cc_quantidade=cc_quantidade+".$prod_quant." where (cc_cod_cliente like '".$cod_cliente."' or cc_sessionid like '".session_id()."') and cc_cod_produto like '".$cod."';";
				mysqli_query($ligax,$acresc) || die(mysqli_error($ligax)); // faz a consulta à base de dados ou mostra o erro 
			} else {  // o produto ainda não existe no carrinho
					$insere="insert carrinho (cc_sessionid,cc_cod_cliente,cc_cod_produto,cc_quantidade,cc_data) values ('".session_id()."','".$cod_cliente."','".$cod."',".$prod_quant.",NOW());";
					mysqli_query($ligax,$insere) || die(mysqli_error($ligax));
				}
			}
		
	} ?>
	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Shop Category Page</h2>
					<div class="page_link">
						<a href="index.php">Home</a>
						<a href="category.html">Category</a>
						<a href="category.html">Women Fashion</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Category Product Area =================-->
	<section class="cat_product_area section_gap">
		<div class="container-fluid">
			<div class="row flex-row-reverse">
				<div class="col-lg-9">
					<div class="product_top_bar">
						<div class="left_dorp">
							<select class="sorting">
								<option value="1">Default sorting</option>
								<option value="2">Default sorting 01</option>
								<option value="4">Default sorting 02</option>
							</select>
							<select class="show">
								<option value="1">Show 12</option>
								<option value="2">Show 14</option>
								<option value="4">Show 16</option>
							</select>
						</div>
						<div class="right_page ml-auto">
							<nav class="cat_page" aria-label="Page navigation example">
								<ul class="pagination">
									<li class="page-item">
										<a class="page-link" href="#">
											<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
										</a>
									</li>
									<li class="page-item active">
										<a class="page-link" href="#">1</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">2</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">3</a>
									</li>
									<li class="page-item blank">
										<a class="page-link" href="#">...</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">6</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">
											<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<div class="latest_product_inner row">
					<?php

	$consulta = "select * from artigo" ;
	$result = mysqli_query($ligax, $consulta);

		while($registo=mysqli_fetch_assoc($result)){
			
			
			$cod_produto=$registo['cod_produto'];
			$nome_produto=$registo['nome_produto'];
			$preco_produto=$registo['preco_produto'];
			$promocao_produto=$registo['promocao_produto'];
			

			?>
						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="f_p_item">
								<div class="f_p_img">
										<div class="img-perfil"><img style="border:block;
		border-radius:50%;
		height:100px;
		width:100px;
		margin:10px auto;
		object-fit:cover;
		object-position:50% 50%" src="showfileproduto.php?cod_produto=<?php echo $cod_produto;?>"></div>
									<div class="p_icon">
										<a href="#">
											<i class="lnr lnr-heart"></i>
										</a>
										<a href="#">
											<i class="lnr lnr-cart"></i>
										</a>
									</div>
								</div>
								<a href="index.php?pagina=detalhesproduto&cod_produto=<?php echo $cod_produto; ?>">
									<h4><?php echo $nome_produto ?></h4>
								</a>
								<?php if($promocao_produto!=0){ ?>
							<s><h5 ><span style="color:#ff0000; "><?php echo $preco_produto ?>€</span></s>&nbsp;<?php echo round($preco_produto-(($preco_produto*$promocao_produto)/100),2); ?>€</h5>

						<?php } else{ ?>

							<h5><?php echo $preco_produto;?>€</h5>

						<?php } ?>
								
							</div>
										
						</div>
		
					<?php  } ?>
				
					</div>
				</div>
				<div class="col-lg-3">
					<div class="left_sidebar_area">
						<aside class="left_widgets cat_widgets">
							<div class="l_w_title">
								<h3>Categorias</h3>
							</div>
							<div class="widgets_inner">
								<?php

	$consulta = "select * from categoria" ;
	$result = mysqli_query($ligax, $consulta);

		while($registo=mysqli_fetch_assoc($result)){
			
			
			$cod_categoria=$registo['cod_categoria'];
			$nome_categoria=$registo['nome_categoria'];
			$cod_categoria_precedente=$registo['cod_categoria_precedente'];
			

			?>

								<ul class="list">
									<li>
										<?php if($cod_categoria_precedente==0){ ?><a href="index.php?pagina=shop&cod_categoria=<?php echo $cod_categoria;?>"><?php echo $nome_categoria ?> </a> <?php } ?>
										

										<ul class="list">
											<li>
												<a href="#"></a>
											</li>
										</ul>
									
									</li>
								</ul>
							<?php } ?>
							</div>
						</aside><aside class="left_widgets cat_widgets">
							<div class="l_w_title">
								<h3>Marcas</h3>
							</div>
							<div class="widgets_inner">
								<?php

	$consulta = "select * from marca" ;
	$result = mysqli_query($ligax, $consulta);

		while($registo=mysqli_fetch_assoc($result)){
			
			
			$cod_marca=$registo['cod_marca'];
			$nome_marca=$registo['nome_marca'];
			
			

			?>
								<ul class="list">
									<li>
										<a href="#"><?php echo $nome_marca ?> </a> 

										<ul class="list">
											<li>
												<a href="#"></a>
											</li>
										</ul>
									
									</li>
								</ul>
							<?php } ?>
							</div>
					
							
							</div> 
						</aside>
						<aside class="left_widgets p_filter_widgets">
							
							<div class="widgets_inner">
								<h4>Price</h4>
								<div class="range_item">
									<div id="slider-range"></div>
									<div class="row m0">
										<label for="amount">Price : </label>
										<input type="text" id="amount" readonly>
									</div>
								</div>
							</div>
						</aside>
					</div>
				</div>
			</div>

			<div class="row">
				<nav class="cat_page mx-auto" aria-label="Page navigation example">
					<ul class="pagination">
						<li class="page-item">
							<a class="page-link" href="#">
								<i class="fa fa-chevron-left" aria-hidden="true"></i>
							</a>
						</li>
						<li class="page-item active">
							<a class="page-link" href="#">01</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">02</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">03</a>
						</li>
						<li class="page-item blank">
							<a class="page-link" href="#">...</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">09</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">
								<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</section>
	<!--================End Category Product Area =================-->