<div class="customers index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Admin Dashboard'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->



    <div class="row">

        <div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li><?php echo  $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Customers'),'/customers', array('escape' => false)); ?> </li>
                            <li><?php echo  $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Vehicles'),'/vehicles', array('escape' => false)); ?> </li>
                            <li><?php echo  $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Localities'),'/localities', array('escape' => false)); ?> </li>
                            <li><?php echo  $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Owners'),'/owners', array('escape' => false)); ?> </li>
                            <li><?php echo  $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Sessions'),'/tuksessions', array('escape' => false)); ?> </li>
                            <li><?php echo  $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Tags'),'/tags', array('escape' => false)); ?> </li>
                            <li><?php echo  $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Trips'),'/trips', array('escape' => false)); ?> </li>
                            <li><?php echo  $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;SMS'),'/Smsses/add', array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Unprocessed SMS'),'/Smsses' , array('escape' => false)); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Logout'),'/users/logout' , array('escape' => false)); ?></li>

                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->

        <div class="col-md-9">


        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->
