<?php 
    include("connexion.php");
    if (isset($_POST['nomAdmin'],$_POST["adresse"],$_POST["telephone"],$_POST["pass"])) {
        $nomAdmin=htmlspecialchars($_POST['nomAdmin']);
        $username=htmlspecialchars($_POST["username"]);
        $fonction=htmlspecialchars($_POST["fonction"]);
        $adresse=htmlspecialchars($_POST["adresse"]);
        $telephone=htmlspecialchars($_POST["telephone"]);
        $motdepasse=sha1(htmlspecialchars($_POST["pass"]));
        $requet=$pdo->prepare("INSERT INTO administrateur(`nomAdmin`, `username`, `pass`, `fonction`, `adresse`, `telephone`) values(?,?,?,?,?,?)");
        $requet->execute([$nomAdmin,$username,$motdepasse,$fonction,$adresse,$telephone]);
        $message ="Enregistrement effectué avec succès";
        
    }else {
        $message ="Echoué";
    }
    header("location:admin.php?ms=$message");

 ?>