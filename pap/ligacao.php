<?php
		session_start();
		$host = "localhost";
		$user = "root";
		$pwd = "";
		$db = "pap20_21";
		$ligax = mysqli_connect($host, $user, $pwd) or die ("Não consegui fazer a conexão ao servidor da base de dados");
		mysqli_select_db($ligax,$db);	
?>