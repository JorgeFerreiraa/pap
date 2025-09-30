	<html>
	<head>
	<style>
	.img-roupa{
		
		
		height:60px;
		width:60px;
		
		
	}

	</style>
	</head>
	<body>
	<?php 
if (isset($_SESSION["cod_cliente"])) $cod_cliente= $_SESSION["cod_cliente"];
else $cod_cliente="";
// Clicou em adicionar na lista de produtos; Vai actualizar o carrinho de compras

	if(isset($_POST["add"])){ //clicou em adicionar na página listar_produto.php
		$prod_quant=$_POST["prod_quant"]; //variável que vem do formulário do listar_produto.php ou ver detalhes
		$cod=$_POST["cod_produto"]; //variável que vem do formulário do listar_produto.php vem escondida pelo metodo hydden
		$cod_cor=$_POST["cod_cor"];
		$tamanho=$_POST["tamanho"];
		
			if($tamanho==0){ ?> <script> alert("Selecione um tamanho válido"); window.location=""; </script> <?php }
			
			else if($cod_cliente!=""){ //cliente autenticado
				$consulta="select count(*) as existe from carrinho where
				(cc_cod_cliente like '".$cod_cliente."' or cc_sessionid like '".session_id()."') and cc_cod_produto=$cod and cc_tamanho='".$tamanho."' and cc_cod_cor=$cod_cor;";
			} else { // ainda não efectuou login
			$consulta="select count(*) as existe from carrinho where cc_sessionid like '".session_id()."' and cc_cod_produto=$cod and cc_tamanho='".$tamanho."' and cc_cod_cor=$cod_cor;";
			}
			//echo $consulta;
			$resultado=mysqli_query($ligax,$consulta); // vai procurar na tabela carrinho algum pedido daquele produto
		if($resultado) { 
			$nr=mysqli_fetch_assoc($resultado);

			if($nr["existe"]!=0){ // o produto já existe no carrinho, loga acrescenta a esse registo apenas a nova quantidade 
				$acresc="update carrinho set cc_quantidade=cc_quantidade+".$prod_quant." where (cc_cod_cliente like '".$cod_cliente."' or cc_sessionid like '".session_id()."') and cc_cod_produto like '".$cod."' and cc_cod_cor='".$cod_cor."' and cc_tamanho='".$tamanho."';";
				mysqli_query($ligax,$acresc) || die(mysqli_error($ligax)); // faz a consulta à base de dados ou mostra o erro 
			} else {  // o produto ainda não existe no carrinho
					$insere="insert carrinho (cc_sessionid,cc_cod_cliente,cc_cod_produto,cc_quantidade,cc_data,cc_cod_cor,cc_tamanho) values ('".session_id()."','".$cod_cliente."','".$cod."',".$prod_quant.",NOW(),".$cod_cor.",'".$tamanho."' );";
					//echo $insere;
					mysqli_query($ligax,$insere) || die(mysqli_error($ligax));
				}
			}
	
	}
					

	$query = "select * from artigo where cod_produto='".$_GET["cod_produto"]."'" ;
			$result=mysqli_query($ligax,$query);
			while($registo=mysqli_fetch_assoc($result)){
				$nome_produto=$registo['nome_produto']; 
				$nome_foto=$registo['nome_foto'];
				$preco_produto=$registo['preco_produto'];
				$descricao_produto=$registo['descricao_produto'];
				$cod_categoria=$registo['cod_categoria'];
				$personalizavel=$registo['personalizavel'];
				$stock_min=$registo['stock_min'];
				$promocao_produto=$registo['promocao_produto']; 
				$cod_marca=$registo['cod_marca'];

			}
	$query1 = "select * from categoria where cod_categoria='".$cod_categoria."'" ;
			$result1=mysqli_query($ligax,$query1);
			while($registo1=mysqli_fetch_assoc($result1)){
				$nome_categoria=$registo1['nome_categoria']; 
				
			}
			$query2 = "select * from marca where cod_marca='".$cod_marca."'" ;
			$result2=mysqli_query($ligax,$query2);
			while($registo2=mysqli_fetch_assoc($result2)){
				$nome_marca=$registo2['nome_marca']; 
				
			}
			$query3 = "select sum(quantidade) as quantidade_total from produto_tamanho_cor where cod_produto='".$_GET["cod_produto"]."'" ;
			$result3=mysqli_query($ligax,$query3);
			while($registo3=mysqli_fetch_assoc($result3)){
				$quantidade1=$registo3['quantidade_total']; 
				echo $quantidade1;
			}
			?>





	

	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Single Product Page</h2>
					<div class="page_link">
						<a href="index.html">Home</a>
						<a href="category.html">Category</a>
						<a href="single-product.html">Product Details</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_product_img">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">


							 <ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
									<img class="img-roupa" src="showfileproduto.php?cod_produto=<?php echo $_GET['cod_produto'];?>" alt="">
								</li>
								<li data-target="#carouselExampleIndicators" data-slide-to="1">
									<img class="img-roupa" src="showfileproduto2.php?cod_produto=<?php echo $_GET['cod_produto'];?>" alt="">
								</li>
								<li data-target="#carouselExampleIndicators" data-slide-to="2">
									<img class="img-roupa" src="showfileproduto3.php?cod_produto=<?php echo $_GET['cod_produto'];?>" alt="">
								</li>
							</ol>
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-100" src="showfileproduto.php?cod_produto=<?php echo $_GET['cod_produto'];?>" alt="">
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="showfileproduto2.php?cod_produto=<?php echo $_GET['cod_produto'];?>" alt="">
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="showfileproduto3.php?cod_produto=<?php echo $_GET['cod_produto'];?>" alt="">
								
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text" >
						<h3><?php echo $nome_produto;?><h3>
						</h3>
						<?php if($promocao_produto!=0){ ?>
							<s><h2 style="color:#ff0000; "><?php echo $preco_produto;?>€</h2></s><h2><?php echo round($preco_produto-(($preco_produto*$promocao_produto)/100),2); ?>€</h2><h5 style="color:#00FF00 "><?php echo $promocao_produto; ?>% de desconto</h5>

						<?php } else{ ?>

							<h2><?php echo $preco_produto;?>€</h2>

						<?php } ?>
						
						<ul class="list">
							<li>
								
									<span>Categoria</span> :<a class="active" href="#"> <?php echo $nome_categoria; ?></a>
							</li>
							<li>
								
									<span>Marca</span> :<a class="active" href="#"> <?php echo $nome_marca; ?></a>
							</li>
							<?php if($quantidade1==$stock_min){ ?>
							<li >
										 <span>Disponibilidade:</span> <a class="active" style="color:#FF4500;" href="#"> <?php echo "&nbsp;Ultimas unidades"; ?></a>
									
							</li> <?php }else if($quantidade1<$stock_min){ ?>
								<li>
								
									<span>Disponibilidade:</span> <a class="active" style="color: #ff0000;" href="#"> <?php echo "&nbsp;Esgotado"; ?></a>
							</li>
							
							<?php } else{ ?>
								<li>
								
									<span>Disponibilidade:</span> <a class="active" href="#"> <?php echo "&nbsp;Em stock"; ?></a>
							</li>
							<?php } ?>
							

							
								<?php if (isset($_SESSION["perfil"])) {
            if (($_SESSION ["perfil"])==2){ ?>
            	<li>
            		 <a href="index.php?pagina=editarproduto&cod_produto=<?php echo $_GET['cod_produto']; ?>"><?php echo "Editar produto"; ?></a>
							</li>
        <?php    }
        } ?>
								
						</ul>
						<p><?php echo $descricao_produto; ?></p>
						<?php if($quantidade1<$stock_min){ echo "Artigo temporariamente indisponível "; }else{ ?>
						<div class="product_count">
		
						<?php echo "<form action='' method=\"POST\">";

						if(isset($_GET['cod_produto'])){
	$select_cor = "select produto_tamanho_cor.cod_cor, nome_cor from cor, produto_tamanho_cor where cod_produto='".$_GET['cod_produto']."' 
	and produto_tamanho_cor.cod_cor=cor.cod_cor and quantidade>0 group by produto_tamanho_cor.cod_cor" ;
	$result_cor= mysqli_query($ligax, $select_cor);
	if($result_cor) {
		echo "<table>";
		while($registo_cor=mysqli_fetch_assoc($result_cor)){
			$cod_cor=$registo_cor['cod_cor'];
			$nome_cor=$registo_cor['nome_cor'];
			echo "<tr>";
			echo "<td>";
			echo $nome_cor;
			echo "</td>";
			echo "<td>";
			
			//Selecionar os tamanhos de cada cor
			
			$select = "select * from produto_tamanho_cor where cod_produto='".$_GET['cod_produto']."' and cod_cor='".$cod_cor."' and quantidade>0 order by tamanho" ;
			$result= mysqli_query($ligax, $select);
			if($result) {
				?>
				
				<form action="index.php?pagina=detalhesproduto&cod_produto=<?php echo $_GET['cod_produto'];?>" method="POST">
				
				<select name="tamanho">
						<option value="0";><?php echo "Tamanhos:" ?></option>	
				<?php
				while($registo=mysqli_fetch_assoc($result)){
					$tamanho=$registo['tamanho'];
					$stock=$registo['stock'];
						
						?>
						
						<option value="<?php echo $tamanho; ?>"><?php echo $tamanho; ?></option>
							<?php }?>
							</select>
						<?php } 
						echo "</td>";
						echo "<td>"; ?>
						
				<input type='hidden' name='cod_produto' value="<?php echo $_GET['cod_produto']; ?>" >
				<input type='hidden' name='cod_cor' value="<?php echo $cod_cor; ?>" >
				<input name='prod_quant' value='1'  type='number' min="1" max="99">
				<input name='add' value='Adicionar' type='Submit' class="btn btn-black rounded-0 d-block d-lg-inline-block">
				</form>
						
						<?php echo "</td>";
						echo "</tr>"; 
	}
	echo "</table>";
	}
	}
 
}
						?>
		</div><div class="card_area">
			

			<?php echo "</form>";  ?>
	
						
						<?php if($personalizavel==1){
						
							?><a class="icon_btn" href="#">
								<i class="lnr lnr lnr-diamond"></i>
							</a> 
							<?php } ?>

							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Descrição</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Comments</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<p><?php echo $descricao_produto; ?></p>	
				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td>
										<h5>Width</h5>
									</td>
									<td>
										<h5>128mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Height</h5>
									</td>
									<td>
										<h5>508mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Depth</h5>
									</td>
									<td>
										<h5>85mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Weight</h5>
									</td>
									<td>
										<h5>52gm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Quality checking</h5>
									</td>
									<td>
										<h5>yes</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Freshness Duration</h5>
									</td>
									<td>
										<h5>03days</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>When packeting</h5>
									</td>
									<td>
										<h5>Without touch of hand</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Each Box contains</h5>
									</td>
									<td>
										<h5>60pcs</h5>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="comment_list">
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="img/product/single-product/review-1.png" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<h5>12th Feb, 2017 at 05:56 pm</h5>
											<a class="reply_btn" href="#">Reply</a>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
										aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
								</div>
								<div class="review_item reply">
									<div class="media">
										<div class="d-flex">
											<img src="img/product/single-product/review-2.png" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<h5>12th Feb, 2017 at 05:56 pm</h5>
											<a class="reply_btn" href="#">Reply</a>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
										aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
								</div>
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="img/product/single-product/review-3.png" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<h5>12th Feb, 2017 at 05:56 pm</h5>
											<a class="reply_btn" href="#">Reply</a>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
										aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Post a comment</h4>
								<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="name" name="name" placeholder="Your Full name">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="number" name="number" placeholder="Phone Number">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
										</div>
									</div>
									<div class="col-md-12 text-right">
										<button type="submit" value="submit" class="btn submit_btn">Submit Now</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="row total_rate">
								<div class="col-6">
									<div class="box_total">
										<h5>Overall</h5>
										<h4>4.0</h4>
										<h6>(03 Reviews)</h6>
									</div>
								</div>
								<div class="col-6">
									<div class="rating_list">
										<h3>Based on 3 Reviews</h3>
										<ul class="list">
											<li>
												<a href="#">5 Star
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i> 01</a>
											</li>
											<li>
												<a href="#">4 Star
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i> 01</a>
											</li>
											<li>
												<a href="#">3 Star
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i> 01</a>
											</li>
											<li>
												<a href="#">2 Star
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i> 01</a>
											</li>
											<li>
												<a href="#">1 Star
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i> 01</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="review_list">
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="img/product/single-product/review-1.png" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
										aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
								</div>
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="img/product/single-product/review-2.png" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
										aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
								</div>
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="img/product/single-product/review-3.png" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
										aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Add a Review</h4>
								<p>Your Rating:</p>
								<ul class="list">
									<li>
										<a href="#">
											<i class="fa fa-star"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-star"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-star"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-star"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-star"></i>
										</a>
									</li>
								</ul>
								<p>Outstanding</p>
								<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="name" name="name" placeholder="Your Full name">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="number" name="number" placeholder="Phone Number">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="message" id="message" rows="1" placeholder="Review"></textarea>
										</div>
									</div>
									<div class="col-md-12 text-right">
										<button type="submit" value="submit" class="btn submit_btn">Submit Now</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>