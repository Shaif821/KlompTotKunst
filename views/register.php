             <div class="omheenreg">
                            <section class="omheen2reg">
                             <section class="aroundreg">
                             <div class="innerreg">
                              <h1 style="text-align:center; font-weight: 200;"><?php echo $message; ?></h1>
                              <hr class="ondermes">
                              </div>
                              <br>
                              </section>
                <form class="aroundreg" action="model/insert-register.php" method="post">
                  <div class="wrap">
                    <h2>Registreren</h2>
                   <hr class="onderlog">

                   <div class="wrap-innerreg">
                   <div class="opsplits">
                    <p>Voornaam:</p><input required type="text" placeholder="Voornaam" name="voornaam">
                    <p>Achternaam:</p><input required type="text" placeholder="Achternaam" name="achternaam">
                    <p>Telefoon:</p><input required type="number" placeholder="Telefoon" name="telefoon">
                    <p>E-mail:</p><input required type="email" placeholder="E-mail" name="email">
                    </div>
                    <div class="opsplits op2">
                    <p>Bedrijf:</p><input required type="text" placeholder="Naam organisatie" name="bedrijf">
                    <p>Website:</p><input required type="website" placeholder="url" value="https://" name="website">
                    
                     <label><p>Soort</p></label>
                    <select name="soort" required>
                    <option value="">Kies een soort</option>
                    <option value="cultuur">Cultuur</option>
                    <option value="kunst">Kunst</option>
                        </select>
                        <label><p>Plaats</p></label>
                    <select name="district" required>
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
                    </select>
                      <br>
                       </div>
                    
                    <input class="subreg" type="submit" value="Verstuur" name="verzend">
                    <p class="klik"><a href="?action=Login">Klik hier om in te loggen</a></p>
                    </div>
                    </div>
                    </form>
                    </section>
                    
                    </div>
                    