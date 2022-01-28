<?php
    $emadd="discoverome.ltw@gmail.com";
    session_start();
    if($_POST){
        if(isset($_SESSION['session_email'])){
            $eme=$_SESSION['session_email'];
        }
        else{
            $eme=$_POST['email'];
        }
        $sub=$_POST['luogo'];
        $desc=$_POST['testo'];
        $subject="Richiesta suggerimento luogo";
        $message="Hai ricevuto una richiesta da parte di ".$eme.". Ti è stato consigliato il luogo ".$sub.": \"".$desc."\"";
        echo mail($emadd,$subject,$message, "From: Website");
        header('Location: index.php');
    }

    
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invia suggerimenti</title>
    <link rel="shortcut icon" href="Markers/h4.ico" />
    
    <style>
    <?php include 'sugg.css'; ?>
    </style>
</head>
<body >
    <div  class='bold-line'></div>
    <div class='container'>
    <div class='window'>
        <div class='overlay'></div>
        <div class='content'>
            <?php
            if(isset($_GET['li'])){
            echo '<div class=\'welcome\'>Advise us</div><br>
            <div class=\'subtitle\'>Do you know a particular place in Rome that is not on the site? Fill out the form and you will be contacted</div>';
            }
            else {
                echo '<div class=\'welcome\'>Consigliaci</div><br>
            <div class=\'subtitle\'>Conosci un luogo particolare di Roma non presente nel sito? Compila il form e verrai ricontattato</div>';
            }
            ?>
            <div class='input-fields'>
                <form action="suggerimento.php" method="POST">
                    <?php
                    if(isset($_SESSION['session_email'])){
                        echo '<input type=\'email\' value='.$_SESSION['session_email'].' name="email" placeholder=\'Email\' class=\'input-line full-width\' disabled></input>';
                    }
                    else{
                        echo '<input type=\'email\' name="email" placeholder=\'Email\' class=\'input-line full-width\' autocomplete="off" required></input>';
                    }
                    ?>
                    <input type='text' name="luogo" placeholder='Luogo' class='input-line full-width' autocomplete="off" required></input>
                    <textarea name="testo" class="input-line full-width"  rows="3" cols="50" style="resize:none" placeholder="Breve Descrizione" autocomplete="off" required></textarea>
                    <button class="submitrec">Submit</button><br>
                    <a href="index.php" style="font-size:12px; color:white;">← Annulla</a>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
