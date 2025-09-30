  <?php 

    if(isset($_POST['submit'])){
    
    
      $nome_produto=$_POST['nome_produto'];
      $sub_cat=$_POST['sub_cat'];
      $iva_produto=$_POST['iva_produto'];
      $stock_min=$_POST['stock_min'];
      $marca=$_POST['marca'];
      $preco=$_POST['preco'];
      $descricao=$_POST['descricao'];   
   if(isset($_POST['personalizavel'])){
        
        $personalizavel=$_POST['personalizavel'];
       
      }else  $personalizavel=0;

        $insere="INSERT INTO artigo (nome_produto,  cod_categoria, iva_produto, stock_min, cod_marca, preco_produto, descricao_produto, personalizavel ) 
        VALUES ('".$nome_produto."','".$sub_cat."','".$iva_produto."','".$stock_min."','".$marca."','".$preco."','".$descricao."','".$personalizavel."')";
        echo $insere;
        $result=mysqli_query($ligax,$insere);
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
 

      
       }

}


if(isset($_POST['editar'])){
  
  
        
        $cod_cor=$_POST['cod_cor'];
        
        $tamanho=$_POST['tamanho'];
        $quantidade=$_POST['quantidade'];
        
        
        
      $update="update  produto_tamanho_cor set cod_cor='".$cod_cor."', cod_produto='".$_SESSION['file_id']."', tamanho='".$tamanho."',
      quantidade='".$quantidade."' where codigo='".$_POST['codigo']."'";
      
      $result=mysqli_query($ligax,$update);
      
      if($result==1){
        
      echo"<p>Parabéns, a alteração de produto foi realizada com sucesso.</p>";
    
      } else {
        echo "<p>Dados não atualizados!</p>";
        
      }
  
}


if(isset($_POST['inserir'])){
        
        $cod_cor=$_POST['cod_cor'];
        
        $tamanho=$_POST['tamanho'];
        $quantidade=$_POST['quantidade'];
        
        
        
      $insere="INSERT INTO produto_tamanho_cor
      (cod_cor, cod_produto, tamanho,quantidade) VALUES ('".$cod_cor."', '".$_SESSION['file_id']."','".$tamanho."','".$quantidade."')";
      $result=mysqli_query($ligax,$insere);
      echo $insere;
      if($result==1){
        
      echo"<p>Parabéns, a inserção de produto foi realizada com sucesso.</p>";
    
      } else {
        echo "<p>Dados não inseridos!</p>";
        
      }
    }

?>
      


        
        <!---- ta ta atatatta --->

<section class="login_box_area p_120">
  
    <div class="container">
<div class="row">
    <div class="col-lg-12" align="center">
      <div class="login_box_img">

  <div class="col-lg-6">
            <div class="login_form_inner reg_form">
              
              <h3>Inserir tamanhos</h3>


                <form class="row login_form" action="" enctype="multipart/form-data" method="POST" id="contactForm">
                   

                    <div class="col-md-12 form-group">
                      <label>
                        Produto: <?php echo $_SESSION['nome_produto']; ?>
                      </label>
                    </div>
                    <div></div>
                    <div class="default-select" id="default-select">
                      <?php 
  
        $query="select cod_categoria_tamanho from categoria_marca_tamanho where cod_categoria='".$_SESSION['sub_cat']."'";
      
    $resultado1=mysqli_query($ligax,$query);

  if($resultado1) {
  while($registo_consulta=mysqli_fetch_assoc($resultado1)){
    
      $cod_tamanho=$registo_consulta['cod_categoria_tamanho'];
  }
   

    }

         if($cod_tamanho==1) { ?>
              <select name="tamanho">
                <option value=""><?php echo "Tamanho";?></option>
              <option value="30"><?php echo "30";?></option>
              <option value="31"><?php echo "31";?></option>
              <option value="32"><?php echo "32";?></option>
              <option value="33"><?php echo "33";?></option>
              <option value="34"><?php echo "34";?></option>
              <option value="35"><?php echo "35";?></option>
              <option value="36"><?php echo "36";?></option>
              <option value="37"><?php echo "37";?></option>
              <option value="38"><?php echo "38";?></option>
              <option value="39"><?php echo "39";?></option>
              <option value="40"><?php echo "40";?></option>
              <option value="41"><?php echo "41";?></option>
              <option value="42"><?php echo "42";?></option>
              <option value="43"><?php echo "43";?></option>
              <option value="44"><?php echo "44";?></option>
              <option value="45"><?php echo "45";?></option>
              </select>
            <?php }




    if($cod_tamanho==2) { ?>
              <select name="tamanho">
              <option value=""><?php echo "Tamanho";?></option>
              <option value="S"><?php echo "S";?></option>
              <option value="M"><?php echo "M";?></option>
              <option value="L"><?php echo "L";?></option>
              <option value="XL"><?php echo "XL";?></option>
              <option value="XXL"><?php echo "XXL";?></option>
              </select>
            <?php }
   


            if($cod_tamanho==3) { ?>
              <select name="tamanho">
                <option value=""><?php echo "Tamanho";?></option>
              <option value="7.5"><?php echo "7.5";?></option>
              <option value="7.6"><?php echo "7.6";?></option>
              <option value="7.75"><?php echo "7.75";?></option>
              <option value="7.8"><?php echo "7.8";?></option>
              <option value="7.81"><?php echo "7.81";?></option>
              <option value="7.87"><?php echo "7.87";?></option>
              <option value="7.875"><?php echo "7.875";?></option>
              <option value="7.88"><?php echo "7.88";?></option>
              <option value="8.0"><?php echo "8.0";?></option>
              <option value="8.125"><?php echo "8.125";?></option>
              <option value="8.13"><?php echo "8.13";?></option>
              <option value="8.18"><?php echo "8.18";?></option>
              <option value="8.19"><?php echo "8.19";?></option>
              <option value="8.25"><?php echo "8.25";?></option>
              <option value="8.3"><?php echo "8.3";?></option>
              <option value="8.375"><?php echo "8.375";?></option>
              <option value="8.38"><?php echo "8.38";?></option>
              <option value="8.5"><?php echo "8.5";?></option>
              <option value="8.75"><?php echo "8.75";?></option>
              <option value="9.5"><?php echo "9.5";?></option>
              <option value="9.8"><?php echo "9.8";?></option>
              <option value="10"><?php echo "10";?></option>

              </select>
 <?php }

  if($cod_tamanho==4) { ?>
              <select name="tamanho">
                <option value=""><?php echo "Tamanho";?></option>
              <option value="50mm"><?php echo "50mm";?></option>
              <option value="51mm"><?php echo "51mm";?></option>
              <option value="52mm"><?php echo "52mm";?></option>
              <option value="53mm"><?php echo "53mm";?></option>
              <option value="54mm"><?php echo "54mm";?></option>
              <option value="55mm"><?php echo "55mm";?></option>
              <option value="56mm"><?php echo "56mm";?></option>

              </select>
 <?php }
 if($cod_tamanho==5) { ?>
              <select name="tamanho">
                <option value=""><?php echo "Tamanho";?></option>
              <option value="5.0"><?php echo "5.0";?></option>
              <option value="5.25"><?php echo "5.25";?></option>
              <option value="5.5"><?php echo "5.5";?></option>
              <option value="5.75"><?php echo "5.75";?></option>
              <option value="5.8"><?php echo "5.8";?></option>
              <option value="6.1"><?php echo "6.0";?></option>
              <option value="8.75"><?php echo "8.75";?></option>
              <option value="129mm"><?php echo "129mm";?></option>
              <option value="144mm"><?php echo "144mm";?></option>
              <option value="149mm"><?php echo "149mm";?></option>
              <option value="151mm"><?php echo "151mm";?></option>
              <option value="159mm"><?php echo "159mm";?></option>
              <option value="169mm"><?php echo "169mm";?></option>

              </select>
 <?php }
 if($cod_tamanho==6) { ?>
              <select name="tamanho">
                <option value=""><?php echo "Tamanho";?></option>
              <option value="1.0"><?php echo "1.0";?></option>
              <option value="7/8"><?php echo "7/8";?></option>
              <option value="11/4"><?php echo "11/4";?></option>
              <option value="11/2"><?php echo "11/2";?></option>


              </select>
 <?php }
    ?>

 </div>

  <div class="default-select" id="default-select">
            <?php
            $query="select * from cor";
            $result=mysqli_query($ligax,$query);
            if($result) { ?>
              <select name="cod_cor">
              <option value="0"><?php echo "Cor";?></option>
              <?php
              while($registo=mysqli_fetch_assoc($result)){
                $nome_cor=$registo['nome_cor'];
                $cod_cor=$registo['cod_cor']; ?>
                <option value="<?php echo $cod_cor; ?>"><?php echo $nome_cor; ?></option>
              <?php } ?>
              </select>
            <?php }
            ?> <br><br></div>
            
            <div class="col-md-12 form-group">
            <label for="">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" required="required" />
            </div><br><br>
            
              
            <div class="col-md-12 form-group">
                  
                  <button  type="submit" name="inserir" value="inserir" class="btn submit_btn">Confirmar</button>
                </div>
                    
      </form>  



          </div>
          </div>

            </div>
          </div>
        </div>
      
          </div>





          <?php


//EDITAR TAMANHOS, CORES E STOKS APÓS INSERÇÃO  
  if(isset($_POST['editar'])){
    $cod_cor=$_POST['cod_cor'];
    $tamanho=$_POST['tamanho'];
    $quantidade=$_POST['quantidade'];
    
    //VERIFICA SE A COR E TAMANHO JÁ EXISTEM NA BD NO RESPETIVO PRODUTO         
    $consulta_tam_cor="select count(*) as existe from produto_tamanho_cor
    where cod_cor='".$cod_cor."' and tamanho='".$tamanho."' 
    and cod_produto='".$_SESSION['file_id']."' and codigo!='".$_POST['codigo']."'";
    
    //echo $consulta_tam_cor;
    $resultado_tam_cor=mysqli_query($ligax,$consulta_tam_cor); 
    if($resultado_tam_cor) { 
    $nr=mysqli_fetch_assoc($resultado_tam_cor);

    if($nr["existe"]!=0){ 
    //Já existe com outro código o tamanho e cor - acrescentar 
      $acresc="update produto_tamanho_cor set quantidade=quantidade+".$quantidade." where cod_cor='".$cod_cor."' and tamanho='".$tamanho."' 
      and cod_produto='".$_SESSION['file_id']."' and codigo!='".$_POST['codigo']."' ";
      //apagar registo antigo porque o quantidade foi acrescentado a outro já existente
      $delete="delete from produto_tamanho_cor where codigo='".$_POST['codigo']."'";
      $result_delete=mysqli_query($ligax,$delete);
    } else {
    // Não existe
      $acresc="update  produto_tamanho_cor set cod_cor='".$cod_cor."', cod_produto='".$_SESSION['file_id']."', tamanho='".$tamanho."',
quantidade='".$quantidade."' where codigo='".$_POST['codigo']."'";
    }
    $result=mysqli_query($ligax,$acresc);
  }
}     



if(isset($_SESSION['file_id'])) {
$select = "select * from produto_tamanho_cor where cod_produto='".$_SESSION['file_id']."'" ;
  $result_select= mysqli_query($ligax, $select);
  
  
  if($result_select) { ?>
  

  <table id="table" align="center" class="alt" >
  <tr align="center"> 
    <th>Código Produto</th>
    <th>Cor</th>
    <th>Tamanho</th>
    <th>Quantidade</th>
    <th>Editar</th>
  </tr>
  <br>
  <?php
    while($registo_select=mysqli_fetch_assoc($result_select)){
      $codigo=$registo_select['codigo'];
      $cod_produto=$registo_select['cod_produto'];
      $cod_cor=$registo_select['cod_cor'];
      $tamanho=$registo_select['tamanho'];
      $quantidade=$registo_select['quantidade'];
      
      
      ?>
    <form method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" name="codigo" value="<?php echo $codigo;?>">
    <tr align="center">
      <td> <?php echo $cod_produto; ?> </td>
      <td>
      <?php
            $query="select * from cor";
            $result=mysqli_query($ligax,$query);
            if($result) { ?>
              <select name="cod_cor">
              <option value="0"><?php echo "";?></option>
              <?php
              while($registo=mysqli_fetch_assoc($result)){
                $nome_cor=$registo['nome_cor'];
                $cod_corbd=$registo['cod_cor']; ?>
                <option <?php if($cod_cor==$cod_corbd) echo "selected"; ?> value="<?php echo $cod_corbd; ?>"><?php echo $nome_cor; ?></option>
              <?php } ?>
              </select>
            <?php }
            ?> 
      
      </td>
      <td> 
      <?php
            if($cod_tamanho==1) { ?>
             <select name="tamanho">
              <option <?php if($tamanho=="30") echo "selected"; ?> value="30"><?php echo "30";?></option>
              <option <?php if($tamanho=="31") echo "selected"; ?> value="31"><?php echo "31";?></option>
              <option <?php if($tamanho=="32") echo "selected"; ?> value="32"><?php echo "32";?></option>
              <option <?php if($tamanho=="33") echo "selected"; ?> value="33"><?php echo "33";?></option>
              <option <?php if($tamanho=="34") echo "selected"; ?> value="34"><?php echo "34";?></option>
              <option <?php if($tamanho=="35") echo "selected"; ?> value="35"><?php echo "35";?></option>
              <option <?php if($tamanho=="36") echo "selected"; ?> value="36"><?php echo "36";?></option>
              <option <?php if($tamanho=="37") echo "selected"; ?> value="37"><?php echo "37";?></option>
              <option <?php if($tamanho=="38") echo "selected"; ?> value="38"><?php echo "38";?></option>
              <option <?php if($tamanho=="39") echo "selected"; ?> value="39"><?php echo "39";?></option>
              <option <?php if($tamanho=="40") echo "selected"; ?> value="40"><?php echo "40";?></option>
              <option <?php if($tamanho=="41") echo "selected"; ?> value="41"><?php echo "41";?></option>
              <option <?php if($tamanho=="42") echo "selected"; ?> value="42"><?php echo "42";?></option>
              <option <?php if($tamanho=="43") echo "selected"; ?> value="43"><?php echo "43";?></option>
              <option <?php if($tamanho=="44") echo "selected"; ?> value="44"><?php echo "44";?></option>
                 <option <?php if($tamanho=="45") echo "selected"; ?> value="45"><?php echo "45";?></option>

              </select>
            <?php }
            if($cod_tamanho==2) { ?>
              <select name="tamanho">
              <option <?php if($tamanho=="S") echo "selected"; ?> value="S"><?php echo "S";?></option>
              <option <?php if($tamanho=="M") echo "selected"; ?> value="M"><?php echo "M";?></option>
              <option <?php if($tamanho=="L") echo "selected"; ?> value="L"><?php echo "L";?></option>
              <option <?php if($tamanho=="XL") echo "selected"; ?> value="XL"><?php echo "XL";?></option>
              <option <?php if($tamanho=="XXL") echo "selected"; ?> value="XXL"><?php echo "XXL";?></option>
              </select>
            <?php }
          if($cod_tamanho==3) { ?>
              <select name="tamanho">
                <option value=""><?php echo "Tamanho";?></option>
              <option value="7.5"><?php echo "7.5";?></option>
              <option value="7.6"><?php echo "7.6";?></option>
              <option value="7.75"><?php echo "7.75";?></option>
              <option value="7.8"><?php echo "7.8";?></option>
              <option value="7.81"><?php echo "7.81";?></option>
              <option value="7.87"><?php echo "7.87";?></option>
              <option value="7.875"><?php echo "7.875";?></option>
              <option value="7.88"><?php echo "7.88";?></option>
              <option value="8.0"><?php echo "8.0";?></option>
              <option value="8.125"><?php echo "8.125";?></option>
              <option value="8.13"><?php echo "8.13";?></option>
              <option value="8.18"><?php echo "8.18";?></option>
              <option value="8.19"><?php echo "8.19";?></option>
              <option value="8.25"><?php echo "8.25";?></option>
              <option value="8.3"><?php echo "8.3";?></option>
              <option value="8.375"><?php echo "8.375";?></option>
              <option value="8.38"><?php echo "8.38";?></option>
              <option value="8.5"><?php echo "8.5";?></option>
              <option value="8.75"><?php echo "8.75";?></option>
              <option value="9.5"><?php echo "9.5";?></option>
              <option value="9.8"><?php echo "9.8";?></option>
              <option value="10"><?php echo "10";?></option>

              </select>
 <?php }
           if($cod_tamanho==4) { ?>
              <select name="tamanho">
                <option value=""><?php echo "Tamanho";?></option>
              <option value="50mm"><?php echo "50mm";?></option>
              <option value="51mm"><?php echo "51mm";?></option>
              <option value="52mm"><?php echo "52mm";?></option>
              <option value="53mm"><?php echo "53mm";?></option>
              <option value="54mm"><?php echo "54mm";?></option>
              <option value="55mm"><?php echo "55mm";?></option>
              <option value="56mm"><?php echo "56mm";?></option>

              </select>
 <?php }
 if($cod_tamanho==5) { ?>
              <select name="tamanho">
                <option value=""><?php echo "Tamanho";?></option>
              <option value="5.0"><?php echo "5.0";?></option>
              <option value="5.25"><?php echo "5.25";?></option>
              <option value="5.5"><?php echo "5.5";?></option>
              <option value="5.75"><?php echo "5.75";?></option>
              <option value="5.8"><?php echo "5.8";?></option>
              <option value="6.1"><?php echo "6.0";?></option>
              <option value="8.75"><?php echo "8.75";?></option>
              <option value="129mm"><?php echo "129mm";?></option>
              <option value="144mm"><?php echo "144mm";?></option>
              <option value="149mm"><?php echo "149mm";?></option>
              <option value="151mm"><?php echo "151mm";?></option>
              <option value="159mm"><?php echo "159mm";?></option>
              <option value="169mm"><?php echo "169mm";?></option>

              </select>
 <?php }
         if($cod_tamanho==6) { ?>
              <select name="tamanho">
                <option value=""><?php echo "Tamanho";?></option>
              <option value="1.0"><?php echo "1.0";?></option>
              <option value="7/8"><?php echo "7/8";?></option>
              <option value="11/4"><?php echo "11/4";?></option>
              <option value="11/2"><?php echo "11/2";?></option>


              </select>
 <?php }
    ?>





      </td>
      <td align="center"><input type="text" name="quantidade" value="<?php echo $quantidade;?>" size="2" align="center"> </td>
      <td> <input type="submit" name="editar" value="Editar"> </td>
    </tr>
    </form>
    

    <?php } ?>
  </table>
<?php 
}
}

?>


          </div>
        </section>
        