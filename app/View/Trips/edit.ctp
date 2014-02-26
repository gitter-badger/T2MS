<div class="trips form">
<?php echo $this->Form->create('Trip'); ?>
	<fieldset>
		<legend><?php echo __('Edit Trip'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('time');
		echo $this->Form->input('fare');
		echo $this->Form->input('status');
		echo $this->Form->input('localityID');
		echo $this->Form->input('vehicleID');
		echo $this->Form->input('customerID');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Trip.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Trip.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Trips'), array('action' => 'index')); ?></li>
	</ul>
</div>
