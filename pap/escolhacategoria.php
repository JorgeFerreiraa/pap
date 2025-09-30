  

  

<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content text-center">
          <h2>ESCOLHA CATEGORIA</h2>
          <div class="page_link">
            <a href="index.php">Home</a>
          
          </div>
        </div>
      </div>
    </div>
  </section>
      

<?php
if(isset($_GET["cod_categoria"])){


  $consulta = "select * from categoria where cod_categoria_precedente='".$_GET["cod_categoria"]."'";
} else {

  $consulta = "select * from categoria where cod_categoria_precedente=0";
}

  $result = mysqli_query($ligax, $consulta);
      $num=mysqli_num_rows($result);
      if($num==0){
        ?>
   <section class="login_box_area p_120">
  
    <div class="container">
<div class="row">
    <div class="col-lg-12" align="center">
      <div class="login_box_img">

  <div class="col-lg-6">
            <div class="login_form_inner reg_form">
              
              <h3>Inserir produto</h3>


                <form class="row login_form" action="index.php?pagina=inserir_tamanhos" enctype="multipart/form-data" method="POST" id="contactForm">
                  <div class="form-select" id="default-select">
            <?php if(isset($_GET["cod_categoria"])){ 
  $consulta = "select * from categoria" ;
  $result = mysqli_query($ligax, $consulta);
  if($result) { ?>
  <?php while($registo=mysqli_fetch_assoc($result)){
      $cod_categoria=$registo['cod_categoria'];
      $nome_categoria=$registo['nome_categoria'];
       if($_GET["cod_categoria"]==$cod_categoria){ ?>
        <label><h5>Categoria:</label>
      <input type="hidden" name="sub_cat" value="<?php echo  $cod_categoria ?>"> <?php echo $nome_categoria; ?> </h5>
      <?php  } } } }?></div>
                <div class="col-md-12 form-group">
                  <input type="text" class="form-control" id="nome_produto" name="nome_produto"  placeholder="Nome do produto" required="required">
                </div>
                 <div class="col-md-12 form-group">
                  <textarea  class="form-control" id="descricao" name="descricao"  placeholder="Descrição do produto" required="required"></textarea>
                </div>
                  
              <div class="col-md-12 form-group">
                  <input type="number" step="1" class="form-control" id="iva_produto" name="iva_produto"  placeholder="Iva do produto (%)" required="required">
                </div>
                
                <div class="col-md-12 form-group">
                  <input type="number" step="1" class="form-control" id="stock_min" name="stock_min"  placeholder="Stock mínimo do produto" required="required">
                </div>

                    <div class="col-md-12 form-group">
                  <input type="number" step="0.01" class="form-control" id="preco" name="preco"  placeholder="Preço do produto (€)" required="required">
                </div>

<!-- Apresentar marcas -->
              <div class="col-md-12 form-group">
                  <div class="default-select" id="default-select">

                      <?php 
    
          $query="select cod_marca from categoria_marca_tamanho where cod_categoria='".$_GET["cod_categoria"]."'";
      $result=mysqli_query($ligax,$query);
    if($result) { ?>
    <select name="marca" required>
    <option value="0"><?php echo "Escolha a marca";?></option>
    <?php while($registo=mysqli_fetch_assoc($result)){
         $consulta="select * from marca where cod_marca='".$registo['cod_marca']."'";
         $result_consulta=mysqli_query($ligax,$consulta);
           $registo_consulta=mysqli_fetch_assoc($result_consulta);

        $nome_marca=$registo_consulta['nome_marca'];
            $cod_marca=$registo_consulta['cod_marca']; ?> 
    ?>
          <option value="<?php echo $cod_marca;?>"><?php echo $nome_marca;?></option>
    <?php } } ?>
                
                </select>
              </div>
                </div>  



<!-- -----------------  -->     
                  


                  <div class="col-md-12 form-group">
                  <input type="file" class="form-control" id="foto1"  name="foto1" required>
                </div>
                
                  <div class="col-md-12 form-group">
                  <input type="file" class="form-control" id="foto2"  name="foto2" >
                </div>

                  <div class="col-md-12 form-group">
                  <input type="file" class="form-control" id="foto3"  name="foto3" >
                </div>


                <div class="col-md-5"><h5>
<label> Personalizável: 
              <input type="checkbox" name="personalizavel" value="1">  </label></div>

                <div class="col-md-12 form-group">
                  
                  <button  type="submit" name="submit" value="submit" class="btn submit_btn">Confirmar</button>
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
        
        <!---- ta ta atatatta --->

      <?php }

      else { ?>
        <section class="login_box_area p_120">

    <div class="container">
      <div class="row">
        <?php 
          while($registo=mysqli_fetch_assoc($result)){
      $cod_categoria=$registo['cod_categoria'];
      $nome_categoria=$registo['nome_categoria'];
      $ativo=$registo['ativo'];

      
?>
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="f_p_item">
                <div class="f_p_img">
                  <div>
                  <h3><?php echo $nome_categoria ?></h3>
                </div>
                    <div class="img-perfil"><img style="border:block;
    border-radius:50%;
    height:100px;
    width:100px;
    margin:10px auto;
    object-fit:cover;
    object-position:50% 50%" src="showfilecategoria.php?cod_categoria=<?php echo $cod_categoria;?>"></div>
                </div>
                
              <div><br></div>
                <div class="visit">
                      <form  action="" method="POST">
                      <input type="hidden" name="cod_categoria" value="<?php echo $cod_categoria; ?>">
                     <a class="genric-btn info" href="index.php?pagina=escolhacategoria&cod_categoria=<?php echo $cod_categoria; ?>">
                      ✔
                    </a>
                  </form></div>
              </div>
            </div>
<?php } } ?>
      </div>





      
          </div>
        </section>