<?php

    $conn = mysqli_connect('localhost','superuser','password','db_drome');
        

    // check connection
    if(!($conn)){
        echo 'Connection error: ' . mysqli_connect_error();
    }

    $pagin = "";

    if (isset($_GET["pag"])){
        $pagin=$_GET["pag"];
        unset($_GET["pag"]);
    }
    else{
        header('Location: index.php');
    }


    session_start();
 
    if (!isset($_SESSION['session_id'])) {
        $_SESSION['Verif_Rec']="err";
        header('Location:'.$pagin);
     }


   
    if (isset($_GET["luogo"]))
    {
        $luogo=$_GET["luogo"];
        $sql = "SELECT * FROM luogo WHERE '".$luogo."'=nome";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)==1){
            $_SESSION["luogo_pass"]=$luogo;    
        }
        else{
            header('Location: index.php');
        }
    }
    else{
        $luogo="";
    }
    
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Recensione</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="suppl/util.css">
        <link rel="stylesheet" type="text/css" href="suppl/main.css">
	

    </head>
    <body style="font-family:Arial, Helvetica, sans-serif">
        <div class="bg-contact3" style="background-image: url('Markers/col.jpg');">
            <div class="container-contact3">
                <div class="wrap-contact3">
                    <form class="contact3-form validate-form" action="invia_recensione.php" method="post">
                        <div id="ElFlaco" class="contact3-form-title"></div>
                        
                        <div id="ElComandante">
        
                            <div class="wrap-input3 validate-input">
                                <input name="email" style="font-family:'Times New Roman'" class="input3" type="text" value="<?php echo $_SESSION['session_email'];?>" disabled>
                                <span class="focus-input3"></span>
                            </div>

                            <div class="wrap-input3 validate-input">
                                <?php
                                    if($luogo==""){
                                        unset($_SESSION['luogo_pass']);
                                        echo'<select style="background-color:transparent; color:white;text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);" name="luoghi" id="luoghi">
                                        <option style="color:darkred;" value="None">--- Scegli Luogo ---</option>
                                        <option style="color:darkred;" value="Piazzale Socrate">Piazzale Socrate</option>
                                        <option style="color:darkred;" value="Monte Ciocci">Monte Ciocci</option>
                                        <option style="color:darkred;" value="Via Piccolomini">Via Piccolomini</option>
                                        <option style="color:darkred;" value="Lo Zodiaco">Lo Zodiaco</option>
                                        <option style="color:darkred;" value="Il Gianicolo">Il Gianicolo</option>
                                        <option style="color:darkred;" value="Riserva Monte Mario">Riserva Monte Mario</option>
                                        <option style="color:darkred;" value="Tempio di Flora">Tempio di Flora</option>
                                        <option style="color:darkred;" value="Statue Parlanti">Statue Parlanti</option>
                                        <option style="color:darkred;" value="Murales Totti">Murales Totti</option>
                                        <option style="color:darkred;" value="Piccola Londra">Piccola Londra</option>
                                        <option style="color:darkred;" value="Galleria Spada">Galleria Spada</option>
                                        <option style="color:darkred;" value="Targa moti carbonari">Targa moti carbonari</option>
                                        <option style="color:darkred;" value="Murales Tor Marancia">Murales Tor Marancia</option>
                                        <option style="color:darkred;" value="Cascate Monte Gelato">Cascate Monte Gelato</option>
                                        <option style="color:darkred;" value="Civita di Bagnoregio">Civita di Bagnoregio</option>
                                        <option style="color:darkred;" value="Giardino dei Tarocchi">Giardino dei Tarocchi</option>
                                        <option style="color:darkred;" value="Isola del Liri">Isola del Liri</option>
                                        <option style="color:darkred;" value="Loggetta Monte Cavo">Loggetta Monte Cavo</option>
                                        <option style="color:darkred;" value="Parco dei Mostri">Parco dei Mostri</option>
                                        <option style="color:darkred;" value="Sant Angelo">Sant Angelo</option>
                                        <option style="color:darkred;" value="Passeggiata del Gelsomino">Passeggiata del Gelsomino</option>
                                    </select>';
                                    }
                                    else{
                                        echo '<input name="luogo" class="input3" type="text" value="'.$luogo.'" disabled>';
                                    }
                                ?>
                                <span class="focus-input3"></span>
                            </div>
        
                            <div class="wrap-input3 validate-input">
                                <input name="valutazione" class="input3" type="number" max="5" min="1" name="valutazione" placeholder="Valutazione" required>
                                <span class="focus-input3"></span>
                            </div>
        
        
                            <div class="wrap-input3 validate-input" data-validate = "Message is required">
                                <textarea name="testo" class="input3" name="message" rows="4" cols="50" style="resize:none" placeholder="Your Message" autocomplete="off"></textarea>
                                <span class="focus-input3"></span>
                            </div>
        
                            <div class="container-contact3-form-btn">
                                <button class="contact3-form-btn">
                                    Submit
                                </button><br>
                                <a href=<?php echo $pagin;?> style="color: white;">&#8592;Torna alla pagina precedente</a>
                            </div>
                        </div>

                        
                        <script type="text/javascript">
                            const queryString = window.location.search;
                            const prova = new URLSearchParams(queryString).get("luogo");
                            var codeBlock = "Scrivi una recensione per: " + prova;
                            console.log(codeBlock);
                            if (prova != null){
                                document.getElementById("ElFlaco").innerHTML = codeBlock;
                            }
                            else{
                                document.getElementById("ElFlaco").innerHTML = "Scegli il luogo per la recensione";

                            }

                        </script>
                    </form>
                </div>
            </div>
        </div>
        <script src="suppl/main.js"></script>

    </body>
</html>

