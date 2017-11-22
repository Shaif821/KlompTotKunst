
               <header>
                <div class="container">
                       <?php displayheader(); ?>
                        <div class="overlay">
                            <h1><?php echo $title; ?></h1>
                            <a href="<?php echo $websites; ?>" class="btn">Website</a>
                        </div>
                    </div>
                </div>
            </header>
    <!-- End Header -->

	<!-- profile -->
     <section id="profile">
            <article>
                <div class="container">
                    
                    <div class="col-50">
                        <h2>Over ons</h2>

                        <p>
                            <?php echo $about; ?>
                        </p>

                    </div>

                    <div class="col-50">
                       
                        <h2>Contact gegevens</h2> 
                        
						<table>
						  <tr>
						    <td class="bold">Adres</th>
						    <td><?php echo $adress . $number; ?></td>
						  </tr>
						  <tr>
						    <td class="bold">Postcode</td>
						    <td><?php echo $zip; ?></td>
						  </tr>
						  <tr>
						    <td class="bold">Plaats</td>
						    <td><?php echo $district; ?></td>
						  </tr>
						  <tr>
						    <td></td>
						    <td></td>
						  </tr>
						  <tr>
						    <td class="bold">Telefoon</td>
						    <td><?php echo $telefoon; ?></td>
						  </tr>
						  <tr>
						    <td class="bold">E-mail</td>
						    <td><a href="mailto:<?php echo $emails; ?>" target="_blank"><?php echo $emails; ?></a></td>
						  </tr>
						  <tr>
						    <td class="bold">Website</td>
						     <td><a href="<?php echo $websites; ?>" target="_blank"><?php echo $websites; ?></a></td> 
						  </tr>
						</table>
						<p>
					 <a href="#" class="btn">Routebeschrijving</a> 
					</p>
                    </div>

                </div>
            </article>
	        <div class="google-maps">
	        	<div class="iframe-area"></div>
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2429.1153238105617!2d5.0707111!3d52.495152000000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c604912cbc41f5%3A0x2742b89e49e65f0b!2sZeestraat+41%2C+1131+Volendam!5e0!3m2!1snl!2snl!4v1431345766341"  frameborder="0" style="border:0"></iframe>
	        </div>
        
        </section>