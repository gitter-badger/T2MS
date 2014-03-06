<div class="tuksessions form">
<?php echo $this->Form->create('Tuksession'); ?>
	<fieldset>
		<legend><?php echo __('Add Tuksession'); ?></legend>
	<?php
		echo $this->Form->input('vehicleID');
		echo $this->Form->input('localityID');
		echo $this->Form->input('startTime');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tuksessions'), array('action' => 'index')); ?></li>
	</ul>
</div>
