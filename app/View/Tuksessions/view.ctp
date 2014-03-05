<div class="tuksessions view">
<h2><?php echo __('Tuksession'); ?></h2>
	<dl>
		<dt><?php echo __('VehicleID'); ?></dt>
		<dd>
			<?php echo h($tuksession['Tuksession']['vehicleID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LocalityID'); ?></dt>
		<dd>
			<?php echo h($tuksession['Tuksession']['localityID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('StartTime'); ?></dt>
		<dd>
			<?php echo h($tuksession['Tuksession']['startTime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('EndTime'); ?></dt>
		<dd>
			<?php echo h($tuksession['Tuksession']['endTime']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tuksession'), array('action' => 'edit', $tuksession['Tuksession']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tuksession'), array('action' => 'delete', $tuksession['Tuksession']['id']), null, __('Are you sure you want to delete # %s?', $tuksession['Tuksession']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tuksessions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tuksession'), array('action' => 'add')); ?> </li>
	</ul>
</div>
