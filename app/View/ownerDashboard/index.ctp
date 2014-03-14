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
    <script type="text/javascript">
        google.load('visualization', '1.1', {packages: ['corechart', 'controls', 'annotatedtimeline']});
    </script>
</head>
<div class="vehicles form">

	<div class="content">
		<h2 class="page-title">Dashboard</h2>
        <hr>

		<div class="container-fluid">
			<div class="row-fluid">
			
				<div class="row-fluid">

                    <div id="income-chart">
                        </br>
                        <h2 style="font-size: 130%">Income Statistics</h2>
                        <div id="dashboard">
                            <div id="chart" style='width: 915px; height: 300px;'></div>
                            <div id="control" style='width: 915px; height: 50px;'></div>
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
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Vehicles'), array('action' => 'listVehicles')); ?></li>
		<li><?php echo $this->Html->link(__('Add vehicle'), array('action' => 'add')); ?></li>
		<li><?php echo  $this->Html->link('Logout','/users/logout'); ?> </li>
	</ul>
</div>

<?php echo $this->Html->script('bootstrap'); ?>
<script type="text/javascript">
    $("[rel=tooltip]").tooltip();
    $(function() {
        $('.demo-cancel-click').click(function(){return false;});
    });
</script>

<!-- JavaScripts -->
<!-- Income Statistics Chart -->
<script type="text/javascript">
    function drawVisualization() {
        var dashboard = new google.visualization.Dashboard(
            document.getElementById('dashboard'));

        var control = new google.visualization.ControlWrapper({
            'controlType': 'ChartRangeFilter',
            'containerId': 'control',
            'options': {
                // Filter by the date axis.
                'filterColumnIndex': 0,
                'ui': {
                    'chartType': 'LineChart',
                    'chartOptions': {
                        'chartArea': {'width': '90%'},
                        'hAxis': {'baselineColor': 'none'}
                    },
                    'chartView': {
                        'columns': [0, 1]
                    },
                    // 1 day in milliseconds = 24 * 60 * 60 * 1000 = 86,400,000
                    'minRangeSize': 86400000
                }
            },
            // Initial range: 2012-02-09 to 2012-03-20.
            'state': {'range': {'start': new Date(2014, 2, 7), 'end': new Date(2014, 2, 14)}}
        });

        var chart = new google.visualization.ChartWrapper({
            'chartType': 'AreaChart',
            'containerId': 'chart',
            'options': {
                // Use the same chart area width as the control for axis alignment.
                'chartArea': {'height': '80%', 'width': '90%'},
                'hAxis': {'slantedText': false},
                'legend': {'position': 'none'}
            }
        });

        var data = new google.visualization.DataTable(<?php echo($incomeChartData); ?>);

        dashboard.bind(control, chart);
        dashboard.draw(data);
    }
    google.setOnLoadCallback(drawVisualization);
</script>

</body>
</html>


