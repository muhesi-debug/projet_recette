<?php 
    include_once("entete.php");

    if (!isset($_SESSION['idCompte'])) {
        header("location:index.php");
    }
?>























<?php 
    include_once("footer.php");
    
?>