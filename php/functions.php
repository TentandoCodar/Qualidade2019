<?php
require 'PHPMailer/PHPMailerAutoload.php';



function email($senderEmail,$emailReceive,$subject,$message){


	$Mailer = new PHPMailer();

	//Define que será usado SMTP
	$Mailer->IsSMTP();

	//Enviar e-mail em HTML
	$Mailer->isHTML(true);

	//Aceitar carasteres especiais
	$Mailer->Charset = 'UTF-8';

	//Configurações
	$Mailer->SMTPAuth = true;
	$Mailer->SMTPSecure = 'tls';

	//nome do servidor
	$Mailer->Host = "ssl://smtp.gmail.com";
	//Porta de saida de e-mail
	$Mailer->Port = 465;

	//Dados do e-mail de saida - autenticação
	$Mailer->Username = $senderEmail;
	$Mailer->Password = '1234cdgr';

	//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
	$Mailer->From = $senderEmail;

	//Nome do Remetente
	$Mailer->FromName = 'Teste';

	//Assunto da mensagem
	$Mailer->Subject = $subject;


	//Corpo da Mensagem
	$Mailer->Body = $message;

	//Corpo da mensagem em texto
	$Mailer->AltBody = $message;

	//Destinatario
	$Mailer->AddAddress($senderEmail);

	if($Mailer->Send()){
		echo "E-mail enviado com sucesso";
	}else{
		echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
	}
}




function _header(){


    if(!isset($_SESSION['user'])){
      echo '
      <header>

        <nav class="navbar navbar-expand-lg navbar-dark verde">
            <a class="navbar-brand" href="index.php"> <img src="imgs\logos\Tmod18_Logo_Branca.png" height="30px" alt=""> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">

					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="artigos.php">Artigos</a>
					</li>
					



              </ul>

              <div class="my-2 my-lg-0">
                <a href="login.php" class="btn btn-outline-light" role="button" aria-pressed="true">Login</a>
              </div>

            </div>
          </nav>
      </header>



      ';
    }
    else{
      if(isset($_SESSION['admin'])) {
		echo '
		<header>

			<nav class="navbar navbar-expand-lg navbar-dark verde">
					<a class="navbar-brand" href="index.php"> <img src="imgs\logos\Tmod18_Logo_Branca.png" height="30px" alt=""> </a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">

						<li class="nav-item">
							<a class="nav-link" href="index.php">Home</a>
						</li>

							<li class="nav-item">
								<a class="nav-link" href="artigos.php">Artigos</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="acervo.php">Acervo</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="perfil.php">Perfil</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="admin.php">Administradores</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="novoLivro.php">Novo Livro</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="SeusLivros.php">Seus Livros</a>
							</li>



						</ul>
		  <div class="my-2 my-lg-0">
			<a href="authLogout.php" class="btn btn-outline-light" role="button" aria-pressed="true">Logout</a>
		  </div>

		</div>
	  </nav>
  	</header>



  	';
	}
	else {
		echo '
			<header>

				<nav class="navbar navbar-expand-lg navbar-dark verde">
						<a class="navbar-brand" href="index.php"> <img src="imgs\logos\Tmod18_Logo_Branca.png" height="30px" alt=""> </a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">

							<li class="nav-item">
								<a class="nav-link" href="index.php">Home</a>
							</li>

								<li class="nav-item">
									<a class="nav-link" href="artigos.php">Artigos</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" href="acervo.php">Acervo</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" href="perfil.php">Perfil</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="SeusLivros.php">Seus Livros</a>
								</li>



							</ul>
              <div class="my-2 my-lg-0">
                <a href="authLogout.php" class="btn btn-outline-light" role="button" aria-pressed="true">Logout</a>
              </div>

            </div>
          </nav>
      </header>



      ';
	}
  }
}


function _footer(){
	echo '
	<footer class="row" style="margin-left: 0px;">

			<form id="Form" class="contato-form row" name="email.php" method="post" action="sendMail.php">
			<center id="form-title"> <h2>Fale conosco</h2></center>
				<div class="row">
					<div class="form-input-1 col-md-4">
						<label for="">Seu email</label> <input type="text" name="Email" value=""> <br>
						<label for="">Assunto</label>    <select name="Type">
										<option value="Criticas">Críticas</option>
										<option value="Sujestões">Sujestões</option>
										<option value="Erros">Problemas no site</option>
										<option value="Ajuda">Ajuda</option>
									</select>
					</div>
					<div class="col-md-1"></div>
					<div class="form-input-1 col-md-7">
						<label for="">Mensagem</label> <br>
						<textarea name="Content" rows="8" cols="80" style="margin: 0px; width: 268px; height: 72px; resize: none;"></textarea>
						<button onclick="handleSubmit()" type="button" action="submit" class="btn btn-outline-light right-pos" name="button" outline>Enviar</button>
					</div>
				</div>
			</form>

			<p class="footer-text">
			<strong>Endereço: </strong>R. Roberto Schincariol, 81 - Distrito Industrial, São João Nepomuceno - MG, 36680-000 <br>
			<strong>Telefone: </strong>(32) 3261-7011

			<br><br><br><br




			<strong><a style="color: rgba(237, 243, 228, 1);" target="_blank" href="https://www.freeprivacypolicy.com/privacy/view/d8432376f107aa29535adcf6303773e0"> Política de Privacidade </a></strong>

			<br><br><br><br>


<button onclick="topFunction()" id="myBtn" class="right-pos" title="Go to top">Top</button>
	</p>


			<script>
			//Get the button
			var mybutton = document.getElementById("myBtn");

			// When the user scrolls down 20px from the top of the document, show the button
			window.onscroll = function() {scrollFunction()};

			function scrollFunction() {
			  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			    mybutton.style.display = "block";
			  } else {
			    mybutton.style.display = "none";
			  }
			}

			// When the user clicks on the button, scroll to the top of the document
			function topFunction() {
			  document.body.scrollTop = 0;
			  document.documentElement.scrollTop = 0;
			}
			</script>


	<script>
		function handleSubmit(){
			document.getElementById(\'Form\').submit();
		}



	</script>

	</footer>';
}

 ?>
