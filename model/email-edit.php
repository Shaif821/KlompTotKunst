<?php
include '../includes/connect.php';

$sql_edit_mail = "SELECT * FROM user_data WHERE id='$id'";
$result_edit_mail = $conn->query($sql_edit_mail);


//header 
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Shaif <shaif.bhagggoe@gmail.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$subject = "Wijziging";

$body = "Beste " if(!row = $result_edit_mail->fetch_assoc()){
    
}
}

///*Om alles heen*/
//#Dashboard {
//    display: flex;
//    flex-wrap: wrap;
//    border: 2px solid DarkCyan ;
//    width: 75%;
//    height: auto;
//    margin: 0 auto;
//    transition: 0.2s ease-in-out;
//        background-position: center;
//    background-size: cover;
//}
//
//#Dashboard h3 {
//    color: black;
//    margin: 0 auto;
//    text-align: center;
//}
//
///*Welkom tekst*/
//#Dash-Welkom {
//    width: auto;
//    flex: 1;
//}
//
//.Dash-inner {
///*    border: 1px solid black;*/
//    width: 200px;
//}
//
//.first-column {
//    border: 1px solid black;
//}
//
//#Dash-img {
//    width: 200px;
//    height: 200px;
//}
//
//#Dash-img h4 {
//position:absolute;
//      top:80%;
//      left:50%; 
//      transform: translateX(-50%) translateY(-50%);
//      margin: 0;
//      text-align:center;
//    color: white;
//}
//
//#Dash-img img {
//    position: relative;
//    width: 100%;
//}
//
//.prof {
//    width: 200px;
//    height: 200px;
//}
//
//#output {
//    width: 200px;
//    height: 200px;
//}
//
//.profback {
//    opacity: 0.5;
//}
//
//.omimg {
//    position: relative;
//}
//
///*Button voor edit*/
//
//input[type=submit] {
//    border: none;
//    color: white;
//    background-color: DarkCyan ;
//    text-decoration: none;
//    cursor: pointer;
//    margin: 4px 2px;
//    padding: 16px 32px;
//}
//input[type=file] {
//    border: none;
//    color: white;
//    background-color: DarkCyan ;
//    text-decoration: none;
//    cursor: pointer;
//    margin: 4px;
//    padding: 10px;;
//}
//
//button {
//    border: none;
//    color: white;
//    background-color: DarkCyan ;
//    text-decoration: none;
//    cursor: pointer;
//    margin: 4px 2px;
//    padding: 16px 32px;
//}
//
//.buttonsimg {
//    display: flex;
//    flex: 1;
//}
//
//.hide {
//    width: 30%;
//}
//
//.del input[type=submit] {
//    width: 98%;
//}
//
//.logout {
///*    width: 99%;*/
//    background: firebrick;
//    height: 75px;
//}
//
//.logout {
//    width: 98%;
//}
//
///*De eidt knop*/
//.editbut {
//    height: 100px;
//    background: green;
//    width: 98%;
//    
//}
//.editbut a {
//    color: white;
//    text-decoration: none;
//}
///*Einde edit knop*/
//
//
///*Contact gegevens*/
//li {
//    list-style-type: none;
//    border: 1px solid white;
//    color: white;
///*    background: Darkcyan;*/
//    font-size: 90%;
//    text-align: center;
//}
//
//.info {
//    height: 80px;
//    background: grey;
//    color: white;
//    line-height: 80px;
//}
//
//.list {
//    margin: 0 auto;
//}
//
//.sitebutton {
//    height: 405px;
//    width: 500px;
//}

?>