<?php

include ('ligacao.php');

   require "../../PHPMailer/src/Exception.php";
   require "../../PHPMailer/src/OAuth.php";
   require "../../PHPMailer/src/PHPMailer.php";
   require "../../PHPMailer/src/POP3.php";
   require "../../PHPMailer/src/SMTP.php";

    //Instanciando os sNamespaces
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class Mensagem{
        private $para = null;
        private $assunto = null;
        private $mensagem = null;
        public $status = array(
            'codigo_status' => null,
            'descricao_status' => '',
        );
		
        public function __get($attr){
            return $this->$attr;
         }

         public function __set($attr, $value){
             $this->$attr = $value;
         }

         public function mensagemValida(){

                if( empty($this->para) || empty($this->assunto) || empty($this->mensagem)){
                    return false;
                }
                else return true;
         } 
    }

    function gerar_senha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos){
		
        $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
        $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
        $nu = "0123456789"; // $nu contem os números
        $si = "!@#$%&*()_+="; // $si contem os símbolos
        $password="";
		
        if ($maiusculas){
            // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $password
            $password .= str_shuffle($ma);
        }
    
        if ($minusculas){
            // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $password
            $password .= str_shuffle($mi);
        }
    
        if ($numeros){
            // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $password
            $password .= str_shuffle($nu);
        }
    
        if ($simbolos){
            // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $password
            $password .= str_shuffle($si);
        }
    
        // retorna a password embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
        return substr(str_shuffle($password),0,$tamanho);
    }

   

    $email=$_POST["email"]; 
    $procura="select * from utilizador where email='".$email."' ;";
    $result=mysqli_query($ligax,$procura);
    $nregistos=mysqli_num_rows($result);
    $registo=mysqli_fetch_assoc($result);

	if($nregistos == 0){ ?>
	 <div class="">
        <h3>Recuperar password</h3>
		<div class="container">
			<div class="sign-up-content">	
				 <div class="col-md-12">
		<?php 
		echo "Conta não registada!";
		?>
		</div>
		</div>
		</div>
		</div>
		
		
	<?php } else if($nregistos==1){

    //  Este email existe na base de dados!";
    $email=$registo["email"]; //guarda email para quem será enviado o formulário
	
	// Função Gerar Senha		
	$password=gerar_senha(10, true, true, true, true);

	//altera o registo com a nova password
	$sql="UPDATE utilizador SET password='".md5($password)."' where email='".$email."';";
	$result=mysqli_query($ligax,$sql);

    $mensagem = new Mensagem();
    $mensagem->__set('para' , $_POST['email']);
    $mensagem->__set('assunto' , "Recuperação de Password");
    $mensagem->__set('mensagem' , "Solicitou a requisição da sua password.<br><br>
    A sua novapassword é:  <b>$password</b> ;
	<br>
    Por favor, não responda a este email. A sua única função é informar.<br><br>
    Atenciosamente, Equipa responsável pelo projeto");

    // print_r($mensagem);
    
    //criar objeto PHPMAILER
	    if(!$mensagem->mensagemValida()){
			echo "Mensagem não é válida";
	    }

   $mail = new PHPMailer(true);

   try {
    //Server settings
    $mail->SMTPDebug = false;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'skateXloja@gmail.com';                     // SMTP username
    $mail->Password   = '68662941';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('email_envio@gmail.com', 'Equipa do Projeto');
    $mail->addAddress($mensagem->__get('para'));     // Add a recipient

    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com'); //copia
    // $mail->addBCC('bcc@example.com'); //copia oculta

    // Attachments - Anexo
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    $headers = "MIME-Version: 1.1/r/n";
	$headers .= "Content-type: text/plain; charset=iso-8859-1/r/n";
	$headers .= "From: Equipa do Projeto/r/n"; //Devem personalizar com o nome do vosso projeto
    $headers .= "Return-Path: User"; //Devem personalizar com o nome do vosso projeto
                    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $mensagem->__get('assunto');
    $mail->Body    = $mensagem->__get('mensagem');
    $mail->AltBody = 'É necessario utilizar um cliente que suport HTML para ter acesso total ao conteúdo dessa mensagem';

    $mail->send();
    $mensagem->status['codigo_status'] = 1;
    $mensagem->status['descricao_status'] = 'E-Mail enviado com secesso!<br> Vá até à sua caixa de correio eletrónico!';

} catch (Exception $e) {

    $mensagem->status['codigo_status'] = 2;
    $mensagem->status['descricao_status'] = 'Não foi possível enviar este e-mail! Por favor tente novamente mais tarde. Detalhes do erro: ' . $mail->ErrorInfo ;

    //alguma lógica que armazene o erro para posterior análise por parte do programador
}

 
?>


    <div class="">
        <h3>Recuperar password</h3>
		<div class="container">
			<div class="sign-up-content">	
				 <div class="col-md-12">
					<?php if($mensagem->status['codigo_status'] == 1) { ?> 
							<h4 class="form-title">Sucesso!</h4>
							<p> <?php echo $mensagem->status['descricao_status'];  ?> </p>
					<?php } else if($mensagem->status['codigo_status'] == 2) { ?>
							<h4 class="form-title">Ups!</h4>
							<p><?php echo $mensagem->status['descricao_status']; } ?> </p>                                            
				</div>
					<p class="">
						<a href="index.php" class="loginhere-link">Voltar</a>
					</p>
			</div>
		</div>
	 </div>
	 
<?php } ?>