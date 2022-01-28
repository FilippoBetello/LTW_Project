<?php     
    // connessione con il db
    $conn = mysqli_connect('localhost','superuser','password','db_drome');


    // check connection
    if(!($conn)){
        echo 'Connection error: ' . mysqli_connect_error();
    }

    // query per database provadb
    /*
    $sql = 'SELECT * FROM luogo';
    $result = mysqli_query($conn, $sql);
    $luoghi = mysqli_fetch_all($result, MYSQLI_ASSOC);

    */
    
    // da mettere un controllo sui parametri passati
    session_start();
    if (isset($_SESSION['session_id'])) {
        header("location: index.php");
    }
    // da mettere un controllo sui parametri passati
    $pag = $_GET["pag"];
    $par = $_POST["email"];
    $par2 = $_POST["user"];
    $par3 = $_POST["password"];

    $ciao ="";

    
    if($par != "" || $par2 != "" || $par3 != ""){
        $sql = "INSERT INTO utente (email, username, password) VALUES ('".$par."','".$par2."','".$par3."')";
        if (mysqli_query($conn, $sql)){
            $_SESSION["Verif_Reg"]="";
            header("location:".$pag);
        }
        else{
            //header("location: http://localhost/Prova1");
            $_SESSION["Verif_Reg"]="err";
            header("location:".$pag);
        }
    }



    mysqli_close($conn);

    

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Prova Invio Dati</title>
    </head>
    <body>
        <?php echo($ciao); ?>
    </body>
</html>

 