<?php
session_start();
//Include de connectie met de database
include '../includes/connect.php';

//Als er wat gepost is EN de button is gezet/klikt
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['verzend'])){
        
    if(empty($_POST) == FALSE) {
        
        $username = mysqli_real_escape_string($conn, $_POST['user']);
        $password = mysqli_real_escape_string($conn, $_POST['pass']);
//        $password = sha1($password);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        
        if(strlen($username) > 10 || strlen($username) < 4){
               header("Location: ../?action=logErrors&message=lengthuser");
//               $message = 'Onjuiste lengte voor de gebruikersnaam';
           }
        elseif(strlen($password) > 16 || strlen($password) < 8){
               header("Location: ../?action=logErrors&message=lengthpass");
//               $message = 'Onjuiste lengte voor de gebruikersnaam';
           }
  
        else { 
            $password = sha1($password);
        //Active = 1, dus goedgekeurd
        $sql1 = "SELECT * FROM user_data WHERE username='$username' AND password='$password' AND emails='$email' AND active=1";
        $result1 = mysqli_query($conn, $sql1) or die($conn);

        
            //Een variable row is aangemaakt dat gelijk is aan de info van de db
        //Als er geen resultaat is met active = 0
        if(!$row1 = $result1->fetch_assoc()){
            //Active = 2, Dus kan gewoon inloggen
            $sql2 = "SELECT * FROM user_data WHERE username='$username' AND password='$password' AND emails='$email' AND active=2";
            $result2 = mysqli_query($conn, $sql2) or die($conn);
            
            if(!$row2 = $result2->fetch_assoc()){
                header("Location: ../?action=Inlogerror");
            }
            elseif($row2['active'] = 2){
                $_SESSION['id2'] = $row2['id'];
                $_SESSION['first_names'] = $row2['first_names'];
                $_SESSION['active2'] = $row2['active'];
                header("Location: ../?action=Dashboard");
            }
            else {
                echo "error2";
            }
        }
        //Word gewijzigd
        elseif($row1['active'] == 1){
            $_SESSION['id1'] = $row1['id'];
            $_SESSION['first_names'] = $row1['first_names'];
            $_SESSION['active1'] = $row1['active'];
            header("Location: ../?action=Change");
        }
        else {
            echo "error3";
        }

    }
}

    
    else {
        echo "error";
    }
    
    }


else {
   $action = 'Login';
}





    ?>
