<?php
 require '../daashi/vendor/autoload.php';
 
 require '../daashi/config.php';

    if(file_exists('db_backup.sql')){
      unlink('db_backup.sql');
    }
 
    exec("mysqldump -u arteborda_2019 -pQwerty2019.@ arteborda > db_backup.sql");
    date_default_timezone_set('America/Sao_Paulo');
    $data = date("Y-m-d");
    $hora = date("H:i:s");
    $mensagem = "Segue em anexo o backup da base de dados Arte Borda
    gerado automaticamente na data de " .date("d/m/Y", strtotime($data))." as ".$hora."!";
    $usuario = "vendas@arteborda.com.br";
    $senha = "Arteborda2019@.";
    $smtp = "vendas@arteborda.com.br";

    $transport = Swift_SmtpTransport::newInstance('smtp.arteborda.com.br', 587)
    ->setUsername($usuario)
    ->setPassword($senha)
    ;

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    // Create a message
    $message = (new Swift_Message('Backup base de dados Arte Borda'))
    ->setFrom([$smtp => 'Backup'])
    ->setTo(['backup@arteborda.com.br'])
    ->setBody($mensagem)
    ->attach(Swift_Attachment::fromPath('db_backup.sql'))
    ;


   $message->setContentType("text/html");
    // Send the message
   if($mailer->send($message)){
   
   }
   
?>