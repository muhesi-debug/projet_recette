<?php include("entete2.php"); ?>
 <main>
    <section id="login" class="contact" style="margin-top: 100px;">
      <div class="container" data-aos="fade-up">
        <?php if (isset($_GET["message"])): ?>
        <div class="alert alert-danger col-md-12"><?php echo $_GET["message"]; ?></div>
      <?php endif ?>
        <div class="section-title">
          <h2>AUTHENTIFICATION</h2>
        </div>
        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          </div>
          <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
              <form action="traitementlogin.php" method="post" class="php-email-forme">
                <div class="row">
                  <div class="form-group col-md-12">
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Votre Nom" autocomplete="off" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="password" name="motdepasse" class="form-control" id="nom" placeholder="Mot de Passe" autocomplete="off" required>
                  </div>
                </div>
                <div class="text-center"><button type="submit">Se Connecter</button></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php include("footer.php") ?>