<?php

$title = "Liste";
include("../templates/head.php");

$table = $_GET["table"];

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
                    <h1 class="text-primary">Liste des données</h1>
                    <!-- <form role="form" class="mb-6 text-start row flex-row align-items-center justify-content-center" action="">
                <div class="col-4">
                    <div class="input-group input-group-static my-3">
                      <label class="font-weight-bolder">Date de début</label>
                      <input type="date" class="form-control">
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group input-group-static my-3">
                      <label class="font-weight-bolder">Date de fin</label>
                      <input type="date" class="form-control">
                    </div>
                </div>
                <div class="text-center col-2">
                  <input type="button" id="submit" class="btn bg-gradient-primary w-100 my-4 mb-2" value="Voir résultat">
                </div>
            </form> -->
                    <!-- <div class="divider div-transparent div-dot"></div> -->
                    <!-- <span class="badge bg-primary mb-3">Résultats</span> -->
                    <!-- </div> -->
                    <input type="hidden" name="table" value="<?php echo ($table); ?>" id="nomTable">
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

                var arr = {
                    "the_Cueilleurs": "inserer-cueilleurs.php",
                    "the_Categories_depenses": "inserer-categ-depenses.php",
                    "the_Parcelles": "inserer-parcelle.php",
                    "the_Varietes_de_the": "inserer-the.php"
                };

                var table = document.getElementById("nomTable").value;

                var updateHref = "";
                if (table != null) {
                    for (let key in arr) {
                        if (Object.hasOwnProperty.call(arr, key)) {
                            const element = arr[key];
                            if (key == table) {
                                updateHref = element;
                            }
                        }
                    }
                }


                var fd = new FormData();
                fd.append("table", table);
                fd.append("action", "select_all");

                var res = null;
                send_or_fetch_FormData("traitement/fetch.php", fd, "POST")
                    .then((resultat) => {
                        console.log(resultat); // Log the resolved value
                        if (resultat != null) {
                            res = resultat;
                            var headers = Object.keys(res[0]); // prendre les noms de tous les champs

                            var tableContainer = document.getElementById("table-container");
                            var tableNode = createTableWithLink(headers, res, updateHref);

                            while (tableContainer.firstChild) {
                                tableContainer.removeChild(tableContainer.firstChild);
                            }
                            tableContainer.appendChild(tableNode);
                        } else {
                            console.log("tsy metyyj")
                            // message.innerText = resultat;
                            // erreur.style.display = "block";
                        }
                    })
                    .catch((err) => {
                        console.log("error");
                        console.error(err);

                    });


                // var headers = Object.keys(res[0]); // prendre les noms de tous les champs

                // var tableContainer = document.getElementById("table-container");
                // var tableNode = createTableWithLink(headers, res, updateHref);

                // while (tableContainer.firstChild) {
                //     tableContainer.removeChild(tableContainer.firstChild);
                // }
                // tableContainer.appendChild(tableNode);

            </script>

            <!-- </div> -->
            <?php

            include("../templates/end.php");

            ?>