<?php
// -------------de email -----------
$boundary = "-----=".md5(rand());
//header 
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Shaif <shaif.bhagggoe@gmail.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$header .= "Content-type: multipart/alternative;". "\r\n" ."boundary=\"$boundary\"". "\r\n";
$headers .= 'Content-Transfer-Encoding: 8bit' . "\r\n";

//onderwerp
$subject = "Gegevens gewijzigd";
$first = $_SESSION['first_names'];
//de email tekst
$body = "Beste $first, <br> <br> Hierbij willen wij u laten weten dat u uw gegevens heb gewijzigd. <br> Uw huidige gegevens: <br> Adres: $adress2 $number2 <br> Postcode: $zip2<br> Plaats: $districts2 <br> Telefoon: $telefoon2 <br> Email: $emails2<br> Website: $websites2 <br> <br> Met vriendelijke groet, <br> Gemeente Edam-Volendam.";

//Wordwrap voor als de tekst langer is dan 70 karakters
$bericht = wordwrap($body, 70);

$stuur = mail($email, $subject, $bericht, $headers);



?>