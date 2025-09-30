
 


<?php
include ('ligacao.php');
?>
<!doctype html>
<html lang="en">

<head>

	<style>
		.cenainstagram{
			height: 50;
			width: 50px;
		}
.b{
	font-weight: bold;
	color:#00114d;
}

	.perfil1{
		border:block;
		border-radius:50%;
		height:50px;
		width:50px;
		margin:10px auto;
		object-fit:cover;
		object-position:50% 50%
	}

	</style>
	
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/loog.jpg" type="image/png">
	<title>Default</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="vendors/animate-css/animate.css">
	<link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css">
	<!-- main css -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
</head>

<body>
	


	<!--================ Menu Area =================-->
	<!--Menus-->
		<?php 
        if (isset($_GET['pagina'])) { 
          if ($_GET['pagina']=='validarlogin') { include("validarlogin.php");} 
        }
        if (isset($_SESSION["perfil"])) {
            if (($_SESSION ["perfil"])==2) include("menuadmin.php");
           else if (($_SESSION ["perfil"])==1) include("menuutil.php");
		   else if (($_SESSION ["perfil"])==0) include("menuvisit.php");
		   else if (($_SESSION ["perfil"])==-1) include("menuvisit.php");
        } else include ("menuvisit.php");
		?> 
	<!--================ Pages Area =================-->
	<?php
	if(isset($_GET['pagina'])) {
		$pagina=$_GET['pagina'];
		if($pagina=='registar') include('registar.php');
		else if($pagina=='login') include('login.php');
		else if($pagina=='validarlogin') include('home.php');
		else if($pagina=='perfil') include('perfil.php');
		else if($pagina=='perfilmenu') include('perfilmenu.php');
		else if($pagina=='recuperar') include('recuperar.php');
		else if($pagina=='listarutilizadores') include('listarutilizadores.php');
		else if($pagina=='perfil_utilizador') include('perfil_utilizador.php');
		else if($pagina=='recuperar_password') include('recuperar_password.php');
		else if($pagina=='ativar_conta') include('ativar_conta.php');
		else if($pagina=='inserir_categorias') include('inserir_categorias.php');
		else if($pagina=='listar_categorias') include('listar_categorias.php');
		else if($pagina=='editarcategoria') include('editarcategoria.php');
		else if($pagina=='inserirmarcas') include('inserirmarcas.php');
		else if($pagina=='listarmarcas') include('listarmarcas.php');
		else if($pagina=='editarmarca') include('editarmarca.php');
		else if($pagina=='inserirartigo') include('inserirartigo.php');
		else if($pagina=='escolhacategoria') include('escolhacategoria.php');
			else if($pagina=='inserir_tamanhos') include('inserir_tamanhos.php');
			else if($pagina=='favoritos') include('favoritos.php');
			else if($pagina=='listarprodutos') include('listarprodutos.php');
			else if($pagina=='carrinho') include('cc.php');
			else if($pagina=='detalhesproduto') include('detalhesproduto.php');
			else if($pagina=='encomendanaoprocessada') include ('encomendanaoprocessada.php');
			else if($pagina=='inserirbanner') include ('inserirbanner.php');
			else if($pagina=='listarbanner') include ('listarbanner.php');
			else if($pagina=='contactos') include ('contactos.php');
			else if($pagina=='encomendasprocessadas') include ('encomendasprocessadas.php');
			else if($pagina=='encomendasconcluidas') include('encomendasconcluidas.php');
			else if($pagina=='checkout') include('checkout.php');
			else if($pagina=='minhasencomendas') include('minhasencomendas.php');
			else if($pagina=='editarproduto') include('editarproduto.php');
			else if($pagina=='notificacoes') include('notificacoes.php');
			else if($pagina=='validacao') include('validacao.php');

	}else include("home.php");
	?>	
	<!--================ Footer Area  =================-->
	<?php
	include("footer.php");
	?>
	



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src="vendors/isotope/isotope-min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="vendors/flipclock/timer.js"></script>
	<script src="vendors/counter-up/jquery.counterup.js"></script>
	<script src="js/mail-script.js"></script>
	<script src="js/theme.js"></script>
