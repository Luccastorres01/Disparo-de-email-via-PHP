<?php
	require 'PHPMailer/PHPMailerAutoload.php';

	if (isset($_POST['email'])) {
		$email_usuario = $_POST['email'];

		$mail = new PHPMailer(true);
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = "587";
		$mail->SMTPSecure = "tls";
		$mail->SMTPAuth = "true";
		$mail->Username = 'blackrockprod.media@gmail.com';
		$mail->Password = 'torontokunta32';

		//Enviar e-mail para o cliente
		//Onde sai o e-mail
		$mail->setFrom($mail->Username, "Luccas Torres");

		//Para onde vai o e-mail
		$mail->addAddress($email_usuario);

		//Assunto do e-mail
		$mail->Subject = 'TESTE DE DISPARO DE E-MAIL';
		//Corpo do e-mail
		$corpo_email = "
			<p>SE VOCÊ ESTÁ RECEBENDO ESTE E-MAIL SIGNIFICA QUE 
			<br>
			O DISPARO POR E-MAIL FOI FEITO COM SUCESSO!</p>
		";

		$mail->IsHTML(true);        
		$mail->Body = $corpo_email;   

		if ($mail->send()) {
		    echo "Verifique a caixa de entrada de seu e-mail";
		}  
		else {
			echo "E-mail não enviado";
		}   
	}
	else {
		echo "Insira o endereço de e-mail cadastrado";
		echo "<br>";
		echo "<br>";
		echo "<a href='index.php'>Voltar</a>";
	}
?>