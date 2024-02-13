<?php

$title = "Home";
include("../templates/head.php");

?>
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <?php

            include("../templates/navbar.php");

            ?>
            <script src="../assets/js/utilities/card.js"></script>
            <header class="header-2">
                <div class="page-header min-vh-75 relative" style="background-image: url('../assets/img/bg3.jpg')">
                    <span class="mask bg-gradient-success opacity-4"></span>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 text-center mx-auto">
                                <h1 class="text-white pt-3 mt-n5">Previsions</h1>
                                <p class="lead text-white mt-3" style="text-variation:small-caps;">Vous pourrez voir nos
                                    previsions pour nos differentes parcelles.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="row card card-body blur shadow-blur mx-3 mx-xl-4 mt-n6 d-flex align-items-center">
                <form role="form" class="mb-6 text-start row flex-row align-items-center justify-content-center"
                    action="">
                    <div class="col-4">
                        <div class="input-group input-group-static my-3">
                            <label class="font-weight-bolder">Date</label>
                            <input type="date" name="end" id="end" class="form-control">
                        </div>
                    </div>
                    <div class="text-center col-4">
                        <input type="button" id="submit" class="btn bg-gradient-primary w-100 my-4 mb-2"
                            value="Voir résultat">
                    </div>
                </form>

                <div class="col-6 text-center">
                    <h6>Poids total the restant : <span id="restant"></span> kg</h6>
                    <h6>Montant : <span id="montant"></span> MGA</h6>
                </div>

                <div class="col-12 row d-flex justify-content-center align-items-center" id="product-card-container">
                    <div
                        class="text-center text-white product-card col-sm-6 col-xl-4 flex-row mt-6 mb-6 bg-gradient-success justify-content-center row mx-5 p-4">
                        <div class="col-10 row flex-column align-items-center justify-content-between">
                            <div class="img-container flex-column align-items-center justify-content-center col-12">
                                <img src="../assets/img/bg3.jpg" alt="">
                            </div>
                            <div class="text-center mt-3">
                                <h3 class="text-white">The Sambava</h3>
                                <p class="text-white">Parcelle #1</p>
                                <!-- <a href="" class="btn btn-light col-12">Add friend</a>
                    <a href="" class="btn btn-outline-white col-12">View profile</a> -->
                            </div>
                        </div>

                        <div class="flex-row justify-content-evenly align-items-center my-3 row">
                            <div class="separator col-4 bg-white"></div>
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <img src="../assets/img/icons8-feuille-30-white.png" alt="">
                            </div>
                            <div class="separator col-4 bg-white"></div>
                        </div>

                        <!-- <div class="col-md-6 col-sm-12 d-flex flex-column justify-content-center align-items-center text-white"> -->
                        <p>15.2 ha</p>
                        <p>Nombre de pieds : 52</p>
                        <p>Poids the restant : 320 kg</p>
                        <!-- </div> -->
                    </div>


                </div>

            </div>
            <?php


            include("../templates/footer-non-absolute.php");

            ?>
            <script src="../assets/js/utilities/chart-maker.js"></script>
            <script src="../assets/js/utilities/table.js"></script>
            <script src="../inc/js/data.js"></script>
            <script>
                var headers = ["Poids cueilli total", "Poids restant sur les parcelles", "Vente", "depense", "benefice", "Cout de revient/kg",];
                document.getElementById("submit").addEventListener("click", function () {
                    var end = document.getElementById("end");

                    var first = new FormData();
                    first.append("action", "PREVISION2");
                    first.append("end", end.value);

                    var second = new FormData();

                    second.append("action", "PREVGLOBAL2");
                    second.append("end", end.value);

                    var container = document.getElementById("product-card-container");
                    while (container.firstChild) {
                        container.removeChild(container.firstChild);
                    }
                    send_or_fetch_FormData("traitement/fetch.php", first, "POST")
                        .then((resultat) => {
                            console.log("Resultat");
                            console.log(resultat); // Log the resolved value
                            resultat = JSON.parse(resultat);
                            resultat.forEach(element => {
                                container.appendChild(createCard(element));
                            });

                        })
                        .catch((err) => {
                            console.error(err);

                        });
                    send_or_fetch_FormData("traitement/fetch.php", second, "POST")
                        .then((resultat) => {
                            console.log("Resultat");
                            resultat = JSON.parse(resultat);
                            console.log(resultat); // Log the resolved value

                            var restant = document.getElementById("restant");
                            var montant = document.getElementById("montant");

                            restant.innerHTML = resultat["the_restant"];
                            montant.innerHTML = resultat["montant"];

                        })
                        .catch((err) => {
                            console.error(err);

                        });
                });
            </script>
            <?php

            include("../templates/end.php");

            ?>