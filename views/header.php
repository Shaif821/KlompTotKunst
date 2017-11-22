    <body onload="setbackground()" class="cbp-spmenu-push">
<div class="search-container">
    <div class="container">
        
        <form action="#" method="post" class="centerform">
            <input type="text" name="search" id="searchfield" placeholder="Keywords...">
            <input type="submit" id="postsearch" value="Zoeken">
        </form>

    </div>
</div>    
    <!-- Navigation -->
        <nav class="cbp-spmenu-push" id="nav">
            <div class="container">
                <div class="logo">
                    <a href="?action=Login">Van <strong>klomp</strong> tot <strong>kunst</strong></a>
                </div>

                <div class="search" id="search"></div>

                <div class="languageswitch">
                    <div class="ned">NL</div>
                    <div class="eng">ENG</div>
                </div>

                <div class="hamburger" id="showRightPush"></div>

                <ul>
                    <li><a href="?action=Login" class="active">Home</a></li>
                    <li>
                      <a href=
                              "<?php 
                               if($user == 'bezoeker'){
                                   echo "?action/Login";
                               } else {
                                   echo "?action/Dashboard";
                               }
                               ?>
                               " class="locations">
                         <?php
                          if(isset($_SESSION['id2'])){
                              echo $user;
                          } else {
                              echo "login";
                          }
                          ?>
                          </a>

                    </li>
                    <li><a href="
                       <?php if(isset($_SESSION['id2'])){
    echo "model/logout.php";
} else {
    echo "?action=Login";
}?>
                       " id="agenda">
                        <?php
                        if(isset($_SESSION['id2'])){
                            echo "Uitloggen";
                        } else {
                            echo "Inloggen";
                        } ?>
                    </a></li>
                </ul>
            </div>
        </nav>
    <!-- End Navigation -->

    <!-- Mobile Navigation -->
       <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
           <h1>Menu</h1>
           <a href="index.php">Home</a>
           <a href="#" id="locaties">Locaties <div class="arrow"></div></a>

          <!-- Mobile subnav -->
          <ul class="subnav">
            <li><a href="/klomptotkunst/locations.php">Edam</a></li>
            <li><a href="#">Volendam</a></li>
            <li><a href="#">Warder</a></li>
            <li><a href="#">Kwadijk</a></li>
            <li><a href="#">Oosthuizen</a></li>
            <li><a href="#">Schardam</a></li>
            <li><a href="#">Beets</a></li>
            <li><a href="#">Middelie</a></li>
            <li><a href="#">Hobrede</a></li>
          </ul>
           <!-- End Mobile subnav -->

           <a href="agenda.php" id="agenda">Agenda</a>
           <a href="contact.php">Contact</a>
        
           <form action="#" method="POST">
               <!-- <div class="search-btn"></div> -->
               <input type="text" placeholder="Zoeken...">
               <input type="submit" class="search-btn">
           </form>
        
           <div class="languages">
               <div class="ned"></div>
               <div class="eng"></div>
           </div>
       </div>
       
       <hr>

    <!-- End Mobile Navigation -->
    <!-- Header -->
        
    <!-- End Header -->