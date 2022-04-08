<?php
if (isset($_POST['send'])) {
 
 //Variaveis de POST, Alterar somente se necessário 
 //====================================================
 $name = $_POST['name'];
 $email = $_POST['email'];
 $phone = $_POST['phone']; 
 $city = $_POST['city']; 
 $message = $_POST['message'];
 //====================================================
 
 //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
 //==================================================== 
 $email_remetente = "contato@brunadagamaconsultoria.com.br"; // deve ser uma conta de email do seu dominio 
 //====================================================
 
 //Configurações do email, ajustar conforme necessidade
 //==================================================== 
 $email_destinatario = "bgcorreia@gmail.com"; // pode ser qualquer email que receberá as mensagens
 $email_reply = "$email"; 
 $email_assunto = "Contato"; // Este será o assunto da mensagem
 //====================================================
 
 //Monta o Corpo da Mensagem
 //====================================================


 $email_conteudo .= "Nome: $name \n"; 
 $email_conteudo .= "Email: $email \n";
 $email_conteudo .= "Telefone/Celular: $phone \n"; 
 $email_conteudo .= "Cidade/Estado: $city \n"; 
 $email_conteudo .= "Mensagem: $message \n"; 


 //====================================================
 
 //Seta os Headers (Alterar somente caso necessario) 
 //==================================================== 
 $email_headers = 'From:  ' . $name . ' <' . $email .'>' . " \n" ;
 $email_headers .= "Reply-To: $email_reply". "\n";
 $email_headers .= "Content-Type: text/html; charset=ISO-8859-1 \n";
 $email_headers = implode ( "\n",array ("Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 1"));
 //====================================================
 
 //Enviando o email 
 //==================================================== 
 if (mail ( $email_destinatario,  $email_assunto,  $email_conteudo,  $email_headers ,"-r".$email_remetente)){ 
 echo "<span class='success'><i class='bi bi-check2-circle'></i> E-mail enviado com sucesso!</spa>"; 
 } 
 else{ 
 echo "<span class='success'>Falha no envio do E-Mail!</spa>"; } 
 //====================================================
} 
?>