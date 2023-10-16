<?php 
    include_once("connexion.php");
    $success=0;
    if (isset($_POST['idCompte'])) {
        if (isset($_POST['ajout'])) {
            if (isset($_POST['motif'],$_POST['montant'])) {
                $sucursale=$_POST['idCompte'];
                $motif= htmlspecialchars($_POST['motif']);
                $montant=htmlspecialchars($_POST["montant"]);
                $date=htmlspecialchars($_POST["dateD"]);
                $insert=$pdo->prepare("INSERT INTO depenses(`idDepense`, `dateD`, `motif`, `montant`, `cicursalle`) VALUES(null,?,?,?,?)");
                $insert->execute([$date,$motif,$montant,$sucursale]);
                $success=1;
                
            }else {
                $success=0;
            }
            
        }else {
            $success=1;
        }
    }else {
        header("location:index.php");
    }
    header("location:depense.php?succes=$success");
?>