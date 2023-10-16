<?php 
    include("connexion.php");
    if(!empty($_POST)){
        $nom=htmlspecialchars($_POST['nom']);
        $motdepasse=htmlspecialchars($_POST["motdepasse"]);
        $req=$pdo->prepare('SELECT * from client where nom=? and motdepasse=?');
        $req->execute([$nom,$motdepasse]);
        if($users=$req->fetch()){
            $_SESSION['client']=$users;
            header('location:commande.php');
        }else{
            $req=$pdo->prepare('SELECT * from administrateur where username=? and pass=?');
            $req->execute([$nom,$motdepasse]);
            if($users=$req->fetch()){
                $_SESSION['admin']=$users;
                header('location:produit.php');
            }else{
                $message="Echec de connexion. Verifiez le Nom et/ou le mot de passe";
                header("Location:index.php?message=$message");
            }
        }
    }                   

?>