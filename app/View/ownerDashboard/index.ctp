<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load('visualization', '1.1', {packages: ['corechart', 'controls']});
</script>
<div class="customers index">

    <div class="row-fluid" style="margin-left: -50px; margin-right: -50px">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Dashboard'); ?></h1>
            </div>
        </div>
        <!-- end col md 12 -->
    </div>
    <!-- end row -->

    <div class="col-md-3" style="margin-left: -50px">
        <div class="actions">
            <div class="panel panel-default">
                <div class="panel-heading">Actions</div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Vehicles'), array('action' => 'listVehicles'), array('escape' => false)); ?></li>
                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Add Vehicle'), array('action' => 'add'), array('escape' => false)); ?></li>
                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Logout'), '/users/logout', array('escape' => false)); ?></li>
                    </ul>
                </div>
                <!-- end panel body -->
            </div>
            <!-- end panel -->
        </div>
        <!-- end actions -->
    </div>
    <!-- end col md 3 actions-->

    <div class="row-fluid" name="top panel" style="margin-right: -50px">

        <div class="col-md-3" style="margin-left: 25px">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>
                        <small>Today's Income</small>
                    </h2>
                    <div class="span4">
                        <?php
                        if ($incomeToday >= $dailyAverage) {
                            echo('<p style="color: green; float:right; font-size: 13px">' . '&nbsp' . $incomePercentage . ' %</p>');
                            echo($this->Html->image('price-up.icon.png', array('style' => 'float: right')));
                        } else if ($incomeToday < $dailyAverage) {
                            echo('<p style="color: red; float:right; font-size: 13px">' . '&nbsp' . $incomePercentage . ' %</p>');
                            echo($this->Html->image('price-down.icon.png', array('style' => 'float: right')));
                        }
                        ?>
                        <h3>LKR <?php echo number_format($incomeToday, 2, '.', ','); ?></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>
                        <small>Daily Average</small>
                    </h2>
                    <h3>LKR <?php echo number_format($dailyAverage, 2, '.', ','); ?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>
                        <small>Monthly Income</small>
                    </h2>
                    <h3>LKR <?php echo number_format($incomeCurrentMonth, 2, '.', ','); ?></h3>
                </div>
            </div>
        </div>
    </div>
    <!--end of row top panel-->

    <div class="row-fluid" name="area chart" style="margin-left: -50px; margin-right: -50px">
        <div class="col-md-9 col-md-offset-3" style="margin-left: -20px">
            <div class="panel panel-default" id="income-chart" style="min-width: 950px">
                <div class="panel-heading">Income Statistics</div>
                <div class="panel-body" id="dashboard">
                    <div style="background-color: #F5F5F5;
                        padding: 3px 3px 3px 3px;
                        -moz-border-radius: 5px;
                        -webkit-border-radius: 5px;
                        border-radius: 5px;">
                        <span style="font-weight: bold">Select Driver :&nbsp;&nbsp;</span>

                        <?php
                        $i = 2;
                        foreach ($drivers AS $driver) {
                            $name = $driver['Vehicle']['name'];
                            ?>

                            <input type='checkbox' id='<?php echo $i; ?>' onchange="checkbox(<?php echo $i; ?>)"/>
                            <label for="<?php echo $i; ?>"><span></span><?php echo $name; ?></label>&nbsp;&nbsp;

                            <?php
                            $i++;
                        }
                        ?>

                    </div>
                    </br></br>
                    <div id="chart" style='width: 915px; height: 300px;'></div>
                    <div id="control" style='width: 915px; height: 50px;'></div>
                </div>
            </div>


        </div>
        <!-- end col md 9 -->
    </div>
    <!-- end row area chart-->

    <div class="row-fluid" name="session_table">
        <div class="col-md-5" style="margin-left: 215px">
            <div class="panel panel-default">
                <div class="panel-heading">Today's Driver Sessions</div>
                <div class="panel-body">
                    <table class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th>Driver Name</th>
                            <th>Locality</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($sessions AS $dsession) {
                            if($dsession['0']['endTime'] != null){
                                echo('<tr class="info">');
                            }else{
                                echo('<tr class="success">');
                            }
                            ?>
                                <td><?php echo $dsession['Vehicle']['driverName']; ?></td>
                                <td><?php echo $dsession['Locality']['name']; ?></td>
                                <td><?php echo $dsession['0']['startTime']; ?></td>
                                <?php
                                if ($dsession['0']['endTime'] != null) {
                                    ?>
                                    <td><?php echo $dsession['0']['endTime']; ?></td>
                                <?php
                                } else
                                    echo('<td></td>')
                                ?>
                            </tr>

                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <!-- end of table -->
                </div>
                <!-- end of panel body -->
            </div>
            <!-- end of panel -->
        </div>
        <!-- end ofcol-md-9 -->
    </div>
    <!-- end row fluid-->
</div><!-- end containing of content -->


<!-- JavaScripts -->
<!-- Income Statistics Chart -->
<script type="text/javascript">
    var viewArray = [0, 1];
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
                    'minRangeSize': 3 * 86400000
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
                'legend': {'position': 'top'}
            }
        });
        var data = new google.visualization.DataTable(<?php echo($incomeChartData); ?>);
        view = new google.visualization.DataView(data);
        view.setColumns(viewArray);
        var count =<?php echo count($drivers)+2; ?>;
        for (var i = 2; i < count; i++)
            checkbox(i);
        dashboard.bind(control, chart);
        dashboard.draw(view);
    }
    function checkbox(i) {
        var checked = document.getElementById(i).checked;
        if (!checked) {
            var index = viewArray.indexOf(i);
            if (index > -1) {
                viewArray.splice(index, 1);
            }
        }
        else {
            viewArray.push(i);
        }
        view.setColumns(viewArray);
        dashboard.draw(view);
    }
    google.setOnLoadCallback(drawVisualization);
</script>