<?php
//Lokaal
include 'includes/connect.php';
include 'includes/database.php';

//Functies
include 'model/edit-userdata.php';
//Start de sessie
session_start();

//Variables declareren:
if(isset($_SESSION['id2'])){
    $user = $_SESSION['first_names'];
} else {
    $user = 'bezoeker';
}



include 'views/head.php';
include 'views/header.php';
$action = isset($_GET['action'])?$_GET['action']: 'Login';
switch($action){
        //Als een vereniging registreert
    case 'Register':
        if(!isset($_SESSION['id2'])){
            session_destroy();
            $message = "Meld uw vereniging aan";
            include 'views/register.php';
        } 
        elseif(isset($_SESSION['id2']) AND isset($_SESSION['active2']) AND $_SESSION['active2'] == 2) {
            //Checkt of er al ingelogd is of niet
            include 'model/check.php';
            $messsage = $_SESSION['first_names'];
            include 'views/userpanel.php';
            include 'views/ingelogd.php';
        }else {
            session_destroy();
            //Als er gebruiker naar deze pagina gaat, maar niet ingelogd is
            $message = 'U moet ingelogd zijn om deze pagina te kunnen bekijken';
//          include 'views/intro.php';
            include 'views/login.php';
        }
        break;
        //Als er wordt ingelogd
    case 'Login':
        if(!isset($_SESSION['id2'])){
            session_destroy();
            $message = 'Welkom! Login en bewerk je pagina';
//            include 'views/intro.php';
            include 'views/login.php';
        }        
        elseif(isset($_SESSION['id2']) AND isset($_SESSION['active2']) AND $_SESSION['active2'] == 2) {
            //Checkt of er al ingelogd is of niet
            include 'model/check.php';
            $messsage = $_SESSION['first_names'];
            include 'views/userpanel.php';
            include 'views/ingelogd.php';
        } 
        else {
            session_destroy();
            //Als er gebruiker naar deze pagina gaat, maar niet ingelogd is
            $message = 'U moet ingelogd zijn om deze pagina te kunnen bekijken';
//          include 'views/intro.php';
            include 'views/login.php';
        }
        break;
        //Als er wordt ingelogd met active=2
    case 'Login-saved':
        if(!isset($_SESSION['id1'])){
            $message = 'U heeft uw gegevens succesvol gewijzigd. Log nu in';
//            include 'views/intro.php';
            include 'views/login.php';
        }   
        elseif(isset($_SESSION['id2']) AND isset($_SESSION['active2']) AND $_SESSION['active2'] == 2) {
            //Checkt of er al ingelogd is of niet
            include 'model/check.php';
            $messsage = $_SESSION['first_names'];
            include 'views/userpanel.php';
            include 'views/ingelogd.php';
        } 
        else {
            session_destroy();
            //Als er gebruiker naar deze pagina gaat, maar niet ingelogd is
            $message = 'U moet ingelogd zijn om deze pagina te kunnen bekijken';
//          include 'views/intro.php';
            include 'views/login.php';
        }
        break;
        //Als er een error is tijdens het inloggen
    case 'Inlogerror':
        if(!isset($_SESSION['id2'])){
            $message = 'Dat is geen juiste combinatie...';
//            include 'views/intro.php';
            include 'views/login.php';
        }
        elseif(isset($_SESSION['id2']) AND isset($_SESSION['active2']) AND $_SESSION['active2'] == 2) {
            //Checkt of er al ingelogd is of niet
            include 'model/check.php';
            $messsage = $_SESSION['first_names'];
            include 'views/userpanel.php';
            include 'views/ingelogd.php';
        } 
        else {
            session_destroy();
            //Als er gebruiker naar deze pagina gaat, maar niet ingelogd is
            $message = 'U moet ingelogd zijn om deze pagina te kunnen bekijken';
//          include 'views/intro.php';
            include 'views/login.php';
        }
        break;
    case 'logErrors':
        if(isset($_SESSION['id2']) AND isset($_SESSION['active2']) AND $_SESSION['active2'] == 2) {
            //Checkt of er al ingelogd is of niet
            include 'model/check.php';
            $messsage = $_SESSION['first_names'];
            include 'views/userpanel.php';
            include 'views/ingelogd.php';
        } 
        elseif(isset($_SESSION['id1']) AND isset($_SESSION['active1']) AND $_SESSION['active1'] == 1){
            //Als er ingelogd wordt met active 1, dan komt er deze pagina, hier moet de gebruiker zijn of haar inloggegevens wijzigen
            include 'model/check.php';
            $message = $_SESSION['first_names'] . ", om verder te gaan moet u uw inloggegevens wijzigen";
            include 'views/New-user.php';
        }
        else {
            $url = $_SERVER['REQUEST_URI'];
            
            if(isset($_GET['message']) AND $_GET['message'] == 'lengthuser'){
                $message = 'Onjuiste lengte voor de gebruikersnaam. <br> Gebruikersnaam mag maximaal 10 karakters bevatten en minimaal 4';
            }
            elseif(isset($_GET['message']) AND $_GET['message'] == 'lengthpass'){
                $message = 'Onjuiste lengte voor de wachtwoord. <br> wachtwoord mag maximaal 16 karakters bevatten en minimaal 8';
            }
            elseif(isset($_GET['message']) AND $_GET['message'] == 'useralfa'){
                $message = 'Gebruikersnaam moet alfabetische numering bevatten';
            }
            elseif(isset($_GET['message']) AND $_GET['message'] == 'passalfa'){
                $message = 'Wachtwoord moet een alfabetische numering bevatten';
            }
            
//            include 'views/intro.php';
            include 'views/login.php';
        }
        break;
        //Als er succesvol is geregistreerd
    case 'Regsuc':
        if(!isset($_SESSION['id2'])){
            //Als er geen sessie is | Als de gebruiker niet is ingelogd
            $message = 'U bent succesvol geregistreerd. U ontvangt binnenkort een email';
//            include 'views/intro.php';
            include 'views/login.php';
        }
        elseif(isset($_SESSION['id2']) AND isset($_SESSION['active2']) AND $_SESSION['active2'] == 2) {
            //Checkt of er al ingelogd is of niet
            include 'model/check.php';
            $messsage = $_SESSION['first_names'];
            include 'views/userpanel.php';
            include 'views/ingelogd.php';
        } 
        else {
            session_destroy();
            //Als er gebruiker naar deze pagina gaat, maar niet ingelogd is
            $message = 'U moet ingelogd zijn om deze pagina te kunnen bekijken';
//          include 'views/intro.php';
            include 'views/login.php';
        }
        break;
        //Als er een fout is tijdens het registreren
    case 'Foutreg':
        if(!isset($_SESSION['id2'])){
            //Als er geen sessie is | Als de gebruiker niet is ingelogd
            if(isset($_GET['error']) AND $_GET['error'] == 'Bestaat'){
                $message = 'Er is al een vereniging geregistreerd onder de zelfde naam';
            } else { 
            $message = 'Er is helaas iets misgegaan... Probeer het later opniew';
            }
//            include 'views/intro.php';
            include 'views/register.php';
        }
            elseif(isset($_SESSION['id2']) AND isset($_SESSION['active2']) AND $_SESSION['active2'] == 2) {
            //Checkt of er al ingelogd is of niet
            include 'model/check.php';
            $messsage = $_SESSION['first_names'];
            include 'views/userpanel.php';
            include 'views/ingelogd.php';
        } 
        else {
            session_destroy();
            //Als er gebruiker naar deze pagina gaat, maar niet ingelogd is
            $message = 'U moet ingelogd zijn om deze pagina te kunnen bekijken';
//          include 'views/intro.php';
            include 'views/login.php';
        }
        break;
    case 'Foutlog':
        if(!isset($_SESSION['id2'])){
            //Als er geen sessie is | Als de gebruiker niet is ingelogd
            $message = 'Er is helaas iets misgegaan... Probeer het later opniew';
//            include 'views/intro.php';
            include 'views/login.php';
        }
        elseif(isset($_SESSION['id2']) AND isset($_SESSION['active2']) AND $_SESSION['active2'] == 2) {
            //Checkt of er al ingelogd is of niet
            include 'model/check.php';
            $messsage = $_SESSION['first_names'];
            include 'views/userpanel.php';
            include 'views/ingelogd.php';
        } 
        else {
            session_destroy();
            //Als er gebruiker naar deze pagina gaat, maar niet ingelogd is
            $message = 'U moet ingelogd zijn om deze pagina te kunnen bekijken';
//          include 'views/intro.php';
            include 'views/login.php';
        }

        break;
    case 'Logout':
        if(!isset($_SESSION['id2'])){
            $message = 'U moet ingelogd zijn om deze actie te kunnen voltooien';
            session_destroy();
            include 'views/login.php';
        }else {
            include 'model/logout.php';
        }
        break;
    case 'Uitgelogd':
        if(!isset($_SESSION['id2'])){
            //Als er geen sessie is | Als de gebruiker niet is ingelogd
            $message = "U bent succesvol uitgelogd";
//            include 'views/intro.php';
            include 'views/login.php';
        }
        elseif(isset($_SESSION['id2']) AND isset($_SESSION['active2']) AND $_SESSION['active2'] == 2) {
            //Checkt of er al ingelogd is of niet
            include 'model/check.php';
            $messsage = $_SESSION['first_names'];
            include 'views/userpanel.php';
            include 'views/ingelogd.php';
        } 
        else {
            session_destroy();
            //Als er gebruiker naar deze pagina gaat, maar niet ingelogd is
            $message = 'U moet ingelogd zijn om deze pagina te kunnen bekijken';
//          include 'views/intro.php';
            include 'views/login.php';
        }
        break;
    case 'Change':
        if(isset($_SESSION['id1']) AND isset($_SESSION['active1']) AND $_SESSION['active1'] == 1){
            //Als er ingelogd wordt met active 1, dan komt er deze pagina, hier moet de gebruiker zijn of haar inloggegevens wijzigen
            include 'model/check.php';
            $message = $_SESSION['first_names'] . ", om verder te gaan moet u uw inloggegevens wijzigen";
            include 'views/New-user.php';
        } elseif(isset($_SESSION['id2']) AND isset($_SESSION['active2'])) {
            include 'model/check.php';
            $messsage = $_SESSION['first_names'];
            include 'views/userpanel.php';
            include 'views/ingelogd.php';
        }
         else{
             $message = "U moet ingelogd zijn om deze pagina te kunnen gebruiken";
             include 'views/login.php';
        }
        break;
    case 'User_exist':
        if(isset($_SESSION['id1']) AND isset($_SESSION['active1']) AND $_SESSION['active1'] == 1){
            //Als er ingelogd wordt met active 1, dan komt er deze pagina, hier moet de gebruiker zijn of haar inloggegevens wijzigen
            include 'model/check.php';
            $message = $_SESSION['first_names'] . ", de ingevoerde gebruikersnaam bestaat al. <br> Kies een ander";
            include 'views/New-user.php';
        } elseif(isset($_SESSION['id2']) AND isset($_SESSION['active2'])) {
            include 'model/check.php';
            $messsage = $_SESSION['first_names'];
            include 'views/userpanel.php';
            include 'views/ingelogd.php';
        }
         else{
             $message = "U moet ingelogd zijn om deze pagina te kunnen gebruiken";
             include 'views/login.php';
        }
        break;
    case 'userErrors':
        if(isset($_SESSION['id1']) AND isset($_SESSION['active1']) AND $_SESSION['active1'] == 1){
            //Als er ingelogd wordt met active 1, dan komt er deze pagina, hier moet de gebruiker zijn of haar inloggegevens wijzigen
            include 'model/check.php';
            
            $url = $_SERVER['REQUEST_URI'];
            
            if(isset($_GET['message']) AND $_GET['message'] == 'usernamefirst'){
                $message = 'Gebruikersnaam mag niet overeen komen met uw naam';
            }
            elseif(isset($_GET['message']) AND $_GET['message'] == 'lengthuser'){
                $message = 'Onjuiste lengte voor de gebruikersnaam.<br>';
            }
            elseif(isset($_GET['message']) AND $_GET['message'] == 'lengthpass'){
                $message = 'Onjuiste lengte voor de wachtwoord';
            }
            elseif(isset($_GET['message']) AND $_GET['message'] == 'useralfa'){
                $message = 'Gebruikersnaam moet alfabetische numering bevatten';
            }
            elseif(isset($_GET['message']) AND $_GET['message'] == 'passalfa'){
                $message = 'Wachtwoord moet een alfabetische numering bevatten';
            }
            
            include 'views/New-user.php';
        } elseif(isset($_SESSION['id2']) AND isset($_SESSION['active2'])) {
            include 'model/check.php';
            $messsage = $_SESSION['first_names'];
            include 'views/userpanel.php';
            include 'views/ingelogd.php';
        }
         else{
             $message = "U moet ingelogd zijn om deze pagina te kunnen gebruiken";
             include 'views/login.php';
        }
        break;
        //Als er succesvol is ingelogd
    case 'Dashboard':
        if(isset($_SESSION['id2']) AND isset($_SESSION['active2']) AND $_SESSION['active2'] == 2){
            include 'model/site_status.php';
            include 'model/check.php';
            include 'views/userpanel.php';
            include 'views/Dashboard.php';
        }
        elseif(isset($_SESSION['id1']) AND isset($_SESSION['active1']) AND $_SESSION['active1'] == 1){
            include 'model/check.php';
            $message = $_SESSION['first_names'] . ", om verder te gaan moet u uw inloggegevens wijzigen";
            include 'views/New-user.php';
        }
        else {
            //Als er gebruiker naar deze pagina gaat, maar niet ingelogd is
            $message = 'U moet ingelogd zijn om deze pagina te kunnen bekijken';
//            include 'views/intro.php';
            include 'views/login.php';
        }
        break;
        //de Edit
    case 'Edit':
        if(isset($_SESSION['id2']) AND isset($_SESSION['active2']) AND $_SESSION['active2'] == 2){
            include 'model/check.php';
            include 'views/userpanel.php';
            include 'views/Edit-user.php';
        }
        elseif(isset($_SESSION['id1']) AND isset($_SESSION['active1']) AND $_SESSION['active1'] == 1){
            include 'model/check.php';
            $message = $_SESSION['first_names'] . ", om verder te gaan moet u uw inloggegevens wijzigen";
            include 'views/New-user.php';
        }
        else {
            //Als er gebruiker naar deze pagina gaat, maar niet ingelogd is
            $message = 'U moet ingelogd zijn om deze pagina te kunnen bekijken';
//            include 'views/intro.php';
            include 'views/login.php';
        }
        break;
        //Als een vereniging naar hun eigen site gaan
    case 'Site':
        //De site (bezoeken)
        if(isset($_SESSION['id2']) AND isset($_SESSION['active2']) AND $_SESSION['active2'] == 2){
            include 'model/check.php';
            include 'model/check-site.php';
            include 'views/userpanel.php';
            include 'views/Site.php';
        }
        elseif(isset($_SESSION['id1']) AND isset($_SESSION['active1']) AND $_SESSION['active1'] == 1){
            include 'model/check.php';
            $message = $_SESSION['first_names'] . ", om verder te gaan moet u uw inloggegevens wijzigen";
            include 'views/New-user.php';
        }
        else {
            //Als er gebruiker naar deze pagina gaat, maar niet ingelogd is
            $message = 'U moet ingelogd zijn om deze pagina te kunnen bekijken';
//            include 'views/intro.php';
            include 'views/login.php';
        }
        break;
        //Om de pagina te wijzigen
    case 'EditSite':
                //De site (editen)
        if(isset($_SESSION['id2']) AND isset($_SESSION['active2']) AND $_SESSION['active2'] == 2){
            include 'model/check.php';
            include 'model/check-site.php';
            include 'views/userpanel.php';
            include 'views/Edit-site.php';
        }
        elseif(isset($_SESSION['id1']) AND isset($_SESSION['active1']) AND $_SESSION['active1'] == 1){
            include 'model/check.php';
            $message = $_SESSION['first_names'] . ", om verder te gaan moet u uw inloggegevens wijzigen";
            include 'views/New-user.php';
        }
        else {
            //Als er gebruiker naar deze pagina gaat, maar niet ingelogd is
            $message = 'U moet ingelogd zijn om deze pagina te kunnen bekijken';
//            include 'views/intro.php';
            include 'views/login.php';
        }
        break;
    case 'Planner':
                //De site (editen)
        if(isset($_SESSION['id2']) AND isset($_SESSION['active2']) AND $_SESSION['active2'] == 2){
            include 'model/check.php';
            include 'model/datum.php';
            include 'views/userpanel.php';
            include 'views/Planner.php';
        }
        elseif(isset($_SESSION['id1']) AND isset($_SESSION['active1']) AND $_SESSION['active1'] == 1){
            include 'model/check.php';
            $message = $_SESSION['first_names'] . ", om verder te gaan moet u uw inloggegevens wijzigen";
            include 'views/New-user.php';
        }
        else {
            //Als er gebruiker naar deze pagina gaat, maar niet ingelogd is
            $message = 'U moet ingelogd zijn om deze pagina te kunnen bekijken';
//            include 'views/intro.php';
            include 'views/login.php';
        }
        break;
    case 'Message':
                //De site (editen)
        if(isset($_SESSION['id2']) AND isset($_SESSION['active2']) AND $_SESSION['active2'] == 2){
            include 'model/check.php';
            include 'model/show-messages.php';
            include 'views/userpanel.php';
            include 'views/message.php';
        }
        elseif(isset($_SESSION['id1']) AND isset($_SESSION['active1']) AND $_SESSION['active1'] == 1){
            include 'model/check.php';
            $message = $_SESSION['first_names'] . ", om verder te gaan moet u uw inloggegevens wijzigen";
            include 'views/New-user.php';
        }
        else {
            //Als er gebruiker naar deze pagina gaat, maar niet ingelogd is
            $message = 'U moet ingelogd zijn om deze pagina te kunnen bekijken';
//            include 'views/intro.php';
            include 'views/login.php';
        }
        break;
        //Als een gebruiker iets anders in de url intypt
    default:
        if(isset($_SESSION['id2']) AND isset($_SESSION['active2']) AND $_SESSION['active2'] == 2){
            include 'views/Dashboard.php';
            break; 
        } 
        elseif(isset($_SESSION['id1']) AND isset($_SESSION['active1']) AND $_SESSION['active1'] == 1){
            include 'model/check.php';
            $message = $_SESSION['first_names'] . ", om verder te gaan moet u uw inloggegevens wijzigen";
        }
        else {
            //Als er gebruiker naar deze pagina gaat, maar niet ingelogd is
            $message = 'U moet ingelogd zijn om deze pagina te kunnen bekijken';
//            include 'views/intro.php';
            include 'views/login.php';
        }
        break;
        //Om een gebruiker goed te keuren. Hoort bij de gemeente gedeelte, maar voor nu ook hier
    case 'active':
        include 'views/gemeente.php';
        break;
}
include 'views/footer.php';
       
//    if(isset($_SESSION['id'])){
//        echo '<a href="?action=Dashboard"><button>Terug</button></a>';
//        echo $_SESSION['id'];
//        echo '<a href="model/logout.php"><button>uitloggen</button></a>';
//    } 
   
?>
    
    
<!---->