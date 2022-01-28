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
        <title>Fuori Roma</title>
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
          <li><a href="fuori_eng.php"><img src="bandiera-inglese.png"  style="width:30px; height: 20px;" id="bandiera"></a></li>
        </ul>
             
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>     
    </nav>



       
        
        
 <!-- tasto login-->
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
          <form id="login" class="inpu-group" action="login.php?pag=fuori_ita.php" method="POST">
              <input type="email" name="email_l"class="inpu-field" placeholder="Email" required>
              <input type="password" name="password_l" class="inpu-field" placeholder="Password" required>
              <br><br>
              <button type="submit" class="submit-btn">Login</button>
          </form>
          <form id="signin" class="inpu-group" action="registrazione.php?pag=fuori_ita.php" method="POST">
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
                    <script type="text/javascript" lang="javascript" src="mappa.js">
                    </script>
                </div>
             </div>
        <!--Toggle Button con recensioni, se loggati possiamo vedere anche il tasto Valutami!-->
        <div class="toggle">
            <button class="btnToggle" onclick="bt1()">
                <span>Civita di Bagnoregio</span> </button>
            <div class="par1" style="display:none">
              <div class="trans1" >
                <img src="Img/Civita_di_Bagnoregio.jpg" height="100%" width="50%">
              </div>
              
              <div class="trans1">
                <img src="Img/civitabagnoregio2.jpg" height="100%" width="50%">
              </div>
              
                <div class="trans1">
                  <img src="Img/civitabagnoregio3.jpg" height="100%" width="50%"></div>
                <div class="column">
                    Civita di Bagnoregio è un luogo magico, surreale, fantastico, situato sulla vetta di un'altura di tufo e raggiungibile solo attraverso uno stretto ponte pedonale dal quale si gode di un panorama spettacolare. Soprannominata la città che muore, per via della costante erosione delle rocce di tufo su cui si trova, questo piccolo borgo ha origini etrusche e medioevali. Sospesa nel tempo e nello spazio, Civita di Bagnoregio è senza dubbio uno dei borghi italiani più belli e caratteristici. Durante le giornate di nebbia questa incredibile città sembra letteralmente sospesa nel vuoto.
                    <br>
                    <a href="javascript:trova1()">Trova sulla mappa</a>
                    <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Civita di Bagnoregio&pag=fuori_ita.php">Valutami!</a>';
                      }
                      ?>
                    
                </div>
            </div>

            <button class="btnToggle" onclick="bt2()">
                <span>Parco dei Mostri</span></button>
                <div class="par2" style="display:none">
                 
                  <div class="trans2" >
                    <img src="Img/parcomostri.jpg" height="100%" width="50%">
                  </div>
                  <div class="trans2">
                    <img src="Img/parcomostri3.jpg" height="100%" width="50%">
                  </div>
                  <div class="trans2">
                    <img src="Img/parco2.jpg" height="100%" width="50%">
                  </div>
                <div class="column">
                    In provincia di Viterbo, nel cuore della Tuscia Laziale si trova il Sacro Bosco di Bomarzo, meglio conosciuto come Parco dei Mostri: un autentico tesoro nascosto tutto da scoprire! All'interno di questo bosco, sarete catapultati in un mondo fantastico, popolato di animali mitologici e giganteschi mostri di pietra che da oltre 500 anni incutono timore, sorpresa e meraviglia in ogni visitatore che lo attraversi, ovvero da quando l'architetto Pirro Ligorio lo realizzò su commissione del Principe Pier Francesco Orsini.
                     <br>
                    <a href="javascript:trova2()">Trova sulla mappa</a>
                    <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Parco dei Mostri&pag=fuori_ita.php">Valutami!</a>';
                      }
                      ?>
                    
                  </div>
                </div>

             <button class="btnToggle" onclick="bt3()">
                <span>Isola del Liri</span></button>
                <div class="par3" style="display:none">
                <div class="trans3">
                  <img src="Img/isoladelliri.jpg" height="100%" width="50%">
                </div>
                <div class="trans3">
                  <img src="Img/isoladelliri2.jpg" height="100%" width="50%">
                </div>
                <div class="trans3">
                    <img src="Img/isoladelliri3.jpg" height="100%" width="50%">
                  </div>
                     <div class="column">
                        Siamo in provincia di Frosinone, in uno dei posti più belli e suggestivi della nostra regione. Questa città, anticamente abitata dai Volsci e poi conquistata dai Romani nel 305 a.C., gode di una strategica posizione. Le sue abitazioni, il suo centro storico, infatti, abbracciano il fiume Liri che, qui, raggiunge la sua massima bellezza nella famosa cascata grande. 
                        <br>Una cascata nel cuore di un paese, che compie un salto di 30 metri. Questo è il primo motivo per cui una visita a Isola del Liri vale il viaggio. In questo borgo del Lazio, il fiume si divide i due bracci, formando, da un lato la cascata piccola, anche detta "Valcatoio" che caratterizza la parte overst di Isola del Liri, dall'altro la cascata grande che è protagonista nel cuore del paese.
                             <br>
                          <a href="javascript:trova3()">Trova sulla mappa</a>
                          <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Isola del Liri&pag=fuori_ita.php">Valutami!</a>';
                      }
                      ?>
                       
                       </div>
                    </div>

                    <button class="btnToggle" onclick="bt4()">
                      <span>Loggetta del Monte Cavo</span></button>
                      <div class="par4" style="display:none">
                      <div class="trans4">
                        <img src="Img/loggetta_montecavo.jpg"  height="100%" width="50%">
                      </div>
                   
                      <div class="trans4">
                        <img src="Img/loggetta_montecavo3.jpg"  height="100%" width="50%">
                      </div>
                           <div class="column">
                            Lungo la via Sacra che in antichità conduceva al tempio di Giove Latino, troviamo la Loggetta del Monte Cavo, una piccola terrazza panoramica da cui è possibile ammirare un bellissimo panorama, partendo dai due laghi Albano (destra) e Nemi (sinistra) fino alla costa tirrenica, nelle giornate più limpide è possibile mirare anche le isole pontine.
                                   <br>
                                <a href="javascript:trova4()">Trova sulla mappa</a>
                                <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Loggetta Monte Cavo&pag=fuori_ita.php">Valutami!</a>';
                      }
                      ?>
                       
                             
                             </div>
                      </div>

              <button class="btnToggle" onclick="bt5()">
                <span>Giardino dei Tarocchi</span></button>
                  <div class="par5" style="display:none">
                    <div class="trans5">
                      <img src="Img/giardinotarocchi.jpg"  height="100%" width="50%">
                    </div>
                    <div class="trans5">
                        <img src="Img/giardinotarocchi2.jpg"  height="100%" width="50%">
                    </div>
                    <div class="trans5">
                        <img src="Img/giardinotarocchi3.jpg"  height="100%" width="50%">
                    </div>
                    <div class="column">
                        Al confine tra Lazio e Toscana, si trova uno dei più incredibili parchi mai realizzati: stiamo parlando del fantastico Giardino dei Tarocchi, ideato dall'artista franco-statunitense Niki de Saint Phalle ispirato da Parc Guell e dal Parco dei Mostri.
                        All'interno del Giardino si trovano incredibili sculture alte fino a 15 metri che rappresentano i 22 arcani dei Tarocchi, realizzate in acciaio e cemento e rivestite di specchi, vetri e ceramiche colorate.
                        La meraviglia e lo stupore che si prova nel visitare questi giganti colorati è semplicemente unica, così come lo è l'atmosfera che si respira nel parco.
                              <br>
                    <a href="javascript:trova5()">Trova sulla mappa</a>
                    <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Giardino dei Tarocchi&pag=fuori_ita.php">Valutami!</a>';
                      }
                      ?>
                       
                   
                  </div>
                </div>


                  <button class="btnToggle" onclick="bt6()">
                    <span>Sant'Angelo</span></button>
                      <div class="par6" style="display:none">
                      <div class="trans6">
                          <img src="Img/sant1.jpg"  height="100%" width="50%">
                        </div>
                        <div class="trans6">
                            <img src="Img/santangelo2.jpg"  height="100%" width="50%">
                        </div>
                        <div class="trans6">
                            <img src="Img/santangelo3.jpg"  height="100%" width="50%">
                        </div>
                        <div class="column">
                            Colori brillanti, opere curate nei minimi dettagli e personaggi amati da grandi e bambini: benvenuti al paese delle fiabe. Vi sembrerà di vivere un sogno percorrendo le strade di questo piccolo borgo ed ammirando i suoi meravigliosi murales.
                            Passeggiando tra le vie di Sant’Angelo vi troverete faccia a faccia con il Bianconiglio di Alice nel paese delle meraviglie, potrete vedere la casetta di marzapane di Hansel e Gretel e lasciarvi guidare dalla saggezza del Piccolo Principe. Su case, edifici e muri di Sant’Angelo prende vita la fantasia, le fiabe amate da grandi e bambini rivivono in bellissimi (ed enormi) murales.
                                  <br>
                        <a href="javascript:trova6()">Trova sulla mappa</a>
                        <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Sant Angelo&pag=fuori_ita.php">Valutami!</a>';
                      }
                      ?>
                      
                      </div>
                      </div>


                      <button class="btnToggle" onclick="bt7()">
                        <span>Cascate del Monte Gelato</span></button>
                          <div class="par7" style="display:none">
                            <div class="trans7">
                              <img src="Img/cascate.jpg"  height="100%" width="50%">
                            </div>
                            <div class="trans7">
                                <img src="Img/cascate2.jpg"  height="100%" width="50%">
                            </div>
                            <div class="trans7">
                                <img src="Img/cascate3.jpg"  height="100%" width="50%">
                            </div>
                            <div class="column">
                                Le Cascate di Monte Gelato sono situate all’interno dell’area protetta del Parco Regionale Valle del Treja e sono un esempio sofisticato di quanto la natura sia stata generosa in questo angolo di pianeta. Ed è proprio nei pressi del Monte Gelato che il Treja compone i suoi scorci più belli, sfoggiando alcuni dei salti che formano le suggestive cascate naturali. Passeggiare in questo paradiso vi consentirà di ammirare specchi cristallini di acqua in cui si riflette, in tutto il suo splendore, il verdissimo bosco circostante.
                                      <br>
                            <a href="javascript:trova7()">Trova sulla mappa</a>
                            <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Cascate Monte Gelato&pag=fuori_ita.php">Valutami!</a>';
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
                       <h6 class="mt-55 mt-2 bold-text"><a href="recensione.php?pag=fuori_ita.php"><b>Fai una recensione</b></a></h6> <!--INSERIRE LINK-->
                         
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
           include 'fuori_ita.js';
          
           ?>
           </script>
    </body>
</html>