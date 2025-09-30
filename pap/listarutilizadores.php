<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #0000FF;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

input[type=pesquisa] {
  width: 130px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 40px;
  font-size: 16px;
  transition: width 0.4s ease-in-out;
  padding: 12px 10px 12px ;
}

input[type=pesquisa]:focus {
  width: 100%;
}
.arroz{
	padding-left: 20px;
}
	.img-perfil{
		border:block;
		border-radius:50%;
		height:184px;
		width:184px;
		margin:10px auto;
	}


</style>
<script>
	function search() { 
    let input = document.getElementById('searchbar').value 
    input=input.toLowerCase(); 
    let x = document.getElementsByClassName('progress-table-wrap'); 
      
    for (i = 0; i < x.length; i++) {  
        if (!x[i].innerHTML.toLowerCase().includes(input)) { 
            x[i].style.display="none"; 
        } 
        else { 
            x[i].style.display="list-item";                  
        } 
    } 
} 
</script>
</head>
<br>



</html>

<br>
<br>
<br>
<br>
<br>


			<?php 
if(isset($_POST['banir'])){
      if(isset($_POST['cod_cliente']))  { $atualizar="UPDATE utilizador set perfil=(-1) where cod_cliente='".$_POST["cod_cliente"]."'";
  //  echo $atualizar;
    $result=mysqli_query($ligax,$atualizar); }
  }
  if(isset($_POST['desbanir'])){
      if(isset($_POST['cod_cliente']))  { $atualizar="UPDATE utilizador set perfil=(1) where cod_cliente='".$_POST["cod_cliente"]."'";
  //  echo $atualizar;
    $result=mysqli_query($ligax,$atualizar); }

    if(isset($_POST['validar'])){
      if(isset($_POST['cod_cliente']))  { $atualizar="UPDATE utilizador set perfil=(1) where cod_cliente='".$_POST["cod_cliente"]."'";
  //  echo $atualizar;
    $result=mysqli_query($ligax,$atualizar); }
  }
  }
			?>
			

<form class="row 	" action="" method="POST">
						<div class="col-lg-6" >
							<div class="arroz">
	<input type="pesquisa" class="form-control" id="searchbar" name="barradeprocura" onkeyup="search()" placeholder="Pesquisar...">
</div>
</div>
</form>

	<div class="section-top-border">

				<div class="progress-tablea">
					<div class="progress-table">
						<div class="table-head">
							<div class="serial">Codigo</div>
							<div class="visit">Foto</div>
							<div class="country">Nome</div>
							<div class="visit">email</div>
							<div class="visit">telemovel</div>
							<div class="visit">estado</div>
							<div class="visit"></div>
						</div>
					</div>
				</div>	
			</div>

<?php

	$consulta = "select * from utilizador" ;
	$result = mysqli_query($ligax, $consulta);
			
	if($result) { 
		//Paginação – Apenas lista 10 clientes numa página
		$reg_pag=2; // N.º de registos a apresentar por página
		if(isset($_GET['pag'])){$pag=$_GET['pag'];} else {$pag=1;}
		$pag_ant=$pag-1;
		$pag_seg=$pag+1;
		$pag_ini=($reg_pag*$pag)-$reg_pag;
		$num_reg=mysqli_num_rows($result);
		if($num_reg <=$reg_pag) {
		$num_pag=1; }
		else if (($num_reg % $reg_pag)==0) {
		$num_pag=$num_reg/$reg_pag; }
		else {
		$num_pag=$num_reg/$reg_pag + 1; }
		//Vai à base de dados selecionar os registos entre dois limites
		$consulta=$consulta." limit $pag_ini,$reg_pag";
		
		$result= mysqli_query($ligax, $consulta);


		while($registo=mysqli_fetch_assoc($result)){
			$cod_cliente=$registo['cod_cliente'];
			$nome=$registo['nome'];
			$email=$registo['email'];
			$telemovel=$registo['telemovel'];
			$nif=$registo['nif'];
			$data=$registo['data_registo'];
			$estado=$registo['perfil'];
			
			

			?>

			
				<div class="progress-table-wrap">
					<div class="progress-table">
						<div class="table-row">
							<div class="serial"><?php echo $cod_cliente ?></div>
							<div class="img-perfil"><img style="border:block;
		border-radius:50%;
		height:100px;
		width:100px;
		margin:10px auto;
		object-fit:cover;
		object-position:50% 50%" src="showfile.php?cod_cliente=<?php echo $cod_cliente;?>"></div>
							<div class="country"><?php echo $nome; ?></div>
							<div class="visit"> <?php echo $email; ?></div>
									<div class="visit"><?php echo $telemovel; ?></div>
									
									<?php if($estado==-1) { ?>
										
										<div class="visit">
											<form  action="" method="POST">
											<input type="hidden" name="cod_cliente" value="<?php echo $cod_cliente; ?>">
											<input type="submit" name="desbanir" id="desbanir" class="btn btn" value="✔" style="background-color: #15ff00">
									</form></div>
									<?php } else if($estado==0) { ?>
								<div class="visit">	<form action="" method="POST">	
											<input type="hidden" name="cod_cliente" value="<?php echo $cod_cliente; ?>">
											<input type="submit" name="desbanir" id="desbanir" class="btn btn" value="✔" style="background-color: #15ff00">
										</div></form>	
									<?php }else if($estado==1) { ?>
										<div class="visit"><form action="" method="POST">
											<input type="hidden" name="cod_cliente" value="<?php echo $cod_cliente; ?>">
											<input type="submit" name="banir" id="banir" class="btn btn" value="🛇" style="background-color: #ff0000">	
										</div></form>
									<?php  }if($estado==2){ ?>
										<div class="visit">
										<?php echo "<img width='70' src='img/coroa.png'></a>"; ?>
									</div>
									<?php } ?>
									<div class="visit"><a href ="index.php?pagina=perfil_utilizador&cod_cliente=<?php echo $cod_cliente ?>">Ver Perfil</a></div>
							</div>
						</div>

					</div>
					

		<?php }?>
	
<?php }?>

<div class="">

<?php
if(($pag_ant)&&($pag>1)){
echo "<a href='index.php?pagina=listarutilizadores&pag=$pag_ant'><<</a>";
}
for ($i=1;$i<=$num_pag;$i++) {
if($i!=$pag) {
echo " <a href='index.php?pagina=listarutilizadores&pag=$i'>$i</a>";
} else {
echo " <a href='index.php?pagina=listarutilizadores&pag=$i'>$i</a>";
}
}
if ($pag+1<=$num_pag) {
echo " <a href='index.php?pagina=listarutilizadores&pag=$pag_seg'>>></a>";
}
?>

</div>
