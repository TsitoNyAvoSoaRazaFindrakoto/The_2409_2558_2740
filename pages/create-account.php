<?php

$title = "Create your account";
include("../templates/head.php");

?>

<div class="bullseye-bg-primary page-header align-items-start min-vh-100">
    <span class="mask bg-gradient-dark opacity-2"></span>
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                <span class="material-icons">
                    account_circle
                </span>
                <br>
                    Create your account
                </h4>
                <!-- <div class="row mt-3">
                  <div class="col-2 text-center ms-auto">
                    <a class="btn btn-link px-3" href="javascript:;">
                      <i class="fa fa-facebook text-white text-lg"></i>
                    </a>
                  </div>
                  <div class="col-2 text-center px-1">
                    <a class="btn btn-link px-3" href="javascript:;">
                      <i class="fa fa-github text-white text-lg"></i>
                    </a>
                  </div>
                  <div class="col-2 text-center me-auto">
                    <a class="btn btn-link px-3" href="javascript:;">
                      <i class="fa fa-google text-white text-lg"></i>
                    </a>
                  </div>
                </div> -->
              </div>
            </div>
            <div class="card-body">
                <form role="form" class="text-start">
                <div class="card-body">
                    <div class="row">
                    <!-- <div class="mb-4">
                        <div class="input-group input-group-static">
                            <label>Profile picture</label>
                            <input type="file" class="form-control" >
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <div class="input-group input-group-dynamic mb-4">
                        <label class="form-label">First Name</label>
                        <input class="form-control" aria-label="First Name..." type="text" >
                        </div>
                    </div>
                    <div class="col-md-6 ps-2">
                        <div class="input-group input-group-dynamic">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" placeholder="" aria-label="Last Name..." >
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="">Gender</label>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio1">
                            <label class="custom-control-label" for="customRadio1">Male</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio2">
                            <label class="custom-control-label" for="customRadio2">Female</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio2">
                            <label class="custom-control-label" for="customRadio2">Other</label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="input-group input-group-static">
                            <label>Date of birth</label>
                            <input type="date" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-group input-group-dynamic">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-group input-group-dynamic">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control">
                        </div>
                    </div>
                
                    <!-- <div class="row"> -->
                    <!-- <div class="col-md-12">
                        <div class="form-check form-switch mb-4 d-flex align-items-center">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked="">
                        <label class="form-check-label ms-3 mb-0" for="flexSwitchCheckDefault">I agree to the <a href="javascript:;" class="text-dark"><u>Terms and Conditions</u></a>.</label>
                        </div>
                    </div> -->
                    <div class="text-center">
                        <input type="submit" class="btn bg-gradient-primary w-100" value="Sign up">
                    </div>
                    <p class="mt-4 text-sm text-center">
                        <a href="../templates/template.php?page=sign-in&title=<?php echo("Log into your account"); ?>">
                            Already have an account?
                        </a>
                    </p>
                    <!-- </div> -->
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
                <b>ETU002558 - ETU002409 - ETU002740</b>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="../templates/template.php?page=home&title=Home+Page" class="nav-link text-white" target="_blank">Home</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link text-white" target="_blank">Shop</a>
              </li>
              <!-- <li class="nav-item">
                <a href="" class="nav-link text-white" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link pe-0 text-white" target="_blank">License</a>
              </li> -->
            </ul>
          </div>
        </div>
      </div>
    </footer>

<?php

include("../templates/end.php");

?>