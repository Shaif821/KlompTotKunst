<br><br>
  <div class="omheen">
        <section class="omheen-2">
                   <section class="around">
        <div class="inner">
            <h1 style="text-align:center; font-weight: 200;"><?php echo $message; ?></h1>
            <hr class="ondermes">
            </div>
            <br>
    </section>
                <form class="around" action="model/change-login.php" method="post">
                <div class="wrap">
                  <h2 clas="">Wijzig uw gegevens</h2> 
                  <hr class="onderlog">
                  <div class="wrap-inner">
                  <br>
                   <p>Gebruikersnaam:</p><input min="4" max="10" required type="text" name="usernew"><br> 
                   <p>Wachtwoord:</p><input min="8" max="15" required type="password" name="passnew"><br> 
                  
                   <input class="verzend" type="submit" name="verzendnew" value="verzenden"><br>
                   </div>
                   </div> 
                   </form>  
                </section>
                </div>
       
       <br><br>