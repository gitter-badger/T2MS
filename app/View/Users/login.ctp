<div class="users form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Log in'); ?></h1>
            </div>
        </div>
    </div>



    <div class="row">

        <?php echo $this->Form->create('user',array('role' => 'form')); ?>

        <div class="form-group">

            <?php echo $this->Form->input('contact', array('class' => 'form-control', 'placeholder' => 'Phone'));?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('password', array('rows'=>5,'class' => 'form-control', 'placeholder' => 'Password'));?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
        </div>

        <?php echo $this->Form->end() ?>


    </div><!-- end row -->
</div>
