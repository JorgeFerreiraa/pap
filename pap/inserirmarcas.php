
<?php
		if(isset($_POST['submit'])){
			$flag=false;


			$nome_marca=$_POST['nome_marca'];
			
		/* Verificar se o login já existe */
		$query="select nome_marca from marca";
		$result=mysqli_query($ligax,$query);
		while($registo=mysqli_fetch_assoc($result)){
			$nome_marcaBD=$registo['nome_marca'];
			if($nome_marcaBD==$nome_marca){
				$flag=true;
			}		
		}
	
		
		/* Existiu um erro */
		if($flag==true){  echo "Categoria já existe!!!"; 
	?>
	
		<section class="login_box_area p_120">
	
		<div class="container">
<div class="row">
		<div class="col-lg-12" align="center">
			<div class="login_box_img">

	<div class="col-lg-6">
						<div class="login_form_inner reg_form">
							
							<h3>Inserir marca</h3>


								<form class="row login_form" action="" enctype="multipart/form-data" method="POST" id="contactForm">
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="nome_marca" name="nome_marca"  placeholder="Nome da marca" required="required">
								</div>
								<div class="col-md-12 form-group">
									<input type="file" class="form-control" id="foto"  name="foto" >
								</div>
								<div class="col-md-12 form-group">

									<a href="index.php?pagina=listarmarcas">Ver marcas existentes</a>
								</div>
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
				
				<?php } else { 
		
		$insere="INSERT INTO marca
			(nome_marca) VALUES ('".$nome_marca."')";
			echo $insere;
	$result=mysqli_query($ligax,$insere);
		
			if($result==1){
				if($_FILES['foto']['error']==0){
$file_id=mysqli_insert_id($ligax);//ultimo registo inserido na base de dados
$file_name=$_FILES['foto']['name'];
$file_type=$_FILES['foto']['type'];
$file_size=$_FILES['foto']['size'];
$file_tmp=$_FILES['foto']['tmp_name'];
$data=base64_encode(file_get_contents($file_tmp));
$query="update marca set nome_foto='".$file_name."',tipo_foto='".$file_type."',
tamanho_foto='".$file_size."',dados_foto='".$data."' where cod_marca='".$file_id."'";
echo $query;
$result_up=mysqli_query($ligax,$query);
}  
			echo"<p>Categoria criada com sucesso.</p>";
		
			} else {
				echo "<p>Dados não inseridos!</p>";
				}
				?>	
		<section class="login_box_area p_120">
	
		<div class="container">
<div class="row">
		<div class="col-lg-12" align="center">
			<div class="login_box_img">

	<div class="col-lg-6">
						<div class="login_form_inner reg_form">
							
							<h3>Inserir marca</h3>


								<form class="row login_form" action="" enctype="multipart/form-data" method="POST" id="contactForm">
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="nome_marca" name="nome_marca"  placeholder="Nome da marca" required="required">
								</div>
								<div class="col-md-12 form-group">
									<input type="file" class="form-control" id="foto"  name="foto" >
								</div>
								<div class="col-md-12 form-group">

									<a href="index.php?pagina=listarmarcas">Ver marcas existentes</a>
								</div>
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
				<?php
		}
	} else {
		?>
		
		<section class="login_box_area p_120">
	
		<div class="container">
<div class="row">
		<div class="col-lg-12" align="center">
			<div class="login_box_img">

	<div class="col-lg-6">
						<div class="login_form_inner reg_form">
							
							<h3>Inserir marca</h3>


								<form class="row login_form" action="" enctype="multipart/form-data" method="POST" id="contactForm">
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="nome_marca" name="nome_marca"  placeholder="Nome da marca" required="required">
								</div>
								<div class="col-md-12 form-group">
									<input type="file" class="form-control" id="foto"  name="foto" >
								</div>
								<div class="col-md-12 form-group">

									<a href="index.php?pagina=listarmarcas">Ver marcas existentes</a>
								</div>
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
	<?php } ?>