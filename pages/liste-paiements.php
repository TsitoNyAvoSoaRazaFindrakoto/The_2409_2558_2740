<?php

$title = "Liste";
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
                            <!-- <div class="col-xl-7 text-center mx-auto">
            <h1 class="text-white pt-3 mt-n5">Bienvenue</h1>
            <p class="lead text-white mt-3" style="text-variation:small-caps;">Vous pourrez voir et gérer des données sur notre plantation de thé.</p>
            </div> -->
                        </div>
                    </div>
                </div>
            </header>

            <div class="row card card-body blur shadow-blur mx-3 mx-xl-4 mt-n6 d-flex align-items-center">

                <div class=" mt-5 text-center">
                    <h1 class="text-primary">Liste des paiements</h1>
                    <form role="form" id="form" class="mb-6 text-start row flex-row align-items-center justify-content-center"
                        action="">
                        <input type="hidden" name="action" value="paiement_cueilleur">
                        <div class="col-4">
                            <div class="input-group input-group-static my-3">
                                <label class="font-weight-bolder">Date de début</label>
                                <input type="date" name="initial" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group input-group-static my-3">
                                <label class="font-weight-bolder">Date de fin</label>
                                <input type="date" name="final" class="form-control">
                            </div>
                        </div>
                        <div class="text-center col-2">
                            <input type="button" id="submit" class="btn bg-gradient-primary w-100 my-4 mb-2"
                                value="Voir résultat">
                        </div>
                    </form>
                    <div class="flex-row justify-content-evenly align-items-center mb-6 row">
                        <div class="separator col-4"></div>
                        <div class="col-1 ">
                            <img src="../assets/img/icons8-feuille-30.png" alt="">
                        </div>
                        <div class="separator col-4"></div>
                    </div>
                    <div id="table-section-container" class="section-container row flex-row justify-content-evenly">
                        <!-- <div class="col-sm-12 col-md-4 text-monospace">
                    <h2 class="text-primary text-uppercase">1. Tables</h2>
                    <p class="indent-4 text-justify text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, doloribus iusto eum consequatur alias vero repellat rerum, eos aliquam dolorem mollitia nesciunt magni pariatur, voluptates cum id qui culpa aspernatur!</p>
                </div> -->
                        <div class="col-12">
                            <div class="table-responsive text-center" id="table-container">

                            </div>
                        </div>
                    </div>
                    <!-- <div id="chart-section-container" class="section-container row">
                <div class="chart-card-container row flex-row justify-content-evenly">
                    <div class="col-sm-12 col-md-4 text-monospace">
                        <h2 class="text-primary text-uppercase">2. Pie Chart</h2>
                        <p class="indent-4 text-justify text-dark">Display the proportion of each category in a whole.</p>
                    </div>
                    <div class="chart-container col-md-6 col-sm-12">
                        <canvas id="myPieChart"></canvas>
                    </div>
                </div>
                <div class="chart-card-container row flex-row justify-content-evenly">
                    <div class="col-sm-12 col-md-4 text-monospace">
                        <h2 class="text-primary text-uppercase">3. Line Chart</h2>
                        <p class="indent-4 text-justify text-dark">Show trends over a continuous interval or time.</p>
                    </div>
                    <div class="chart-container col-md-6 col-sm-12">
                        <canvas id="myLineChart"></canvas>
                    </div>
                </div>
            </div> -->
                </div>
            </div>
            <?php


            include("../templates/footer-non-absolute.php");

            ?>
            <script src="../assets/js/utilities/chart-maker.js"></script>
            <script src="../assets/js/utilities/table.js"></script>
            <script src="../inc/js/data.js"></script>
            <script>
                var headers = ["date","cueilleur", "Poids cueilli", "bonus", "malus" , "paiement"];
                document.getElementById("submit").addEventListener("click", function () {
                    var erreur = document.getElementById("error");
                    var container = document.getElementById("table-container");
                    while (container.firstChild) {
                        container.removeChild(container.firstChild);
                    }
                    submitFormFetch("form", "POST")
                        .then((resultat) => {
                            console.log("Resultat");
                            console.log(resultat); // Log the resolved value
                            var table = createTableObject(headers, resultat);
                            container.appendChild(table);

                        })
                        .catch((err) => {
                            console.error(err);

                        });
                });
            </script>

            <!-- </div> -->
            <?php

            include("../templates/end.php");

            ?>