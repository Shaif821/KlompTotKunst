<?php

    $id = $_SESSION['id2'];
    $sql_check = "SELECT * FROM contact WHERE users_id='$id'";
    $result = mysqli_query($conn, $sql_check) or die(mysqli_error($conn));
    
    while($row = $result->fetch_assoc()){
        $active = $row['active'];
    }
    
    if($active == 2){
        $message = "Uw aanvraag om uw site online te plaatsen is in behandeling";
    }
    else {
        $message = "Site online plaaatsen";
    }
    



?>