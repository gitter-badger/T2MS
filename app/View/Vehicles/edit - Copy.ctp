<div class="vehicles form">
<?php echo $this->Form->create('Vehicle');?>
	<fieldset>
		<legend><?php echo __('Edit Vehicle'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('driverName',array('rows'=>1));
		echo $this->Form->input('driverContact');
		echo $this->Form->input('vehicleNum',array('rows'=>1));
		echo $this->Form->input('fare');
		echo $this->Form->input('ownerID',array('options'=>$owners));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Vehicle.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Vehicle.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Vehicles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Search Vehicles'), array('action' => 'search')); ?></li>
	</ul>
</div>
