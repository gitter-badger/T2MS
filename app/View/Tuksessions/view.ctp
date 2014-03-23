<div class="tuksessions view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Tuksession'); ?></h1>
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
                            <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp&nbsp;Delete Tuksession', array('action' => 'delete', $tuksession['Tuksession']['vehicleID'],str_replace(':','-',h($tuksession['Tuksession']['startTime']))), array('escape' => false), __('Are you sure you want to delete tuksession of %s?', $tuksession['Vehicle']['vehicleNum'])); ?></li>
                            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Tuksession', array('action' => 'edit', $tuksession['Tuksession']['vehicleID'],str_replace(':','-',h($tuksession['Tuksession']['startTime']))), array('escape' => false)); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Tuksessions'), array('action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Tuksession'), array('action' => 'add'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Vehicles'), array('controller' => 'vehicles', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Vehicle'), array('controller' => 'vehicles', 'action' => 'add'), array('escape' => false)); ?> </li>
                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->

        <div class="col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                <tr>
                    <th><?php echo __('Vehicle'); ?></th>
                    <td>
                        <?php echo $this->Html->link($tuksession['Vehicle']['vehicleNum'], array('controller' => 'vehicles', 'action' => 'view', $tuksession['Vehicle']['id'])); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <th><?php echo __('LocalityID'); ?></th>
                    <td>
                        <?php echo $this->Html->link($tuksession['Locality']['name'], array('controller' => 'localities', 'action' => 'view', $tuksession['Locality']['id'])); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <th><?php echo __('StartTime'); ?></th>
                    <td>
                        <?php echo h($tuksession['Tuksession']['startTime']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <th><?php echo __('EndTime'); ?></th>
                    <td>
                        <?php echo h($tuksession['Tuksession']['endTime']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <th><?php echo __('Status'); ?></th>
                    <td>
                        <?php if($tuksession['Tuksession']['status']==null) echo 'On a Trip'; else echo 'Not on a trip'; ?>
                        &nbsp;
                    </td>
                </tr>
                </tbody>
            </table>

        </div><!-- end col md 9 -->

    </div>
</div>

