<?php

$title = "Add a profile picture to your account";
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
                    Add a profile picture
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
            <div class="card-body text-center">
                <p>This step is totally optional!</p>
                <form role="form" style="display:flex" action="../traitements/test-upload.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <label class="custum-file-upload mb-4 col-md-12" for="file">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path> </g></svg>
                            </div>
                            <div class="text">
                                <span>Click to upload image</span>
                            </div>
                            <input type="file" id="file" name="file" onchange="updateLabel()">
                        </label>
                    </div>
                    <div class="row">
                        <!-- <div class=""> -->
                            <p id="file-label"></p>
                            <input type="submit" class="btn bg-gradient-primary w-100 col-md-12" value="Upload">
                        <!-- </div> -->

                    </div>
                </div>
                </form>
                <p class="text-sm text-center">
                        <a href="../templates/template.php?page=home&title=<?php echo("Home Page"); ?>">
                            Just go to home page
                        </a>
                </p>
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
                <a href="" class="nav-link text-white" target="_blank">Home</a>
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

    <script>
        function updateLabel() {
            var fileInput = document.getElementById('file');
            var fileLabel = document.getElementById('file-label');

            if (fileInput.files.length > 0) {
                fileLabel.innerHTML = 'File selected: ' + fileInput.files[0].name;
            } else {
                fileLabel.innerHTML = 'No file selected';
            }
        }

    </script>

<?php

include("../templates/end.php");

?>