<?php

if(isset($_POST['sitedit'])){
    session_start();
    $conn = mysqli_connect('localhost', 'Shaif_B_Kunst', 'BhaggoeKunst', 'kunst');
    
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $about = mysqli_real_escape_string($conn, $_POST['about']);
    $adress = mysqli_real_escape_string($conn, $_POST['adress']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $zipcode = mysqli_real_escape_string($conn, $_POST['zipcode']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $telefoon = mysqli_real_escape_string($conn, $_POST['telefoon']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $website = mysqli_real_escape_string($conn, $_POST['website']);
    $active = 1;
    $id = $_SESSION['id2'];
    
    $sql_check = mysqli_query($conn, "SELECT users_id FROM contact WHERE users_id='$id'");
    if(mysqli_num_rows($sql_check) > 0){
    
        $sql_insert_site = "UPDATE contact SET Title='$title', About='$about', adress='$adress', number='$number', zipcode='$zipcode', district_names='$district', telefoon='$telefoon', emails='$email', websites='$website', active='$active' WHERE users_id='$id'";
        
        
        if(mysqli_query($conn, $sql_insert_site) == TRUE){
        header("Location: ../?action=Site");
        }
        else {
        echo "ERROR:" . mysqli_error($conn);
        }
    }
    else {
         $sql_insert_site2 = "UPDATE contact SET Title='$title', About='$about', adress='$adress', number='$number', zipcode='$zipcode', district_names='$district', telefoon='$telefoon', emails='$email', websites='$website', active='$active'";
        
        if(mysqli_query($conn, $sql_insert_site2) == TRUE){
        header("Location: ../?action=Site");
        }
        else {
        echo "ERROR:" . mysqli_error($conn);
        }
    }

}


?>