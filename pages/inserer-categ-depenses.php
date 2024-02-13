<?php

$title = "Gestion categories de depenses";
include("../templates/head.php");
include_once "../inc/functions.php";

$data = array();
$d1="";

$id = 0;

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $data = select_by_first_Row("the_Categories_depenses", $id )[0];
  $d1 = $data['nom_categorie'];

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
              <input type="hidden" name="table" value="the_Categories_depenses">
              <input type="hidden" name="column" value="id_categorie">
              <input type="hidden" name="id" value="<?php echo $id;?>">
              <div class="input-group input-group-static my-3">
                <label>Nom categorie</label>
                <input type="text" name="nom_categorie" class="form-control"
                  value="<?php echo $d1;?>">
              </div>
              <div class="text-center">
                <input type="submit" id="submit" class="btn bg-gradient-success w-100 my-4 mb-2" value="Ajouter">
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