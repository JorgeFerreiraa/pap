

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
	<!--================End Home Banner Area =================-->
	<!--================Cart Area =================-->

			<div class="cart_inner">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Produto</th>
								<th scope="col">Preço</th>
								<th scope="col">Quantidade</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="media">
										<div class="d-flex">
											<img src="img/product/single-product/cart-1.jpg" alt="">
										</div>
										<div class="media-body">
											<p>Minimalistic shop for multipurpose use</p>
										</div>
									</div>
								</td>
								<td>
									<h5>$360.00</h5>
								</td>
								<td>
									<div class="product_count">
										<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
										<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
										 class="increase items-count" type="button">
											<i class="lnr lnr-chevron-up"></i>
										</button>
										<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
										 class="reduced items-count" type="button">
											<i class="lnr lnr-chevron-down"></i>
										</button>
									</div>
								</td>
								<td>
									<h5>$720.00</h5>
								</td>
							</tr>
							
							<tr class="bottom_button">
								<td>
									<a class="gray_btn" href="#">Atualizar carrinho</a>
									<a class="gray_btn" href="#">Continuar a comprar</a>
								</td>
								<td>

								</td>
								<td>

								</td>
							
						
							
				
						
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Cart Area =================-->