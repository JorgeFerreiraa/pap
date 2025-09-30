<html>
<head>
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
<body>

	<?php	$query="select * from utilizador where cod_cliente='".$_SESSION["cod_cliente"]."'";
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
			}	
		
	?>


<!-- Inicio do formulário -->
<section class="login_box_area p_100">
		<div class="container">
				<div class="col-lg-30">
					<div class="login_form_inner reg_form">
						<h3>Criar 	conta</h3>
						<form class="row login_form" action="" method="POST" id="contactForm" >
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome ?>">
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
							<div>
								<label></label>
							</div>
							<div class="hover">
							<a class="main_btn" href="index.php?pagina=perfil">Editar password</a>
							<a class="main_btn" href="index.php?pagina=perfil">Editar Perfil</a>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
