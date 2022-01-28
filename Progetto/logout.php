<?php     
    // connessione con il db
    session_start();
    if(isset($_SESSION['session_id'])) {
        session_destroy();
        $_SESSION = array();
        header('Location: index.php');
        exit();
    } else {
        session_destroy();
        header('Location: index.php');
        exit();
    }
?>
