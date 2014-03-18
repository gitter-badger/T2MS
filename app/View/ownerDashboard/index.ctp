
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load('visualization', '1.1', {packages: ['corechart', 'controls']});
    </script>
    <div class="customers index">

        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1><?php echo __('Dashboard'); ?></h1>
                </div>
            </div><!-- end col md 12 -->
        </div><!-- end row -->



        <div class="row">

            <div class="col-md-3">
                <div class="actions">
                    <div class="panel panel-default">
                        <div class="panel-heading">Actions</div>
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Vehicles'), array('action' => 'listVehicles'), array('escape' => false)); ?></li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Add Vehicle'), array('action' => 'add'), array('escape' => false)); ?></li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Logout'), '/users/logout', array('escape' => false)); ?></li>


                            </ul>
                        </div><!-- end body -->
                    </div><!-- end panel -->
                </div><!-- end actions -->
            </div><!-- end col md 3 -->

            <div class="col-md-9">
                <div id="income-chart">
                    <br/>
                    <h2 style="font-size: 130%">Income Statistics</h2>
                    <div id="dashboard">
                        <div id="select">

                            <?php
                            $i=2;
                            foreach($drivers AS $driver){
                                $name = $driver['Vehicle']['name'];
                            ?>
                            <input type='checkbox' id = '<?php echo $i; ?>' onchange="checkbox(<?php echo $i; ?>)"/>
                            <span><?php echo $name; ?></span><br/>
                            <?php
                                $i++;
                            }
                            ?>
                        </div></br></br>
                        <div id="chart" style='width: 915px; height: 300px;'></div>
                        <div id="control" style='width: 915px; height: 50px;'></div>
                    </div>
                </div>

            </div> <!-- end col md 9 -->
        </div><!-- end row -->


    </div><!-- end containing of content -->


<!-- JavaScripts -->
<!-- Income Statistics Chart -->
<script type="text/javascript">
    var viewArray=[0,1];
    var view;
    var dashboard;
    function drawVisualization() {
        dashboard = new google.visualization.Dashboard(
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
                    'minRangeSize': 3*86400000
                }
            },
            // Initial range: current week
            'state': {'range': {'start': new Date(new Date().getTime() - 7 * 86400000), 'end': new Date()}}
        });

        var chart = new google.visualization.ChartWrapper({
            'chartType': 'AreaChart',
            'containerId': 'chart',
            'options': {
                'chartArea': {'height': '80%', 'width': '90%'},
                'hAxis': {'slantedText': false},
                'legend': {'position': 'in'}
            }
        });
        var data = new google.visualization.DataTable(<?php echo($incomeChartData); ?>);
        view = new google.visualization.DataView(data);
        view.setColumns(viewArray);

        dashboard.bind(control, chart);
        dashboard.draw(view);
    }
    function checkbox(i){
        var checked = document.getElementById(i).checked;
        if(!checked){
            var index = viewArray.indexOf(i);
            if (index > -1) {
                viewArray.splice(index, 1);
            }
        }
        else{
            viewArray.push(i);
        }
        view.setColumns(viewArray);
        dashboard.draw(view);
    }
    google.setOnLoadCallback(drawVisualization);
</script>