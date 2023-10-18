<?php
    include("entete3.php"); 
    if (!isset($_SESSION['pdg'])) {
    header("location:../index.php");
    }
    
    $success=0;
    
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
                $insert=$pdo->prepare("UPDATE recette SET `dateR`='$date',`intitulOperation`='$intitulOperation',`montant`='$montant',`reduction`='$reduction',`produit`='$produit',`quantite`='$quantite' WHERE idRecette=?");
                $insert->execute([$_GET['id']]);
                $success=1;
                header("location:recette.php?succes=$success");
                
            }else {
                $success=0;
            }
            
        }else {
            $success=1;
        }
        $id=$_GET['id'];
    $select=$pdo->query("SELECT * FROM recette WHERE idRecette='$id'");
    $dates=$select->fetch(); 

    

    
?>
  <main id="main">
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <p>LES RECETTES</p>
        </div>
        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
              <?php if (isset($message)): ?>
                <div class="alert alert-success"><?php echo $message; ?></div>
              <?php endif ?>

              <?php if (isset($msg)): ?>
                <div class="alert alert-danger"><?php echo $msg; ?></div>
              <?php endif ?>

              <?php if (empty($_GET["modifier"])): ?> 
              <form action="" method="post" enctype="multipart/form-data" class="php-email-forme">
                <div class="row">
                  <div class="form-group col-md-12">
                    <input type="text" name="produit" class="form-control" id="nom" placeholder="PRODUIT" autocomplete="off" value="<?=$dates->produit;?>" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="date" name="dateR" class="form-control" id="nom" placeholder="DATE" autocomplete="off" value="<?=$dates->dateR;?>" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" name="quantite" class="form-control" id="nom" placeholder="QUANTITE" autocomplete="off" value="<?=$dates->quantite;?>" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" name="montant" class="form-control" id="nom" placeholder="MONTANT" autocomplete="off" value="<?=$dates->montant;?>" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" name="reduction" class="form-control" id="nom" placeholder="REDUCTION" autocomplete="off" value="<?=$dates->reduction;?>">
                  </div>
                  <div class="form-group col-md-12">
                   <textarea name="intitulOperation" id="nom" cols="30" rows="10" class="form-control" value="<?=$dates->intitulOperation;?>" placeholder="Intitulé de l'Operation"></textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="hidden" name="cicursalle" class="form-control" id="nom"  autocomplete="off" value="<?=$dates->idRecette;?>">
                  </div>
                </div>
                <div class="text-center"><button type="submit" name="ajout">Modifier</button></div>
              </form>
              <?php endif ?>

              <?php if (!empty($_GET["modifier"])): ?>
                <?php 
                  $requ=$pdo->prepare("SELECT * from fournisseur where idfsseur=?");
                  $requ->execute([$_GET["modifier"]]);
                  $valeur=$requ->fetch();
                ?>
              <form action="produit.php" method="post" enctype="multipart/form-data" role="form" class="php-email-forme">
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="name">PRODUIT</label>
                    <input type="text" name="nom_fsseurmodif" value="<?php echo $valeur->nom_fsseur; ?>" class="form-control" id="nom"  autocomplete="off" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="name">MONTANT</label>
                    <input type="text" name="postnom_fsseurmodif" value="<?php echo $valeur->postnom_fsseur; ?>" class="form-control" id="nom"  autocomplete="off" required>
                  </div>
                  <input type="hidden" name="idfsseur" value="<?php echo $valeur->idfsseur; ?>">
                </div>
                <div class="text-center"><button type="submit">Modifier</button></div>
              </form>
              <?php endif ?>
            </div>

          </div>

          <div class="col-lg-8 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info table-responsive">
              <?php if (!empty($_GET["confirmer"])): ?>
                <div class="alert alert-success">Voulez-vous vraiment supprimer ? <a href="produit.php?supprimer=<?php echo $_GET["confirmer"]; ?>" class="btn btn-primary"><b>OUI</b></a> <a href="categorie.php?confirmer" class="btn btn-primary">NON</a></div>
              <?php endif ?>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">N°</th>
                    <th class="text-center">PRODUIT</th>
                    <th class="text-center">MONTANT</th>
                    <th class="text-center">DATE</th>
                    <th colspan="2" style="text-align: center;">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">1</td>
                    <td>CREMICA</td>
                    <td class="text-center">50$</td>
                    <td class="text-center"><?php echo date("j/m/Y"); ?></td>
                    <td><center><a href="" class="btn btn-primary">Modifier</a></center></td>
                    <td><center><a href="" class="btn btn-danger">Supprimer</a></center></td>
                  </tr> 
                  <tfooter>
                    <tr>
                      <th colspan="5">TOTAL RECETTES</th>
                      <th>50$</th>
                    </tr>
                  </tfooter>  
                </tbody>
              </table>
            <div>             
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Contact Us Section -->
</main><!-- End #main -->
<?php include("footer.php") ?>