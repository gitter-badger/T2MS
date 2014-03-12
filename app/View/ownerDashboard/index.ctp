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
</head>
<div class="vehicles form">

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


