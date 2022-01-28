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
        <title>Panoramic Spots</title>
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
  <li><a href="viste_ita.php"><img src="bandiera-italia.png"  style="width:30px; height: 20px;" id="bandiera"></a></li>
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
             <form id="login" class="inpu-group" action="login.php?pag=viste_eng.php" method="POST">
                 <input type="email" name="email_l"class="inpu-field" placeholder="Email" required>
                 <input type="password" name="password_l" class="inpu-field" placeholder="Password" required>
                 <br><br>
                 <button type="submit" class="submit-btn">Login</button>
             </form>
             <form id="signin" class="inpu-group" action="registrazione.php?pag=viste_eng.php" method="POST">
                 <input type="email" name="email" class="inpu-field" placeholder="Email" required>
                 <input type="text" name ="user" class="inpu-field" placeholder="Username" required>
                 <input type="password" name ="password" class="inpu-field" placeholder="Password" required>
                 <input type="checkbox" class="chec-box"><span>I agree to the Terms and Conditions</span>
                 <button type="submit" class="submit-btn">Sign in</button>
             </form>
         </div>
     </div>
   </div>';
   unset($_SESSION['Verif_Log']);
               unset($_SESSION['Verif_Reg']);
               unset($_SESSION['Verif_Rec']);}
   ?>

 <div style="padding:85px;">

        
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
                    The Urban Park of Monte Ciocci is a sort of green mountain at the foot of the Trionfale, between the Balduina area and the Via Aurelia, from which you can admire with infinite amazement a spectacular panorama that opens to 360 degrees over almost the entire city. Eternal and especially on St. Peter's Basilica. On a low wall, where it is possible to sit, there are the verses of a song by the rap group "colle der fomento" which recite "but tell me how many times have you seen the sky above Rome and said" how beautiful is it? "". Not far away there is also an agricultural institute.
                    <br>
                    <a href="javascript:trova2()">Find on the map</a>
                    <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Monte Ciocci&pag=viste_eng.php">Rate me!</a>';
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
                <div class="column">
                    Piazzale Socrate is located in the Balduina district: it offers a breathtaking view over all of Rome and beyond. While a few years ago it was a little known and well-kept place, in recent years it has become a meeting point for many groups of very young people who often leave dirt on the ground, ruining this wonderful and very romantic place. It has become famous in recent years among young people thanks to the TV series Baby.
                     <br>
                    <a href="javascript:trova1()">Find on the map</a>
                    <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Piazzale Socrate&pag=viste_eng.php">Rate me!</a>';
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
                        From via Piccolomini you can admire the dome of San Pietro as it was designed by Michelangelo, without the subsequent modifications made to the Vatican by other architects; moreover, an optical effect makes it a truly magical and evocative place. Something extraordinary happens here! admiring and looking at the dome of San Pietro, the closer you get, the more the dome moves away; the further you move back, the larger the dome becomes. A curious visual effect caused by the layout of the buildings and the observation point.

                                <br>Via Piccolomini is the ideal place for a romantic walk, to make the first date unforgettable or simply to admire the dome of St. Peter's from a less conventional but equally spectacular point.
                             <br>
                          <a href="javascript:trova3()">Find on the map</a>
                          <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Via Piccolomini&pag=viste_eng.php">Rate me!</a>';
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
                            A very suggestive place that dominates Rome in all its splendor from the top of Monte Mario, 140 meters high, and from which you can admire a large slice of the capital, ranging from the Roman castles to the historic center. An enchanting and romantic corner, especially in the evening when darkness falls and the stars frame the illuminated city, and where you can stop and eat in the beautiful panoramic restaurant on site. This is also an ideal place for all couples who want to spend a romantic evening under the stars
                                   <br>
                                <a href="javascript:trova4()">Find on the map</a>
                                <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Lo Zodiaco&pag=viste_eng.php">Rate me!</a>';
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
                        Il Gianicolo is a Roman hill, overlooking the right bank of the Tiber and whose height is 82 meters. It is not part of the group of seven traditional hills. The eastern slope slopes down towards the river and at the base is the historic district of Trastevere, while the western one, less steep, constitutes the oldest part of the modern district of Monteverde. On clear winter days, the snowy peak of Terminillo, on the left, is the perfect counterpart to the countless monuments that rise from the heart of the city. The dome of the Pantheon, Palazzo Farnese, the Synagogue, Villa Borghese and the Altare della Patria are easily recognizable in the background.
                              <br>
                    <a href="javascript:trova5()">Find on the map</a>
                    <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Il Gianicolo&pag=viste_eng.php">Rate me!</a>';
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
                          The territory of the Natural Reserve of Monte Mario with its 139 meters of height is the most important relief of the system of the hills called the Monti della Farnesina and represents for its environmental characteristics a true mosaic of biological diversity now rare in Rome. Already in Roman times the hill was home to the residential villas of poets and nobles and was crossed by armies returning from military campaigns along the Via Trionfale followed by the pilgrims who went to Rome, becoming the last stretch of the Via Francigena, the route medieval from Canterbury to San Pietro and further south to Jerusalem.

                                  <br>
                        <a href="javascript:trova6()">Find on the map</a>
                        <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Riserva Monte Mario&pag=viste_eng.php">Rate me!</a>';
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
                            A suggestive walk on a removed railway track that was used to connect the Vatican with Rome. To reach it you have to enter right inside the San Pietro Station, as if you want to take the train and then continue along track 1 turning immediately right, from here begins the path that allows you to admire San Pietro and its dome from a different perspective .
                                      <br>
                            <a href="javascript:trova7()">Find on the map</a>
                            <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Passeggiata del Gelsomino&pag=viste_eng.php">Rate me!</a>';
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
     
  <h1 class="text-muted mb-md-0 mb-5 bold-text"><a href="index_eng.php">discoveRome</a></h1>
  </div>

  <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4">
   <h6 class="mt-55 mt-2 bold-text"><a href="recensione.php?pag=viste_eng.php"><b>Send a review</b></a></h6> <!--INSERIRE LINK-->
     
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
           include 'viste_eng.js';
          
           ?>
           </script>
    </body>
</html>  