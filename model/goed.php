<?php
include '../includes/connect.php';

foreach($_POST['id'] as $check){
    
    $check = str_replace(array('[',']'), '',$check);
    $check = str_replace(array('i','d'), '',$check);
    $sql = "UPDATE register SET active=1 WHERE id='$check'";
    $result = mysqli_query($conn, $sql) or die($conn);
    
    $sql_reg = "SELECT * FROM register WHERE id='$check'";
    $result_reg = mysqli_query($conn, $sql_reg) or die($conn);

    while($row = $result_reg->fetch_assoc()){
        $firstname = $row['first_names'];
        $lastname = $row['last_names'];
        $tel = $row['tel_numbers'];
        $email = $row['emails'];
        $bedrijf_names = $row['bedrijf_names'];
        $websites = $row['websites'];
        $soort = $row['soort'];
        $district_name = $row['district_name'];

    }
    
    //Hier wordt het uitgevoerd
     $username = $lastname . $firstname;
    
    //tijdelijke wachtwoord
    $password1 = sha1($firstname);
    $password2 = sha1($lastname);
    $password1 = substr($password1, 2, -2);
    $password2 = substr($password2, 1, -1);
    $merge = $password1 . $password2;
    $password = substr($merge, 30, -30);
    $password = substr($merge, 30, -30);

    $sql_data = "INSERT INTO user_data (username, password, first_names, last_names, tel_numbers, emails, bedrijf_names, websites, soort, district_name, active) VALUES('$username', '$password', '$firstname', '$lastname', '$tel', '$email', '$bedrijf_names', '$websites', '$soort', '$district_name', 1)";
    
    $result_data = mysqli_query($conn, $sql_data) or die($conn);
    
    $sql_del = "DELETE FROM register WHERE id='$check'";
    $result_del = mysqli_query($conn, $sql_del) or die($conn);
}

header("Location: ../?action=active");
?>


