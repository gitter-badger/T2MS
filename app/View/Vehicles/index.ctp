<div class="vehicles index">
	<h2><?php echo __($title); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('driverName'); ?></th>
			<th><?php echo $this->Paginator->sort('driverContact'); ?></th>
			<th><?php echo $this->Paginator->sort('vehicleNum'); ?></th>
			<th><?php echo $this->Paginator->sort('fare'); ?></th>
			<th><?php echo $this->Paginator->sort('owner_name'); ?></th>
                        <th><?php echo $this->Paginator->sort('owner_address'); ?></th>
                        <th><?php echo $this->Paginator->sort('owner_contact'); ?></th>
                        
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($vehicles as $vehicle): ?>
	<tr>
		<td><?php echo h($vehicle['Vehicle']['id']); ?>&nbsp;</td>
		<td><?php echo h($vehicle['Vehicle']['driverName']); ?>&nbsp;</td>
		<td><?php echo h($vehicle['Vehicle']['driverContact']); ?>&nbsp;</td>
		<td><?php echo h($vehicle['Vehicle']['vehicleNum']); ?>&nbsp;</td>
		<td><?php echo h($vehicle['Vehicle']['fare']); ?>&nbsp;</td>
                <td><?php echo h($vehicle['Owner']['name']); ?>&nbsp;</td>
                <td><?php echo h($vehicle['Owner']['address']); ?>&nbsp;</td>
                <td><?php echo h($vehicle['Owner']['contact']); ?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $vehicle['Vehicle']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $vehicle['Vehicle']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $vehicle['Vehicle']['id']), null, __('Are you sure you want to delete # %s?', $vehicle['Vehicle']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Vehicles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('New Vehicle'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Search Vehicles'), array('action' => 'search')); ?></li>
	</ul>
</div>
