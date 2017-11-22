<?php
//Lokaal
include '../includes/connect.php';
//Host


//de waardes van de from
$fname = mysqli_real_escape_string($conn, $_POST['voornaam']);
$lname = mysqli_real_escape_string($conn, $_POST['achternaam']);
$number = mysqli_real_escape_string($conn, $_POST['telefoon']);
$email =  mysqli_real_escape_string($conn, $_POST['email']);
$bedrijf = mysqli_real_escape_string($conn, $_POST['bedrijf']);
$website = mysqli_real_escape_string($conn, $_POST['website']);
$soort = mysqli_real_escape_string($conn, $_POST['soort']);
$district = mysqli_real_escape_string($conn, $_POST['district']);
//Hoofdletter
$firstname = ucfirst($fname);
$lastname = ucfirst($lname);
//$lastname1 = sha1($lastname);


//INSERT statement
$sql_register = "INSERT INTO subscription_request (request_firstname, request_surname, request_telnr, request_email, request_community, request_website, request_artCultuur, request_district) VALUES ('$firstname', '$lastname', '$number', '$email', '$bedrijf', '$website', '$soort', '$district')";



///Voor de gemeente, gaat later weg

//$conn->query($sql_data)

//Hier wordt het uitgevoerd
if($conn->query($sql_register) == TRUE){
    include '../model/email-register.php';
    header("Location: ../?action=Regsuc");
} else {
    header("Location: ../?action=Foutreg");
}

//include "../model/email-register.php";

?>