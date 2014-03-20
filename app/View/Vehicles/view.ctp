<div class="vehicles view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Vehicle'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Vehicle'), array('action' => 'edit', $vehicle['Vehicle']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Vehicle'), array('action' => 'delete', $vehicle['Vehicle']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $vehicle['Vehicle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Vehicles'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Vehicle'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Owners'), array('controller' => 'owners', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Owner'), array('controller' => 'owners', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Trips'), array('controller' => 'trips', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Trip'), array('controller' => 'trips', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Tuksessions'), array('controller' => 'tuksessions', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Tuksession'), array('controller' => 'tuksessions', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($vehicle['Vehicle']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('DriverName'); ?></th>
		<td>
			<?php echo h($vehicle['Vehicle']['driverName']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('DriverContact'); ?></th>
		<td>
			<?php echo h($vehicle['Vehicle']['driverContact']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('VehicleNum'); ?></th>
		<td>
			<?php echo h($vehicle['Vehicle']['vehicleNum']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Fare'); ?></th>
		<td>
			<?php echo h($vehicle['Vehicle']['fare']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Owner'); ?></th>
		<td>
			<?php echo $this->Html->link($vehicle['Owner']['name'], array('controller' => 'owners', 'action' => 'view', $vehicle['Owner']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>


		</div><!-- end col md 9 -->
        <div class="col-md-9">
            <h3><?php echo __('Related Trips'); ?></h3>
            <?php if (!empty($vehicle['Trip'])): ?>
                <table cellpadding = "0" cellspacing = "0" class="table table-striped">
                    <thead>
                    <tr>
                        <th><?php echo __('Id'); ?></th>
                        <th><?php echo __('Time'); ?></th>
                        <th><?php echo __('Fare'); ?></th>
                        <th><?php echo __('Status'); ?></th>
                        <th><?php echo __('StartLocation'); ?></th>
                        <th><?php echo __('EndLocation'); ?></th>
                        <th><?php echo __('VehicleID'); ?></th>
                        <th><?php echo __('CustomerID'); ?></th>
                        <th class="actions"></th>
                    </tr>
                    <thead>
                    <tbody>
                    <?php foreach ($vehicle['Trip'] as $trip): ?>
                        <tr>
                            <td><?php echo $trip['id']; ?></td>
                            <td><?php echo $trip['time']; ?></td>
                            <td><?php echo $trip['fare']; ?></td>
                            <td><?php echo $trip['status']; ?></td>
                            <td><?php echo $trip['startLocation']; ?></td>
                            <td><?php echo $trip['endLocation']; ?></td>
                            <td><?php echo $trip['vehicleID']; ?></td>
                            <td><?php echo $trip['customerID']; ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'trips', 'action' => 'view', $trip['id']), array('escape' => false)); ?>
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'trips', 'action' => 'edit', $trip['id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'trips', 'action' => 'delete', $trip['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $trip['id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

            <div class="actions">
                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Trip'), array('controller' => 'trips', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>
            </div>
        </div><!-- end col md 12 -->

        <div class="col-md-9">
            <h3><?php echo __('Related Tuksessions'); ?></h3>
            <?php if (!empty($vehicle['Tuksession'])): ?>
                <table cellpadding = "0" cellspacing = "0" class="table table-striped">
                    <thead>
                    <tr>
                        <th><?php echo __('VehicleID'); ?></th>
                        <th><?php echo __('LocalityID'); ?></th>
                        <th><?php echo __('StartTime'); ?></th>
                        <th><?php echo __('EndTime'); ?></th>
                        <th class="actions"></th>
                    </tr>
                    <thead>
                    <tbody>
                    <?php foreach ($vehicle['Tuksession'] as $tuksession): ?>
                        <tr>
                            <td><?php echo $this->Html->link(__($tuksession['Vehicle']['vehicleNum']), array('controller'=>'vehicles','action' => 'view',$tuksession['vehicleID']), array('escape' => false)); ?></td>
                            <td><?php echo $tuksession['localityID']; ?></td>
                            <td><?php echo $tuksession['startTime']; ?></td>
                            <td><?php echo $tuksession['endTime']; ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'tuksessions', 'action' => 'view',  $tuksession['vehicleID'],str_replace(':','-',h($tuksession['startTime']))), array('escape' => false)); ?>
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'tuksessions', 'action' => 'edit',  $tuksession['vehicleID'],str_replace(':','-',h($tuksession['startTime']))), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'tuksessions', 'action' => 'delete',  $tuksession['vehicleID'],str_replace(':','-',h($tuksession['startTime']))), array('escape' => false), __('Are you sure you want to delete session of vehicle # %s?', $tuksession['vehicleID'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

            <div class="actions">
                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Tuksession'), array('controller' => 'tuksessions', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>
            </div>
        </div><!-- end col md 12 -->

	</div>
</div>


