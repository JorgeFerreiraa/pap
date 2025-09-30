
<?php
		if(isset($_POST['submit'])){
	
		$insere="INSERT INTO banner
			(titulo,descricao) VALUES ('".$titulo."','".$descricao."')";
			
	$result=mysqli_query($ligax,$insere);
		
			if($result==1){
				if($_FILES['foto']['error']==0){
$file_id=mysqli_insert_id($ligax);//ultimo registo inserido na base de dados
$file_name=$_FILES['foto']['name'];
$file_type=$_FILES['foto']['type'];
$file_size=$_FILES['foto']['size'];
$file_tmp=$_FILES['foto']['tmp_name'];
$data=base64_encode(file_get_contents($file_tmp));
$query="update banner set nome_foto='".$file_name."',formato_foto='".$file_type."',
tamanho_foto='".$file_size."',dados_foto='".$data."' where cod_banner='".$file_id."'";

$result_up=mysqli_query($ligax,$query);
}  
			echo"<p>Categoria criada com sucesso.</p>";
		
			} else {
				echo "<p>Dados não inseridos!</p>";
				}
			}
				?>	

<section class="login_box_area p_120">
	
		<div class="container">
<div class="row">
		<div class="col-lg-12" align="center">
			<div class="login_box_img">

	<div class="col-lg-6">
						<div class="login_form_inner reg_form">
							
							<h3>Inserir banner</h3>


								<form class="row login_form" action="" enctype="multipart/form-data" method="POST" id="contactForm">
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="titulo" name="titulo"  placeholder="Título do banner" required="required">
								</div>
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="descricao" name="descricao"  placeholder="Descrição" required="required">
								</div>
								<div class="col-md-12 form-group">
									<input type="file" class="form-control" id="foto"  name="foto" >
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