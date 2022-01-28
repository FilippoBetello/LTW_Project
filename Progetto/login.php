<?php     
    // connessione con il db
    $conn = mysqli_connect('localhost','superuser','password','db_drome');
    

    // check connection
    if(!($conn)){
        echo 'Connection error: ' . mysqli_connect_error();
    }

    // start & check variabile sessione
    session_start();
    if (isset($_SESSION['session_id'])) {
        $ciao = "Bentornato ".$_SESSION['session_user'];
        echo($ciao);
    }
    else{
        $pag = $_GET["pag"];
        $par = $_POST["email_l"];
        $par2 = $_POST["password_l"];
        if($par != "" || $par2 != ""){
            //$sql = "INSERT INTO utente (email, username, password) VALUES ('".$par."','".$par2."','".$par3."')";
            $sql = "SELECT * FROM utente WHERE '".$par."'=email and '".$par2."'=password";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result)==1){
                $row = mysqli_fetch_assoc($result);
                session_regenerate_id();
                $_SESSION['Verif_Log'] = "";
                $_SESSION['session_id'] = session_id();
                $_SESSION['session_email'] = $par;
                $_SESSION['session_user'] = $row["username"];
                header("location:".$pag);
            }
            else{
                $_SESSION['Verif_Log'] = "err";
                header("location: ".$pag);
            }
        }
        else{
            $_SESSION['Verif_Log'] = "err";
            header("location: ".$pag);
        }

    }

    // query per database provadb
    /*
    $sql = 'SELECT * FROM luogo';
    $result = mysqli_query($conn, $sql);
    $luoghi = mysqli_fetch_all($result, MYSQLI_ASSOC);


    

    */
    

   


    mysqli_close($conn);

    

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Prova Invio Dati</title>
    </head>
    <body>
        <br>
        <a href="logout.php">LOGOUT</a>
    </body>
</html>