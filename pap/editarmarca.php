	
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

		if(isset($_POST['alterar'])){

			$nome_marca=$_POST['nome'];

				$atualizar="UPDATE marca set nome_marca='".$nome_marca."' where cod_marca='".$_GET["cod_marca"]."'";
				echo $atualizar;
				$result=mysqli_query($ligax,$atualizar);
				if($result==1){
					if($_FILES['foto']['error']==0){
					$file_name=$_FILES['foto']['name'];
					$file_form=$_FILES['foto']['type'];
					$file_size=$_FILES['foto']['size'];
					$file_tmp=$_FILES['foto']['tmp_name'];
					$data=base64_encode(file_get_contents($file_tmp));
					$query="update marca set nome_foto='".$file_name."',tipo_foto='".$file_form."',
			tamanho_foto='".$file_size."',dados_foto='".$data."' where cod_marca='".$_GET["cod_marca"]."'";	
					$result_up=mysqli_query($ligax,$query);
			} 	
			} 
	}
		
		


		$query="select * from marca where cod_marca='".$_GET["cod_marca"]."'";
			$result=mysqli_query($ligax,$query);
			while($registo=mysqli_fetch_assoc($result)){
				$nome_marca=$registo['nome_marca']; 
				$nome_foto=$registo['nome_foto'];
			}	
			unset($_POST['alterar']);
	?>







<section class="login_box_area p_120">
	
		<div class="container">
<div class="row">
		<div class="col-lg-12" align="center">
			<div class="login_box_img">
							<img class="img-perfil	" src="showfilemarca.php?cod_marca=<?php echo $_GET['cod_marca'];?>">
				
				<div class="login_form_inner reg_form">
				<form class="row login_form	" enctype="multipart/form-data" method="POST">
					<div class="col-lg-12 form-group">
						<input type="text" class="" name="nome" value="<?php echo $nome_marca ?> " required="required">
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
				</div>
			</div>






		

				
					

		
	</div>
					</div>
				</section>