<?php
    session_start();

    if(!isset($_SESSION['Verif_Log']))
      $_SESSION["Verif_Log"]="";       
    if (!isset($_SESSION['Verif_Reg']))
      $_SESSION["Verif_Reg"]="";
    if (!isset($_SESSION['Verif_Rec']))
      $_SESSION["Verif_Rec"]="";

?>

<!DOCTYPE html>
<html lang="IT">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Luoghi Insoliti</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="Markers/h4.ico" />


        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- PER SIMBOLI -->
        <style>
       
        <?php 
 include 'footer.css';  
 include 'mappa.css';
  
  include 'css/bootstrap.min.css'; ?>
         body {
          background-color:rgb(255, 226, 226);
          font-family: "Arial, Helvetica, sans-serif";
        }
        </style>
    </head>
    <body>
      <!-- Navigation -->
      <nav id="navbar">
        <ul class="ul-nav-logo">
          <li>
              <div class="logo-image">
                  <a href="index.php"><img src="h2.png"class="img-fluid"  id="logo2"></a>
               </div>
          </li>
          <li>
              <div class="mylogo">
                  <a href="index.php"> <p></p> </a>
              </div>
          </li>
      </ul>


        <ul class="ul-nav" >

          <li>
            <a href="viste_ita.php" id="LeViste"><b>LE VISTE</b></a>
          </li>
          <li >
            <a href="luoghi_ita.php" id="LuoghiInsoliti"><b>LUOGHI INSOLITI</b></a>
            
          </li>
          <li >
            <a href="fuori_ita.php"  id="FuoriRoma"><b>FUORI ROMA</b></a>
           
          </li>
          
          <li><a id="recensioni" href="stamparec.php"><b>RECENSIONI</b></a></li>
          <li><a href="luoghi_eng.php"><img src="bandiera-inglese.png"  style="width:30px; height: 20px;" id="bandiera"></a></li>
        </ul>
             
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>     
    </nav>


<!-- login !-->   
       
        
        
    <?php
       
       if (isset($_SESSION['session_id'])) {
               echo '<div class="daje" id="aoooo" style="position:fixed;">'.$_SESSION['session_user'].'<br><a href="logout.php" style="color:darkred; font-size:13px;"><b>LOGOUT</b></a></div>';
               unset($_SESSION['Verif_Log']);
               unset($_SESSION['Verif_Reg']);
               unset($_SESSION['Verif_Rec']);
           }
           else {
               if($_SESSION["Verif_Log"]=="err"){
                   echo '<script>alert("Errore nell\'effettuare il login")</script>';
               }
               if($_SESSION["Verif_Reg"]=="err"){
                   echo '<script>alert("Errore registrazione dell\'utente")</script>';
               }
               if($_SESSION["Verif_Rec"]=="err"){
                echo '<script>alert("Per effettuare una recensione devi effettuare il login")</script>';
            }
               echo '
      
           
    <!-- tasto login-->
    <div class="center">
     <input type="checkbox" id="show" class="hello" onclick="document.getElementById(\'container\').style.position=\'fixed\'; ">
     <label for="show" class="show-btn">Login</label>
     <div class="conta" id="container">
         <label for="show" class="close-btn fas fa-times" title="close"></label>
         <div class="form-box">
             <div class="button-box">
                 <div id="btn"></div>
                 <button id="btnlog" type="button" class="toggle-btn" style="color:white" onclick="login()">Login</button>
                 <button id="btnsig" type="button" class="toggle-btn" onclick="signin()">Sign in</button>
             </div>
             <form id="login" class="inpu-group" action="login.php?pag=luoghi_ita.php" method="POST">
                 <input type="email" name="email_l"class="inpu-field" placeholder="Email" required>
                 <input type="password" name="password_l" class="inpu-field" placeholder="Password" required>
                 <br><br>
                 <button type="submit" class="submit-btn">Login</button>
             </form>
             <form id="signin" class="inpu-group" action="registrazione.php?pag=luoghi_ita.php" method="POST">
                 <input type="email" name="email" class="inpu-field" placeholder="Email" required>
                 <input type="text" name ="user" class="inpu-field" placeholder="Username" required>
                 <input type="password" name ="password" class="inpu-field" placeholder="Password" required>
                 <input type="checkbox" class="chec-box"><span>Acconsento a rendere disponibili i dati</span>
                 <button type="submit" class="submit-btn">Sign in</button>
             </form>
         </div>
     </div>
   </div>';
   unset($_SESSION['Verif_Log']);
   unset($_SESSION['Verif_Reg']);
   unset($_SESSION['Verif_Rec']);}
   ?>

<div style="padding: 85px;">
        
        <!--Mappa-->
            <div class="map-wrap">
                <div id="map">
                    
                </div>
             </div>
        <!--Toggle Button con recensioni, se loggati possiamo vedere anche il tasto Valutami!-->
        <div class="toggle">
            <button class="btnToggle" onclick="bt1()">
                <span>Statue parlanti</span> </button>
            <div class="par1" style="display:none">
              <div class="trans1" >
                <img src="Img/parlante1.jpeg" height="100%" width="50%">
              </div>
              
              <div class="trans1">
                <img src="Img/parlante2.jpeg" height="100%" width="50%">
              </div>
              
                <div class="column">
                    È un gruppo di 6 statue dove i romani affiggono messaggi anonimi, per lo più critiche e componimenti satirici contro i governanti. La più celebre è quella del Pasquino, da cui il nome di questi messaggi “pasquinate”. Il personaggio del Pasquino ispirò i film “Nell’anno del signore” del 1969 e “La notte del Pasquino” del 2003 entrambi diretti da Luigi Magni.
                    <br>
                    <a href="javascript:trova1()">Trova sulla mappa</a>
                    <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Statue Parlanti&pag=luoghi_ita.php">Valutami!</a>';
                      }
                      ?>
                </div>
            </div>

            <button class="btnToggle" onclick="bt2()">
                <span>Tempio di Flora</span></button>
                <div class="par2" style="display:none">
                 
                  <div class="trans2" >
                    <img src="Img/Tempio_di_Flora.jpg" height="100%" width="50%">
                  </div>
                  
                  <div class="trans2">
                    <img src="Img/Tempio_di_Flora2.jpg" height="100%" width="50%">
                  </div>
                  <div class="trans2">
                    <img src="Img/Tempio_di_Flora3.jpg" height="100%" width="50%">
                  </div>
                <div class="column">
                    Il Tempio di Flora sorge vicino all’ambasciata di Egitto. Restaurato completamente nel 2000, un tempo era la coffee house del Re Vittorio Emanuele III dove riceveva gli ospiti. Il fronte dell’edificio verso la strada ha l’aspetto di un tempietto dorico, adorno nella trabeazione da croci e aquile, forse aggiunte da casa Savoia.
                        Entrando ci troviamo in una saletta circolare con un’abside curvilinea e dei grandi finestroni aperti su un sottostante invaso ad anfiteatro, detta il Teatro, con al centro una fontana in ghisa tardo-ottocentesca, frutto di un rimaneggiamento in chiave romantica del luogo. Sotto l’abside del tempietto poggia su un portico, anch’esso affacciato sul Teatro.

                     <br>
                    <a href="javascript:trova2()">Trova sulla mappa</a>
                    <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Tempio di Flora&pag=luoghi_ita.php">Valutami!</a>';
                      }
                      ?>
                   
                  </div>
                </div>

             <button class="btnToggle" onclick="bt3()">
                <span>Murales Totti</span></button>
                <div class="par3" style="display:none">
                <div class="trans3">
                  <img src="Img/Totti.jpg" height="100%" width="50%">
                </div>
                     <div class="column">
                        Il murale raffigura un'esultanza dell’ex capitano giallorosso durante la stagione 2000/2001, quella dell'ultimo scudetto della Roma.  Il graffito si trova nel capitolino Rione Monti è stato più volte imbrattato con bombolette spray da parte dei tifosi della Lazio, storica rivale della Roma in campionato.
                             <br>
                          <a href="javascript:trova3()">Trova sulla mappa</a>
                          <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Murales Totti&pag=luoghi_ita.php">Valutami!</a>';
                      }
                      ?>
                         
                       </div>
                    </div>

                    <button class="btnToggle" onclick="bt4()">
                      <span>Piccola Londra</span></button>
                      <div class="par4" style="display:none">
                      <div class="trans4">
                        <img src="Img/piccolalondra.jpg"  height="100%" width="50%">
                      </div>
                      <div class="trans4">
                        <img src="Img/piccolalondra2.jpeg"  height="100%" width="50%">
                      </div>
                           <div class="column">
                            Questo surreale angolo d’Inghilterra è situato nel quartiere Flaminio. Nel 1909 infatti venne eletto il sindaco anglo-italiano Ernesto Nathan, che comprendeva pienamente il potenziale immenso di Roma. Fece dunque approvare un piano regolatore che impedì alle costruzioni di superare i 24 metri d’altezza, con villette che non potevano superare il secondo piano (tutte con cancelletto in ferro). Questa strada non è altro che un esempio di quel progetto ambizioso, realizzato dall’architetto Quadrio Pirani. Il progetto non è però mai andato oltre questo piccolo angolo di paradiso, che però isola i residenti dal traffico e caos della capitale.

                                   <br>
                                <a href="javascript:trova4()">Trova sulla mappa</a>
                                <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Piccola Londra&pag=luoghi_ita.php">Valutami!</a>';
                      }
                      ?>
                               
                             </div>
                      </div>
              <button class="btnToggle" onclick="bt5()">
                <span>Galleria Spada</span></button>
                  <div class="par5" style="display:none">
                    <div class="trans5">
                      <img src="Img/galleria.jpg"  height="100%" width="50%">
                    </div>
                    <div class="trans5">
                        <img src="Img/galleria2.jpg"  height="100%" width="50%">
                    </div>
                    <div class="column">
                        Transitando nel cortile del Palazzo giungendo dall'ingresso principale, sulla sinistra si scorge, mediante un'apertura centrale sbarrata da un cancello in noce, la galleria con la prospettiva che si inoltra oltre il piccolo giardino di melangoli; la galleria si presenta nella sua forma attuale dopo gli ultimi restauri. La finta prospettiva è creata sull'illusione che la galleria sia lunga circa 35 metri, mentre in realtà è lunga 8,82 metri. L'illusione è dovuta al fatto che i piani convergono in un unico punto di fuga; così, mentre il soffitto scende dall'alto verso il basso, il pavimento mosaicato sale. Anticamente, sulla parete di fondo era disegnato un finto motivo vegetale che accentuava il senso prospettico. Attualmente sul fondale si trova il calco di una statuetta di guerriero di epoca romana.
                              <br>
                    <a href="javascript:trova5()">Trova sulla mappa</a>
                    <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Galleria Spada&pag=luoghi_ita.php">Valutami!</a>';
                      }
                      ?>
                  </div>
                </div>


                  <button class="btnToggle" onclick="bt6()">
                    <span>Targa Carbonari</span></button>
                      <div class="par6" style="display:none">
                      <div class="trans6">
                          <img src="Img/targa1.jpg"  height="100%" width="50%">
                        </div>
                        <div class="column">
                            La targa si trova in Piazza del Popolo, nel Rione Campo Marzio, e ricorda i carbonari Angelo Targhini e Leonida Montanari, condannati a morte per lesa maestà e decapitati dal celebre boia Mastro Titta proprio in Piazza del Popolo. Nel 1825 furono accusati dalle autorità papaline di un attentato ai danni di Giuseppe Pontini, un carbonaro che aveva tradito la propria “vendita”, trasformandosi in spia ai servizi delle autorità governative.

                            Nessuna prova era stata raccolta contro di loro. La storia è stata portata al cinema dal regista Luigi Magni, nel film Nell'anno del Signore (1969)
                                  <br>
                        <a href="javascript:trova6()">Trova sulla mappa</a>
                        <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Targa moti Carbonari&pag=luoghi_ita.php">Valutami!</a>';
                      }
                      ?>
                    
                      </div>
                      </div>


                      <button class="btnToggle" onclick="bt7()">
                        <span>Murales Tor Marancia</span></button>
                          <div class="par7" style="display:none">
                            <div class="trans7">
                              <img src="Img/murales1.jpg"  height="100%" width="50%">
                            </div>
                            <div class="trans7">
                              <img src="Img/m_03.jpg"  height="100%" width="50%">
                            </div>
                            <div class="trans7">
                                <img src="Img/murales3.jpg"  height="100%" width="50%">
                            </div>
                            <div class="trans7">
                                <img src="Img/murales4.jpeg"  height="100%" width="50%">
                            </div>
                            <div class="column">
                                Uno dei fenomeni di rivoluzione culturale che sta riguardando Roma da qualche anno è quello di riqualificazione urbana di zone periferiche mediante il ricorso alla Street Art. I quartieri pionieri, in tal senso, sono stati il Pigneto, San Basilio e la zona fra Ostiense e Testaccio.
Ma nel 2015 è stato il turno di un’altra borgata storica della città, ovvero Tor Marancia.
Qui, 20 artisti internazionali in 70 giorni di lavoro (fra l’8 gennaio e il 27 febbraio 2015), con 765 litri di vernice e quasi 1.000 bombolette spray hanno dato vita a “Big City Life“, un progetto che consta di 22 murales monumentali ideato da 999Coontemporary, finanziato da Fondazione Roma e dal Campidoglio e patrocinato dall’VIII Municipio.
<br> Ogni opera, inoltre, ha a che fare con una qualche storia legata a quella specifica palazzina. 
                                      <br>
                            <a href="javascript:trova7()">Trova sulla mappa</a>
                            <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Murales Tor Marancia&pag=luoghi_ita.php">Valutami!</a>';
                      }
                      ?>
                           
                          </div>
    
                    
              

         </div>

         </div>

</div>



<!--Footer!-->
<footer class="bg-light text-lg-start">
<div class="my-5 justify-content-center py-5">
<div class="col-md-12">
<div class="row ">
  <div class="col-xl-8 col-lg-8 col-md-6 col-sm-4 col-4 my-auto mx-auto text-center">
     
      <h1 class="text-muted mb-md-0 mb-5 bold-text"><a href="index.php">discoveRome</a></h1>
  </div>

  <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4">
   <h6 class="mt-55 mt-2 bold-text"><a href="recensione.php?pag=luoghi_ita.php"><b>Fai una recensione</b></a></h6> <!--INSERIRE LINK-->
     
</div>

  <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4">
      <h6 class="mb-3 mb-lg-4 bold-text"><b>MENU</b></h6>
      <ul class="list-unstyled">
           <li><a href="viste_ita.php">Viste</a></li>
           <li><a href="luoghi_ita.php">Luoghi insoliti</a></li>
           <li><a href="fuori_ita.php">Fuori Roma</a></li>
           <li><a href="stamparec.php">Recensioni</a></li>
      </ul>
  </div>

</div>

<div class="row ">
  <div class="col-xl-8 col-lg-8 col-md-6 col-sm-4 col-4 mx-auto my-auto mt-5 order-sm-1 order-3 align-self-end text-center">
      <p class="social mb-0 pb-0 bold-text"> 
          <span class="mx-2">
              <a href="https://www.instagram.com/discoverome_/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
           </span>
       </p>
   <br>
       <small class="rights">
           <span>
               &#169;
           </span> 
           Linguaggi e Tecnologie per il Web 2020-2021
       </small>
   </div>

   <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4 order-1 align-self-end ">
       <h6 class="mt-55 mt-2 bold-text"><a href="suggerimento.php"><b>Suggerimenti</b></a></h6>
     
   </div>

  <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4 order-1 align-self-end ">
      <h6 class="mt-55 mt-2  bold-text" style="color: darkred;"><b>CONTATTACI</b></h6>
      <small> 
          <span>
              <i class="fa fa-envelope" aria-hidden="true"></i>
           </span> 
           discoverome.ltw@gmail.com
       </small>
  </div>
 
</div>
</div>
</div>
</footer>
         <script>
           <?php 
           include 'Slideshow.js';
           include 'luoghi_ita.js';
          
           ?>
           </script>
    </body>
</html>