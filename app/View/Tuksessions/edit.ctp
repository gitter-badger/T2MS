<div class="tuksessions form">
<?php echo $this->Form->create('Tuksession'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tuksession'); ?></legend>
	<?php
		echo $this->Form->input('vehicleID',array('disabled' => 'disabled'));
		echo $this->Form->input('startTime',array('disabled' => 'disabled'));
        echo $this->Form->input('localityID');
		echo $this->Form->input('endTime');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tuksession.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Tuksession.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tuksessions'), array('action' => 'index')); ?></li>
	</ul>
</div>
