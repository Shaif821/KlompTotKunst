<br><br><br>
 
  <div id="Dashboardedit">
      <div class="zero">
          <h1>Wijzig de gegevens van <?php echo $user; ?></h1>
          <hr class="onderlog2">
      </div>
      <br>
      
      <div class="firstedit columnedit">
       <div class="Dash-inner-1-edit">
           <script>
               var loadFile = function(event) {
                   var output = document.getElementById('headeroutput');
                   output.src = URL.createObjectURL(event.target.files[0]);
               };
           </script>
           <div class="profback">
            <?php displayimage(); ?>
            </div>
        </div>
        <div class="imgedit">
          <form method="POST" class="buttonsimg" action="model/edit-userdata.php" enctype="multipart/form-data">
             <div class="omupbut">
              <input accept="image/*" type="file" class="toupload" onchange="loadFile(event)" name="image"><br>
              <input class="upload" type="submit" name="submitfoto" value="Upload">
              </div>
          </form>
             <form class="del" method="POST" action="model/edit-userdata.php">
    <input type="submit" style="width:100%;" name="delimg" value="Verwijder">
</form>
      </div>
      
      </div>
      
      <div class="secondedit columnedit">
           <div class="Dash-inner-2-edit">
            <form method="POST" action="model/edit-userdata.php">
            <p>Adress</p><input type="text" placeholder="bla" required name="adress">
            <p>huisnummer</p><input type="number" required name="number">
            <p>Postcode</p><input type="text" required name="zipcode">
            <p>telefoon</p><input type="number" required name="telefoon">
            <p>email</p><input type="email" required name="emails">
            <p>website</p><input type="text" required name="websites">
            <input type="submit" value="opslaan" name="contact">
        </form>
      </div>
 
  </div>
   
</div>

    
<br>
<br>
<br>
<br>
<br>


    <script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>



