<div class="vehicles view">
<h2><?php echo __('Vehicle'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DriverName'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['driverName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DriverContact'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['driverContact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('VehicleNum'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['vehicleNum']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fare'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['fare']); ?>
			&nbsp;
		</dd>
		<dt>&nbsp;
		</dt>
		<dt><?php echo $this->Html->link('OwnerDetails','/owners/view/'.$vehicle['Owner']['id']); ?></dt>
		<dt><?php echo __('OwnerName'); ?></dt>
		<dd>
			<?php echo h($vehicle['Owner']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('OwnerContact'); ?></dt>
		<dd>
			<?php echo h($vehicle['Owner']['contact']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Vehicle'), array('action' => 'edit', $vehicle['Vehicle']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Vehicle'), array('action' => 'delete', $vehicle['Vehicle']['id']), null, __('Are you sure you want to delete # %s?', $vehicle['Vehicle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Vehicles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vehicle'), array('action' => 'add')); ?> </li>
		<li><?php echo  $this->Html->link('Logout','/users/logout'); ?> </li>
	</ul>
</div>
