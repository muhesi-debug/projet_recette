<?php 

    include("connexion.php");

    if (!empty($_POST["nom"])) {
        $nom=htmlspecialchars($_POST["nom"]);
        $nomuser=htmlspecialchars($_POST["nomuser"]);
        $adresse=htmlspecialchars($_POST["adresse"]);
        $telephone=htmlspecialchars($_POST["telephone"]);
        $motdepasse=sha1(htmlspecialchars($_POST["motdepasse"]));
        $requet=$pdo->prepare("INSERT INTO utilisateur (nom, nomuser, adresse, telephone, motdepasse) values (?,?,?,?,?)");
        $requet->execute([$nom, $nomuser, $adresse, $telephone, $motdepasse]);
        $message = "Enregistrement effectué avec succès";
        header("Location:utilisateur.php?message=$message");
    }

 ?>