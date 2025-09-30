<?php
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$procura="select * from utilizador where email='".$email."';";
	$result=mysqli_query($ligax,$procura);
	if ($result) {
		$nregistos=mysqli_num_rows($result);
		$registo=mysqli_fetch_assoc($result);
		$perfil=$registo['perfil'];
		if($perfil==-1 || $perfil==0){?> 
			<script> alert("Conta desativada por favor contacte o administrador!")</script><?php
		} else {
				$passwordbd=$registo["password"];
				$pass=md5($pass); //ou if(password_verify($pass,$passwordbd)) no caso de ter utilizado 
								  //$pass=password_hash($pass, PASSWORD_DEFAULT); no registar.php
				if($pass==$passwordbd) {
					$_SESSION["cod_cliente"]=$registo["cod_cliente"];
					$_SESSION["status"]=1;	
					$_SESSION["nome"]=$registo["nome"];
					$_SESSION["email"]=$registo["email"];
					$_SESSION["perfil"]=$registo["perfil"];
				} else { ?>
						<script> alert("Password incorreta ")</script><?php
					}
			}
	} else { ?>
			<script> alert("Email incorreto ")</script>
<?php	
	}
?>