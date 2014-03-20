<div class="customers form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Customer'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Customers'), array('action' => 'index'), array('escape' => false)); ?></li>
														</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
				<?php
					echo $this->Form->create('Customer', array('action'=>'index','type'=>'get')); 
					$search=array(2=>'All',1=>'Only Blacklisted',0=>'Not Blacklisted');
					$fare=array('='=>'Equal','>'=>'Greater than','<'=>'Less than');
				?>

				<div class="form-group">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name','required'=>false));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('phone', array('class' => 'form-control', 'placeholder' => 'Phone','required'=>false));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('blacklisted', array('options'=>$search, 'class' => 'form-control', 'placeholder' => 'Blacklisted', 'required'=>false));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('maxFare', array('class' => 'form-control', 'placeholder' => 'MaxFare','required'=>false));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fareSearch',array('options'=>$fare,'required'=>false)); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
