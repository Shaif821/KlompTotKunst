<?php
            if(isset($_POST['submitfoto']))
            {
                
                
                if(getimagesize($_FILES['image']['tmp_name']) === FALSE)
                {
                    header("Location: ../?action=Edit");
                }
                else
                {
                    $image= addslashes($_FILES['image']['tmp_name']);
                    $name= addslashes($_FILES['image']['name']);
                    $image= file_get_contents($image);
                    $image= base64_encode($image);
                    saveimage($name,$image);
                }
            }

            
            function saveimage($name,$image){
                session_start();
                $conn = mysqli_connect('localhost', 'Shaif_B_Kunst', 'BhaggoeKunst', 'kunst');
                $id2 = $_SESSION['id2'];
//                $con = mysqli_connect('localhost', 'root', '', 'kunst');

                $sql_controle = "SELECT image, imagename FROM contact WHERE users_id='$id2'";
                $result_controle = mysqli_query($conn, $sql_controle) or die($conn);
                while($row = $result_controle->fetch_assoc()){
                    if(!empty($row['image'])){
                         $qry = "UPDATE contact SET image='$image', imagename='$name' WHERE users_id='$id2'";
                        if($conn->query($qry) === FALSE){
                            echo "Error: " . $qry . "<br>" . $conn->error;
                        }
                        else{
                            header("Location: ../?action=Dashboard");
                        }
                    }else {
                        $qry_in = "UPDATE contact SET image='$image', imagename='$name' WHERE users_id='$id2'";
                        if($conn->query($qry_in) == FALSE){
                            //Error voor als ewr nikg geupload is
                             echo "Error: " . $qry_in . "<br>" . $conn->error;
                        }
                        else {
                            header("Location: ../?action=Dashboard");
                        }
                    }
                }
            }

         
            function displayimage()
            {
                $id = $_SESSION['id2'];
                $conn = mysqli_connect('localhost', 'Shaif_B_Kunst', 'BhaggoeKunst', 'kunst');
                $qry="SELECT image, imagename FROM contact WHERE users_id='$id'";
                $results = mysqli_query($conn, $qry) or die (mysqli_error($conn));
                while($row = $results->fetch_assoc()){
                    if(empty($row['image'])){ 
                    echo '<div class="polaroid"><img style="width:100%" id="headeroutput" class="prof"  src="http://dekunstvanwel.nl/wp-content/uploads/2014/12/starry1.jpg"><div class="overlay"><div class="text-overlay">Vertegenwoordig uw vereniging <br> doormiddel van een afbeelding.<br> Voeg een afbeelding toe!<br> <b>Dit is een voorbeeld afbeelding</b></div></div></div>';
                        
                    } 
                    else {
                        echo '<div class="polaroid"><img style="width:100%" id="headeroutput" class="prof"  src="data:image;base64,'.$row['image'].' "><div class="overlay"><div class="text-overlay">Uw vereniging wordt <br> vertegenwoordigd doormiddel van deze<br> afbeelding.</div></div></div>';
                    }
                       
                    
                }
     
            }
            
           function delimage(){
               session_start();
               $conn = mysqli_connect('localhost', 'Shaif_B_Kunst', 'BhaggoeKunst', 'kunst');
               $id = $_SESSION['id2'];
                $sql_del_img = "UPDATE contact SET image='', imagename='' WHERE users_id='$id'";
                 if($conn->query($sql_del_img) === FALSE){
                     echo 'er is iets misgegaan..';
                 } else {
                     header("Location: ../?action=Edit");
                 }
           }

         if(isset($_POST['delimg'])){
             delimage();
         }



          if(isset($_POST['contact'])){
             session_start();
             $conn = mysqli_connect('localhost', 'Shaif_B_Kunst', 'BhaggoeKunst', 'kunst');
              
             $adress2 = mysqli_real_escape_string($conn, $_POST['adress']);
             $number2 = mysqli_real_escape_string($conn, $_POST['number']);
             $telefoon2 = mysqli_real_escape_string($conn, $_POST['telefoon']);
             $emails2 = mysqli_real_escape_string($conn, $_POST['emails']);
             $websites2 = mysqli_real_escape_string($conn, $_POST['websites']);
             $zip2 = mysqli_real_escape_string($conn, $_POST['zipcode']);
             
             $id = $_SESSION['id2'];
             $sql_district = "SELECT district_name FROM user_data WHERE id='$id'";
             $result = $conn->query($sql_district);
             $row = $result->fetch_assoc();
             $districts2 = $row['district_name'];
              

             $conn = mysqli_connect('localhost', 'Shaif_B_Kunst', 'BhaggoeKunst', 'kunst');
             $id = $_SESSION['id2'];
//             global $adress2;
//             global $number2;
//             global $telefoon2;
//             global $emails2;
//             global $websites2;
//             global $districts2;
//             global $zip2;

             $sql_control = "SELECT * FROM contact WHERE users_id='$id'";
             
             $result_control = $conn->query($sql_control) or die($conn);
             
             if(mysqli_num_rows($result_control) == 0){
                 $sql_in = "INSERT INTO contact (users_id, adress, number, zipcode, district_names, telefoon, emails, websites) VALUES('$id', '$adress2', '$number2', '$zip2', '$districts2', '$telefoon2', '$emails2', '$websites2')";
                 
//                 $result_in = mysqli_query($conn, $sql_in) or die ($conn);
                    
                 if($conn->query($sql_in) == TRUE){
                     include 'email_contactsave.php';
                     header("Location: ../?action=Dashboard");
                 } else {
                      echo "Error: " . $sql_in . "<br>" . $conn->error;
                 }
                 
             } else {
                 $sql_up = "UPDATE contact SET adress='$adress2', number='$number2', zipcode='$zip2', district_names='$districts2', telefoon='$telefoon2', emails='$emails2', websites='$websites2' WHERE users_id='$id'";
                 
                 if($conn->query($sql_up) == TRUE){
                     include 'email_contactsave.php';
                     header("Location: ../?action=Dashboard");
                 } else {
                     echo $conn->error;
                 }
             } 
                 
         }
        

        if(isset($_POST['datesub'])){
            session_start();
            $conn = mysqli_connect('localhost', 'Shaif_B_Kunst', 'BhaggoeKunst', 'kunst');
            
            $name = mysqli_real_escape_string($conn, $_POST['namepick']);
            $date = mysqli_real_escape_string($conn, $_POST['datepick']);
            $time = mysqli_real_escape_string($conn, $_POST['timepick']);
            
            $id = $_SESSION['id2'];
            
            $sql_2 = "SELECt * FROM contact WHERE users_id='$id'";
            
            $result_2 = mysqli_query($conn, $sql_2) or die (mysqli_error($conn));
            while($row = $result_2->fetch_assoc()){
                $bedrijf = $row['Title'];
            }
            
            $sql = "INSERT INTO events(users_id, bedrijf_names, Name, Date, Time, active) VALUES('$id',  '$bedrijf', '$name', '$date', '$time', '0')";
            if(!$conn->query($sql) == TRUE){
                echo "Error: " . $sql . "<br>" . $conn->error;
            }else { 
                header("Location: ../?action=Planner");
            
        }
        }

        if(isset($_POST['verzendtext'])){
            session_start();
            
            $conn = mysqli_connect('localhost', 'Shaif_B_Kunst', 'BhaggoeKunst', 'kunst');

            $subject = mysqli_real_escape_string($conn, $_POST['tekst']);
            $content = mysqli_real_escape_string($conn, $_POST['description']);
            $id = $_SESSION['id2'];

            $sql = "INSERT INTO messages (users_id, subjects, contents, active) VALUES ('$id', '$subject', '$content', '0')";

            if(!$conn->query($sql) == TRUE){
                echo "Error: " . $sql . "<br>" . $conn->error;

            } else {
                header("Location: ../?action=Message");
            }
        }


function contactdisplay(){
             
             $conn = mysqli_connect('localhost', 'Shaif_B_Kunst', 'BhaggoeKunst', 'kunst');
             $id = $_SESSION['id2'];
             

             $sql_condis = "SELECT * FROM contact WHERE users_id ='$id'";
             $result = $conn->query($sql_condis) or die($conn);
            $row = $result ->fetch_assoc();
             if($row['users_id'] == $id){
                 $result = $conn->query($sql_condis) or die($conn);
                 while ($row = $result->fetch_assoc()) {
                 echo '<label class="label">Uw contact gegevens</label>';
                 echo '<hr class="uw">';
                 echo '<li class="info"><span class="textli">Adres:</span> <span class="outputli">' . $row['adress'] . ' '. $row['number'] . '</span></li>';
                 echo '<li class="info"><span class="textli">Postcode:</span> <span class="outputli">' . $row['zipcode'] . '</span></li>';
                 echo '<li class="info"><span class="textli">Plaats:</span> <span class="outputli">' . $row['district_names'] . '</span></li>';
                 echo '<li class="info"><span class="textli">Telefoon:</span> <span class="outputli">' . $row['telefoon'] . '</span></li>';
                 echo '<li class="info"><span class="textli">Email:</span> <span class="outputli">' . $row['emails'] . '</span></li>';
                 echo '<li class="info"><span class="textli">Website:</span> <span class="outputli">' . $row['websites'] . '</span></li>';
                 }
             } 
             else {
                 echo '<label class="label"><a class="alabel" href="?action=Edit">Werk uw verenigings gegevens bij</a></label>';
                 echo '<hr class="uw">';
                 echo '<li class="info"><span class="textli">Wijzig uw contact gegevens</span></li>';
                 echo '<li class="info"><span class="textli">Klik op "Wijzig uw verenigings gegevens"</span></li>';
                 echo '<li class="info"><span class="outputli">om uw gegevens te wijzigen"</span></li>';
             }

             
         }
     if(isset($_POST['submitheaderfoto'])){
            if(getimagesize($_FILES['image']['tmp_name']) === FALSE){
                    header("Location: ../?action=Dashboard");
                }
                else{
                    $image= addslashes($_FILES['image']['tmp_name']);
                    $name= addslashes($_FILES['image']['name']);
                    $image= file_get_contents($image);
                    $image= base64_encode($image);
                    saveheaderimage($name,$image);
                }
            }

            function saveheaderimage($name,$image){
                session_start();
                $conn = mysqli_connect('localhost', 'Shaif_B_Kunst', 'BhaggoeKunst', 'kunst');
                $id2 = $_SESSION['id2'];    
//                $con = mysqli_connect('localhost', 'root', '', 'kunst');
                
                $sql_controle = "SELECT * FROM contact WHERE users_id='$id2'";
                $result_controle = mysqli_query($conn, $sql_controle) or die(mysqli_error($conn));
                while($row = $result_controle->fetch_assoc()){
                    if(!empty($row['header'])){
                         $qry = "UPDATE contact SET header='$image', headername='$name' WHERE users_id='$id2'";
                        if($conn->query($qry) === FALSE){
                            echo "Error: " . $qry . "<br>" . $conn->error;
                        }
                        else{
                            header("Location: ../?action=Dashboard");
                        }
                    }else {
                        $qry_in = "UPDATE contact SET header='$image', headername='$name' WHERE users_id='$id2'";
                        if($conn->query($qry_in) == FALSE){
                            //Error voor als ewr nikg geupload is
                             echo "Error: " . $qry_in . "<br>" . $conn->error;
                        }
                        else {
                            header("Location: ../?action=Site");
                        }
                    }
                }
            }


         function displayheader(){
                $id = $_SESSION['id2'];
                $conn = mysqli_connect('localhost', 'Shaif_B_Kunst', 'BhaggoeKunst', 'kunst');
             
                $qry="SELECT header, headername FROM contact WHERE users_id='$id'";
                $results = $conn->query($qry)  or die(mysqli_error($conn));
                while($row = $results->fetch_assoc()){
                    if(empty($row['header'])){ 
                        echo '<div id="output" style="background:url(Stylesheet/Afbeeldingen/kunst1.jpg); background-size: cover;" class="image volendam">';
                    } 
                    else {
                         echo '<div id="output" style="background:url(data:image;base64,'.$row['header'].'); background-size: cover;" class="image volendam">';
                    }
                       
                    
                }
     
            }
     
      function showCount(){
          $id = $_SESSION['id2'];
        $conn = mysqli_connect('localhost', 'Shaif_B_Kunst', 'BhaggoeKunst', 'kunst');
          
          $sql = "SELECT * FROM messages WHERE users_id='$id'";
          
          if($result=mysqli_query($conn, $sql)){
              $rowcount = mysqli_num_rows($result);
              echo 'U heeft <span class="nummes">' . $rowcount . '</span> bericht(en)';
              
          }
          else {
              echo 'Bekijk hier uw berichten'; 
          }

      }
            







        ?>


