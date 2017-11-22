<?php
//Lokaal

//Host
//include '../includes/connect-host.php';

$sql = "SELECT id, first_names FROM register WHERE active = 0";

$result = mysqli_query($conn, $sql);
?>
<form action='model/goed.php' method='POST'>
<?php
while($row = $result->fetch_assoc()){
    echo '<input type="checkbox" value="id[' . $row['id'] .']" name="id[' . $row['id'] .']">' . $row['first_names'] . '</a>';
    }
    
    ?>
    <input type="submit" value="sendactie">
    </form>
        
