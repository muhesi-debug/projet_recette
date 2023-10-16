<?php 
    include_once("connexion.php");
    $success=0;
    if (isset($_POST['cicursalle'])) {
        if (isset($_POST['ajout'])) {
            if (isset($_POST['dateR'],$_POST['montant'])) {
                $sucursale=$_POST['cicursalle'];
                $reduction= htmlspecialchars($_POST['reduction']);
                $montant=htmlspecialchars($_POST["montant"]);
                $date=htmlspecialchars($_POST["dateR"]);
                $intitulOperation=htmlspecialchars($_POST['intitulOperation']);
                $cicursalle=htmlspecialchars($_POST['cicursalle']);
                $produit=htmlspecialchars($_POST['produit']);
                $quantite=htmlspecialchars($_POST["quantite"]);
                $insert=$pdo->prepare("INSERT INTO recette(`dateR`, `intitulOperation`, `montant`, `reduction`, `cicursalle`, `produit`, `quantite`) VALUES(?,?,?,?,?,?,?)");
                $insert->execute([$date,$intitulOperation,$montant,$reduction,$sucursale,$produit,$quantite]);
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
    header("location:recette.php?succes=$success");
?>