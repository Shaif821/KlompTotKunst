<?php
session_start();

    include '../includes/connect.php';

    //Als de gegevens in contact niet zijn ingevuld EN de ze geen afbeelding hebben gekozen
    $id = $_SESSION['id2'];

    //Haalt alles van contact. Kijkt of alles is ingevuld...
      $sql_all = "SELECT * FROM contact WHERE users_id='$id'";
      $result_all = mysqli_query($conn, $sql_all) or die (mysqli_error($conn));
      if(!$result_all){
          //Als je hier bent dan is er sowieso iets raars....
          $subject = "Site online plaatsen";
          $content = "Er lijkt iets mis te zijn gegaan bij het plaatsen van uw site. Zorg ervoor dat alle velden zijn ingevoerd en afbeeldingen zijn toegevoegd.";
          $sql_mes_1 = "INSERT INTO messages(users_id, subjects, contents, active) VALUES('$id', '$subject', '$content', 2)";
          $result_mes_1 = mysqli_query($conn, $sql_mes_1) or die(mysqli_error($conn));
                  //De code voor de mail
                  if(!$result_mes_1){
                      echo $sql_mes_1 . '<br>' . $conn->error;
                  }
                  else {
                      header("Location: ../?action=Message");
                  }
      }
      //Hier hoor je standaard te komen. Hier is alles geselecteerd
      else {
          //Zet alles om in variables
          $row = $result_all->fetch_assoc();
          $adress = $row['adress'];
          $number = $row['number'];
          $zipcode = $row['zipcode'];
          $district_names = $row['district_names'];
          $telefoon = $row['telefoon'];
          $emails = $row['emails'];
          $websites = $row['websites'];
          $title = $row['Title'];
          $about = $row['About'];
          $events = $row['Events'];
          $header = $row['header'];
          $headername = $row['headername'];
          $active = $row['active'];
          $image = $row['image'];
          $imagename = $row['imagename'];


          $sql_controle_live = "SELECT users_id FROM site_live WHERE users_id='$id'";
          $result_controle = mysqli_query($conn, $sql_controle_live) or die (mysqli_error($conn));
          if(!$result_controle){
              echo $conn->error;
          } else {
              $rowcount = mysqli_num_rows($result_controle);
          }

          //Als active =1  dus als je nog nooit eerder de pagina heb geplaatst
          if($rowcount == 0) {
              $sql_insert_live = "INSERT INTO site_live SELECT * FROM contact WHERE users_id='$id'";
              $result_insert_one = mysqli_query($conn, $sql_insert_live) or die(mysqli_error($conn));
              //Als het niet is gelukt dan :
              if(!$result_insert_one){
                  echo $sql_insert_live . '<br>' . $conn->error;
              }//Als het insert en plaatsen gelukt is:
              else {
                  $subject = "Site online plaatsen";
                  $content = "Uw site is succesvol online geplaatst.";
                  $sql_mes_2 = "INSERT INTO messages(users_id, subjects, contents, active) VALUES('$id', '$subject', '$content', 1)";
                  $result_insert_two = mysqli_query($conn, $sql_mes_2) or die (mysqli_error($conn));
                   //Het verzende  van de mail asl de site succesvol is geplaatst:
                         if(!$result_insert_two){
                             echo $conn->error;
                         } else {
                             $sql_update_contact = "UPDATE contact SET active=2 WHERE users_id='$id'";
                             $result_update_contact = mysqli_query($conn, $sql_update_contact) or die(mysqli_error($sql_update_contact));
                             if(!$result_update_contact){
                                 echo $conn->error;
                             }else {
                                 header("Location: ../?action=Message");
                             }
                         }
              }
          }
          elseif($rowcount == 1){
              //Als active 2 is dan wordt alles geupdatet
              $sql_delete = "DELETE FROM site_live WHERE users_id='$id'";
              $result_delete = mysqli_query($conn, $sql_delete) or die (mysqli_error($conn));
              if(!$result_delete){
                  echo $conn->error;
              } else {
                  $sql_insert_live = "INSERT INTO site_live SELECT * FROM contact WHERE users_id='$id'";
                  $result_insert_one = mysqli_query($conn, $sql_insert_live) or die(mysqli_error($conn));
                  //Als het niet is gelukt dan :
                  if(!$result_insert_one){
                      echo $sql_insert_live . '<br>' . $conn->error;
                  }//Als het insert en plaatsen gelukt is:
                  else {
                      $subject = "Site online plaatsen";
                      $content = "Uw site is succesvol online geupdatet";
                      $sql_mes_2 = "INSERT INTO messages(users_id, subjects, contents, active) VALUES('$id', '$subject', '$content', 1)";
                      $result_insert_two = mysqli_query($conn, $sql_mes_2) or die (mysqli_error($conn));
                      //Het verzende  van de mail asl de site succesvol is geplaatst:
                      if(!$result_insert_two){
                          echo $conn->error;
                      } else {
                          $sql_update_contact = "UPDATE contact SET active=2 WHERE users_id='$id'";
                          $result_update_contact = mysqli_query($conn, $sql_update_contact) or die(mysqli_error($sql_update_contact));
                          if(!$result_update_contact){
                              echo $conn->error;
                          }else {
                              header("Location: ../?action=Message");
                          }
                      }
                  }
              }
          }
          else {
              echo 'Grote fout <br>' . $conn->error;
          }

      }


?>