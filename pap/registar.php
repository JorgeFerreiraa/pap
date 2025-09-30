
<?php
		if(isset($_POST['submit'])){
			$flag=false;
			$flag_email=false;
			$flag_pass=false;

			$nome=$_POST['nome'];
			$email=$_POST['email'];
			$pass=$_POST['pass'];
			$re_pass=$_POST['re_pass'];

		/* Verificar se o login já existe */
		$query="select email from utilizador";
		$result=mysqli_query($ligax,$query);
		while($registo=mysqli_fetch_assoc($result)){
			$emailBD=$registo['email'];
			if($emailBD==$email){
				$flag=true;
				$flag_email=true;
			}		
		}
		/* Validações */		
		if ($pass!=$re_pass || $pass=="") {$flag=true; $flag_pass=true;}
		$pass = md5($pass);
		
		/* Existiu um erro */
		?> <?php if($flag==true){ 
			if($flag_email==true) { ?><script> alert("Erro no email ")</script>
			 <?php } if($flag_pass==true) { ?>  <script> alert("Erro na password ")</script> <?php }
			 header("Location: index.php?pagina=listarutilizadores&pag=$pag");
			 ?>
	
	<!--================Login Box Area =================-->
	<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img"> 
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>Já tem uma conta?</h4>
							<a class="main_btn" href="index.php?pagina=login">Inicie sessão</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner reg_form">
						<h3>Criar 	conta</h3>
						<form class="row login_form" action="" method="POST" id="contactForm" >
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required="required">
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="pass" name="pass" placeholder="Palavra-passe" required="required">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="re_pass" name="re_pass" placeholder="Confirmar palavra-passe" required="required" >
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2"  name="selector" required="required">
									<label for="f-option2">Concordo com a política de privacidade do site.</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" name="submit" value="submit" class="btn submit_btn">Criar Conta</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
<?php } else { 
		
		
		
		
		$insere="INSERT INTO utilizador
			(nome,email,password,data_registo) VALUES ('".$nome."','".$email."','".$pass."',now())";
			
			$result=mysqli_query($ligax,$insere);

            if($result==1){
            $cod=mysqli_insert_id($ligax);
            include("enviar_link_email.php");
            ?>
            <script> 
                alert("Aceda ao seu email e confirme o registo.");
            </script>
            <?php } else {
                echo "<p>Dados não inseridos!</p>";
            }
			?>
			
			
			
	<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Dados da conta</h3>
						<?php 
						if($result==1){
				
			echo"<p>Parabéns $nome! Realizou o seu registo com sucesso.</p><p>Confirme a sua conta no email</p>";
		
			} else {
				echo "<p>Dados não inseridos!</p>";
				
			}
						?>
							<div class="col-md-12 form-group">
								<label> Nome:<?php echo $nome; ?> </label>
							</div>
							<div class="col-md-12 form-group">
								<label> Email:<?php echo $email; ?> </label>
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
								<input type="password" class="form-control" id="pass" name="pass" placeholder="Palavra-passe" required="required">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Manter sessão iniciada</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="btn submit_btn">Iniciar sessão</button>
								<a href="#">Esqueceu-se da Palavra-passe?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
		
			
			
			
			
			
			
		}
	} else {
		?>
		<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>Já tem uma conta?</h4>
							<a class="main_btn" href="index.php?pagina=login">Inicie sessão</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner reg_form">
						<h3>Criar 	conta</h3>
						<form class="row login_form" action="" method="POST" id="contactForm" >
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required="required">
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="pass" name="pass" placeholder="Palavra-passe" required="required">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="re_pass" name="re_pass" placeholder="Confirmar palavra-passe" required="required" >
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" required="required" name="selector">
									<label for="f-option2">Concordo com a política de privacidade do site.</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" name="submit" value="submit" class="btn submit_btn">Criar Conta</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>