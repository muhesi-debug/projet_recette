<?php 
    include("entete3.php"); 
    if (!isset($_SESSION['pdg'])) {
      header("location:../index.php");
    }
?>

<?php
            if (!empty($_POST["nom_fsseur"])) {

                $nom_fsseur=htmlspecialchars($_POST["nom_fsseur"]);
                $postnom_fsseur=htmlspecialchars($_POST["postnom_fsseur"]);
                $prenom_fsseur=htmlspecialchars($_POST["prenom_fsseur"]);
                $genre_fsseur=htmlspecialchars($_POST["genre_fsseur"]);
                $adresse_fsseur=htmlspecialchars($_POST["adresse_fsseur"]);

                $requet=$pdo->prepare("INSERT INTO fournisseur (nom_fsseur, postnom_fsseur, prenom_fsseur, genre_fsseur, adresse_fsseur) values (?,?,?,?,?)");
                $requet->execute([$nom_fsseur, $postnom_fsseur, $prenom_fsseur, $genre_fsseur, $adresse_fsseur]);
                $message="Enregistrement effectué avec succès";
              
            }

            if (!empty($_POST["nom_fsseurmodif"])) {

                $nom_fsseur=htmlspecialchars($_POST["nom_fsseurmodif"]);
                $postnom_fsseur=htmlspecialchars($_POST["postnom_fsseurmodif"]);
                $prenom_fsseur=htmlspecialchars($_POST["prenom_fsseurmodif"]);
                $genre_fsseur=htmlspecialchars($_POST["genre_fsseurmodif"]);
                $adresse_fsseur=htmlspecialchars($_POST["adresse_fsseurmodif"]);

                $requet=$pdo->prepare("UPDATE fournisseur set nom_fsseur=?, postnom_fsseur=?, prenom_fsseur=?, genre_fsseur=?, adresse_fsseur=? where idfsseur=?");
                $requet->execute([$nom_fsseur, $postnom_fsseur, $prenom_fsseur, $genre_fsseur, $adresse_fsseur, $idfsseur]);
                $message="Modification effectuée avec succès";

            }

            if (!empty($_GET["supprimer"])) {
                $idfsseur=htmlspecialchars($_GET["supprimer"]);
                $requet=$pdo->prepare("DELETE from fournisseur where idfsseur=?");
                $requet->execute([$idfsseur]);
                $message="Suppression effectuée avec succès";
            }

        ?>

  <main id="main">
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <p>LES DEPENSES</p>
        </div>
        <div class="section-title">
            <form action="" method="post" class="php-email-forme">
              <dev class="row">
                  <div class="form-group col-md-8">
                    <select name="cicursalle" id="nom" class="form-control">
                        <option value="0">Chosir un sicursalle</option>
                        <option value="">Butembo</option>
                    </select>
                  </div>
                  <div class="form-group col-md3">
                    <div class="text-center"><button type="submit" name="ajout">Ajouter</button></div>
                  </div>
              </dev>
            </form>
        </div>
        <div class="row">

          <div class="col-lg-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
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
                      <th colspan="5">TOTAL DEPENSEES</th>
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