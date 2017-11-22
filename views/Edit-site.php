<header>
                <div class="container">
                   
                    <?php displayheader(); ?>
                                 <form method="POST" class="buttonsimg" action="model/edit-userdata.php" enctype="multipart/form-data">
              <input accept="image/*" type="file" id='verborgen_file' class="hide" onchange="loadFile(event)" name="image"><br>
              <input class="upload" type="submit" id="uploadButton" name="submitheaderfoto" value="Upload">
          </form>
                        <div class="overlay">
                           <form action="model/insert-site-data.php" method="POST">
                            <h1><input value="<?php echo $title; ?>" style="margin: 0 auto;" type="text" name="title" placeholder="Voer hier uw verenigings naam in"></h1>
                            <a href="#" class="btn">Website</a>
                        </div>
                        
                            <script>
  var loadFile = function(event) {
    var output = document.getElementById('headeroutput');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
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
                            <textarea rows="10" cols="60" class="input"  value="<?php echo $about; ?>" name="about">
                                <?php echo $about; ?>
                            </textarea>
                        </p>
                    </div>

                    <div class="col-50">
                       
                        <h2>Contact gegevens</h2> 
                        
						<table>
						  <tr>
						    <td class="bold">Adres</th>
						    <td><input value="<?php echo $adress; ?>" type="text" name="adress" placeholder="Voer hier het adres van uw vereniging in"><input value="<?php echo $number; ?>" type="number" name="number" placeholder="Voer hier het straatnummer van uw vereniging in"></td>
						  </tr>
						  <tr>
						    <td class="bold">Postcode</td>
						    <td><input value="<?php echo $zip; ?>" type="text" name="zipcode" placeholder="Voer hier het postcode van uw vereniging in"></td>
						  </tr>
						  <tr>
						    <td class="bold">Plaats</td>
						    <td><select value="<?php echo $district; ?>" name="district" required>
                           <option value="">Kies een plaats</option>
                           <option value="edam">Edam</option>
                           <option value="volendam">Volendam</option>
                           <option value="warder">Warder</option>
                           <option value="kwadijk">Kwadijk</option>
                           <option value="oosthuizen">Oosthuizen</option>
                           <option value="schardam">Schardam</option>
                           <option value="beets">Beets</option>
                           <option value="middelie">Middelie</option>
                           <option value="hobrede">Hobrede</option>
                           </select></td>
						  </tr>
						  <tr>
						    <td></td>
						    <td></td>
						  </tr>
						  <tr>
						    <td class="bold">Telefoon</td>
						    <td><input value="<?php echo $telefoon; ?>" type="number" name="telefoon" placeholder="Voer hier het telefoonnummer van uw vereniging in"></td>
						  </tr>
						  <tr>
						    <td class="bold">E-mail</td>
						    <td><input value="<?php echo $emails; ?>" type="email" name="email" placeholder="Voer hier het emailadres van uw vereniging in"></td>
						  </tr>
						  <tr>
						    <td class="bold">Website</td>
						     <td><input value="<?php echo $websites; ?>" type="text" name="website" placeholder="Voer hier het webadres van uw vereniging in"></td> 
						  </tr>
						</table>
						<p>
					</p>
                    </div>
                  <input type="submit" name="sitedit" value="Opslaan">
                </div>
            </article>
	        <div class="google-maps">
	        	<div class="iframe-area"></div>
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2429.1153238105617!2d5.0707111!3d52.495152000000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c604912cbc41f5%3A0x2742b89e49e65f0b!2s<?php echo $adress; ?>+<?php echo $number; ?>%+<?php echo $zip; ?>+V<?php echo $district; ?>!5e0!3m2!1snl!2snl!4v1431345766341"  frameborder="0" style="border:0"></iframe>
	        </div>
        
        </section>
        </form>