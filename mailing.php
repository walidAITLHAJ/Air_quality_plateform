<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['subject']) && isset($_POST['email']) && isset($_POST['objet'])){
	$nom = $_POST['lastname'];
	$prenom = $_POST['firstname'];
	$msg = $_POST['subject'];
	$visitor_email = $_POST['email'];
	$email_title = $_POST['objet'];
	
	$msg = wordwrap($msg,70);
	$recipient = "labo.admir@gmail.com";
	$mail = new PHPMailer(true);
	
	try{
		$mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "labo.admir@gmail.com";
        $mail->Password = 'laboadmir';
        $mail->Port = 465; //587
        $mail->SMTPSecure = "ssl"; //tls

		
		
		
		$mail->setFrom($visitor_email, 'site du labo');
    	$mail->addAddress($recipient); 
		$mail->AddReplyTo($visitor_email);
    	
		$mail->isHTML(true);
		$mail->Subject= $email_title;
		$mail->Body= $msg;
		//$mail->AltBody = $msg;
		
		$mail->send();
		echo "<p>merci pour votre mail, $nom $prenom .</p>";
	}catch(Exception $e){
		echo "erreur d'envoi de mail : {$mail->ErrorInfo}";
	}
	
	
}else{
	echo "<p>champ manquant</p>";
}
	

?>