<?php

$title = "Home";
include("../templates/head.php");

?>
    <div class="container position-sticky z-index-sticky top-0"><div class="row"><div class="col-12">
    <nav class="navbar navbar-expand-xl  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
    <div class="container-fluid">
        <a class="navbar-brand font-weight-bolder ms-sm-3" rel="tooltip" data-placement="bottom" target="_blank">
        Super Cool Website
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
        </span>
        </button>
        <div class="collapse navbar-collapse pt-3 pb-2 py-xl-0" id="navigation">
        <a href="../templates/template.php?page=sign-in&title=<?php echo("Log into your account"); ?>" class="btn btn-sm  bg-gradient-primary  btn-round mb-0 ms-auto d-xl-none d-block">Log Out</a>
        
        <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-xl-0" id="navigation">
        <ul class="navbar-nav navbar-nav-hover mx-auto">
            <li class="nav-item mx-2">
            <a href="sign-in.php" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" role="button">
                Sign In
                <!-- <img src="../assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-1"> -->
            </a>
            </li>

            <li class="nav-item mx-2">
            <a href="create-account.php" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" role="button">
                Sign Up
                <!-- <img src="../assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-1"> -->
            </a>
            </li>
            <li class="nav-item mx-2">
            <a href="pfp.php" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" role="button">
                File Upload Form
                <!-- <img src="../assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-1"> -->
            </a>
            </li>

            <!-- <li class="nav-item dropdown dropdown-hover mx-2">
            <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" role="button">
                Docs
            </a>
            </li> -->
        </ul>

        <ul class="navbar-nav d-xl-block d-none">
            <li class="nav-item">
            <a href="../templates/template.php?page=sign-in&title=<?php echo("Log into your account"); ?>" class="btn btn-sm  bg-gradient-primary  mb-0 me-1" role="button">Log out</a>
            </li>
        </ul>
        </div>
        </div>
    </div>
    </nav>
    <!-- End Navbar -->
    </div></div></div>
    <header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('../assets/img/bg2.jpg')">
        <span class="mask bg-gradient-primary opacity-4"></span>
        <div class="container">
        <div class="row">
            <div class="col-xl-7 text-center mx-auto">
            <h1 class="text-white pt-3 mt-n5">Welcome</h1>
            <p class="lead text-white mt-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti reiciendis eos labore, expedita aliquid doloribus laborum cum consectetur odit ab nobis, voluptates a adipisci reprehenderit quidem. Maiores aperiam quae at?</p>
            </div>
        </div>
        </div>
    </div>
    </header>

    <div class="row card card-body blur shadow-blur mx-3 mx-xl-4 mt-n6 d-flex align-items-center">
        <div class="col-6 mt-5 text-center">
            <span class="badge bg-primary mb-3">Cool elements</span>
            <h1>Wow, we've got <i>cards</i>!</h1>
        </div>
        <div class="col-12 row d-flex justify-content-center align-items-center" id="product-card-container">
            <div class="product-card col-sm-12 col-xl-5 flex-row mt-6 mb-6 bg-gradient-primary justify-content-center row mx-5 p-4">
                <div class="col-md-6 col-sm-12 row flex-column align-items-center justify-content-between card-left mb-6">
                    <div class="img-container flex-column align-items-center justify-content-center col-10">
                        <img src="../assets/img/team-1.jpg" alt="">
                    </div>
                    <div class="text-center mt-3">
                        <h3 class="text-white">Jane Doe</h3>
                        <p class="text-white">20 years old</p>
                        <a href="" class="btn btn-light col-12">Add friend</a>
                        <a href="" class="btn btn-outline-white col-12">View profile</a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 d-flex justify-content-center align-items-center">
                    <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti quas possimus explicabo, nobis ipsum nihil fugiat excepturi quibusdam voluptatibus similique odio dolorum aliquam, molestiae neque asperiores ullam. Earum, corrupti rerum? Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima officia error facere explicabo dolorum vel maiores, rerum architecto vitae nobis natus, autem perspiciatis maxime nesciunt, in perferendis nam eaque totam?</p>
                </div>
            </div>
            <div class="product-card col-sm-12 col-xl-5 flex-row mt-6 mb-6 bg-gradient-primary justify-content-center row mx-5 p-4">
                <div class="col-md-6 col-sm-12 row flex-column align-items-center justify-content-between card-left mb-6">
                    <div class="img-container flex-column align-items-center justify-content-center col-10">
                        <img src="../assets/img/team-3.jpg" alt="">
                    </div>
                    <div class="text-center">
                        <h3 class="text-white">Cool Person</h3>
                        <p class="text-white">25 years oldy</p>
                        <a href="" class="btn btn-light col-12">Add friend</a>
                        <a href="" class="btn btn-outline-white col-12">View profile</a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 d-flex justify-content-center align-items-center">
                    <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti quas possimus explicabo, nobis ipsum nihil fugiat excepturi quibusdam voluptatibus similique odio dolorum aliquam, molestiae neque asperiores ullam. Earum, corrupti rerum? </p>
                </div>
            </div>
            
            
        </div>
        <div class="col-6 mt-5 text-center">
            <span class="badge bg-primary mb-3">Dashboard elements</span>
            <h1>In case we need to make a <i>dashboard</i></h1> </div>
            <div id="table-section-container" class="section-container row flex-row justify-content-evenly">
                <div class="col-sm-12 col-md-4 text-monospace">
                    <h2 class="text-primary text-uppercase">1. Tables</h2>
                    <p class="indent-4 text-justify text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, doloribus iusto eum consequatur alias vero repellat rerum, eos aliquam dolorem mollitia nesciunt magni pariatur, voluptates cum id qui culpa aspernatur!</p>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="table-responsive" id="table-container">
                        <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-sm font-weight-bolder ">Author</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Technology</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                <div>
                                    <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs">John Michael</h6>
                                    <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                                </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">Manager</p>
                                <p class="text-xs text-secondary mb-0">Organization</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm bg-success">Online</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-normal">23/04/18</span>
                            </td>
                            <td class="align-middle">
                                <a href="javascript:;" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                Edit
                                </a>
                            </td>
                            </tr>

                            <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                <div>
                                    <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-3.jpg" class="avatar avatar-sm me-3">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs">Alexa Liras</h6>
                                    <p class="text-xs text-secondary mb-0">alexa@creative-tim.com</p>
                                </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">Programator</p>
                                <p class="text-xs text-secondary mb-0">Developer</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm bg-secondary">Offline</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-normal">11/01/19</span>
                            </td>
                            <td class="align-middle">
                                <a href="#!" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                Edit
                                </a>
                            </td>
                            </tr>

                            <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                <div>
                                    <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-4.jpg" class="avatar avatar-sm me-3">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs">Laurent Perrier</h6>
                                    <p class="text-xs text-secondary mb-0">laurent@creative-tim.com</p>
                                </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">Executive</p>
                                <p class="text-xs text-secondary mb-0">Projects</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm bg-success">Online</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-normal">19/09/17</span>
                            </td>
                            <td class="align-middle">
                                <a href="#!" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                Edit
                                </a>
                            </td>
                            </tr>

                            <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                <div>
                                    <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-3.jpg" class="avatar avatar-sm me-3">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs">Michael Levi</h6>
                                    <p class="text-xs text-secondary mb-0">michael@creative-tim.com</p>
                                </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">Programator</p>
                                <p class="text-xs text-secondary mb-0">Developer</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm bg-success">Online</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-normal">24/12/08</span>
                            </td>
                            <td class="align-middle">
                                <a href="#!" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                Edit
                                </a>
                            </td>
                            </tr>

                            <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                <div>
                                    <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs">Richard Gran</h6>
                                    <p class="text-xs text-secondary mb-0">richard@creative-tim.com</p>
                                </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">Manager</p>
                                <p class="text-xs text-secondary mb-0">Executive</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm bg-secondary">Offline</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-normal">04/10/21</span>
                            </td>
                            <td class="align-middle">
                                <a href="#!" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                Edit
                                </a>
                            </td>
                            </tr>

                            <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                <div>
                                    <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-4.jpg" class="avatar avatar-sm me-3">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs">Miriam Eric</h6>
                                    <p class="text-xs text-secondary mb-0">miriam@creative-tim.com</p>
                                </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">Programtor</p>
                                <p class="text-xs text-secondary mb-0">Developer</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm bg-secondary">Offline</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-normal">14/09/20</span>
                            </td>
                            <td class="align-middle">
                                <a href="#!" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                Edit
                                </a>
                            </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="chart-section-container" class="section-container row">
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
            </div>
        </div>
    </div>
<script src="../assets/js/utilities/chart-maker.js"></script>
<script src="../assets/js/utilities/table.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var dataArr = [4.5, 90, 5.5];
        var labels = ['Category 1', 'Category 2', 'Category 3'];
        var colors = ['#e91e63', '#7b809a', '#03a9f4'];
        var canvasId = "myPieChart";
        var container = document.querySelector('.chart-container');
        
        pieChart(dataArr, labels, colors, canvasId, container);
    });


    document.addEventListener('DOMContentLoaded', function () {
        var xLabels = ['January', 'February', 'March', 'April', 'May'];
        var yLabel = 'Monthly Sales';
        var dataArr =  [700, 75, 120, 90, 150];
        var color = "#e91e63";
        var width = 2;
        var canvasId = "myLineChart";
        var container = document.querySelector('.chart-container');
        
        lineChart(xLabels, yLabel, dataArr, color, width, canvasId, container);
    });

    var tableContainer = document.getElementById("table-container");
    // cleaning up the parent div
    while(tableContainer.firstChild) {
        tableContainer.removeChild(tableContainer.firstChild);
    }

    var headers = ["Nom", "Prenom", "Age"];
    var data = [
        ["Ranaivo", "Jean", 65], 
        ["Rakoto", "Paul", 40]
    ];
    var table = createTable(headers, data);
    tableContainer.appendChild(table);


</script>
  
<!-- </div> -->
<?php

include("../templates/end.php");

?>