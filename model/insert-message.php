<?php

if(isset($_SESSION['id2']) AND isset($_SESSION['active2']) AND $_SESSION['active2'] == 2){
    $conn = mysqli_connect('localhost', 'Shaif_B_Kunst', 'BhaggoeKunst', 'kunst');
    
    $subject = mysqli_real_escape_string($conn, $_POST['tekst']);
    $content - mysqli_real_escape_string($conn, $_POST['message']);
    $id = $_SESSION['id2'];
    
    $sql = "INSERT INTO messages (users_id, subjects, contents) VALUES ('$id', '$subject', '$content')";
    
    if(!mysqli_query($conn, $sql)){
        echo 'error';
        
    } else {
        header("Location: ../?action=Message");
    }
    
} else {
    header("Location ../?action=Login");
}


?>