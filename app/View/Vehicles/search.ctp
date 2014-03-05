<div class="vehicles form">
<?php echo $this->Form->create('Vehicle',array('action'=>'index','type'=>'get')); ?>
	<fieldset>
		<legend><?php echo __('Add Vehicle'); ?></legend>
	<?php
		$owners=array(''=>'Select')+$owners;
		$search=array('='=>'Equal','>'=>'Greater than','<'=>'Less than');
		
		echo $this->Form->input('driverName',array('rows'=>1,'required'=>false));
		echo $this->Form->input('driverContact',array('required'=>false));
		echo $this->Form->input('vehicleNum',array('rows'=>1,'required'=>false));
		echo $this->Form->input('fare',array('required'=>false));
		echo $this->Form->input('fareSearch',array('options'=>$search,'required'=>false));
		echo $this->Form->input('ownerID',array('options'=>$owners,'required'=>false));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'),array('action' => 'index')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Vehicles'), array('action' => 'index')); ?></li>
	</ul>
</div>
