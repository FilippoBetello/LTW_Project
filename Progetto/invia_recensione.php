<?php
    $conn = mysqli_connect('localhost','superuser','password','db_drome');


    // check connection
    if(!($conn)){
        echo 'Connection error: ' . mysqli_connect_error();
    }

    session_start();

    $par = $_SESSION["session_email"];
    if (isset($_SESSION["luogo_pass"])){
        $par2 = $_SESSION["luogo_pass"];
    }
    else{
        
        $par2 = $_POST["luoghi"];
    }
    $par3 = $_POST["valutazione"];
    $par4 = $_POST["testo"];
    echo "Hai inserito correttamente ".$par." ".$par2." ".$par3." ".$par4;
    unset($_SESSION['luogo_pass']);

    if($par != "" || $par2 != "" || $par3 != "" || $par4 != ""){
        $sql = "INSERT INTO recensione (utente, luogo, valutazione, descrizione) VALUES ('".$par."','".$par2."','".$par3."','".$par4."')";
        if (mysqli_query($conn, $sql)){
            header("location: index.php");    
        }
        else{
            //header("location: http://localhost/Prova1");
            echo ("index.php");
        }
    }

?>