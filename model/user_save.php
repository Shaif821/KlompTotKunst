<?php
// -------------de email -----------
$boundary = "-----=".md5(rand());
//header 
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Shaif <shaif.bhagggoe@gmail.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$headers .= "Content-type: multipart/alternative;". "\r\n" ."boundary=\"$boundary\"". "\r\n";
$headers .= 'Content-Transfer-Encoding: 8bit' . "\r\n";

//onderwerp
$subject = "Bevestiging";
$first = $_SESSION['first_names'];
//de email tekst
$body = "Beste $first, <br> <br> Hierbij willen wij u laten weten dat u succesvol uw inloggegevens heeft kunnen wijigen. <br> W <br> <br> Met vriendelijke groet, <br> Gemeente Edam-Volendam.";

//Wordwrap voor als de tekst langer is dan 70 karakters
$bericht = wordwrap($body, 70);

$stuur = mail($email, $subject, $bericht, $headers);



?>