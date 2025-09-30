
	<!--================Login Box Area =================-->
	<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/skatelogin.jpg" alt="">
						<div class="hover">
							<h4>Novo no nosso site?</h4>
							<p>Se ainda não tem conta crie aqui e comece a tirar partido das melhores vantagens da nossa loja</p>
							<a class="main_btn" href="index.php?pagina=registar">Criar conta</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Iniciar sessão</h3>
						<form class="row login_form" action="index.php?pagina=validarlogin" method="POST" id="contactForm">
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email">
							</div>
							<div class="col-md-12 form-group">
								
							
<html>
<style>
#esse {display:none;color:red}
</style>
<body>

<input type="password" class="form-control" id="pass" name="pass" placeholder="Palavra-passe" required="required">
<p id="esse">CUIDADO! Caps lock está ativo.</p>

<script>
var pass = document.getElementById("pass");
var esse = document.getElementById("esse");
pass.addEventListener("keyup", function(event) {

if (event.getModifierState("CapsLock")) {
    esse.style.display = "block";
  } else {
    esse.style.display = "none"
  }
});
</script>

</body>
</html>
</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Manter sessão iniciada</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="btn submit_btn">Iniciar sessão</button>
								<a href="index.php?pagina=recuperar">Esqueceu-se da Palavra-passe?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

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

