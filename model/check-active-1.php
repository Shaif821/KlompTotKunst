<?php
if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    
    //Voor als er ingelogd is met active=1/Dan moet de inloggegevens gewijzigd worden
    $sql_active1 = "SELECT * FROM user_data WHERE id='$id' AND active=1";
    $result_active1 = mysqli_query($conn, $sql_active1);
    
    //Voor als er ingelogd is met acitve=2/ Dan kan de gebruiker door gaan naar de Dashboard
    $sql_active2 = "SELECT * FROM user_Data WHERE id='$id' AND active=2";
    $result_active2 = mysqli_query($conn, $sql_active2);
    
    if(!$row = $result_active1->fetch_assoc()){
        header("Location: ../?action=Logout");
    }
    elseif(!row = $result_active2->fetch_assoc()){
        header("Location: ../?action=Logout")
    }
    elseif($row = $result_active1->fetch_assoc()){
        $id = $row['id'];
        $user = $row['user'];
    }
    
else {
    header("Location: ../?action=Login");
}

?>