
<div class="sms form">
<?php echo $this->Form->create('Sms'); ?>
	<fieldset>
		<legend><?php echo __('Edit SMS'); ?></legend>
	<?php
		echo $this->Form->input('phone');
		echo $this->Form->input('text');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Dashboard'); ?></h3>
	<ul>
		<li><a href = "customers"> Customers</a> </li>
		<li><a href = "vehicles"> Vehicles</a> </li>
		<li><a href = "localities"> Localities</a> </li>
		<li><a href = "owners"> Owners</a> </li>
		<li><a href = "tags"> Tags</a> </li>
		<li><a href = "trips"> Trips</a> </li>
	</ul>
</div>

