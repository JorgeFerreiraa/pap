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

		if(isset($_POST['Confirmar'])){
		

		
			$flag=false;
			$flag_pass=false;
				
			$password=$_POST['password'];
			
			$nome_produto=$_POST['nome_produto'];
			$descricao_produto=$_POST['descricao_produto'];
			$preco_produto=$_POST['preco_produto'];
			$iva_produto=$_POST['iva_produto'];
			$promocao_produto=$_POST['promocao_produto'];
			$cod_categoria=$_POST['cod_categoria'];
			$cod_marca=$_POST['cod_marca'];
			$stock_min=$_POST['stock_min'];



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
				
			
			if($flag==true){ 
			
				if($flag_password==true) { ?> <script> alert("Password incorreta! Insira a sua password para atualizar os dados do perfil")</script>
			<?php } 		 
			} else {  
			
				$atualizar="UPDATE artigo set nome_produto='".$nome_produto."',descricao_produto='".$descricao_produto."',preco_produto='".$preco_produto."',iva_produto='".$iva_produto."',promocao_produto='".$promocao_produto."',cod_categoria='".$cod_categoria."',cod_marca='".$cod_marca."',stock_min='".$stock_min."' where cod_produto='".$_GET["cod_produto"]."'";
				echo $atualizar;
				$result=mysqli_query($ligax,$atualizar);
	        if($result==1){
          $file_id=mysqli_insert_id($ligax);//ultimo registo inserido na base de dados
          $_SESSION['file_id']=$file_id;
          $_SESSION['nome_produto']=$nome_produto;
         
        if($_FILES['foto1']['error']==0){

$file_name=$_FILES['foto1']['name'];
$file_type=$_FILES['foto1']['type'];
$file_size=$_FILES['foto1']['size'];
$file_tmp=$_FILES['foto1']['tmp_name'];
$data=base64_encode(file_get_contents($file_tmp));
$query="update artigo set nome_foto='".$file_name."',formato_foto='".$file_type."',
tamanho_foto='".$file_size."',dados_foto='".$data."' where cod_produto='".$file_id."'";
$result_up=mysqli_query($ligax,$query);
} 
        if($_FILES['foto2']['error']==0){

$file_name=$_FILES['foto2']['name'];
$file_type=$_FILES['foto2']['type'];
$file_size=$_FILES['foto2']['size'];
$file_tmp=$_FILES['foto2']['tmp_name'];
$data=base64_encode(file_get_contents($file_tmp));
$query="update artigo set nome_foto2='".$file_name."',formato_foto2='".$file_type."',
tamanho_foto2='".$file_size."',dados_foto2='".$data."' where cod_produto='".$file_id."'";
$result_up=mysqli_query($ligax,$query);
} 
        if($_FILES['foto3']['error']==0){

$file_name=$_FILES['foto3']['name'];
$file_type=$_FILES['foto3']['type'];
$file_size=$_FILES['foto3']['size'];
$file_tmp=$_FILES['foto3']['tmp_name'];
$data=base64_encode(file_get_contents($file_tmp));
$query="update artigo set nome_foto3='".$file_name."',formato_foto3='".$file_type."',
tamanho_foto3='".$file_size."',dados_foto3='".$data."' where cod_produto='".$file_id."'";
$result_up=mysqli_query($ligax,$query);
} 
 

      
       } else {
        echo "<p>Dados não inseridos!</p>";?>
        <br><br>
        <a href="index.php" class="form-submit">Voltar ao Menu Principal</a>
        <?php
      }
	}
	}
		
		


		  $query="select * from artigo where cod_produto='".$_GET["cod_produto"]."'";
      $result=mysqli_query($ligax,$query);
      while($registo=mysqli_fetch_assoc($result)){
        $nome_produto=$registo['nome_produto'];
        $descricao_produto=$registo['descricao_produto'];
        $preco_produto=$registo['preco_produto'];
        $iva_produto=$registo['iva_produto'];
        $promocao_produto=$registo['promocao_produto'];
        $cod_categoriabd=$registo['cod_categoria'];
        $cod_marcabd=$registo['cod_marca'];
        $stock_min=$registo['stock_min'];
       
      } 
  $query1 = "select * from categoria where cod_categoria='".$cod_categoriabd."'" ;
    $result1=mysqli_query($ligax,$query1);
    while($registo1=mysqli_fetch_assoc($result1)){
        $nome_categoria=$registo1['nome_categoria']; 
        
      }
  
      $query2 = "select * from marca where cod_marca='".$cod_marcabd."'" ;
      $result2=mysqli_query($ligax,$query2);
      while($registo2=mysqli_fetch_assoc($result2)){
        $nome_marca=$registo2['nome_marca']; 
        
      }
      $query3 = "select sum(quantidade) as quantidade_total from produto_tamanho_cor where cod_produto='".$_GET["cod_produto"]."'" ;
      $result3=mysqli_query($ligax,$query3);
      while($registo3=mysqli_fetch_assoc($result3)){
        $quantidade1=$registo3['quantidade_total']; 
        
      }
	  $consultar_quantidade = "select sum(prod_quant) as quantidade_total from produto_encomenda where cod_produto='".$_GET["cod_produto"]."'" ;
      $result_quantidade=mysqli_query($ligax,$consultar_quantidade);
      while($registo_quantidade=mysqli_fetch_assoc($result_quantidade)){
        $quantidade_total=$registo_quantidade['quantidade_total']; 
        
      }
  ?>
	<!-- Editar Perfil -->
<section class="login_box_area p_120">
	
		<div class="container">

			<div class="row">


					<div class="col-lg-6">
						<div class="login_form_inner reg_form">
							
							<h3>Editar produto</h3>


								<form class="row login_form" action="" enctype="multipart/form-data" method="POST" id="contactForm">
								<div class="col-md-12 form-group">
									<h4>Nome Produto</h4><input type="text" class="form-control" id="nome_produto" name="nome_produto" value="<?php echo $nome_produto ?>"  placeholder="" required="required">
								</div>
								<div class="col-md-12 form-group">
									<h4>Descrição Produto</h4><input type="text" class="form-control" id="descricao_produto" name="descricao_produto" value="<?php echo $descricao_produto ?>"  placeholder="" required="required">
								</div>
								<div class="col-md-12 form-group">
									<h4>Iva do Produto (%)</h4><input type="text" class="form-control" id="iva_produto" name="iva_produto" value="<?php echo $iva_produto ?>"  placeholder="" required="required">
								</div>
								<div class="col-md-12 form-group">
									<h4>Stock mínimo do produto</h4><input type="text" class="form-control" id="stock_min" name="stock_min" value="<?php echo $stock_min ?>"  placeholder="" required="required">
								</div>
								<div class="col-md-12 form-group">
									<h4>Preço do produto (€)</h4><input type="text" class="form-control" id="preco_produto" name="preco_produto" value="<?php echo $preco_produto ?>"  placeholder="" required="required">
								</div>
								
								<div class="col-md-12 form-group">
                  <div class="default-select" id="default-select">
                <h4>Categoria</h4>
                    
    

    <select name="cod_categoria" required>
   <?php     $consulta_cat="select * from categoria order by nome_categoria";
 
			$result_cat=mysqli_query($ligax,$consulta_cat);
			if($result_cat){
			while($registo_cat=mysqli_fetch_assoc($result_cat)){

				$nome_categoria=$registo_cat['nome_categoria'];
				$cod_categoria=$registo_cat['cod_categoria']; ?> 

          <option value="<?php echo $cod_categoria;?>" <?php if($cod_categoriabd==$cod_categoria) echo "selected"; ?>><?php echo $nome_categoria;?></option>
    <?php } } ?>
                
                </select>
              </div>
                </div> 
				
					
								<div class="col-md-12 form-group">
                  <div class="default-select" id="default-select">
                <h4>Marca</h4>
                    
    

    <select name="cod_marca" required>
   <?php     $consulta_marca="select * from marca order by nome_marca";
 
			$result_marca=mysqli_query($ligax,$consulta_marca);
			if($result_marca){
			while($registo_marca=mysqli_fetch_assoc($result_marca)){

				$nome_marca=$registo_marca['nome_marca'];
				$cod_marca=$registo_marca['cod_marca']; ?> 

          <option value="<?php echo $cod_marca;?>" <?php if($cod_marcabd==$cod_marca) echo "selected"; ?>><?php echo $nome_marca;?></option>
    <?php } } ?>
                
                </select>
              </div>
                </div> 
				
							 
				
				 <div class="col-md-12 form-group">
                  <input type="file" class="form-control" id="foto1"  name="foto1" >
                </div>
                
                  <div class="col-md-12 form-group">
                  <input type="file" class="form-control" id="foto2"  name="foto2" >
                </div>

                  <div class="col-md-12 form-group">
                  <input type="file" class="form-control" id="foto3"  name="foto3" >
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
							
							<h3>Dados do produto</h3>

								         <form class="row login_form" action="" enctype="multipart/form-data" method="POST" id="contactForm">
                <div class="col-md-12 form-group">
                  <?php if($promocao_produto!=0){ ?>
                      <input type="text" style="color:#00FF00 " class="form-control" id="promocaoativa" name="promocaoativa" disabled="disabled" value="Promoção ativa de <?php echo $promocao_produto ?>%"  >
               <?php   } else{ ?>
                      <input type="text" style="color:#ff0000;" class="form-control" id="promocaodesativada" name="promocaodesativada" disabled="disabled" value="Produto Sem Promoção"  >
              <?php } ?>
                  
                </div>
                <div class="col-md-12 form-group">
                    <?php if($quantidade1==$stock_min){ ?>
                    <input type="text"  style="color:#FF4500;" class="form-control" id="ultimasunidades" name="ultimasunidades"  value="Ultimas unidades"  disabled="disabled">
                  
              <?php }else if($quantidade1<$stock_min){ ?>
              
                <input type="text"  style="color:#FF4500;" class="form-control" id="esgotado" name="esgotado"  value="Esgotado" disabled="disabled"  >
                
             
              
              <?php } else{ ?>
              <input type="text" class="form-control" id="emstock" name="emstock"  value="Em Stock"  disabled="disabled">
                
                 
              <?php } ?>
                  
                </div>
               <div class="col-md-12 form-group">
			   <?php if($quantidade_total==0){ ?>
					<input type="text" class="form-control" id="semquantidade" name="semquantidade"  value="Não há encomendas relativas a este produto"  disabled="disabled">
			   <?php }else{ ?>
					<input type="text" class="form-control" id="comquantidade" name="comquantidade"  value="Número de encomendas: <?php echo $quantidade_total ?>"  disabled="disabled">
			   <?php } ?> </div>

           
            </form>
					</div>
					</div>


					</div>
					</div>
					
				</section>