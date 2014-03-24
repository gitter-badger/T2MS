<div class="customers index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Welcome to T2MS'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->



    <div class="row">

        <div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Tuk Tuk Management System - T2MS</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <?php
                                if(!$this->Session->check('userid')){
                            ?>
                                <?php echo $this->Form->create('user', array('controller'=>'user','action'=>'login','role' => 'form')); ?>

                                <div class="form-group">
                                    <?php echo $this->Form->input('contact', array('class' => 'form-control', 'placeholder' => 'Phone Number'));?>
                                </div>
                                <div class="form-group">
                                    <?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Password'));?>
                                </div>
                                <div class="form-group">
                                    <?php echo $this->Form->submit(__('Login'), array('class' => 'btn btn-default')); ?>
                                </div>


                                <?php echo $this->Form->end() ?>
                                    <?php echo $this->Html->link(__('&nbsp;&nbsp;Sign up'), array('controller'=>'users','action' => 'add'), array('escape' => false)); ?>


                                <?php }?>
                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->

        <div class="col-md-9">
            <?php
            echo $this->Html->image('tuk.jpg', array('alt' => 'T2MS'));
            ?>

        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->



