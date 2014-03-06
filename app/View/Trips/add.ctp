<div class="trips form">
<?php echo $this->Form->create('Trip'); ?>
	<fieldset>
		<legend><?php echo __('Add Trip'); ?></legend>
	<?php
        $localities=array(''=>'Select')+$localities;
		echo $this->Form->input('time');
		echo $this->Form->input('fare');
		echo $this->Form->input('status');
		echo $this->Form->input('startLocation',array('options'=>$localities));
		echo $this->Form->input('endLocation',array('options'=>$localities));
		echo $this->Form->input('vehicleID');
		echo $this->Form->input('customerID');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Trips'), array('action' => 'index')); ?></li>
	</ul>
</div>
