<?php

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

   
//Dados do formulário de contacto

    $nome=$_POST["nome"];
	$email=$_POST["email"];
	$assunto=$_POST["assunto"];
	$mensagem=$_POST["mensagem"];
    
//Envio de mensagem para o email do contacto a confirmar a receção dos dados:

    $mensagem_1 = new Mensagem();
    $mensagem_1->__set('para' , $_POST['email']); //email do contacto
    $mensagem_1->__set('assunto' , "Contacto via site");
    $mensagem_1->__set('mensagem' , "Brevemente a equipa do projeto entrará em contacto para responder à sua mensagem. Com os melhores cumprimentos, A equipa do projeto");

	if(!$mensagem_1->mensagemValida()){
			echo "Mensagem não é válida";
	}

   $mail_1 = new PHPMailer(true);

   try {
   
		$mail_1->SMTPDebug = false;                      // Enable verbose debug output
		$mail_1->isSMTP();                                            // Send using SMTP
		$mail_1->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		$mail_1->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail_1->Username   = 'skatexloja@gmail.com';                     // SMTP username
		$mail_1->Password   = '68662941JD';                               // SMTP password
		$mail_1->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
		$mail_1->Port       = 587;                                    // TCP port to connect to

		$mail_1->setFrom('skatexloja@gmail.com', 'Equipa do Projeto');
		$mail_1->addAddress($mensagem_1->__get('para'));     // Add a recipient

		$headers_1 = "MIME-Version: 1.1/r/n";
		$headers_1 .= "Content-type: text/plain; charset=iso-8859-1/r/n";
		$headers_1 .= "From: Equipa do Projeto/r/n"; //Devem personalizar com o nome do vosso projeto
		$headers_1 .= "Return-Path: User"; //Devem personalizar com o nome do vosso projeto
	  
		$mail_1->isHTML(true);                                  // Set email format to HTML
		$mail_1->Subject = $mensagem_1->__get('assunto');
		$mail_1->Body    = $mensagem_1->__get('mensagem');
		$mail_1->AltBody = 'É necessario utilizar um cliente que suport HTML para ter acesso total ao conteúdo dessa mensagem';

		$mail_1->send();
		$mensagem_1->status['codigo_status'] = 1;
		$mensagem_1->status['descricao_status'] = 'E-Mail enviado com secesso!<br> Vá até à sua caixa de correio eletrónico!';

	} catch (Exception $e_1) {

		$mensagem_1->status['codigo_status'] = 2;
		$mensagem_1->status['descricao_status'] = 'Não foi possível enviar este e-mail! Por favor tente novamente mais tarde. Detalhes do erro: ' . $mail_1->ErrorInfo;

    //alguma lógica que armazene o erro para posterior análise por parte do programador
	}


 //Enviar email para o email do projeto a informar os dados do contacto:
 
    $mensagem_2 = new Mensagem();
    $mensagem_2->__set('para' , 'skatexloja@gmail.com'); //email do projeto
    $mensagem_2->__set('assunto' , $_POST['assunto']);
    $mensagem_2->__set('mensagem' , "O visitante do site, " .$_POST['nome']. ", com email ".$_POST['email']." enviou a seguinte mensagem: ".$_POST['mensagem']);

	if(!$mensagem_2->mensagemValida()){
			echo "Mensagem não é válida";
	}

   $mail_2 = new PHPMailer(true);

   try {
   //Enviar email para o email do contacto a confirmar a receção dos dados:
   
		$mail_2->SMTPDebug = false;                      // Enable verbose debug output
		$mail_2->isSMTP();                                            // Send using SMTP
		$mail_2->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		$mail_2->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail_2->Username   = 'skatexloja@gmail.com';                     // SMTP username
		$mail_2->Password   = '68662941JD';                               // SMTP password
		$mail_2->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
		$mail_2->Port       = 587;                                    // TCP port to connect to

		$mail_2->setFrom($_POST['email'], $_POST['assunto']);
		$mail_2->addAddress($mensagem_2->__get('para'));     // Add a recipient

		$headers_2 = "MIME-Version: 1.1/r/n";
		$headers_2 .= "Content-type: text/plain; charset=iso-8859-1/r/n";
		$headers_2 .= "From: Equipa do Projeto/r/n"; //Devem personalizar com o nome do vosso projeto
		$headers_2 .= "Return-Path: User"; //Devem personalizar com o nome do vosso projeto
	  
		$mail_2->isHTML(true);                                  // Set email format to HTML
		$mail_2->Subject = $mensagem_2->__get('assunto');
		$mail_2->Body    = $mensagem_2->__get('mensagem');
		$mail_2->AltBody = 'É necessario utilizar um cliente que suport HTML para ter acesso total ao conteúdo dessa mensagem';

		$mail_2->send();
		$mensagem_2->status['codigo_status'] = 1;
		$mensagem_2->status['descricao_status'] = 'Obrigado pelo seu contacto!';

	} catch (Exception $e_2) {

		$mensagem_2->status['codigo_status'] = 2;
		$mensagem_2->status['descricao_status'] = 'Não foi possível enviar este e-mail! Por favor tente novamente mais tarde. Detalhes do erro: ' . $mail_2->ErrorInfo;

    //alguma lógica que armazene o erro para posterior análise por parte do programador
	}
?>


    <div class="">
        <h3>Contactos</h3>
		<div class="container">
			<div class="sign-up-content">	
				 <div class="col-md-12">
				 

					<?php if($mensagem_2->status['codigo_status'] == 1) { ?> 
							<h4 class="form-title"></h4>
							<p> <?php echo $mensagem_2->status['descricao_status'];  ?> </p>
					<?php } else if($mensagem_2->status['codigo_status'] == 2) { ?>
							<h4 class="form-title">Ups!</h4>
							<p><?php echo $mensagem_2->status['descricao_status']; } ?> </p>  


							
				</div>
					<p class="">
						<a href="contacto.php" class="loginhere-link">Voltar</a>
					</p>
			</div>
		</div>
	 </div>
	 
