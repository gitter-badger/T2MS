<div class="trips view">
<h2><?php echo __('Trip'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($trip['Trip']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time'); ?></dt>
		<dd>
			<?php echo h($trip['Trip']['time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fare'); ?></dt>
		<dd>
			<?php echo h($trip['Trip']['fare']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($trip['Trip']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LocalityID'); ?></dt>
		<dd>
			<?php echo h($trip['Trip']['localityID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('VehicleID'); ?></dt>
		<dd>
			<?php echo h($trip['Trip']['vehicleID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CustomerID'); ?></dt>
		<dd>
			<?php echo h($trip['Trip']['customerID']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Trip'), array('action' => 'edit', $trip['Trip']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Trip'), array('action' => 'delete', $trip['Trip']['id']), null, __('Are you sure you want to delete # %s?', $trip['Trip']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Trips'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trip'), array('action' => 'add')); ?> </li>
	</ul>
</div>
