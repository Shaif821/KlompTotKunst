<?php
$url = $_SERVER['REQUEST_URI'];

if(isset($_GET['id2']) AND isset($_GET['vereniging'])){
    $id = $_GET['id2'];
    $com = $_GET['vereniging'];
} else {
    echo "error";
}


$sql = "SELECT * FROM contact WHERE users_id='$id'";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$row = $result->fetch_assoc();

$adress = $row['adress'];
$number = $row['number'];
$district = $row['district_names'];
$zip = $row['zipcode'];
$telefoon = $row['telefoon'];
$emails = $row['emails'];
$websites = $row['websites'];
$title = $row['Title'];
$about = $row['About'];

if(empty($about) == TRUE){
    $about = "Hier kunt u informatie over uw vereniging toevoegen";
}
if(empty($adress) == TRUE){
    $adress = "Uw adress";
}
if(empty($zip) == TRUE){
    $zip = "Bijv. 1234 AB";
}








    
?>