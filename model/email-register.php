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
$subject = "Registratie";

//de email tekst
$body = "Beste $fname, <br> <br> Hierbij willen wij u laten weten dat u succesvol bent geregistreerd. <br> Dit betekent nog niet dat u meteen kunt inloggen. Binnen 7 dagen ontvangt u een email met daarin de goedkeuring om te kunnen inloggen en uw gebruikersnaam en wachtwoord. <br> Deze kunt u veranderen als u voor het eerst bent ingelogd. <br> Hieronder uw gegevens: <br> Voornaam: $firstname <br> Achternaam: $lastname <br> Telefoonnummer: $number <br> Bedrijf: $bedrijf <br> Website: $website <br> Soort: <br> $soort <br> Plaats: $district <br> <br> Met vriendelijke groet, <br> Gemeente Edam-Volendam.";

//Wordwrap voor als de tekst langer is dan 70 karakters
$bericht = wordwrap($body, 70);

$stuur = mail($email, $subject, $bericht, $headers);

if(!$stuur){
    header("Location: ../?action=errormail");
}else {
//Terug naar de pagina met een bericht
header("Location: ../Register.php?succes");
}

?>
