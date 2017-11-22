<br><br>

<div id="omDash">
    <div id="Dashmes">
       <div class="zero">
       <h1>Vraagje? Stuur een bericht naar de gemeente <?php echo $user; ?></h1>
       <hr  class="onderlog2">
       </div>
       <br><br>
        <form  class="formmes" id="myform" method="post" action="model/edit-userdata.php">
            
            <div class="inputmes">
                <p>Vul hier het ondewerp van uw bericht in: <input type="text" name="tekst" placeholder="Onderwerp...">
                </p>
            </div>
            
            <div class="inputmes">
                <p>Vul hier uw bericht in:<br><textarea required rows="10" cols="60" class="input" name="description"></textarea></p<br />
            </div>
            
            <div class="inputmes">
                <input type="submit" name="verzendtext" value="Bericht sturen" placeholder="Vul hier uw bericht in....">
            </div>
        </form>
        
        <div class="zero colum">
            <table >
               <h2>Verzonden berichten / Ontvangen berichten</h2>
               <hr  class="onderlog">
               <tr>
                   <th>Subject</th>
                   <th>Content</th>
                   <th>Datum</th>
                   <th>Status</th>
               </tr>
               
               <?php 
                while($row = $result->fetch_assoc()){
                    echo '<tr><td>' . $row['subjects'] . '</td>';
                    echo '<td>' . $row['contents'] . '</td>';
                    echo '<td>' . $row['time'] . '</td>';
                    if($row['active'] == 1){
                        echo '<td style="background: green;"><p style="color:white;">Antwoord gemeente</p></td></tr>';
                    }
                    elseif($row['active'] == 2) {
                        echo '<td style="background: black;"><p style="color:white;">Error</p></td></tr>';
                    }
                    else {
                        echo '<td style="background: dodgerblue;"><p style="color:white;">Verstuurd</p></td></tr>';
                    }
                }
                ?>
            </table>
        </div>
        
        <br><br>
    </div>
</div>
<br><br>