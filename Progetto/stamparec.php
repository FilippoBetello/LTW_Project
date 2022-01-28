<?php
    $conn = mysqli_connect('localhost','superuser','password','db_drome');


    // check connection
    if(!($conn)){
        echo 'Connection error: ' . mysqli_connect_error();
    }

    session_start();

    if($_POST){
        if ($_POST['val'] != ""){
            $valutaz =  $_POST['val'];
            $sql = "SELECT * FROM recensione WHERE luogo='".$valutaz."' ORDER BY luogo";

        }
        else{
            $sql = "SELECT * FROM recensione ORDER BY luogo";
        }
    }
    else{

        $sql = "SELECT * FROM recensione ORDER BY luogo";
    }
    
    $result = mysqli_query($conn, $sql);
   
    if (!mysqli_num_rows($result)){
        header("location: stamparec.php");
    }
     

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Markers/h4.ico" />

    <title>Recensioni</title>
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        <?php 
            include 'mappa.css';
            include 'tabella.css';
            ?>
         body {
          background-color:rgb(245, 187, 187);
          font-family: "Arial, Helvetica, sans-serif";
        }
    </style>

</head>
<body style="background-color:rgb(255, 226, 226);">
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
          <li><a href="stamparec_eng.php"><img src="bandiera-inglese.png" style="width:30px; height: 20px;" id="bandiera"></a></li>
        </ul>
             
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>     
    </nav>

    
<div class="wrapper" style="padding-top:150px;">
    <div class="table">
        <div class="row header">
            <div class="cell">Utente</div>
            <div class="cell">Luogo</div>
            <div class="cell">Valutazione</div>
            <div class="cell">Recensione</div>
        </div>
        <?php
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo '<div class="row">';
            foreach($line as $col_value){
                echo '<div class="cell">'.$col_value.'</div>';
            }
            echo '</div>';
        }
        echo '</table>';
        ?>   
</div>
<form style="text-align:center" action="stamparec.php" method="POST">
        <!--<input class="cell" name="val" type="number" style="width:90px" max="5" min="1" name="val" placeholder="Valutazione" >-->
        <select style="background-color:darkred; color:white;text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);" name="val" id="val">
            <option style="color:darkred; background-color:white" value="None">--- Scegli Luogo ---</option>
            <option style="color:darkred; background-color:white" value="Piazzale Socrate">Piazzale Socrate</option>
            <option style="color:darkred; background-color:white" value="Monte Ciocci">Monte Ciocci</option>
            <option style="color:darkred; background-color:white" value="Via Piccolomini">Via Piccolomini</option>
            <option style="color:darkred; background-color:white" value="Lo Zodiaco">Lo Zodiaco</option>
            <option style="color:darkred; background-color:white" value="Il Gianicolo">Il Gianicolo</option>
            <option style="color:darkred; background-color:white" value="Riserva Monte Mario">Riserva Monte Mario</option>
            <option style="color:darkred; background-color:white" value="Tempio di Flora">Tempio di Flora</option>
            <option style="color:darkred; background-color:white" value="Statue Parlanti">Statue Parlanti</option>
            <option style="color:darkred; background-color:white" value="Murales Totti">Murales Totti</option>
            <option style="color:darkred; background-color:white" value="Piccola Londra">Piccola Londra</option>
            <option style="color:darkred; background-color:white" value="Galleria Spada">Galleria Spada</option>
            <option style="color:darkred; background-color:white" value="Targa moti carbonari">Targa moti carbonari</option>
            <option style="color:darkred; background-color:white" value="Murales Tor Marancia">Murales Tor Marancia</option>
            <option style="color:darkred; background-color:white" value="Cascate Monte Gelato">Cascate Monte Gelato</option>
            <option style="color:darkred; background-color:white" value="Civita di Bagnoregio">Civita di Bagnoregio</option>
            <option style="color:darkred; background-color:white" value="Giardino dei Tarocchi">Giardino dei Tarocchi</option>
            <option style="color:darkred; background-color:white" value="Isola del Liri">Isola del Liri</option>
            <option style="color:darkred; background-color:white" value="Loggetta Monte Cavo">Loggetta Monte Cavo</option>
            <option style="color:darkred; background-color:white" value="Parco dei Mostri">Parco dei Mostri</option>
            <option style="color:darkred; background-color:white" value="Sant Angelo">Sant Angelo</option>
        </select>
        <button class="cell" style="color:darkred" type="submit">Ricerca</button>
    </form>

    <script>
        <?php 
           include 'barra.js';
        ?>
    </script>
</body>
</html>