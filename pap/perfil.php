	<html>
	<head>
	<style>
	.img-perfil{
		border:block;
		border-radius:50%;
		height:184px;
		width:184px;
		margin:10px auto;
		object-fit:cover;
		object-position:50% 50%
	}

	</style>
	</head>
	<body>

	<!-- Botão de mudar password -->

<?php 
if(isset($_POST['alterar'])){
		

		
			$flag=false;
			$flag_passsword_antiga=false;
			$flag_password_nova=false;

			$password_antiga=$_POST['password_antiga'];
			$password_nova=$_POST['password_nova'];
			$password_novaconfirmar=$_POST['password_novaconfirmar'];

			$password_antiga=md5($password_antiga);
			$password_nova=md5($password_nova);
			$password_novaconfirmar=md5($password_nova);

				if(($password_nova==$password_novaconfirmar)){
					$flag=true;
					$flag_password_nova=true;
					}


			/* confirmar palavra passe */
			$query="select password from utilizador where cod_cliente='".$_SESSION["cod_cliente"]."'";
			$result=mysqli_query($ligax,$query);
			while($registo=mysqli_fetch_assoc($result)){
				$passwordBD=$registo['password'];
				if(($passwordBD!=$password_antiga)){
					$flag=true;
					$flag_passsword_antiga=true;
				}		
			}
		
					if($flag==true){ 
					if($flag_passsword_antiga==true) ?> <script> alert("Password incorreta! Insira a sua password antiga para atualizar os dados do perfil") </script> <?php 
						if($flag_password_nova==true)?> <script> alert("Password não coincidem") </script> <?php
			}	else {
				$atualizar="UPDATE utilizador set password='".$password_nova."'where cod_cliente='".$_SESSION["cod_cliente"]."'";
				echo $atualizar;
				$result=mysqli_query($ligax,$atualizar);
				if($result==1){
							 ?>
				<script> alert("Dados atualizados com sucesso"); window.location="index.php?pagina=perfil"; </script>

			<?php 
				} else {
						echo "<p>Dados não inseridos!</p>";?>
				<br><br>
				<a href="index.php" class="form-submit">Voltar ao Menu Principal</a>
				<?php
				}
	}	
			}

?>



	<!-- Botão confirmar -->

	<?php 

		if(isset($_POST['Confirmar'])){
		

		
			$flag=false;
			$flag_email=false;
			$flag_pass=false;

			$nome=$_POST['nome'];
			$telemovel=$_POST['telemovel'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$pais=$_POST['pais'];
			$morada=$_POST['morada'];
			$localidade=$_POST['localidade'];
			$codigo_postal=$_POST['codigo_postal'];
			$nif=$_POST['nif'];
			$data_nascimento=$_POST['data_nascimento'];
			$genero=$_POST['genero'];



			$password=md5($password);

			/* confirmar palavra passe */
			$query="select password from utilizador where cod_cliente='".$_SESSION["cod_cliente"]."'";
			$result=mysqli_query($ligax,$query);
			while($registo=mysqli_fetch_assoc($result)){
				$passwordBD=$registo['password'];
				if(($passwordBD!=$password)){
					$flag=true;
					$flag_password=true;
				}		
			}
				
			/* Verificar se o email já existe */
			$query="select email,cod_cliente from utilizador ";
			$result=mysqli_query($ligax,$query);
			while($registo=mysqli_fetch_assoc($result)){
				$emailBD=$registo['email'];
				$cod_cliente=$registo['cod_cliente'];
				if(($emailBD==$email) && ($cod_cliente!=$_SESSION["cod_cliente"])){
					$flag=true;
					$flag_email=true;
					}		
				}
			if($flag==true){ 
			
				if($flag_password==true) { ?> <script> alert("Password incorreta! Insira a sua password para atualizar os dados do perfil")</script>
			<?php } if($flag_email==true) { ?> <script> alert("Email incorreto! Já existe na BD")</script>  <?php }
			 
			} else {  
				$atualizar="UPDATE utilizador set nome='".$nome."',telemovel='".$telemovel."',email='".$email."',pais='".$pais."',morada='".$morada."',localidade='".$localidade."',codigo_postal='".$codigo_postal."',nif='".$nif."',data_nascimento='".$data_nascimento."',genero='".$genero."' where cod_cliente='".$_SESSION["cod_cliente"]."'";
				echo $atualizar;
				$result=mysqli_query($ligax,$atualizar);
				if($result==1){
					if($_FILES['foto']['error']==0){
					$file_name=$_FILES['foto']['name'];
					$file_form=$_FILES['foto']['type'];
					$file_size=$_FILES['foto']['size'];
					$file_tmp=$_FILES['foto']['tmp_name'];
					$data=base64_encode(file_get_contents($file_tmp));
					$query="update utilizador set nome_foto='".$file_name."',formato_foto='".$file_form."',
			tamanho_foto='".$file_size."',dados_foto='".$data."' where cod_cliente='".$_SESSION["cod_cliente"]."'";	
					$result_up=mysqli_query($ligax,$query);
			}
			
			 ?>
<script> alert("Dados atualizados com sucesso"); window.location="index.php?pagina=perfil"; </script>

<?php 
 	
			} else {
				echo "<p>Dados não inseridos!</p>";?>
				<br><br>
				<a href="index.php" class="form-submit">Voltar ao Menu Principal</a>
				<?php
			}
	}
	}
		
		


		$query="select * from utilizador where cod_cliente='".$_SESSION["cod_cliente"]."'";
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
			unset($_POST['Confirmar']);
	?>
	<!-- Editar Perfil -->
<section class="login_box_area p_120">
	
		<div class="container">
<div class="row">
		<div class="col-lg-12" align="center">
			<div class="login_box_img">

								<!-- Parte direita -->
								<?php if($nome_foto==NULL):?>
						<img class="img-perfil" src="img/perfil.png">
						<?php else: ?>
							<img class="img-perfil	" src="showfile.php?cod_cliente=<?php echo $_SESSION['cod_cliente'];?>">
						<?php endif; ?>

						</div>
					</div>
				</div>
			<div class="row">


					<div class="col-lg-6">
						<div class="login_form_inner reg_form">
							
							<h3>Editar dados pessoais</h3>


								<form class="row login_form" action="" enctype="multipart/form-data" method="POST" id="contactForm">
								<div class="col-md-12 form-group">
									<h4>Nome</h4><input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome ?>"  placeholder="Nome" required="required">
								</div>
								<div class="col-md-12 form-group">
									<h4>Email</h4><input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" placeholder="email" required="required" >
								</div>
								<div class="col-md-12 form-group">
									<h4>País</h4><input type="text" class="form-control" id="pais" name="pais" value="<?php echo $pais ?>" placeholder="País">
								</div>
								<div class="col-md-12 form-group">
									<h4>Morada</h4><input type="text" class="form-control" id="morada" name="morada" value="<?php echo $morada ?>"placeholder="Morada">
								</div>
								<div class="col-md-12 form-group">
									<h4>Telemóvel</h4><input type="text" class="form-control" id="telemovel" name="telemovel" value="<?php echo $telemovel ?>"placeholder="Telemovel" >
								</div>
								<div class="col-md-12 form-group">
									<h4>Localidade</h4><input type="text" class="form-control" id="localidade" name="localidade" value="<?php echo $localidade ?>"placeholder="Localidade">
								</div>
									<div class="col-md-12 form-group">
									<h4>Código Postal</h4><input type="text" class="form-control" id="codigo_postal" name="codigo_postal" value="<?php echo $codigo_postal ?>"placeholder="Codigo Postal" >
								</div>
								<div class="col-md-12 form-group">
									<h4>NIF</h4><input type="text" class="form-control" id="nif" name="nif" value="<?php echo $nif ?>" placeholder="NIF">
								</div>
									<div class="col-md-12 form-group">
									<h4>Data Nascimento</h4><input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo $data_nascimento ?>" placeholder="nascimento" >
								</div>
								<div class="col-md-12 form-group">
									
									F&nbsp;<input type="radio"  id="genero" name="genero" value='F' <?php if($genero=='F') echo "checked"; ?> >
									M&nbsp;<input type="radio"  id="genero" name="genero" value ='M' <?php if($genero=='M') echo "checked"; ?> >
								</div>	
								<div class="col-md-12 form-group">
									<h4>Foto de perfil</h4><input type="file" class="form-control" id="foto" value="<?php echo $foto ?>" name="foto" >
								</div>
								<div class="col-md-12 form-group">
									<input type="password" class="form-control" id="password" name="password" placeholder="Confirmar palavra-passe" required="required" >
								</div>
								<div class="col-md-12 form-group">
									<button type="submit" name="Confirmar" value="Confirmar" class="btn submit_btn">Confirmar</button>
								</div>
						</form>
					</div>
					</div>


					<div class="col-lg-6">
						<div class="login_form_inner reg_form">
							
							<h3>Editar password</h3>

								<form class="row login_form" action="" enctype="multipart/form-data" method="POST" id="contactForm">
								<div class="col-md-12 form-group">
									<input type="password" class="form-control" id="password_antiga" name="password_antiga"  placeholder="Password antiga" required="required">
								</div>
								<div class="col-md-12 form-group">
									<input type="password" class="form-control" id="password_nova" name="password_nova"  placeholder="Password nova" required="required" >
								</div>
								<div class="col-md-12 form-group">
									<input type="password" class="form-control" id="password_novaconfirmar" name="password_novaconfirmar" placeholder="Confirmar nova password" required="required">
								</div>

								<div class="col-md-12 form-group">
									<button type="submit" name="alterar" value="alterar" class="btn submit_btn">Alterar password</button>
								</div>
						</form>
					</div>
					</div>


					</div>
					</div>
				</section>