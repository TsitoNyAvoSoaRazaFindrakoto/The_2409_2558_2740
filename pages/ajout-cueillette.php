<?php

$title = "Add gathering report";
include("../templates/head.php");


include_once "../inc/fonction_base.php";



?>

<div class="container position-sticky z-index-sticky top-0">
	<div class="row">
		<div class="col-12">
			<?php include("../templates/navbar.php"); ?>
			<header class="header-2">
				<div class="page-header min-vh-75 relative" style="background-image: url('../assets/img/bg3.jpg')">
					<span class="mask bg-gradient-success opacity-4"></span>
					<div class="container">
						<div class="row">
							<div class="col-xl-7 text-center mx-auto">
								<h1 class="text-white pt-3 mt-n5">Rapport de cueillette</h1>
								<p class="lead text-white mt-3">Ajouter une nouvelle cueillette dans la base !</p>
							</div>
						</div>
					</div>
				</div>
			</header>
			<div class="row card card-body blur shadow-blur mx-3 mx-xl-4 mt-n6 d-flex align-items-center">

				<div class="col-6">
					<div class="card-body">
						<h1 class="text-success" style="font-variant:small-caps;">
							Ajoutez vos donnees
						</h1>
						<div class="alert alert-danger" id="error" style="display:none">
							<span class="text-white" id="message"></span>
						</div>
						<form role="form" class="text-start" action="#" id="form" method="post">
							<input type="hidden" class="form-control" name="action" value="check_cueillette">
							<div class="input-group input-group-static my-3">
								<label>date_cueillette</label>
								<input type="date" class="form-control" name="date_cueillette" id="date_cueillette">
							</div>
							<div class="input-group input-group-static mb-3">
								<label>Cueilleur</label>
								<select name="id_cueilleur" id="id_ceuilleur" class="form-control">
									<?php
									$data = select_all("the_Cueilleurs");

									foreach ($data as $key => $value) {
										echo "<option value=" . $value['id_cueilleur'] . ">" . $value['nom'] . "</option>";
									}
									?>
								</select>
							</div>
							<div class="input-group input-group-static mb-3">
								<label>Parcelle</label>
								<!-- <input type="password" class="form-control" value="admin"> -->
								<select name="id_parcelle" id="id_parcelle" class="form-control">
									<?php
									$data = select_all("the_Parcelles");

									foreach ($data as $key => $value) {
										echo "<option value=" . $value['id_parcelle'] . ">" . $value['numero_parcelle'] . "</option>";
									}
									?>
								</select>
							</div>
							<div class="input-group input-group-static my-3">
								<label class="">Poids cueilli</label>
								<input type="number" class="form-control" name="poids_cueilli" id="poids_cueilli">
							</div>
							<div class="text-center">
								<input type="button" id="submit" class="btn bg-gradient-success w-100 my-4 mb-2"
									value="Ajouter">
							</div>
						</form>
					</div>
				</div>

			</div>

			<script src="../inc/js/data.js"></script>
			<script>
				document.getElementById("submit").addEventListener("click", function () {
					var erreur = document.getElementById("error");

					var poids_cueilli = document.getElementById("poids_cueilli");
					var date_cueillette = document.getElementById("date_cueillette");


					if (date_cueillette.value === '' || date_cueillette.value === null) {
						message.innerText = " vous n'avez pas insere de date";
						erreur.style.display = "block";
					} else if (poids_cueilli.value === null || isNaN(poids_cueilli.value) || poids_cueilli.value <= 0) {
						message.innerText = " poids_cueilli invalide";
						erreur.style.display = "block" ;
					}

					submitFormExecute("form", "POST")
						.then((resultat) => {
							console.log(resultat.getCla); // Log the resolved value
							if (resultat == 1) {
								window.location.href = "home.php";
							} else {
								message.innerText = "il n'y a plus cette quantite";
								erreur.style.display = "block";
							}
						})
						.catch((err) => {
							console.error(err);
						});
				});
			</script>

			<?php

			include "../templates/footer-non-absolute.php";

			?>

			<?php

			include "../templates/end.php";

			?>