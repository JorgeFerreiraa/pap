<?php $query="select * from utilizador where cod_cliente='".$_SESSION["cod_cliente"]."'";
			$result=mysqli_query($ligax,$query);
			while($registo=mysqli_fetch_assoc($result)){
				$nome=$registo['nome'];
				$email=$registo['email'];
				$pais=$registo['pais'];
				$morada=$registo['morada'];
				$telemovel=$registo['telemovel'];
				$localidade=$registo['localidade'];
				$codigo_postal=$registo['codigo_postal'];
				$nif=$registo['nif'];
				$data_nascimento=$registo['data_nascimento'];
				$genero=$registo['genero']; 
				$nome_foto=$registo['nome_foto'];
			} ?>
	<!--================Checkout Area =================-->
	<section class="checkout_area section_gap">
		<div class="container">
			
			<div class="billing_details">
				<div class="row">
					<div class="col-lg-8">
						<h3>Detalhes de Faturação</h3>
						<form class="row contact_form" action="#" method="post" novalidate="novalidate">
							<div class="col-md-6 form-group p_star">
								<h6>Nome</h6>
									<input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome ?>"  placeholder="Nome" required="required">
							
							</div>
							<div class="col-md-6 form-group p_star">
								<h6>Telemóvel</h6>
								<input type="text" class="form-control" id="telemovel" name="telemovel" value="<?php echo $telemovel ?>"placeholder="Telemovel" >
							</div>
						
							<div class="col-md-6 form-group p_star">
								<h6>Email</h6>
							<input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" placeholder="email" required="required" >
							</div>
							<div class="col-md-6 form-group p_star">
								<h6>NIF</h6>
								<input type="text" class="form-control" id="nif" name="nif" value="<?php echo $nif ?>" placeholder="NIF">
							</div>
							<div class="col-md-12 form-group p_star">
								<select class="country_select">
									<option value="0">País</option>
									<option value="1">Portugal</option>
									<option value="2">Espanha</option>
									<option value="3">Inglaterra</option>
									<option value="4">França</option>
								</select>
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="add1" name="add1">
								<span class="placeholder" data-placeholder="Address line 01"></span>
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="add2" name="add2">
								<span class="placeholder" data-placeholder="Address line 02"></span>
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="city" name="city">
								<span class="placeholder" data-placeholder="Town/City"></span>
							</div>
							<div class="col-md-12 form-group p_star">
								<select class="country_select">
									<option value="1">District</option>
									<option value="2">District</option>
									<option value="4">District</option>
								</select>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP">
							</div>
						
						</form>
					</div>
					<div class="col-lg-4">
						<div class="order_box">
							<h2>A tua encomenda</h2>
							<ul class="list">
								<li>
									<a href="#">Product
										<span>Total</span>
									</a>
								</li>
								<li>
									<a href="#">Fresh Blackberry
										<span class="middle">x 02</span>
										<span class="last">$720.00</span>
									</a>
								</li>
								<li>
									<a href="#">Fresh Tomatoes
										<span class="middle">x 02</span>
										<span class="last">$720.00</span>
									</a>
								</li>
								<li>
									<a href="#">Fresh Brocoli
										<span class="middle">x 02</span>
										<span class="last">$720.00</span>
									</a>
								</li>
							</ul>
							<ul class="list list_2">
								<li>
									<a href="#">Subtotal
										<span>$2160.00</span>
									</a>
								</li>
								<li>
									<a href="#">Shipping
										<span>Flat rate: $50.00</span>
									</a>
								</li>
								<li>
									<a href="#">Total
										<span>$2210.00</span>
									</a>
								</li>
							</ul>
							<div class="payment_item">
								<div class="radion_btn">
									<input type="radio" id="f-option5" name="selector">
									<label for="f-option5">Check payments</label>
									<div class="check"></div>
								</div>
								<p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
							</div>
							<div class="payment_item active">
								<div class="radion_btn">
									<input type="radio" id="f-option6" name="selector">
									<label for="f-option6">Paypal </label>
									<img src="img/product/single-product/card.jpg" alt="">
									<div class="check"></div>
								</div>
								<p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
							</div>
							<div class="creat_account">
								<input type="checkbox" id="f-option4" name="selector">
								<label for="f-option4">I’ve read and accept the </label>
								<a href="#">terms & conditions*</a>
							</div>
							<a class="main_btn" href="#">Proceed to Paypal</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Checkout Area =================-->

	<!--================ Subscription Area ================-->
	<section class="subscription-area section_gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="section-title text-center">
						<h2>Subscribe for Our Newsletter</h2>
						<span>We won’t send any kind of spam</span>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div id="mc_embed_signup">
						<form target="_blank" novalidate action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&id=92a4423d01"
						 method="get" class="subscription relative">
							<input type="email" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
							 required="">
							<!-- <div style="position: absolute; left: -5000px;">
									<input type="text" name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="">
								</div> -->
							<button type="submit" class="newsl-btn">Get Started</button>
							<div class="info"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Subscription Area ================-->
