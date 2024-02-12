function pieChart(dataArr, labels, colors, canvasId, container) {
    // Sample data for the pie chart
    var data = {
        labels: labels,
        datasets: [{
        data: dataArr,
        backgroundColor: colors,
        }]
    };

    
    var containerWidth = container.clientWidth;
    var containerHeight = container.clientHeight;
    
    var ctx = document.getElementById(canvasId).getContext('2d');
    // Set the canvas width and height based on the container's size
    ctx.canvas.width = containerWidth;
    ctx.canvas.height = containerHeight;

    // Create the pie chart
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: data,
    });
}

function lineChart(xLabels, yLabel, dataArr, color, width, canvasId, container) {
    // Sample data for the line chart
    var data = {
        labels: xLabels,
        datasets: [{
        label: yLabel,
        data: dataArr,
        borderColor: color,
        borderWidth: width,
        fill: false,
        }]
    };

    
    var containerWidth = container.clientWidth;
    var containerHeight = container.clientHeight;

    var ctx = document.getElementById(canvasId).getContext('2d');

    // Set the canvas width and height based on the container's size
    ctx.canvas.width = containerWidth;
    ctx.canvas.height = containerHeight;
    
    // Create the line chart
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: data,
    });
}