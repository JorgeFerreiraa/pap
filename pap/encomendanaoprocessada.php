<?php

$sqlstm="select * from encomenda where estado=0 order by cod_encomenda desc";
$result=mysqli_query($ligax,$sqlstm);
?>
    
  <br>
  <br>

 <div class="b" id="contact-section">
      <div class="container">
    
        <div class="b" id="contact-section">
          <div class="container"> 
          <div class="row mb-5">
          <div class="col-12 text-center">

          <h2 class="section-title mb-3">  Encomendas não processadas</p></h2>
          </div>
        </div>
        

          <h2 align="center">  Encomendas não processadas</p></h2>
          
  <table id="table" class="" border="3">  
  
  <tr align="center" class="b"> 
    <td width="5%" >Codigo da encomenda</td> 
    <td width="5%" >Codigo utilizador</td>
    <td width="5%" >Valor</td>
    <td width="5%" >Data da Encomenda</td>
    <td width="5%" >Estado</td>
    <td width="5%" >Data Entrega</td>
    <td width="5%" ></td>
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



        <td> <a href="ver_processar.php?num=<?php echo $num?>"> Ver </p></a></td>
        </tr>
         </td>

        
    <?php }?>
  </table>
  <br>
  


</div>
</div>
</div>