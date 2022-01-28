<?php
    session_start();

    //da mettere ovunque
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
        <title>Outside Rome</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="Markers/h4.ico" />

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <style>
       
       <?php 
      include 'footer.css';  
      include 'mappa.css';
       
       include 'css/bootstrap.min.css';
       ?>
        body {
          background-color:rgb(255, 226, 226);
         font-family: "Arial, Helvetica, sans-serif";
       }
       </style>
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
        
      

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
       
      
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

          <li><a href="fuori_ita.php"><img src="bandiera-italia.png"  style="width:30px; height: 20px;" id="bandiera"></a></li>
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
          <form id="login" class="inpu-group" action="login.php?pag=fuori_eng.php" method="POST">
              <input type="email" name="email_l"class="inpu-field" placeholder="Email" required>
              <input type="password" name="password_l" class="inpu-field" placeholder="Password" required>
              <br><br>
              <button type="submit" class="submit-btn">Login</button>
          </form>
          <form id="signin" class="inpu-group" action="registrazione.php?pag=fuori_eng.php" method="POST">
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

<div style="padding: 85px;">
        


        <!--Mappa-->
            <div class="map-wrap">
                <div id="map">
                    <script type="text/javascript" lang="javascript" src="fuori_eng.js">
                    </script>
                </div>
             </div>



        <!--Toggle Button con recensioni, se loggati possiamo vedere anche il tasto Valutami!-->
        <div class="toggle">
            <button class="btnToggle" onclick="bt1()">
                <span>Civita di Bagnoregio</span></button>
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
                    Civita di Bagnoregio is a magical, surreal, fantastic place, located on the top of a tuff hill and reachable only through a narrow pedestrian bridge from which you can enjoy a spectacular view. Nicknamed the city that dies, due to the constant erosion of the tuff rocks on which it is located, this small village has Etruscan and medieval origins. Suspended in time and space, Civita di Bagnoregio is undoubtedly one of the most beautiful and characteristic Italian villages. During the foggy days this incredible city seems to literally be suspended in the void.
                    <br>
                    <a href="javascript:trova1()">Find on the map</a>
                    <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Civita di Bagnoregio&pag=fuori_eng.php">Rate me!</a>';
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
                    In the province of Viterbo, in the heart of Tuscia Laziale is the Sacro Bosco di Bomarzo, better known as the Monster Park: an authentic hidden treasure to be discovered! Inside this wood, you will be catapulted into a fantastic world, populated by mythological animals and gigantic stone monsters that for over 500 years have inspired fear, surprise and wonder in every visitor who passes through it, that is, since the architect Pirro Ligorio built on commission from Prince Pier Francesco Orsini.
                     <br>
                    <a href="javascript:trova2()">Find on the map</a>
                    <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Parco dei Mostri&pag=fuori_eng.php">Rate me!</a>';
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
                        We are in the province of Frosinone, in one of the most beautiful and evocative places in our region. This city, formerly inhabited by the Volsci and then conquered by the Romans in 305 BC, enjoys a strategic position. Its houses, its historic center, in fact, embrace the Liri river which, here, reaches its maximum beauty in the famous large waterfall.

                             
                        <br>A waterfall in the heart of a village, which makes a jump of 30 meters. This is the first reason why a visit to Isola del Liri is worth the trip. In this Lazio village, the river divides its two arms, forming, on one side the small waterfall, also called "Valcatoio" which characterizes the overst part of Isola del Liri, on the other the large waterfall which is the protagonist in the heart of the country.
                         <br>
                        <a href="javascript:trova3()">Find on the map</a>
                        <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Isola del Liri&pag=fuori_eng.php">Rate me!</a>';
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
                            Along the Via Sacra that in ancient times led to the temple of Jupiter Latin, we find the Loggetta del Monte Cavo, a small panoramic terrace from which it is possible to admire a beautiful panorama, starting from the two lakes Albano (right) and Nemi (left) up to the coast. Tyrrhenian, on clear days it is also possible to aim at the Pontine islands.

                                   <br>
                                <a href="javascript:trova4()">Find on the map</a>
                                <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Loggetta Monte Cavo&pag=fuori_eng.php">Rate me!</a>';
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
                        On the border between Lazio and Tuscany, there is one of the most incredible parks ever built: we are talking about the fantastic Tarot Garden, created by the French-American artist Niki de Saint Phalle inspired by Parc Guell and the Parco dei Mostri.
                        Inside the Garden there are incredible sculptures up to 15 meters high representing the 22 arcana of the Tarot, made of steel and concrete and covered with mirrors, glass and colored ceramics.
                        The wonder and amazement one feels in visiting these colorful giants is simply unique, as is the atmosphere in the park.
                              <br>
                    <a href="javascript:trova5()">Find on the map</a>
                    <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Giardino dei Tarocchi&pag=fuori_eng.php">Rate me!</a>';
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
                            Bright colors, works with attention to the smallest detail and characters loved by adults and children: welcome to the land of fairy tales. You will feel like you are living a dream walking the streets of this small village and admiring its wonderful murals.
                            Strolling through the streets of Sant’Angelo you will find yourself face to face with Alice's White Rabbit in Wonderland, you will be able to see Hansel and Gretel's gingerbread house and let yourself be guided by the wisdom of the Little Prince. Fantasy comes to life on the houses, buildings and walls of Sant’Angelo, the fairy tales loved by adults and children come to life in beautiful (and huge) murals.
                                  <br>
                        <a href="javascript:trova6()">Find on the map</a>
                        <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Sant Angelo&pag=fuori_eng.php">Rate me!</a>';
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
                                The Monte Gelato Waterfalls are located within the protected area of ​​the Valle del Treja Regional Park and are a sophisticated example of how generous nature has been in this corner of the planet. And it is right near Monte Gelato that the Treja composes its most beautiful views, showing off some of the jumps that form the suggestive natural waterfalls. Walking in this paradise will allow you to admire crystalline mirrors of water in which the surrounding green forest is reflected in all its splendor.
                                      <br>
                            <a href="javascript:trova7()">Find on the map</a>
                            <?php 
                      if(isset($_SESSION['session_id'])){
                        echo ' <br>
                        <a href="recensione.php?luogo=Cascate Monte Gelato&pag=fuori_eng.js">Rate me!</a>';
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
                      <h6 class="mt-55 mt-2 bold-text"><a href="recensione.php?pag=fuori_eng.php"><b>Send a review</b></a></h6> <!--INSERIRE LINK-->
     
     </div>
     
       <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4">
           <h6 class="mb-3 mb-lg-4 bold-text"><b>MENU</b></h6>
           <ul class="list-unstyled">
                <li><a href="viste_ita.php">Panoramic Spots</a></li>
                <li><a href="luoghi_ita.php">Unusual Places</a></li>
                <li><a href="fuori_ita.php">Outside Rome</a></li>
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
           include 'fuori_eng.js';
          
           ?>
           </script>
    </body>
</html>