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
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="Markers/h4.ico" />
       
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- PER SIMBOLI -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        
        <style>

          <?php include 'home.css'; 
          include 'css/bootstrap.min.css'; ?>
          

          body {
            background-color:rgb(255, 226, 226);
            font-family: "Arial, Helvetica, sans-serif";
            margin: 0;
          }

        </style>
             
    </head>


    <body id="page-index">
  
        <!-- navbar-->
        <!-- Navigation -->
        <nav id="navbar">
          <ul class="ul-nav-logo">
         
            
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
            
            <li><a href="stamparec.php" id="recensioni"><b>RECENSIONI</b></a></li>
            <li><a href="index_eng.php"><img src="bandiera-inglese.png"  style="width:30px; height: 20px;" id="bandiera"></a></li>
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
             <form id="login" class="inpu-group" action="login.php?pag=index.php" method="POST">
                 <input type="email" name="email_l"class="inpu-field" placeholder="Email" required>
                 <input type="password" name="password_l" class="inpu-field" placeholder="Password" required>
                 <br><br>
                 <button type="submit" class="submit-btn">Login</button>
             </form>
             <form id="signin" class="inpu-group" action="registrazione.php?pag=index.php" method="POST">
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

   
   


        <!--titolo e logo e video-->
    
        <video autoplay muted loop id="myvideo">
          <source src="Markers/vid3.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        <div class="discover"><b>discoveRome</b></div>
       <div class="logo_home" id="logo_home"><a href="#"><img id="logo_1" src="h2.png"></a></div>
          


     <div class="contenitori"> 
       
      
      <div class="contenitore1">
        <div class="descrizione">
          <h2 href="" style="color: darkred;">Le Viste</h2>
          <p>Roma offre tanti punti panoramici e scorci straordinari, ognuno con una sua particolarità, 
            da cui godere di una splendida vista e dai quali cogliere tutta la magnificenza 
            della città da una prospettiva privilegiata. </p>
        </div>
        
        <div class="flip-box" >
          <div class="flip-box-inner">
            <div class="flip-box-front">
              <img  src="Img/Monte_ciocci.jpg" alt="civita di bagnoregio" style="width:100%;height:100%">
              <div class="text">Monte Ciocci</div>
            </div>
            <div class="flip-box-back">
              <img  src="Img/Zodiaco1.jpg" alt="civita di bagnoregio" style="width:100%;height:100%">
              <div class="text">Lo Zodiaco</div>
            </div>
          </div>
        </div>
      </div>

        <br><br><br>

        <div class="contenitore1">
          <div class="descrizione2">
            <h2 href="" style="color: darkred;">Luoghi Insoliti</h2>
          <p>Passeggiando per la città spesso ci si imbatte in luoghi con caratteristiche particolari. Ai meno attenti molti di questi ambienti unusuali possono sfuggire, ma se guardati con attenzione si può rimanere piacevolmente stupiti.</p>
          </div>
          <div class="flip-box" style="float: right;">
            <div class="flip-box-inner">
              <div class="flip-box-front">
                <img  src="Img/Tempio_di_Flora.jpg" alt="civita di bagnoregio" style="width:100%;height:100%; float:right;">
                <div class="text">Tempio di Flora</div>
              </div>
              <div class="flip-box-back">
                <img  src="Img/murales4.jpeg" alt="civita di bagnoregio" style="width:100%;height:100%; float: right;">
                <div class="text">Tor Marancia</div>
              </div>
            </div>
          </div>
        </div> 

        <br><br><br>

        <div class="contenitore1">
          <div class="descrizione">
            <h2 href="" style="color: darkred;">Fuori Roma</h2>
            <p>A poca distanza da Roma esistono delle cittadine e dei luoghi molto tipici, ognuno caratterizzato da un particolare diverso ottimi per fare una bella giornata fuori dal traffico e smog della città. Le bellezze nel nostro territorio sono infinite, provare per credere !!     
            </p>
          </div>
          <div class="flip-box" >
            <div class="flip-box-inner">
              <div class="flip-box-front">
                <img  src="Img/Civita_di_Bagnoregio.jpg" alt="civita di bagnoregio" style="width:100%;height:100%">
                <div class="text">Civita di Bagnoregio</div>
              </div>
              <div class="flip-box-back">
                <img  src="Img/giardinotarocchi2.jpg" alt="civita di bagnoregio" style="width:100%;height:100%">
                <div class="text">Giardino dei Tarocchi</div>
              </div>
            </div>
          </div>
        </div>
      
      </div>


      <br><br> 
      <br><br>
      <br><br>
      <br><br>
  
      <h1 class="descr1 animated infinite bounce" >LE VOSTRE ESPERIENZE</h1>

      <br><br>

      <div class="slideshow-container">
        <a href="stamparec.php" style="text-decoration: none;">
        <div class="mySlides fade" >
            <br>
            <h2 STYLE="text-decoration: underline; font-style: oblique; text-align: center; color: darkred">
              Piazzale Socrate
            </h2> 
            
            <br>

            <p class="descr2">
              Un luogo fantastico dove ammirare Roma. Consiglio di prendere pizze da asporto e mangiarle con questa 
              splendida vista, non ve ne pentirete !! Ci tornerò sicuramente, posto molto romantico.
            </p>

        </div>
        
        <div class="mySlides fade">
          <br>
          <h2 STYLE="text-decoration: underline; text-align: center; color: darkred;">
            Tempio di Flora
          </h2> 
          
          <br>

          <p class="descr2">
            Un gioiello nel mezzo di villa Ada! Location perfetta per foto e video 
            spero venga rimesso a nuovo e che i giardinieri comunali facciano il loro lavoro. 
           </p>
      </div>
      
      <div class="mySlides fade">
        <br>
        <h2 STYLE="text-decoration: underline; text-align: center; color: darkred;">
          Civita di Bagnoregio
        </h2> 
        
        <br>

        <p class="descr2">
          Posto incantevole e perfetto per una passeggiata fuori porta. 
          Accessibile solo tramite un ponte, il borgo è piccolo ma carino. Consigliatissimo
         </p>
    </div>
    </a>
      </div>
          
      
<hr class="linea" id="linea"/>

<!-- about us -->
<br><br><br>

<div class="noi" id="noi">
  <p class="team"><b>IL TEAM</b></p>

  <!-- Right to left-->
  <div style="position: relative; text-align: center;">
<div class="row1">
  <div class="col-sm-6">
 
    <!-- normal -->
    <div class="ih-item circle effect12 right_to_left">
      <a>
        <div class="img">
          <img src="Markers/Jac.jpg" alt="img">
        </div>
        <div class="info">
          <h3>Jacopo Brunetti</h3>
          <p>@the_notorious_jac</p>
        </div>
      </a>
    </div>
    <!-- end normal -->
 
  </div>
</div>
<!-- end Right to left-->

<!-- up to down-->

<div class="row2">
  <div class="col-sm-6">
 
    <!-- normal -->
    <div class="ih-item circle effect12 up_to_down">
      <a>
        <div class="img">
          <img src="Markers/mik.jpg" alt="img">
        </div>
        <div class="info">
          <h3>Michela Cattabriga</h3>
          <p>@michelacattabriga</p>
        </div>
      </a>
    </div>
    <!-- end normal -->
 
  </div>
</div>
<!-- end up to down-->


  <!-- left to right-->

<div class="row3">
  <div class="col-sm-6">
 
    <!-- normal -->
    <div class="ih-item circle effect12 left_to_right">
      <a>
        <div class="img">
          <img src="Markers/Pippo1.jpg" alt="img">
        </div>
        <div class="info">
          <h3>Filippo Betello</h3>
          <p>@filippobetello</p>
        </div>
      </a>
    </div>
    <!-- end normal -->
 
  </div>
</div>
<!-- end left to right-->
</div>
</div>
<br><br><br><br><br>

<footer class="bg-light text-lg-start">
  <div class="my-5 justify-content-center py-5">
      <div class="col-md-12">
          <div class="row ">
              <div class="col-xl-8 col-lg-8 col-md-6 col-sm-4 col-4 my-auto mx-auto text-center">
                 
                  <h1 class="text-muted mb-md-0 mb-5 bold-text"><a href="index.php">discoveRome</a></h1>
              </div>

              <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4">
               <h6 class="mt-55 mt-2 bold-text"><a href="recensione.php?pag=index.php"><b>Fai una recensione</b></a></h6> <!--INSERIRE LINK-->
                  <!-- <small> 
                       <span>
                           <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span> 
                        discoverome_ltw@gmail.com
                    </small>-->
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
                  <!-- <small> 
                       <span>
                           <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span> 
                        discoverome_ltw@gmail.com
                    </small>-->
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
<?php include 'home.js'; ?>
</script>
</body>
</html>
