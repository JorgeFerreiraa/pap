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
		
			if($flag_password==true) echo "Password incorreta! Insira a sua password para atualizar os dados do perfil";
			if($flag_email==true) echo "Email incorreto! Já existe na BD";
		
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
			echo"<p>Parabéns $nome, a edição de perfil foi realizada com sucesso.</p>";
		 	
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
	
?>

<!-- Editar Perfil -->
	<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner reg_form">
						<div class="login_box_img">
							<?php if($nome_foto==NULL):?>
					<img class="img-perfil" src="img/perfil.png">
					<?php else: ?>
						<img class="img-perfil	" src="showfile.php?cod_cliente=<?php echo $_SESSION['cod_cliente'];?>">
					<?php endif; ?>

					</div>
						<h3>Editar dados pessoais</h3>
							<form class="row login_form" action="" enctype="multipart/form-data" method="POST" id="contactForm">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome ?>"  placeholder="Nome" required="required">
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" placeholder="email" required="required" >
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="pais" name="pais" value="<?php echo $pais ?>" placeholder="País">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="morada" name="morada" value="<?php echo $morada ?>"placeholder="Morada">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="telemovel" name="telemovel" value="<?php echo $telemovel ?>"placeholder="Telemovel" >
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="localidade" name="localidade" value="<?php echo $localidade ?>"placeholder="Localidade">
							</div>
								<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="codigo_postal" name="codigo_postal" value="<?php echo $codigo_postal ?>"placeholder="Codigo Postal" >
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nif" name="nif" value="<?php echo $nif ?>" placeholder="NIF">
							</div>
								<div class="col-md-12 form-group">
								<input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo $data_nascimento ?>" placeholder="nascimento" >
							</div>
							<div class="col-md-12 form-group">
								F&nbsp;<input type="radio"  id="genero" name="genero" value='F' <?php if($genero=='F') echo "checked"; ?> >
								M&nbsp;<input type="radio"  id="genero" name="genero" value ='M' <?php if($genero=='M') echo "checked"; ?> >
							</div>	
							<div class="col-md-12 form-group">
								<input type="file" class="form-control" id="foto" value="<?php echo $foto ?>" name="foto" >
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Confirmar palavra-passe" required="required" >
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" name="Confirmar" value="Confirmar" class="btn submit_btn">Confirmar</button>
							</div>
							<div class="col-md-12 form-group">
									<button type="desativar" name="desativar" value="desativar" class="btn submit_btn">Desativar conta</button>
							</div>
						

					</div>
				</div>
			</div>
		</div>
		</form>
	</section>