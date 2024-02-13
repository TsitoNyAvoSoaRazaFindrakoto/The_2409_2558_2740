<?php
include_once "../inc/fonction_base.php";

$title = "Gestion categories de depenses";
include("../templates/head.php");

$data = array();
$d1 = "";
$d2 = "";
$d3 = "";

$id = 0;

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $data = select_by_first_Row("the_Cueilleurs", $id)[0];
  $d1 = $data['nom'];
  $d2 = $data['genre'];
  $d3 = $data['date_naissance'];
}


?>

<div class="container position-sticky z-index-sticky top-0">
  <div class="row">
    <div class="col-12">
      <?php
      include_once "../inc/fonction_traitement.php";

      include("../templates/navbar.php");

      ?>
      <header class="header-2">
        <div class="page-header min-vh-75 relative" style="background-image: url('../assets/img/bg3.jpg')">
          <span class="mask bg-gradient-success opacity-4"></span>
          <div class="container">
            <div class="row">
              <div class="col-xl-7 text-center mx-auto">
                <h1 class="text-white pt-3 mt-n5">Gestion des cueilleurs</h1>
                <!-- <p class="lead text-white mt-3">Ajouter une nouvelle dépense dans la base !</p> -->
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
            <form role="form" class="text-start" action="<?php if ($id > 0)
              echo "update.php";
            else
              echo "insert.php"; ?>" method=post>
              <input type="hidden" name="table" value="the_Cueilleurs">
              <input type="hidden" name="column" value="id_cueilleurs">
              <input type="hidden" name="id" value="<?php echo $id; ?>">

              <!-- manomboka ny tena iizy -->
              <div class="input-group input-group-static my-3">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control" value="<?php echo $d1; ?>">
              </div>
              <div class="input-group input-group-static mb-3">
                <label>Genre</label>
                <div class="form-check mb-3">
                  <select name="genre" id="" class="form-control">
                    <?php

                    $arr = ["Homme", "Femme", "other"];
                    for ($i = 0; $i < count($arr); $i++) {
                      if ($id <= 0) {
                        echo ("<option value=" . $arr[$i] . ">" . $arr[$i] . "</option>");
                      } else {
                        $option = "<option value=" . $arr[$i];
                        if ($data['genre'] === $arr[$i]) {
                          $option .= "selected";
                        }
                        $option .= $arr[$i] . "</option>";
                        echo ($option);
                      }
                    }

                    ?>
                  </select>
                </div>
                <div class="input-group input-group-static my-3">
                  <label>Date de naissance</label>
                  <input type="date" name="date_naissance" class="form-control" value="<?php echo $d3; ?>">
                </div>
              </div>

              <!-- </div> -->
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