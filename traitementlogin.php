<?php 
    include("connexion.php");
    if(!empty($_POST)){
        $nom=htmlspecialchars($_POST['nom']);
        $motdepasse=sha1(htmlspecialchars($_POST["motdepasse"]));
        $reqs=$pdo->prepare('SELECT * from compte where username=? and pass=?');
        $reqs->execute([$nom,$motdepasse]);
        if($user=$reqs->fetch()){
            $_SESSION['idCompte']=$user->idCompte;
            header('location:gestionSic.php');
        }else{
            $req=$pdo->prepare('SELECT * from administrateur where username=? and pass=?');
            $req->execute([$nom,$motdepasse]);
            if($users=$req->fetch()){
                if ($users->fonction=="PDG") {
                    $_SESSION['pdg']=$users->idAdmin;
                    header('location:base.php');
                }
                if ($users->fonction=="ADMIN") {
                    $_SESSION['admin']=$users->idAdmin;
                    header('location:utilisateur.php');
                }
                if ($users->fonction=="GESTIONNAIRE") {
                    $_SESSION['gestionnaire']=$users->idAdmin;
                    header('location:consulting.php');
                }
            }else{
                $message="Echec de connexion. Verifiez le Nom et/ou le mot de passe";
                header("Location:index.php?message=$message");
            }
        }
    }                   

?>