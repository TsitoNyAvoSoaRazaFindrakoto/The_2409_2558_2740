<?php

$title = "Add gathering report";
include("../templates/head.php");
include_once "../inc/functions.php";

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
            <form role="form" id="form" class="text-start" action="post">
              <div class="alert alert-danger" id="error" style="display:none">
                <span class="text-white" id="message"></span>
              </div>
              <input type="hidden" class="form-control" name="table" value="the_Depenses">
              <input type="hidden" class="form-control" name="action" value="insert">
              <div class="input-group input-group-static my-3">
                <label>Date</label>
                <input type="date" name="date" id="date" class="form-control">
              </div>
              <div class="input-group input-group-static mb-3">
                <label>Catégorie de dépense</label>
                <select name="id_categorie" id="id_categorie" class="form-control">
                  <?php
                  $data = select_all("the_categories_depenses");
                  foreach ($data as $key => $value) {
                    echo "<option value=" . $value['id_categorie'] . ">" . $value['nom_categorie'] . "</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="input-group input-group-static my-3">
                <label>Montant</label>
                <input type="number" name="montant" id="montant" class="form-control">
              </div>
              <div class="text-center">
                <input type="button" id="submit" class="btn bg-gradient-success w-100 my-4 mb-2" value="Ajouter">
              </div>
            </form>
          </div>
        </div>
      </div>
      <script src="../inc/js/data.js"></script>
      <script>
        document.getElementById("submit").addEventListener("click", function () {
          var erreur = document.getElementById("error");
          var message = document.getElementById("message");

          var montant = document.getElementById("montant");
          var date = document.getElementById("date");

          if (date.value === '' || date.value === null ) {
            message.innerText = " vous n'avez pas insere de date";
            erreur.style.display = "block";
          } else if (montant.value === null || isNaN(montant.value) || montant.value <= 0) {
            message.innerText = " montant invalide";
            erreur.style.display = "block";
          }

          submitFormExecute("form", "POST")
            .then((resultat) => {
              console.log(resultat); // Log the resolved value
              if (!isNaN(resultat)) {
                window.location.href = "home.php";
              } else {
                message.innerText = resultat;
                erreur.style.display = "block";
              }
            })
            .catch((err) => {
              console.error(err);

            });
        });
      </script>
      <?php
      include("../templates/footer-non-absolute.php");
      include("../templates/end.php");
      ?>