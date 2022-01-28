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
<html lang="EN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Unusual Places</title>
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
          
          include 'css/bootstrap.min.css';?>
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
          <a href="index_eng.php"><img src="h2.png"class="img-fluid"  id="logo2"></a>
       </div>
  </li>
  <li>
      <div class="mylogo">
          <a href="index_eng.php"> <p></p> </a>
      </div>
  </li>
</ul>


<ul class="ul-nav" >

  <li>
    <a href="viste_eng.php" id="LeViste"><b>PANORAMIC SPOTS</b></a>
  </li>
  <li >
    <a href="luoghi_eng.php" id="LuoghiInsoliti"><b>UNUSUAL PLACES</b></a>
    
  </li>
  <li >
    <a href="fuori_eng.php"  id="FuoriRoma"><b>OUTSIDE ROME</b></a>
   
  </li>
  
  <li><a id="recensioni" href="stamparec_eng.php"><b>REVIEWS</b></a></li>
  <li><a href="luoghi_ita.php"><img src="bandiera-italia.png"  style="width:30px; height: 20px;" id="bandiera"></a></li>
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
             <form id="login" class="inpu-group" action="login.php?pag=luoghi_eng.php" method="POST">
                 <input type="email" name="email_l"class="inpu-field" placeholder="Email" required>
                 <input type="password" name="password_l" class="inpu-field" placeholder="Password" required>
                 <br><br>
                 <button type="submit" class="submit-btn">Login</button>
             </form>
             <form id="signin" class="inpu-group" action="registrazione.php?pag=luoghi_eng.php" method="POST">
                 <input type="email" name="email" class="inpu-field" placeholder="Email" required>
                 <input type="text" name ="user" class="inpu-field" placeholder="Username" required>
                 <input type="password" name ="password" class="inpu-field" placeholder="Password" required>
                 <input type="checkbox" class="chec-box"><span>I agree to share my information</span>
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
                <span>Statue parlanti</span> </button>
            <div class="par1" style="display:none">
            <div class="trans1" >
                <img src="Img/parlante1.jpeg" height="100%" width="50%">
              </div>
              
              <div class="trans1">
                <img src="Img/parlante2.jpeg" height="100%" width="50%">
              </div>
              
                <div class="column">
                    It is a group of 6 statues where the Romans post anonymous messages, mostly criticisms and satirical compositions against the rulers. The most famous is that of Pasquino, hence the name of these messages "Pasquinate". The character of Pasquino inspired the films "In the year of the gentleman" of 1969 and "The night of the Pasquino" of 2003, both directed by Luigi Magni.
                    <br>
                    <a href="javascript:trova1()">Find on the map</a>
                    <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Statue Parlanti&pag=luoghi_eng.php">Rate me!</a>';
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
                    The Temple of Flora stands near the Egyptian embassy. Completely restored in 2000, it was once the coffee house of King Vittorio Emanuele III where he received guests. The front of the building facing the street has the appearance of a Doric temple, adorned in the entablature with crosses and eagles, perhaps added by the House of Savoy.
                    Upon entering, we find ourselves in a circular room with a curvilinear apse and large windows opening onto an underlying amphitheater, called the Theater, with a late 19th-century cast iron fountain in the center, the result of a romantic reworking of the place. Under the apse of the temple it rests on a portico, which also overlooks the Theater.

                     <br>
                    <a href="javascript:trova2()">Find on the map</a>
                    <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Tempio di Flora&pag=luoghi_eng.php">Rate me!</a>';
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
                        The mural depicts the exultation of the former Giallorossi captain during the 2000/2001 season, that of the last Roma championship. The graffiti is located in the Capitoline Rione Monti and has been sprayed several times with spray cans by the fans of Lazio, Roma's historic rival in the league.
                             <br>
                          <a href="javascript:trova3()">Find on the map</a>
                          <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Murales Totti&pag=luoghi_eng.php">Rate me!</a>';
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
                            This surreal corner of England is located in the Flaminio district. In fact, in 1909 the Anglo-Italian mayor Ernesto Nathan was elected, who fully understood the immense potential of Rome. He therefore approved a master plan that prevented the buildings from exceeding 24 meters in height, with villas that could not exceed the second floor (all with iron gate). This road is nothing more than an example of that ambitious project, created by the architect Quadrio Pirani. However, the project never went beyond this little corner of paradise, which however isolates the residents from the traffic and chaos of the capital.
                                   <br>
                                <a href="javascript:trova4()">Find on the map</a>
                                <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Piccola Londra&pag=luoghi_eng.php">Rate me!</a>';
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
                        Passing through the courtyard of the Palace coming from the main entrance, on the left you can see, through a central opening barred by a walnut gate, the gallery with the perspective that goes beyond the small garden of melangoli; the gallery is presented in its present form after the last restorations. The fake perspective is created on the illusion that the tunnel is about 35 meters long, while in reality it is 8.82 meters long. The illusion is due to the fact that the planes converge in a single vanishing point; thus, while the ceiling descends from top to bottom, the mosaic floor rises. In ancient times, a fake plant motif was drawn on the back wall that accentuated the sense of perspective. Currently on the seabed there is a cast of a warrior statuette from the Roman era.
                              <br>
                    <a href="javascript:trova5()">Find on the map</a>
                    <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Galleria Spada&pag=luoghi_eng.php">Rate me!</a>';
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
                            The plaque is located in Piazza del Popolo, in the Campo Marzio district, and recalls the Carbonari Angelo Targhini and Leonida Montanari, sentenced to death for treason and beheaded by the famous executioner Mastro Titta right in Piazza del Popolo. In 1825 they were accused by the papal authorities of an attack on Giuseppe Pontini, a carbonaro who had betrayed his own "sale", turning into a spy for the government authorities.

                            No evidence had been gathered against them. The story was brought to the cinema by director Luigi Magni, in the film In the year of the Lord (1969)
                                  <br>
                        <a href="javascript:trova6()">Find on the map</a>
                        <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Targa moti Carbonari&pag=luoghi_eng.php">Rate me!</a>';
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
                                One of the phenomena of cultural revolution that has been affecting Rome for some years is that of urban redevelopment of peripheral areas through the use of Street Art. The pioneering neighborhoods, in this sense, were Pigneto, San Basilio and the area between Ostiense and Testaccio. .
    But in 2015 it was the turn of another historic town in the city, namely Tor Marancia.
Here, 20 international artists in 70 days of work (between 8 January and 27 February 2015), with 765 liters of paint and almost 1,000 spray cans have given life to "Big City Life", a project that consists of 22 murals monumental designed by 999Coontemporary, financed by the Rome Foundation and the Campidoglio and sponsored by the VIII Municipality.
<br> Each work, moreover, has to do with some history linked to that specific building.
                                      <br>
                            <a href="javascript:trova7()">Find on the map</a>
                            <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Murales Tor Marancia&pag=luoghi_eng.php">Rate me!</a>';
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
     
  <h1 class="text-muted mb-md-0 mb-5 bold-text"><a href="index_eng.php">discoveRome</a></h1>
  </div>

  <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4">
  <h6 class="mt-55 mt-2 bold-text"><a href="recensione.php?pag=luoghi_eng.php"><b>Send a review</b></a></h6> <!--INSERIRE LINK-->
     
     </div>
     
       <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4">
           <h6 class="mb-3 mb-lg-4 bold-text"><b>MENU</b></h6>
           <ul class="list-unstyled">
                <li><a href="viste_eng.php">Panoramic Spots</a></li>
                <li><a href="luoghi_eng.php">Unusual Places</a></li>
                <li><a href="fuori_eng.php">Outside Rome</a></li>
                <li><a href="stamparec_eng.php">Reviews</a></li>
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
            <h6 class="mt-55 mt-2 bold-text"><a href="suggerimento.php"><b>Suggestion</b></a></h6>
          
        </div>
     
       <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4 order-1 align-self-end ">
           <h6 class="mt-55 mt-2  bold-text" style="color: darkred;"><b>Contact us</b></h6>
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
           include 'luoghi_eng.js';
          
           ?>
           </script>
    </body>
</html>