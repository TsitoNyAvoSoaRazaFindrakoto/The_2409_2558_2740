<?php

$title = "Gestion the";
include("../templates/head.php");
$id = $_GET['id_variete'];
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
                                <h1 class="text-white pt-3 mt-n5">Gestion de variete de the</h1>
                                <p class="lead text-white mt-3">Veuillez preciser pour quels mois cette variete va se
                                    regenerer</p>
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
                        <form role="form" class="text-start" action="traitement/insertion_saison.php" method="post">
                            <input type="hidden" name="id_variete" value="<?php echo $id;?>">
                            <div class="form-check mb-3 d-flex flex-row justify-content-between"
                                style="flex-wrap: wrap;">
                                <?php
                                setlocale(LC_TIME, 'fr_FR.UTF-8');

                                for ($i = 1; $i <= 12; $i++) {
                                    // Create a DateTime object with the given month number
                                    $date = new DateTime('2024-' . $i . '-01');

                                    // Format the DateTime object to get the month in French
                                    $monthInFrench = utf8_encode(strftime('%B', $date->getTimestamp())); ?>

                                    <div class="my-3 mx-2">
                                        <input class="form-check-input" type="checkbox" name="mois[]" value="<?php echo $i;?>" id="customRadio1">
                                        <label class="custom-control-label">
                                            <?php echo $monthInFrench; ?>
                                        </label>
                                    </div>


                                <?php }

                                ?>
                                <!-- 
                    <input class="form-check-input" type="checkbox" name="" id="customRadio1">
                    <label class="custom-control-label" for="customRadio1">Male</label>
                    <input class="form-check-input" type="checkbox" name="" id="customRadio2">
                    <label class="custom-control-label" for="customRadio2">Female</label>
                    <input class="form-check-input" type="checkbox" name="" id="customRadio2">
                    <label class="custom-control-label" for="customRadio2">Other</label> -->
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