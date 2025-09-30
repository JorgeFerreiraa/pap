
	<header class="header_area">
		<div class="top_menu row m0">
			<div class="container-fluid">
				<div class="float-left">
					<p>Call Us: 012 44 5698 7456 896</p>
				</div>
				<div class="float-right">
					<ul class="right_side">
						<li>
							<a href="logout.php">
								Logout
							</a>
						</li>
						<li>
							<a href="index.php?pagina=perfil">
								Perfil
							</a>
						</li>
						<li>
							<a href="index.php?pagina=contactos">
								Contactos
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php">
						<img src="img/teste.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row w-100">
							<div class="col-lg-7 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">
									<li class="nav-item active">
										<a class="nav-link" href="index.php">Home</a>
									</li>
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="category.html">Shop Category</a>
												<li class="nav-item">
													<a class="nav-link" href="single-product.html">Product Details</a>
													<li class="nav-item">
												<li class="nav-item">
													<a class="nav-link" href="index.php?pagina=listarprodutos">Produtos</a>
												<li class="nav-item">
												
														<a class="nav-link" href="checkout.html">Product Checkout</a>
														<li class="nav-item">
															<a class="nav-link" href="cart.html">Shopping Cart</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="confirmation.html">Confirmation</a>
														</li>
										</ul>
									</li>
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="blog.html">Blog</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="single-blog.html">Blog Details</a>
											</li>
										</ul>
									</li>
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu admin</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
										<a class="nav-link" href="index.php?pagina=inserir_categorias">Inserir Categorias</a>
									</li>
										<li class="nav-item">
										<a class="nav-link" href="index.php?pagina=listarutilizadores">Listar Utilizadores</a>
									</li>
										<li class="nav-item">
										<a class="nav-link" href="index.php?pagina=listar_categorias">Listar Categorias</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="index.php?pagina=inserirmarcas">Inserir marcas</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="index.php?pagina=listarmarcas">Listar marcas</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="index.php?pagina=escolhacategoria">Inserir artigo</a>
									</li>
									

													<li class="nav-item">
														<a class="nav-link" href="elements.html">Elements</a>
													</li>
										</ul>
									</li>
										<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Encomendas</a>
										<ul class="dropdown-menu">
										<li class="nav-item">
										<a class="nav-link" href="index.php?pagina=encomendanaoprocessada">Encomendas não processadas</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="index.php?pagina=encomendasprocessadas">Encomendas processadas</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="index.php?pagina=encomendasconcluidas">Encomendas concluídas</a>
									</li>
										</ul>
									</li>
								</ul>

							</div>

							<div class="col-lg-5">
								<ul class="nav navbar-nav navbar-right right_nav pull-right">
									<hr>
									<li class="nav-item">
										<a href="index.php?pagina=perfil" class="icons">
											<i><img class="perfil1" src="showfile.php?cod_cliente=<?php echo $_SESSION['cod_cliente'];?>"></i>
										</a>
									</li>

									<li class="nav-item">
										<a href="index.php?pagina=notificacoes" class="icons">
											<i class="fa " aria-hidden="true">&#128276;</i>
										</a>
									</li>

									<hr>

									
									<hr>

									<li class="nav-item">
										<a href="#" class="icons">
											<i class="fa fa-heart-o" aria-hidden="true"></i>
										</a>
									</li>

									<hr>

									<li class="nav-item">
										<a href="index.php?pagina=carrinho" class="icons">
											<i class="lnr lnr lnr-cart"></i>
										</a>
									</li>

									<hr>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>