<!DOCTYPE html>
<html>
<head>
    <?php
        echo $this->Html->css('theme');
        echo $this->Html->css('elements');
        echo $this->Html->css('bootstrap');
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('cake.generic');

        echo $this->Html->script('jquery-1.7.2.min');
    ?>
    <meta charset="utf-8">
    <title>Owner Dashboard</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="app/webroot/img/cake.icon.png">
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
</head>

<div class="content">

<div class="nameheader">
    <h1 class="page-title">Dashboard</h1>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="row-fluid">

            <div class="block">
                <a href="#page-stats" class="block-heading" data-toggle="collapse">Latest Stats</a>
                <div id="page-stats" class="block-body collapse in">
                    <script type="text/javascript">
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
                    </script>
                    <div id="daily-income-chart" style="min-height: 200px; min-width: 800px;"></div>
                    <?php $this->requestAction('/OwnerDashboard/incomeChart');?>

                </div>
            </div>
        </div>

        <div class="row-fluid">


        </div>

        <div class="row-fluid">

        </div>

    </div>
</div>
</div>

<?php echo $this->Html->script('bootstrap'); ?>
<script type="text/javascript">
    $("[rel=tooltip]").tooltip();
    $(function() {
        $('.demo-cancel-click').click(function(){return false;});
    });
</script>

</body>
</html>


