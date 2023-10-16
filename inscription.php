<?php 
    include("connexion.php");
    if (isset($_POST["nom"],$_POST['nomGerant'],$_POST["nom"],$_POST["adresse"],$_POST["adresse"],$_POST["telephone"],$_POST["motdepasse"])) {
        $nomGerant=htmlspecialchars($_POST['nomGerant']);
        $nom=htmlspecialchars($_POST["nom"]);
        $nomuser=htmlspecialchars($_POST["nomuser"]);
        $adresse=htmlspecialchars($_POST["adresse"]);
        $telephone=htmlspecialchars($_POST["telephone"]);
        $motdepasse=sha1(htmlspecialchars($_POST["motdepasse"]));
        $requet=$pdo->prepare("INSERT INTO compte(`idCompte`,`nomCircusalle`,`username`,`adresse`,`pass`,telephone,`nomGerant`) values(null,?,?,?,?,?,?)");
        $requet->execute([$nom,$nomuser,$adresse,$motdepasse,$telephone,$nomGerant]);
        $message ="Enregistrement effectué avec succès";
        
    }else {
        $message ="Echoué";
    }
    header("location:utilisateur.php?ms=$message");

 ?>