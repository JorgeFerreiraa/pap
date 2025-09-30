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


	<!-- Botão confirmar -->

	<?php 

		if(isset($_POST['submit'])){
		

		
			$flag=false;
		
			$nome_categoria=$_POST['nome_categoria'];
			$sub_cat=$_POST['sub_cat'];
			$tamanho=$_POST['tamanho'];

	
			/* Verificar se o email já existe */
		$query="select nome_categoria from categoria";
		$result=mysqli_query($ligax,$query);
		while($registo=mysqli_fetch_assoc($result)){
			$nome_categoriaBD=$registo['nome_categoria'];
			if($nome_categoriaBD==$nome_categoria){
				$flag=true;
			}		
		}

			if($flag==true){ ?> <script> alert("Já existe uma categoria com esse nome")</script> <?php
			 
			} else {  
				$insere="INSERT INTO categoria (nome_categoria, cod_categoria_precedente) VALUES ('".$nome_categoria."','".$sub_cat."')";
				$result=mysqli_query($ligax,$insere);
				if($result==1){
					$file_id=mysqli_insert_id($ligax);//ultimo registo inserido na base de dados
				if($_FILES['foto']['error']==0){

$file_name=$_FILES['foto']['name'];
$file_type=$_FILES['foto']['type'];
$file_size=$_FILES['foto']['size'];
$file_tmp=$_FILES['foto']['tmp_name'];
$data=base64_encode(file_get_contents($file_tmp));
$query="update categoria set nome_foto='".$file_name."',formato_foto='".$file_type."',
tamanho_foto='".$file_size."',dados_foto='".$data."' where cod_categoria='".$file_id."'";
echo $query;
$result_up=mysqli_query($ligax,$query);
}  
			
			 ?>
<script> alert("Dados atualizados com sucesso"); </script>

<?php 
//Insere na tabela categoria_marca os códigos das marcas e as categorias respetivas
			if (isset($_POST['cod_marca'])) {
				foreach ($_POST['cod_marca'] as &$value) {
					$insere="INSERT INTO categoria_marca_tamanho(cod_categoria,cod_marca,cod_categoria_tamanho) VALUES ('".$file_id."','".$value."','".$tamanho."')";
					$result=mysqli_query($ligax,$insere);
				}
			}
			




			} else {
				echo "<p>Dados não inseridos!</p>";?>
				<br><br>
				<a href="index.php" class="form-submit">Voltar ao Menu Principal</a>
				<?php
			}
	}
	}  
			unset($_POST['submit']);
	?>
	<!-- Editar Perfil -->
<section class="login_box_area p_120">
	
		<div class="container">
<div class="row">
		<div class="col-lg-12" align="center">
			<div class="login_box_img">

	<div class="col-lg-6">
						<div class="login_form_inner reg_form">
							
							<h3>Criar categoria</h3>


								<form class="row login_form" action="" enctype="multipart/form-data" method="POST" id="contactForm">
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="nome_categoria" name="nome_categoria"  placeholder="Nome da categoria" required="required">
								</div>
								<div class="form-select" id="default-select">
						<?php if(isset($_GET["cat"])){ 
	$consulta = "select * from categoria" ;
	$result = mysqli_query($ligax, $consulta);
	if($result) { ?>
	<?php	while($registo=mysqli_fetch_assoc($result)){
			$cod_categoria=$registo['cod_categoria'];
			$nome_categoria=$registo['nome_categoria'];
			 if($_GET["cat"]==$cod_categoria){ ?>
			<input type="hidden" name="sub_cat" value="<?php echo $cod_categoria ?>"> <?php echo $nome_categoria; ?>
			<?php  } } } }?></div>
	


										<div class="col-md-12 form-group">
									<div class="default-select" id="default-select">

										<?php 
	$consulta = "select * from categoria_tamanho" ;
	$result = mysqli_query($ligax, $consulta);
	if($result) { ?>
	<select name="tamanho">
	<option value="0"><?php echo "Escolha o tipo de tamanho";?></option>
	<?php	while($registo=mysqli_fetch_assoc($result)){
			$cod_categoria_tamanho=$registo['cod_categoria_tamanho'];
			$nome_categoria_tamanho=$registo['nome_categoria_tamanho'];
	?>
				<option name="tamanho" value="<?php echo $cod_categoria_tamanho;?>"><?php echo $nome_categoria_tamanho;?></option>
	<?php } } ?>
								
								</select>
							</div>
								</div>


									
								<div class="col-md-12 form-group">
									<input type="file" class="form-control" id="foto"  name="foto" >
								</div>
<!-- Apresentar marcas -->

<?php

				$query="select * from marca";
				$result=mysqli_query($ligax,$query);
				if($result) { 
				while($registo=mysqli_fetch_assoc($result)){
					?> <div> <?php
					$nome_marca=$registo['nome_marca'];
					$cod_marca=$registo['cod_marca']; ?> 
					<input type="checkbox" name="cod_marca[]" value="<?php echo $cod_marca; ?>">

					<label><h5><?php echo $nome_marca; ?></h5></label>
					&nbsp;&nbsp;&nbsp;&nbsp;
				<?php 
					?></div> <?php } 
				}
				?>
<!-- -----------------  -->				
								
								
								
								
								
								
								
								
								<div class="col-md-12 form-group">
									<button type="submit" name="submit" value="Confirmar" class="btn submit_btn">Confirmar</button>
								</div>
						</form>
					</div>
					</div>

						</div>
					</div>
				</div>
			
					</div>
					</div>
				</section>