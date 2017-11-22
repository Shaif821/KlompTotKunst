<?php

if(isset($_SESSION['id2'])){
    $id = $_SESSION['id2'];
}
   else {
    header("Location: ../?action=Planner");
}
   
   $sql = "SELECT * FROM events WHERE users_id='$id' ORDER BY timestamp";
   $result = mysqli_query($conn, $sql) or die($conn);
   
?>
