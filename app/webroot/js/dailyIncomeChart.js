/**
 * Created by Madawa on 12/03/14.
 */
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Date','Income'],
        ['Correct',7056],
        ['Not Correct',897]
        ]);

        var options = {'width':350};

        var chart = new google.visualization.PieChart(document.getElementById('daily-income-chart'));
        chart.draw(data, options);
}
