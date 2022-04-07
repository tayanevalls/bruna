<?php

$url = "https://www.google.com/recaptcha/api/siteverify";
$respon = $_POST['g-recaptcha-response'];

$data = array('secret' => "6Lcyqb8UAAAAAOCNuYz6LmY9uek3Q7bGYKgpiON-", 'response' => $respon);

$options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)

        )
);
    

if(!isset($_POST[send])) die("<span class='error'>Mensagem não enviada! Tente Novamente</span>");
/* Medida preventiva para evitar que outros domínios sejam remetente da sua mensagem. */
if (preg_match('/tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$/', $_SERVER[HTTP_HOST])) {
        $emailsender='tayszane@gmail.com';
} else {
        $emailsender = "contato@" . $_SERVER[HTTP_HOST];
        //    Na linha acima estamos forçando que o remetente seja 'webmaster@seudominio',
        // você pode alterar para que o remetente seja, por exemplo, 'contato@seudominio'.
}
 
/* Verifica qual é o sistema operacional do servidor para ajustar o cabeçasend-subscribelho de forma correta. Não alterar */
if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
// Assign the input values to variables for easy reference


$name = $_POST["name"];
$last = $_POST["last"];
$email = $_POST["email"];
$request = $_POST["request"];
$message = $_POST["message"];


            
$to = 'info@itcerts.ca';
			
$subject = 'Contact';

$headers = "From: " . $email . "\r\n";
$headers .= "Return-Path: " . $emailsender . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            // PREPARE THE BODY OF THE MESSAGE

            $message = '<html><body>';
            $message = '<h2>Contact</h2>';
            
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr style='background: #eee;'><td><strong>First name:</strong> </td><td>" . strip_tags($_POST['name']) . "</td></tr>";
            $message .= "<tr style='background: #fff;'><td><strong>Last name:</strong> </td><td>" . strip_tags($_POST['last']) . "</td></tr>";
            $message .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
            $message .= "<tr style='background: #fff;'><td><strong>Request Type:</strong> </td><td>" . strip_tags($_POST['request']) . "</td></tr>";
            $message .= "<tr style='background: #eee;'><td><strong>Message:</strong> </td><td>" . strip_tags($_POST['message']) . "</td></tr>";
			$message .= "</table>";
			$message .= "</body></html>";


if(!mail($to, $subject, $message, $headers ,"-r".$emailsender)){ // Se for Postfix
    $headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "não for Postfix"
    mail($to, $subject, $message, $headers );
}


// Die with a success message
die("<span class='success'><i class='fas fa-check-circle'></i> Thank you! Your message has been successfully sent!</span>");