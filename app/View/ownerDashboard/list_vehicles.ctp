<div class="vehicles index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo 'Vehicles'; ?></h1>
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
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Vehicle'), array('action' => 'add'), array('escape' => false)); ?></li>
                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->

        <div class="col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                <tr>
                    <th><?php echo ("Driver name"); ?></th>
                    <th><?php echo ("Driver Contact"); ?></th>
                    <th><?php echo ("Vehicle Num"); ?></th>
                    <th><?php echo ("Fare"); ?></th>
                    <th><?php echo ("Owner Name"); ?></th>
                    <th><?php echo ("Owner Address"); ?></th>
                    <th><?php echo ("Owner Contact"); ?></th>
                    <th class="actions"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($vehicles as $vehicle): ?>
                    <tr>
                        <td><?php echo h($vehicle['Vehicle']['driverName']); ?>&nbsp;</td>
                        <td><?php echo h($vehicle['Vehicle']['driverContact']); ?>&nbsp;</td>
                        <td><?php echo h($vehicle['Vehicle']['vehicleNum']); ?>&nbsp;</td>
                        <td><?php echo h($vehicle['Vehicle']['fare']); ?>&nbsp;</td>
                        <td><?php echo h($vehicle['Owner']['name']); ?>&nbsp;</td>
                        <td><?php echo h($vehicle['Owner']['address']); ?>&nbsp;</td>
                        <td><?php echo h($vehicle['Owner']['contact']); ?>&nbsp;</td>

                        <td class="actions">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $vehicle['Vehicle']['id']), array('escape' => false)); ?>
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $vehicle['Vehicle']['id']), array('escape' => false)); ?>
                            <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $vehicle['Vehicle']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $vehicle['Vehicle']['id'])); ?>


                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>



        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->
