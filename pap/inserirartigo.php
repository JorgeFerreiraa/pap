<?php 
	if(isset($_POST['submit'])){
		$nome_artigo=$_POST['nome_produto'];
		$preco_produto=$_POST['preco_produto'];
		$iva_produto=$_POST['iva_produto'];
		$stock_min=$_POST['stock_min'];
		$stock=$_POST['stock'];

	}
?>

<section class="login_box_area p_120">
	
		<div class="container">
<div class="row">
		<div class="col-lg-12" align="center">
			<div class="login_box_img">

	<div class="col-lg-6">
						<div class="login_form_inner reg_form">
							
							<h3>Adicionar artigo</h3>
							<form class="row login_form" action="" enctype="multipart/form-data" method="POST" id="contactForm">
							

								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="nome_artigo" name="nome_artigo"  placeholder="Nome do artigo" required="required">
								</div>
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="preco_produto" name="preco_produto"  placeholder="Preço do artigo" required="required">
								</div>
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="iva_produto" name="iva_produto"  placeholder="Iva do artigo" required="required">
								</div>
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="stock" name="stock"  placeholder="Stock do artigo" required="required">
								</div>
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="stock_min" name="stock_min"  placeholder="Stock mínimo" required="required">
								</div>
								<div class="col-md-12 form-group">
									<div class="default-select" id="default-select">

										<?php 
	$consulta = "select * from categoria" ;
	$result = mysqli_query($ligax, $consulta);
	if($result) { ?>
	<select name="categoria">
	<option value="0"><?php echo "Escolha a categoria";?></option>
	<?php	while($registo=mysqli_fetch_assoc($result)){
			$cod_categoria=$registo['cod_categoria'];
			$nome_categoria=$registo['nome_categoria'];
	?>
				<option value="<?php echo $cod_categoria;?>"><?php echo $nome_categoria;?></option>
	<?php } } ?>
								
								</select>
							</div>
								</div>	
										<div class="col-md-12 form-group">
									<div >

										<?php 
	$consulta = "select * from marca" ;
	$result = mysqli_query($ligax, $consulta);
	if($result) { ?>
	
	<?php	while($registo=mysqli_fetch_assoc($result)){
			$cod_marca=$registo['cod_marca'];
			$nome_marca=$registo['nome_marca'];
	?>
					<img style="border:block;
		border-radius:50%;
		height:100px;
		width:100px;
		margin:10px auto;
		object-fit:cover;
		object-position:50% 50%" src="showfilemarca.php?cod_marca=<?php echo $cod_marca;?>">
				
	<?php } } ?>
								
							</div>
								</div>	
								<div class="col-md-12 form-group">
									<input type="file" class="form-control" id="foto1"  name="foto" >
								</div>
								<div class="col-md-12 form-group">
									<input type="file" class="form-control" id="foto2"  name="foto" >
								</div>
								<div class="col-md-12 form-group">
									<input type="file" class="form-control" id="foto3"  name="foto" >
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



