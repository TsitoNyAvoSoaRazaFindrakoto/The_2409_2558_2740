<?php

$title = "Gestion categories de depenses";
include("../templates/head.php");
include_once "../inc/fonction_base.php";

$data = array();
$d1 = "";
$d2 = "";
$d3 = "";

$id = 0;

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $data = select_by_first_Row("the_Parcelles", $id)[0];
  $d1 = $data['numero_parcelle'];
  $d2 = $data['surface_hectare'];
  $d3 = $data['id_variete'];
}


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
              <input type="hidden" name="table" value="the_Parecelles">
              <input type="hidden" name="column" value="id_Parcelle">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-group input-group-static my-3">
                  <label>Numero de parcelle</label>
                  <input type="number" name="numero_parcelle" class="form-control" value="<?php echo $d1; ?>">
                </div>
                <div class="input-group input-group-static mb-3">
                  <label>Surface</label>
                  <input type="number" name="surface_hectare" class="form-control" value="<?php echo $d2;?>">
                </div>
                <div class="input-group input-group-dynamic my-3">
                  <label class="form-label">Variete de the</label>
                  <select name="id_variete" class="form-control">
                      <?php
                        $data = select_all("the_Varietes_de_the");
                        foreach ($data as $key => $value) {
                          echo "<option value=".$value['id_variete'].">".$value['nom_variete']."</option>";
                        }
                      ?>
                  </select>
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