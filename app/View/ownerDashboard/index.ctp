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
<div class="vehicles form">

	<div class="content">
			<h2 class="page-title">Dashboard</h2>

		<div class="container-fluid">
			<div class="row-fluid">
			
				<div class="row-fluid">

            <div class="block">
                <a href="#page-stats" class="block-heading" data-toggle="collapse">Latest Stats</a>
                <div id="page-stats" class="block-body collapse in">
                    <script type="text/javascript">
                        google.load("visualization", "1.1", {packages:["corechart"]});
                        google.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = new google.visualization.DataTable(<?php echo ($incomeChartData);?>);


                            var options = {'width': '100%'};

                            var chart = new google.visualization.AreaChart(document.getElementById('daily-income-chart'));
                            chart.draw(data, options);
                        }
                    </script>
                    <div id="daily-income-chart" style="min-height: 200px; min-width: 800px;"></div>

                </div>
            </div>

            <div id="newchart">
                <script type="text/javascript">
                    google.load('visualization', '1.1', {packages: ['corechart', 'controls']});
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
                                    // Display a single series that shows the closing value of the stock.
                                    // Thus, this view has two columns: the date (axis) and the stock value (line series).
                                    'chartView': {
                                        'columns': [0, 3]
                                    },
                                    // 1 day in milliseconds = 24 * 60 * 60 * 1000 = 86,400,000
                                    'minRangeSize': 86400000
                                }
                            },
                            // Initial range: 2012-02-09 to 2012-03-20.
                            'state': {'range': {'start': new Date(2012, 1, 9), 'end': new Date(2012, 2, 20)}}
                        });

                        var chart = new google.visualization.ChartWrapper({
                            'chartType': 'CandlestickChart',
                            'containerId': 'chart',
                            'options': {
                                // Use the same chart area width as the control for axis alignment.
                                'chartArea': {'height': '80%', 'width': '90%'},
                                'hAxis': {'slantedText': false},
                                'vAxis': {'viewWindow': {'min': 0, 'max': 2000}},
                                'legend': {'position': 'none'}
                            },
                            // Convert the first column from 'date' to 'string'.
                            'view': {
                                'columns': [
                                    {
                                        'calc': function(dataTable, rowIndex) {
                                            return dataTable.getFormattedValue(rowIndex, 0);
                                        },
                                        'type': 'string'
                                    }, 1, 2, 3, 4]
                            }
                        });

                        var data = new google.visualization.DataTable();
                        data.addColumn('date', 'Date');
                        data.addColumn('number', 'Stock low');
                        data.addColumn('number', 'Stock open');
                        data.addColumn('number', 'Stock close');
                        data.addColumn('number', 'Stock high');

                        // Create random stock values, just like it works in reality.
                        var open, close = 300;
                        var low, high;
                        for (var day = 1; day < 121; ++day) {
                            var change = (Math.sin(day / 2.5 + Math.PI) + Math.sin(day / 3) - Math.cos(day * 0.7)) * 150;
                            change = change >= 0 ? change + 10 : change - 10;
                            open = close;
                            close = Math.max(50, open + change);
                            low = Math.min(open, close) - (Math.cos(day * 1.7) + 1) * 15;
                            low = Math.max(0, low);
                            high = Math.max(open, close) + (Math.cos(day * 1.3) + 1) * 15;
                            var date = new Date(2012, 0 ,day);
                            data.addRow([date, Math.round(low), Math.round(open), Math.round(close), Math.round(high)]);
                        }

                        dashboard.bind(control, chart);
                        dashboard.draw(data);
                    }


                    google.setOnLoadCallback(drawVisualization);
                </script>

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

</body>
</html>


