<?php
if(isset($_SESSION['id1']) AND isset($_SESSION['active1']) AND $_SESSION['active1'] == 1){
    $id =  $_SESSION['id1'];
    $sql_user = "SELECT * FROM user_data WHERE id='$id' AND active=1";
    $result_user = $conn->query($sql_user);
    
    $row = $result_user->fetch_assoc();
}elseif(isset($_SESSION['id2']) AND isset($_SESSION['active2']) AND $_SESSION['active2'] == 2){
    $id = $_SESSION['id2'];
    $sql_user2 = "SELECT * FROM user_data WHERE id='$id' AND active=2";
    $result_user2 = mysqli_query($conn, $sql_user2);
    
    $row = $result_user2->fetch_assoc();
}
else {
       session_destroy();
       header("Location: ../?action=Login");
   }
//Voor de Dashboard.php
     
$id = $row['id'];
$user = $row['first_names'];
        
        
     