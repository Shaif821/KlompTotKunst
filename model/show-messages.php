<?php

if(isset($_SESSION['id2'])){
    $id = $_SESSION['id2'];
}
   else {
    header("Location: ../?action=Planner");
}
   
   $sql = "SELECT * FROM messages WHERE users_id='$id' ORDER BY time DESC";
   $result = mysqli_query($conn, $sql) or die($conn);
   
?>