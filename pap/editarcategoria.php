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
	   
	     <?php 
if(isset($_POST['banir'])){
      if(isset($_POST['cod_categoria']))  { $atualizar="UPDATE categoria set ativo=(0) where cod_categoria='".$_POST["cod_categoria"]."'";
  //  echo $atualizar;
    $result=mysqli_query($ligax,$atualizar); }
  }
  if(isset($_POST['desbanir'])){
      if(isset($_POST['cod_categoria']))  { $atualizar="UPDATE categoria set ativo=(1) where cod_categoria='".$_POST["cod_categoria"]."'";
  //  echo $atualizar;
    $result=mysqli_query($ligax,$atualizar); }

    if(isset($_POST['validar'])){
      if(isset($_POST['cod_categoria']))  { $atualizar="UPDATE categoria set ativo=(1) where cod_categoria='".$_POST["cod_categoria"]."'";
  //  echo $atualizar;
    $result=mysqli_query($ligax,$atualizar); }
  }
  }
      ?>
	
	<!-- Botão confirmar -->

	<?php 

		if(isset($_POST['alterar'])){

			$nome_categoria=$_POST['nome'];

				$atualizar="UPDATE categoria set nome_categoria='".$nome_categoria."' where cod_categoria='".$_GET["cod_categoria"]."'";
				echo $atualizar;
				$result=mysqli_query($ligax,$atualizar);
				if($result==1){
					if($_FILES['foto']['error']==0){
					$file_name=$_FILES['foto']['name'];
					$file_form=$_FILES['foto']['type'];
					$file_size=$_FILES['foto']['size'];
					$file_tmp=$_FILES['foto']['tmp_name'];
					$data=base64_encode(file_get_contents($file_tmp));
					$query="update categoria set nome_foto='".$file_name."',formato_foto='".$file_form."',
			tamanho_foto='".$file_size."',dados_foto='".$data."' where cod_categoria='".$_GET["cod_categoria"]."'";	
					$result_up=mysqli_query($ligax,$query);
			} 	
			} 
	}
		
		


		$query="select * from categoria where cod_categoria='".$_GET["cod_categoria"]."'";
			$result=mysqli_query($ligax,$query);
			while($registo=mysqli_fetch_assoc($result)){
				$nome_categoria=$registo['nome_categoria']; 
				$nome_foto=$registo['nome_foto'];
			}	
			unset($_POST['alterar']);
	?>
	<!-- Editar Perfil -->
<section class="login_box_area p_120">
	
		<div class="container">
<div class="row">
		<div class="col-lg-12" align="center">
			<div class="login_box_img">
				<?php if($nome_foto==NULL):?>
						<img class="img-perfil" src="img/perfil.png">
						<?php else: ?>
							<img class="img-perfil	" src="showfilecategoria.php?cod_categoria=<?php echo $_GET['cod_categoria'];?>">
						<?php endif; ?>
				
				<div class="login_form_inner reg_form">
				<form class="row login_form	" enctype="multipart/form-data" method="POST">
					<div class="col-lg-12 form-group">
						<input type="text" class="" name="nome" value="<?php echo $nome_categoria ?> " required="required">
					</div>
					<div class="col-lg-12 form-group">
						<input type="file" class="" name="foto" >
					</div>
				
					<div class="col-md-12 form-group">
									<button class="genric-btn info circle" type="submit" name="alterar" value="alterar" >Alterar</button>

								</div>
				</form>
					</div>
					</div>
				</div></div></div></section>
				<section>
			<div class="row">
<?php

	$consulta = "select * from categoria where cod_categoria_precedente='".$_GET['cod_categoria']."'" ;
	$result = mysqli_query($ligax, $consulta);
			
	if($result) { 

		$num=mysqli_num_rows($result);

		if($num==0){ ?>

				<div class="col-lg-3 col-md-3 col-sm-6">

							<div class="f_p_item">
								<div class="f_p_img">

										<div class="img-perfil">


										<img style="border:block;
		border-radius:50%;
		height:100px;
		width:100px;
		margin:10px auto;
		object-fit:cover;
		object-position:50% 50%" src="showfilecategoria.php?cod_categoria=<?php echo $cod_categoria;?>">
	</div>
									<div class="p_icon">
										<a href="">
											<i class="">✎</i>
										</a>
										<a href="">
										<i class="">+</i>
										</a>
									</div>
								</div>
								<div class="col-md-12 form-group">
									<label>Codigo :</label>
								</div>
								<div class="col-md-12 form-group">
									<label>Nome categoria:</label>
								</div>
							</div>
						</div>



				
					

		<?php } else { ?>

			<?php 
			$query="select * from categoria where cod_categoria_precedente='".$_GET['cod_categoria']."'";
		$result=mysqli_query($ligax,$query);
		while($registo=mysqli_fetch_assoc($result)){
			$cod_categoria=$registo['cod_categoria'];
			$nome_categoria=$registo['nome_categoria'];




				?>


			<div class="col-lg-3 col-md-3 col-sm-6">

							<div class="f_p_item">
								<div class="f_p_img">

										<div class="img-perfil">


										<img style="border:block;
		border-radius:50%;
		height:100px;
		width:100px;
		margin:10px auto;
		object-fit:cover;
		object-position:50% 50%" src="showfilecategoria.php?cod_categoria=<?php echo $cod_categoria;?>">
	</div>
									<div class="p_icon">
										<a href="index.php?pagina=editarcategoria&cod_categoria=<?php echo $cod_categoria; ?>">
											<i class="">✎</i>
										</a>
										<a href="index.php?pagina=inserir_categorias&cat=<?php echo $cod_categoria ?>">
										<i class="">+</i>
										</a>
									</div>
								</div>
								<div class="col-md-12 form-group">
									<label>Codigo :</label>
									<?php echo $cod_categoria; ?>
								</div>
								<div class="col-md-12 form-group">
									<label>Nome categoria:</label>
									<?php echo $nome_categoria; ?>
								</div>
							</div>
						</div>


		<?php } ?>
	</div>
					</div>
				
<?php } ?>	
		<?php } ?>	</section>	<!-- Form subcategorias -->
	
	

	<div>
						<div>
						<h3><CENTER> MARCAS </h3></CENTER>
</div>
</div>

				<section class="login_box_area p_120">
					<div class="container">
						<div class="row">
						<?php 
		$query="select cod_marca from categoria_marca_tamanho where cod_categoria='".$_GET['cod_categoria']."'";
		$result=mysqli_query($ligax,$query);
		while($registo=mysqli_fetch_assoc($result)){
			$cod_marca=$registo['cod_marca'];
	$nome_marca="select nome_marca from marca where cod_marca='".$cod_marca."'";
	$result_nome=mysqli_query($ligax,$nome_marca);
	$registo_nome=mysqli_fetch_assoc($result_nome);
			
?>	
<div class="col-lg-3 col-md-3 col-sm-6">
	<div class="f_p_item">
		<div class="f_p_img">
			<img style="border:block;border-radius:50%;height:100px;width:100px;margin:10px auto;object-fit:cover;object-position:50% 50%" 
			src="showfilemarca.php?cod_marca=<?php echo $cod_marca;?>">
			
		</div>
	</div>
</div>	
<?php } ?>	
</div>
					</div>
				</section>
					

	
							