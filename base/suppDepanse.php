<?php
    include("entete3.php"); 
    if (!isset($_SESSION['pdg'])) {
    header("location:../index.php");
    }

    if (isset($_GET['id'])) {
        $id=htmlspecialchars($_GET['id']);
        $insert=$pdo->prepare("DELETE FROM depenses WHERE idDepense=?");
        $insert->execute([$id]);
        $success=1;
        header("location:depense.php");
    }
?>