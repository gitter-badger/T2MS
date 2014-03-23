<div class="customers form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('SMS'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
		
			<?php echo $this->Form->create('Smss',array('type'=>'get','role' => 'form')); ?>

				<div class="form-group">
				
					<?php echo $this->Form->input('phone', array('class' => 'form-control', 'placeholder' => 'Phone'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('text', array('rows'=>5,'class' => 'form-control', 'placeholder' => 'Text'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>


	</div><!-- end row -->
</div>
