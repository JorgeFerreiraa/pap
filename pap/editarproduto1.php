  <!-- Botão confirmar -->

  <?php 

    if(isset($_POST['Confirmar'])){

        $atualizar="UPDATE artigo set nome_produto='".$nome_produto."',descricao_produto='".$descricao_produto."',preco_produto='".$preco_produto."',iva_produto='".$iva_produto."',promocao_produto='".$promocao_produto."',cod_categoria='".$cod_categoria."',cod_marca='".$cod_marca."',stock_min='".$stock_min."' where cod_produto='".$_GET["cod_produto"]."'";
        echo $atualizar;
        $result=mysqli_query($ligax,$atualizar);
         if($result==1){
          $file_id=mysqli_insert_id($ligax);//ultimo registo inserido na base de dados
          $_SESSION['file_id']=$file_id;
          $_SESSION['nome_produto']=$nome_produto;
          $_SESSION['sub_cat']=$sub_cat;
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
    
    


    $query="select * from artigo where cod_produto='".$_GET["cod_produto"]."'";
      $result=mysqli_query($ligax,$query);
      while($registo=mysqli_fetch_assoc($result)){
        $nome_produto=$registo['nome_produto'];
        $descricao_produto=$registo['descricao_produto'];
        $preco_produto=$registo['preco_produto'];
        $iva_produto=$registo['iva_produto'];
        $promocao_produto=$registo['promocao_produto'];
        $cod_categoria=$registo['cod_categoria'];
        $cod_marca=$registo['cod_marca'];
        $stock_min=$registo['stock_min'];
       
      } 
  $query1 = "select * from categoria where cod_categoria='".$cod_categoria."'" ;
      $result1=mysqli_query($ligax,$query1);
      while($registo1=mysqli_fetch_assoc($result1)){
        $nome_categoria=$registo1['nome_categoria']; 
        
      }
  
      $query2 = "select * from marca where cod_marca='".$cod_marca."'" ;
      $result2=mysqli_query($ligax,$query2);
      while($registo2=mysqli_fetch_assoc($result2)){
        $nome_marca=$registo2['nome_marca']; 
        
      }
      $query3 = "select sum(quantidade) as quantidade_total from produto_tamanho_cor where cod_produto='".$_GET["cod_produto"]."'" ;
      $result3=mysqli_query($ligax,$query3);
      while($registo3=mysqli_fetch_assoc($result3)){
        $quantidade1=$registo3['quantidade_total']; 
        echo $quantidade1;
      }
      
  ?>
  <!-- Editar Perfil -->
<section class="login_box_area p_120">
  
    <div class="container">
<div class="row">
    <div class="col-lg-12" align="center">      
     
          </div>
        </div>
      <div class="row">


          <div class="col-lg-6">
            <div class="login_form_inner reg_form">
              
              <h3>Editar produto</h3>


                <form class="row login_form" action="" enctype="multipart/form-data" method="POST" id="contactForm">
                <div class="col-md-12 form-group">
                  <h4>Nome Produto</h4><input type="text" class="form-control" id="nome_produto" name="nome_produto" value="<?php echo $nome_produto ?>"  placeholder="Nome Produto" required="required">
                </div>
                <div class="col-md-12 form-group">
                  <h4>Descrição do Produto</h4><input type="text" class="form-control" id="descricao_produto" name="descricao_produto" value="<?php echo $descricao_produto ?>" placeholder="Descrição do Produto">
                </div>
                <div class="col-md-12 form-group">
                  <h4>Iva do Produto (%)</h4><input type="text" class="form-control" id="pais" name="pais" value="<?php echo $iva_produto ?>" placeholder="Iva do Produto (%)">
                </div>
                <div class="col-md-12 form-group">
                  <h4>Stock mínimo do produto</h4><input center type="text" class="form-control" id="stock_min" name="stock_min" value="<?php echo $stock_min ?>"placeholder="Stock mínimo do produto">
                </div>
                <div class="col-md-12 form-group">
                  <h4>Preço do produto (€)</h4><input type="text" class="form-control" id="preco_produto" name="preco_produto" value="<?php echo $preco_produto ?>"placeholder="Preço do Produto (€)" >
                </div>
               <!-- -------Apresentar categorias----------  -->      
<div class="col-md-12 form-group">
                  <div class="default-select" id="default-select">
                <h4>Categoria</h4>
                      <?php 
    
          $query1="select cod_categoria from categoria";
      $result1=mysqli_query($ligax,$query1);
    if($result1) { ?>
    <select name="categoria" required>
    <option value="<?php $cod_categoria ?>"><?php echo $nome_categoria;?></option>
    <?php while($registo1=mysqli_fetch_assoc($result1)){
         $consulta1="select * from categoria where cod_categoria='".$registo1['cod_categoria']."'";
         $result_consulta1=mysqli_query($ligax,$consulta1);
           $registo_consulta1=mysqli_fetch_assoc($result_consulta1);

        $nome_categoria=$registo_consulta1['nome_categoria'];
            $cod_categoria=$registo_consulta1['cod_categoria']; ?> 
    ?>
          <option value="<?php echo $cod_categoria;?>"><?php echo $nome_categoria;?></option>
    <?php } } ?>
                
                </select>
              </div>
                </div>
<!-- Apresentar marcas -->
              <div class="col-md-12 form-group">
                  <div class="default-select" id="default-select">
                <h4>Marca</h4>
                      <?php 
    
          $query="select cod_marca from marca";
      $result=mysqli_query($ligax,$query);
    if($result) { ?>
    <select name="marca" required>
    <option value="<?php $cod_marca ?>"><?php echo $nome_marca ?></option>
    <?php while($registo=mysqli_fetch_assoc($result)){
         $consulta="select * from marca where cod_marca='".$registo['cod_marca']."'";
         $result_consulta=mysqli_query($ligax,$consulta);
           $registo_consulta=mysqli_fetch_assoc($result_consulta);

        $nome_marca=$registo_consulta['nome_marca'];
            $cod_marca=$registo_consulta['cod_marca']; ?> 
   
          <option value="<?php echo $cod_marca;?>"><?php echo $nome_marca;?></option>
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
                  <input type="submit" name="Confirmar" value="Confirmar" class="">
                </div>
            </form>
          </div>
          </div>


          <div class="col-lg-6">
            <div class="login_form_inner reg_form">
              
              <h3>Dados Produto</h3>

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
               

           
            </form>
          </div>
          </div>


          </div>
          </div>
        </section>