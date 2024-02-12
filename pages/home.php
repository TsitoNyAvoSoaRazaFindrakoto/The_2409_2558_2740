<?php

$title = "Home";
include("../templates/head.php");

?>
    <div class="container position-sticky z-index-sticky top-0"><div class="row"><div class="col-12">
   <?php
   
   include("../templates/navbar.php");
   
   ?>
    <header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('../assets/img/bg3.jpg')">
        <span class="mask bg-gradient-success opacity-4"></span>
        <div class="container">
        <div class="row">
            <div class="col-xl-7 text-center mx-auto">
            <h1 class="text-white pt-3 mt-n5">Bienvenue</h1>
            <p class="lead text-white mt-3" style="text-variation:small-caps;">Vous pourrez voir et gérer des données sur notre plantation de thé.</p>
            </div>
        </div>
        </div>
    </div>
    </header>

    <div class="row card card-body blur shadow-blur mx-3 mx-xl-4 mt-n6 d-flex align-items-center">
        
        <div class=" mt-5 text-center">
            <span class="badge bg-primary mb-3">Résultats</span>
            <!-- <h1>In case we need to make a <i>dashboard</i></h1> </div> -->
            <div id="table-section-container" class="section-container row flex-row justify-content-evenly">
                <!-- <div class="col-sm-12 col-md-4 text-monospace">
                    <h2 class="text-primary text-uppercase">1. Tables</h2>
                    <p class="indent-4 text-justify text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, doloribus iusto eum consequatur alias vero repellat rerum, eos aliquam dolorem mollitia nesciunt magni pariatur, voluptates cum id qui culpa aspernatur!</p>
                </div> -->
                <div class="col-12">
                    <div class="table-responsive" id="table-container">
                        <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-dark text-sm font-weight-bolder ps-2">Poids cueillli total</th>
                                <th class="text-center text-uppercase text-dark text-sm font-weight-bolder">Poids restant sur les parcelles</th>
                                <th class="text-center text-uppercase text-dark text-sm font-weight-bolder ">Cout de revient/kg</th>
                                <th class="text-dark"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>
                                250 kg
                            </td>
                            <td>
                               400 kg 
                            </td>
                            <td>
                                12,500 MGA
                            </td>
                            <!-- <td class="align-middle">
                                <a href="javascript:;" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                Edit
                                </a>
                            </td> -->
                            </tr>
                        </tbody>
                        </table>
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
<!-- <script>
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


</script> -->
  
<!-- </div> -->
<?php

include("../templates/end.php");

?>