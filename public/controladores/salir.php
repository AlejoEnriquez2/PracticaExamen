<?php 
    session_start();
    $_SESSION['isLogged'] = FALSE;
    session_destroy();
    header("Location: /PracticaExamen/public/pages/index.php");
?>