<br>
<br>
<br>
   <div id="DashboardDate">
    <div class="zero">
<h1>Evenementen</h1>
<hr class="onderlog2">
</div>
<br>

   <div class="zero colum">
    <form  method="post" action="model/edit-userdata.php">
    <div class="datein">
    <p>Naam van het evenement<input type="text" name="namepick" id="datepicker"></p>
    <p>Datum van het evenement<input type="date" min='31-12-2016' max='31-12-2050' name="datepick" id="datepicker"></p>
    <p>Tijd van het evenement<input type="time"  name="timepick" id="datepicker"></p>
    </div>
     <input style="margin: 0 auto;" type="submit" value="Evenement toevoegen" name="datesub">
    </form>
    </div>
    
    
    <div class="zero colum">
   <table>
   <tr>
    <th>Geplande evenementen:</th>
    <th>Datum:</th>
    <th>Tijd</th>
    <th>Goedkeuring</th>
    
    </tr>
    <?php
    while($row = $result->fetch_assoc()){
        echo '<tr><td>' . $row['Name'] . '</td>';
        echo '<td>' . $row['Date'] . '</td>';
        echo '<td>' . $row['Time'] . '</td>';
        if($row['active'] == 1){
            echo '<td style="background:green;"><p style="color:white;">Goedgekeurd</p></td>';
        
        } elseif($row['active'] == 2) {
            echo '<td style="background: black;"><p style="color:white;">Afgekeurd</p></td>';
        }
        else{
            echo '<td style="background: firebrick;"><p style="color:white;">In afwachting</p></td>';
        }
        }
    ?>
    </table>
    </div>
 
    
    
    <br><br><br>    
</div>




    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>