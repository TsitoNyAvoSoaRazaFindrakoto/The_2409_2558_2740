<?php

$title = "Gestion cueilleur";
include("../templates/head.php");

?>

<div class="container position-sticky z-index-sticky top-0">
  <div class="row">
    <div class="col-12">
      <?php

      include("../templates/navbar.php");

      ?>
      <header class="header-2">
        <div class="page-header min-vh-75 relative" style="background-image: url('../assets/img/bg3.jpg')">
          <span class="mask bg-gradient-success opacity-4"></span>
          <div class="container">
            <div class="row">
              <div class="col-xl-7 text-center mx-auto">
                <h1 class="text-white pt-3 mt-n5">Gestion des bonus et mallus</h1>
                <p class="lead text-white mt-3">Definir le salaire en fonction du poids cueilli</p>
              </div>
            </div>
          </div>
        </div>
      </header>
      <div class="row card card-body blur shadow-blur mx-3 mx-xl-4 mt-n6 d-flex align-items-center">

        <div class="col-6">
          <div class="card-body">
            <h1 class="text-success" style="font-variant:small-caps;">
              Ajoutez vos données
            </h1>
            <form for="form" class="form-control" action="traitement/insertion_contrainte_ceuillete.php" method="post">
              <div class="input-group input-group-static my-3">
                <label>Cueilleur</label>
                <select name="id_cueilleur" id="id_cueilleur" class="form-control">

                  <?php
                  $data = select_all("the_Cueilleurs");
                  foreach ($data as $key => $value) {
                    echo "<option value='" . $value['id_cueilleur'] . "'>" . $value['nom'] . "</option>";
                  }
                  ?>

                </select>
              </div>
              <div class="input-group input-group-static my-3">
                <label>Poids minimal journalier</label>
                <input type="number" name="poids_min" class="form-control">
              </div>
              <div class="input-group input-group-static my-3">
                <label>Bonus  </label>
                <input type="number" name="bonus" id="" placeholder="%...">
              </div>
              <div class="input-group input-group-static my-3">
                <label>Mallus  </label>
                <input type="number" name="malus" id="" placeholder="%...">
              </div>
              <div class="text-center">
                <input type="submit" class="btn bg-gradient-success w-100 my-4 mb-2" value="Ajouter">
              </div>

            </form>
          </div>
        </div>

      </div>
      <?php

      include("../templates/footer-non-absolute.php");

      ?>

      <?php

      include("../templates/end.php");

      ?>