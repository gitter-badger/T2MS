<div class="tuksessions form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Tuksession'); ?></h1>
			</div>
		</div>
	</div>
    <?php
        $localities=array(''=>'Select')+$localities;
        $vehicles=array(''=>'Select')+$vehicles;
    ?>


	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Tuksessions'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Vehicles'), array('controller' => 'vehicles', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Vehicle'), array('controller' => 'vehicles', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Tuksession', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('vehicleID', array('options'=>$vehicles,'class' => 'form-control', 'placeholder' => 'VehicleID'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('localityID', array('options'=>$localities,'class' => 'form-control', 'placeholder' => 'LocalityID'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('startTime', array('class' => 'form-control', 'placeholder' => 'StartTime'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('endTime', array('class' => 'form-control', 'placeholder' => 'EndTime'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
