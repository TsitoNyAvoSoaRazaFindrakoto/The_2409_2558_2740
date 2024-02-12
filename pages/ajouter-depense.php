<?php

$title = "Add gathering report";
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
                <h1 class="text-white pt-3 mt-n5">Rapport de dépenses</h1>
                <p class="lead text-white mt-3">Ajouter une nouvelle dépense dans la base !</p>
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
            <form role="form" class="text-start" action="">
              <input type="hidden" class="form-control" name="table" value="the_Depenses">
              <input type="hidden" class="form-control" name="action" value="insert">
              <div class="input-group input-group-static my-3">
                <label>Date</label>
                <input type="date" class="form-control">
              </div>
              <div class="input-group input-group-static mb-3">
                <label>Catégorie de dépense</label>
                <!-- <input type="password" class="form-control" value="admin"> -->
                <select name="" id="" class="form-control">
                  <option value="">Essence</option>
                  <option value="">Engrais</option>
                </select>
              </div>
              <div class="input-group input-group-dynamic my-3">
                <label class="form-label">Montant</label>
                <input type="number" class="form-control">
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