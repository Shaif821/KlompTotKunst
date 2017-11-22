<br>
<br>
<br>
<div id="omDash">
<!--   Om de Dashboard-->
<div id="Dashboard">
<div class="zero">
<h1>Dashboard van <?php echo $user; ?></h1>
<hr class="onderlog2">
</div>
<br>

<!--   Begin tweede column, De informatie displayed-->
   <div class="first-second ">
    <div class="second column">
        <div class="Dash-inner-2">
            <?php contactdisplay(); ?>
        </div>
        <hr class="mob">
    </div>
<!--    Einde tweeden column-->


<!--   De eerste column, De afbeelding-->
    <div class="first column">
<!--        <div class="Dash-inner" id="Dash-img">-->
           <div class="Dash-inner-1">
            <?php displayimage(); ?>
        </div>
         <hr class="mob">
    </div>
<!--Einde eerste column    -->
</div>


<!-- <div class="colum">-->
<!--    Begin Derde column, Link naar de site   -->
       <div class="third ">
       <a class="sitebutton" id="Changeimg" href="?action=Site&vereniging=<?php echo $user; ?>&id2=<?php echo $id; ?>">
<!--        <img class="siteimg" src="Stylesheet/Afbeeldingen/voorbeeld.png">-->
       <div class="textoversite">
        <h2>Bezoek uw pagina</h2>
        <p>Bekijk, bewerk, en onderhoudt uw pagina</p>
        </div>
         </a>
             <hr class="mob">
<!--    Einde Derde column-->
    </div>

    
<!--    Begin 4de column, uitloggen editen,-->
    <div class="fourth">
           <div class="om3but">
            <a href="?action=Edit"><button class="editbut">Wijzig uw verenigings gegevens</button></a>
            <a href="?action=Message"><button class="mailbut"><?php showCount(); ?></button></a>
            <a href="?action=Planner"><button class="planbut">Evenementen</button></a>
            </div>
            <div class="om2but">
            <a href='model/Online-site.php'><button id="butonon" class='online'>
            <?php echo $message; ?>
           </button></a>
            <a href='model/logout.php'><button class='logout'>Uitloggen</button></a>
            </div>

          
 
    </div>

<!--    Einde 4de column-->
    
    </div>
    
    </div>
<!--    Einde om de Dashboard-->
    
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>

