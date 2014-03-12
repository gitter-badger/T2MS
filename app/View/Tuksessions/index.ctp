<div class="tuksessions index">
	<h2><?php echo __('Tuksessions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('vehicleID'); ?></th>
			<th><?php echo $this->Paginator->sort('localityID'); ?></th>
			<th><?php echo $this->Paginator->sort('startTime'); ?></th>
			<th><?php echo $this->Paginator->sort('endTime'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tuksessions as $tuksession): ?>
	<tr>
		<td><?php echo h($tuksession['Tuksession']['vehicleID']); ?>&nbsp;</td>
		<td><?php echo h($tuksession['Tuksession']['localityID']); ?>&nbsp;</td>
		<td><?php echo h($tuksession['Tuksession']['startTime']); ?>&nbsp;</td>
		<td><?php echo h($tuksession['Tuksession']['endTime']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit',$tuksession['Tuksession']['vehicleID'],str_replace(':','-',h($tuksession['Tuksession']['startTime'])))); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete',$tuksession['Tuksession']['vehicleID'],str_replace(':','-',h($tuksession['Tuksession']['startTime']))), null, __('Are you sure you want to delete the trip of vehicle %s?', $tuksession['Tuksession']['vehicleID'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tuksession'), array('action' => 'add')); ?></li>
	</ul>
</div>
