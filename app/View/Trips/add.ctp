<div class="trips form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Trip'); ?></h1>
			</div>
		</div>
	</div>
    <?php
        $localities=array(''=>'Select')+$localities;
        $status = array('-1'=>'Unassigned', '0'=>'Assigned', '1'=>'Started', '2'=>'Finished');
    ?>


    <div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Trips'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Customers'), array('controller' => 'customers', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Customer'), array('controller' => 'customers', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Vehicles'), array('controller' => 'vehicles', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Vehicle'), array('controller' => 'vehicles', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Localities'), array('controller' => 'localities', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Start Locality'), array('controller' => 'localities', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Trip', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('time', array('class' => 'form-control2', 'placeholder' => 'Time'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fare', array('class' => 'form-control', 'placeholder' => 'Fare'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('status', array('options'=>$status,'class' => 'form-control', 'placeholder' => 'Status'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('startLocation', array('options'=>$localities,'class' => 'form-control', 'placeholder' => 'StartLocation'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('endLocation', array('options'=>$localities,'class' => 'form-control', 'placeholder' => 'EndLocation'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('vehicleID', array('class' => 'form-control', 'placeholder' => 'VehicleID'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('customerID', array('class' => 'form-control', 'placeholder' => 'CustomerID'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
