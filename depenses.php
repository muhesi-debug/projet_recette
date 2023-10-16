<?php 
    include_once("connexion.php");
    $success=0;
    if (isset($_SESSION['id'])) {
        if (isset($_POST['ajout'])) {
            if (isset($_POST['motif'],$_POST['montant'])) {
                $sucursale=$_SESSION['id'];
                $motif= htmlspecialchars($_POST['motif']);
                $montant=htmlspecialchars($_POST["montant"]);
                $insert=$pdo->prepare("INSERT INTO depenses() VALUES(?,?)");
                $insert->execute([$montant,$motif,$sucursale]);
                
            }else {
                $success=0;
            }
            
        }else {
            $success=0;
        }
    }else {
        header("location:index.php");
    }
?>