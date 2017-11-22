<?php
session_start();
//Include de connectie met de database
include '../includes/connect.php';

//Als er wat gepost is EN de button is gezet/klikt
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['verzendnew'])){
        
    if(empty($_POST) == FALSE) {
            
            $username = mysqli_real_escape_string($conn, $_POST['usernew']);
            $password = mysqli_real_escape_string($conn, $_POST['passnew']);
//            $password = sha1($password);
            $id = $_SESSION['id1'];
        
        if($username == $_SESSION['first_names']){
               header("Location: ../?action=userErrors&message=usernamefirst");
//               $message = 'Gebruikersnaam mag niet overeen komen met uw naam';
           }
        elseif(strlen($username) > 20 || strlen($username) < 4){
               header("Location: ../?action=userErrors&message=lengthuser");
//               $message = 'Onjuiste lengte voor de gebruikersnaam';
           }
        elseif(strlen($password) > 15 || strlen($password) < 8){
            header("Location: ../?action=userErrors&message=lengthpass");
//               $message = 'Onjuiste lengte voor de wachtwoord';
        }
//        elseif(ctype_alnum($username) != TRUE){
//            header("Location: ../?action=userErrors&message=useralfa");
////               $message = 'Gebruikersnaam moet alfabetische numering bevatten';
//        }
//        elseif(ctype_alnum($password) != TRUE){
//            header("Location: ../?action=userErrors&message=passalfa");
////               $message = 'Wachtwoord moet een alfabetische numering bevatten';
//        }
        else {
                    
            $password = sha1($password);
            
            $sql_check_user = mysqli_query($conn, "SELECT username FROM user_data WHERE username='$username'");
        
            if(mysqli_num_rows($sql_check_user) > 0){
                header("Location: ../?action=User_exist");
            }
            
            else { 
             //Als gebruiker inlogd met active=1
            $sql = "UPDATE user_data SET username='$username', password='$password', active=2  WHERE id='$id'";
            
            $sql_in = "SELECT * FROM user_data WHERE id='$id'";
           
        //Kopieert alles in contact alle gegevens. etc.
            if($conn->query($sql) == TRUE){
                $result = mysqli_query($conn, $sql_in) or die (mysqli_error($conn));
                while($row = $result->fetch_assoc()){
                    $district_names = $row['district_names'];
                    $telefoon = $row['tel_numbers'];
                    $email = $row['emails'];
                    $website = $row['websitess'];
                    $title = $row['bedrijf_names'];
                }
            
                 $sql2 = "INSERT INTO contact (users_id, district_names, telefoon, emails, websites, Title) VALUES('$id', '$district_name', '$telefoon', '$email', '$websites', '$title')";
                
                if(mysqli_query($conn, $sql2)){
                    include '../model/user_save.php';
                session_destroy();
                header("Location: ../?action=Login-saved");
                } else {
                    echo $conn->error;
                }
                
            } else {
                session_destroy();
                header("Location: ../?action=Foutlog");
            }
            }
        }
    }
}
                
else {
   header("Location: ../?action=Login");
}

