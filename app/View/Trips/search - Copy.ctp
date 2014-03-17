<div class="locality form">
<?php echo $this->Form->create('Locality',array('action'=>'index','type'=>'get')); ?>
	<fieldset>
		<legend><?php echo __('Add Locality'); ?></legend>
	<?php
		$localities=array(''=>'Select')+$localities;
                $customers=array(''=>'Select')+$customers;
                $vehicles=array(''=>'Select')+$vehicles;
		
		echo $this->Form->input('fare',array('required'=>false));
		echo $this->Form->input('status',array('required'=>false));
                echo $this->Form->input('startLocation',array('options'=>$localities,'required'=>false));
                echo $this->Form->input('endLocation',array('options'=>$localities,'required'=>false));
		echo $this->Form->input('vehicleID',array('options'=>$vehicles,'required'=>false));
                echo $this->Form->input('customerID',array('options'=>$customers,'required'=>false));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'),array('action' => 'index')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Localities'), array('action' => 'index')); ?></li>
	</ul>
</div>
