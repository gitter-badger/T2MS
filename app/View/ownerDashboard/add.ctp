<div class="vehicles form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Vehicle'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Vehicles'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Owners'), array('controller' => 'owners', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Owner'), array('controller' => 'owners', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Vehicle', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('driverName', array('class' => 'form-control', 'rows'=>1,'placeholder' => 'DriverName'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('driverContact', array('class' => 'form-control', 'placeholder' => 'DriverContact'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('vehicleNum', array('class' => 'form-control', 'rows'=>1,'placeholder' => 'VehicleNum'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fare', array('class' => 'form-control', 'placeholder' => 'Fare'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('ownerID', array('class' => 'form-control','options'=>$owners, 'placeholder' => 'OwnerID'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
