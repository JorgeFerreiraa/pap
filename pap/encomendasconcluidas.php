<?php

$sqlstm="select * from encomenda where estado=2 order by cod_encomenda desc";
$result=mysqli_query($ligax,$sqlstm);
$n=mysqli_num_rows($result);
?>
    
  <br>
  <br>

 <div class="site-section bg-light b" id="contact-section">
      <div class="container">
    
          <div class="site-section bg-light" id="contact-section">
          <div class="container"> 
          <div class="row mb-5">
          <div class="col-12 text-center">

          <h2 class="section-title mb-3"> <p style="color:#FF8C00";></p></h2>
          </div>
        </div>
        

         <br>
         <br> 
          <h2 class="section-title mb-3" align="center">  Encomendas Processadas</p></h2>


          <?php 
              if($n>0){ ?>
  <table id="table" class="b" border="3">  
  
  <tr align="center"> 
   
    <td width="5%" align="center">Codigo da encomenda</td>
    <td width="5%" align="center">Codigo utilizador</td>
    <td width="5%" align="center">Valor</td>
    <td width="5%" align="center">Data da Encomenda</td>
    <td width="5%" align="center">Estado</td>
    <td width="5%" align="center">Data Entrega</td>

  </tr>
  <br>
                                  
  <?php

      while($registo = mysqli_fetch_assoc($result)){
        
      $num=$registo['cod_encomenda'];
      $cod=$registo['cod_cliente'];
      $valor=round($registo['total'],2);
      $data_encomenda=$registo['data_encomenda'];
      $estado=$registo['estado'];
      $data_entrega=$registo['data_conclusão'];
      $observacao=$registo['observacao'];?>
        
      
        
        <tr align="center">
        
        <td> <?php echo $num; ?> </td>
        <td> <?php echo $cod; ?> </td>
        <td> <?php echo $valor;  ?> € </td>
        <td> <?php echo $data_encomenda; ?> </td>
        <td> <?php echo $estado; ?> </td>
        <td> <?php echo $data_entrega; ?> </td>



        </tr>
         </td>

        
    <?php }?>
  </table>
  <?php
} else {
echo "Não existem encomendas processadas!"; ?>

<?php }
?>
  <br>

  


</div>
</div>
</div>