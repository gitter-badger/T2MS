<div class="customers form">
<?php echo $this->Form->create('Customer', array('action'=>'index','type'=>'get')); ?>
	<fieldset>
		<legend><?php echo __('Search Customer'); ?></legend>
	<?php
		$search=array(2=>'All',1=>'Only Blacklisted',0=>'Not Blacklisted');
		$fare=array('='=>'Equal','>'=>'Greater than','<'=>'Less than');
		
		echo $this->Form->input('name', array('rows'=>1,'required'=>false));
		echo $this->Form->input('phone', array('required'=>false));
		echo $this->Form->input('blacklisted', array('options'=>$search, 'required'=>false));
		echo $this->Form->input('maxFare', array('required'=>false));
		echo $this->Form->input('fareSearch',array('options'=>$fare,'required'=>false));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Customers'), array('action' => 'index')); ?></li>
	</ul>
</div>
