<?php

$title = "Log into your account";
include("../templates/head.php");


$error = "display:none";

if (isset($_GET['error'])) {
  $error="";
}

?>

<div class="bullseye-bg-info page-header align-items-start min-vh-100">
    <span class="mask bg-gradient-light opacity-2"></span>
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                <span class="material-icons">
                    account_circle
                </span>
                <br>
                    Connection
                </h4>
              </div>
            </div>
            <div class="card-body">
              <form role="form" class="text-start" action="traitement/login.php" method="post">
                <div class="alert alert-danger" style="<?php echo $error;?>">
                  <span class="text-white"> Pseudo ou mot de passe incorrect</span>
                </div>
                <div class="input-group input-group-static my-3">
                  <label>Nom d'utilisateur</label>
                  <input type="text" name="uname" class="form-control" value="admin">
                </div>
                <div class="input-group input-group-static mb-3">
                  <label>Mot de passe</label>
                  <input type="password" name="pwd" class="form-control" value="admin">
                </div>
                
                <div class="text-center">
                  <input type="submit" class="btn btn-info w-100 my-4 mb-2" value="Valider">
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer position-absolute bottom-2 py-2 w-100">
      <div class="container">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-12 col-md-6 my-auto">
            <div class="copyright text-center text-sm text-white text-lg-start">
                made <!--with <i class="fa fa-heart" aria-hidden="true"></i>--> by
                <b>ETU002558 (Irina) - ETU002409 (Kenny) - ETU002740 (Tsito)</b>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="home.php" class="nav-link text-white">Home</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

<?php

include("../templates/end.php");

?>