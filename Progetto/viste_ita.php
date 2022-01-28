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
        <title>Le Viste</title>
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
         
         include 'css/bootstrap.min.css';  ?>
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
          <li><a href="viste_eng.php"><img src="bandiera-inglese.png"  style="width:30px; height: 20px;" id="bandiera"></a></li>
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
             <form id="login" class="inpu-group" action="login.php?pag=viste_ita.php" method="POST">
                 <input type="email" name="email_l"class="inpu-field" placeholder="Email" required>
                 <input type="password" name="password_l" class="inpu-field" placeholder="Password" required>
                 <br><br>
                 <button type="submit" class="submit-btn">Login</button>
             </form>
             <form id="signin" class="inpu-group" action="registrazione.php?pag=viste_ita.php" method="POST">
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
                <span>Monte Ciocci</span> </button>
                <div class="par1" style="display:none">
              <div class="trans1" >
                <img src="Img/Monte_ciocci.jpg" height="100%" width="50%">
              </div>
              
              <div class="trans1">
                <img src="Img/Ciocci.jpeg" height="100%" width="50%">
              </div>
              
                <div class="trans1">
                  <img src="Img/Ciocci_neve.jpg" height="100%" width="50%"></div>
                <div class="column">
                    Il Parco Urbano di Monte Ciocci è una sorta di montagna verde ai piedi del Trionfale, tra l'area della Balduina e della via Aurelia, dalla quale si può ammirare con infinito stupore un panorama spettacolare che si apre a 360 gradi su quasi tutta la Città Eterna ed in particolar modo sulla Basilica di San Pietro. Su un muretto, dove è possibile sedersi, sono presenti i versi di una canzone del gruppo rap “colle der fomento” che recitano “ma dimmi quante volte hai visto il cielo sopra Roma e hai detto “quanto è bello?””. Poco distante vi è anche un istituto agrario.
                    <br>
                    <a href="javascript:trova2()">Trova sulla mappa</a>
                    <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Monte Ciocci&pag=viste_ita.php">Valutami!</a>';
                      }
                      ?>
                    
                </div>
            </div>

            <button class="btnToggle" onclick="bt2()">
            <span>Piazzale Socrate</span></button>
                <div class="par2" style="display:none">
                 
                  <div class="trans2" >
                    <img src="Img/Piazzale_Socrate.jpg" height="100%" width="50%">
                  </div>
                  
                  <div class="trans2">
                    <img src="Img/Socrate_notte.jpg" height="100%" width="50%">
                  </div>
                  <div class="trans2">
                    <img src="Img/socrate4.jpeg" height="100%" width="50%">
                  </div>
                <div class="column">
                     Piazzale socrate si trova nel quartiere della Balduina: esso offre una vista mozzafiato su tutta Roma e non solo. Mentre qualche anno fa era un luogo poco conosciuto e molto curato, negli ultimi anni è diventato punto di ritrovo di molti gruppi di giovanissimi che spesso lasciano sporcizie per terra rovinando questo luogo meraviglioso e molto romantico. È divenuto celebre negli ultimi anni tra i giovani grazie alla serie tv Baby.
                     <br>
                    <a href="javascript:trova1()">Trova sulla mappa</a>
                    <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Piazzale Socrate&pag=viste_ita.php">Valutami!</a>';
                      }
                      ?>
                      
                  </div>
                </div>

             <button class="btnToggle" onclick="bt3()">
             <span>Via Piccolomini</span></button>
                <div class="par3" style="display:none">
                <div class="trans3">
                  <img src="Img/Piccolomini_neve.jpg" height="100%" width="50%">
                </div>
                <div class="trans3">
                  <img src="Img/piccolomini2.JPG" height="100%" width="50%">
                </div>
                <div class="trans3">
                  <img src="Img/piccolomini3.JPG" height="100%" width="50%">
                </div>
                     <div class="column">
                      Da via Piccolomini si può ammirare la cupola di San Pietro così come era stata progettata da Michelangelo, senza le successive modifiche apportate al Vaticano da altri architetti; inoltre un effetto ottico la rende un luogo veramente magico e suggestivo. Qui accade qualcosa di straordinario! ammirando e guardando la cupola di San Pietro più ci si avvicina, più la cupola si allontana; più si indietreggia più la cupola diventa grande. Un curioso effetto visivo causato dalla disposizione degli edifici e dal punto di osservazione.
                                <br>Via Piccolomini è il posto ideale per una passeggiata romantica, per rendere indimenticabile il primo appuntamento o semplicemente per ammirare la cupola di San Pietro da un punto meno convenzionale ma altrettanto spettacolare.
                             <br>
                          <a href="javascript:trova3()">Trova sulla mappa</a>
                          <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Via Piccolomini&pag=viste_ita.php">Valutami!</a>';
                      }
                      ?>
                           
                       </div>
                    </div>

                    <button class="btnToggle" onclick="bt4()">
                    <span>Lo Zodiaco</span></button>
                      <div class="par4" style="display:none">
                      <div class="trans4">
                        <img src="Img/Zodiaco1.jpg"  height="100%" width="50%">
                      </div>
                      <div class="trans4">
                        <img src="Img/Zodiaco2.jpg"  height="100%" width="50%">
                      </div>
                      <div class="trans4">
                        <img src="Img/Zodiaco3.jpg"  height="100%" width="50%">
                      </div>
                      <div class="trans4">
                        <img src="Img/Zodiaco4.jpg"  height="100%" width="50%">
                      </div>
                           <div class="column">
                            Un luogo molto suggestivo che domina Roma in tutto il suo splendore dalla cima di Monte Mario, a 140 metri di altezza, e da cui si può ammirare una vasta fetta della capitale, che va dai castelli romani al centro storico. Un angolo incantevole e romantico, soprattutto di sera quando cala il buio e le stelle fanno da cornice alla città illuminata, e dove ci si può fermare a mangiare nel bellissimo ristorante panoramico presente sul posto. Questo è un luogo ideale anche per tutte le coppie che desiderano passare una serata romantica e sotto le stelle
                                   <br>
                                <a href="javascript:trova4()">Trova sulla mappa</a>
                                <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Lo Zodiaco&pag=viste_ita.php">Valutami!</a>';
                      }
                      ?>
                           
                             </div>
                      </div>


              <button class="btnToggle" onclick="bt5()">
              <span>Gianicolo</span></button>
                  <div class="par5" style="display:none">
                    <div class="trans5">
                      <img src="Img/Gianicolo1.jpg"  height="100%" width="50%">
                    </div>
                    <div class="trans5">
                        <img src="Img/Gianicolo2.jpg"  height="100%" width="50%">
                    </div>
                    <div class="trans5">
                        <img src="Img/Gianicolo3.jpg"  height="100%" width="50%">
                    </div>
                    <div class="column">
                      Il Gianicolo è un colle romano, prospiciente la riva destra del Tevere e la cui altezza è 82 metri. Non fa parte del novero dei sette colli tradizionali. La pendice orientale degrada verso il fiume e alla base si trova il rione storico di Trastevere, mentre quella occidentale, meno ripida, costituisce la parte più vecchia del moderno quartiere di Monteverde. Nelle limpide giornate invernali, la cima innevata del Terminillo, sulla sinistra, è il contraltare perfetto agli innumerevoli monumenti che si alzano dal cuore della città. Sono facilmente riconoscibili la cupola del Pantheon, Palazzo Farnese, la Sinagoga, Villa Borghese e l’Altare della Patria che biancheggia sullo sfondo.
                              <br>
                    <a href="javascript:trova5()">Trova sulla mappa</a>
                    <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Il Gianicolo&pag=viste_ita.php">Valutami!</a>';
                      }
                      ?>
                     
                  </div>
                  </div>



                  <button class="btnToggle" onclick="bt6()">
                  <span>Riserva Monte Mario</span></button>
                      <div class="par6" style="display:none">
                        <div class="trans6">
                          <img src="Img/riserva.jpeg"  height="100%" width="50%">
                        </div>
                        <div class="trans6">
                            <img src="Img/riserva2.jpeg"  height="100%" width="50%">
                        </div>
                        <div class="trans6">
                            <img src="Img/riserva3.jpeg"  height="100%" width="50%">
                        </div>
                        <div class="column">
                            Il territorio della Riserva Naturale di Monte Mario con i suoi 139 metri d'altezza è il rilievo più importante del sistema dei colli denominati dei Monti della Farnesina e rappresenta per le sue caratteristiche ambientali un vero mosaico di diversità biologica ormai raro a Roma. Già in epoca romana il colle ospitava le ville residenziali di poeti e nobili ed era attraversato dagli eserciti di ritorno dalle campagne militari lungo la via Trionfale percorsa in seguito i pellegrini che si recavano a Roma, divenendo l’ultimo tratto della via Francigena, il tracciato medievale cha da Canterbury giungeva a S.Pietro e ancora più a sud, a Gerusalemme. 
                                  <br>
                        <a href="javascript:trova6()">Trova sulla mappa</a>
                        <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Riserva Monte Mario&pag=viste_ita.php">Valutami!</a>';
                      }
                      ?>
                           
                      </div>
          </div>


                      <button class="btnToggle" onclick="bt7()">
                        <span>Passeggiata del Gelsomino</span></button>
                          <div class="par7" style="display:none">
                            <div class="trans7">
                              <img src="Img/passeggiata_del_gelsomino.jpg"  height="100%" width="50%">
                            </div>
                            <div class="trans7">
                                <img src="Img/passeggiata2.jpg"  height="100%" width="50%">
                            </div>
                           
                            <div class="column">
                            Una passeggiata suggestiva su un binario della ferrovia rimossa che serviva a collegare il Vaticano con Roma. Per raggiungerla bisogna entrare proprio all'interno della Stazione San Pietro, come per voler prendere il treno e poi proseguire lungo il binario 1 svoltando subito a destra, da qui inizia il percorso che permette di ammirare San Pietro e la sua Cupola da una prospettiva diversa.
                                      <br>
                            <a href="javascript:trova7()">Trova sulla mappa</a>
                            <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Passeggiata del Gelsomino&pag=viste_ita.php">Valutami!</a>';
                      }
                      ?>
                            
                          </div>
    
                    
              

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
   <h6 class="mt-55 mt-2 bold-text"><a href="recensione.php?pag=viste_ita.php"><b>Fai una recensione</b></a></h6> <!--INSERIRE LINK-->
     
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
           include 'viste_ita.js';
          
           ?>
           </script>
    </body>
</html>  