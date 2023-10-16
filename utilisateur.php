<?php include("entete2.php"); ?>
  <main id="main">
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Les cicursalles</h2>
          </div>

          <div class="row">

            <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
              <div class="info">
               <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <form action="inscription.php" method="post" role="form" class="php-email-forme">
                <div class="row">
                  <div class="form-group col-md-6">
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom cicursalle" autocomplete="off" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="nomuser" id="email" placeholder="Nom d'utilisateur" autocomplete="off" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control" name="adresse" id="email" placeholder="Adresse" autocomplete="off" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="telephone" id="email" placeholder="Téléphone" autocomplete="off" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="motdepasse" id="email" placeholder="Mot de passe" autocomplete="off" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="nomGerant" id="email" placeholder="Noms Gérant" autocomplete="off" required>
                  </div>
                </div>
                <div class="text-center"><button type="submit" name="ajout">Ajouter</button></div>
              </form>
            </div>
              </div>

            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="info table-responsive">
                <?php if (!empty($_GET["confirmer"])): ?>
                  <div class="alert alert-success">Voulez-vous vraiment supprimer ? <a href="categorie.php?supprimer=<?php echo $_GET["confirmer"]; ?>" class="btn btn-primary"><b>OUI</b></a> <a href="categorie.php?confirmer" class="btn btn-primary">NON</a></div>
                <?php endif ?>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center">N°</th>
                      <th class="text-center">NOM</th>
                      <th class="text-center">ADRESSE</th>
                      <th class="text-center">TELEPHONE</th>
                      <th colspan="2" class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center">1</td>
                      <td>BUTEMBO</td>
                      <td>AV/GOMA</td>
                      <td>0975545108</td>
                      <td><center><a href="" class="btn btn-primary">Modifier</a></center></td>
                      <td><center><a href="" class="btn btn-danger">Supprimer</a></center></td>
                    </tr>                        
                  </tbody>
                </table>
              <div>           
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Contact Us Section -->
</main>
  <?php include("footer.php") ?>