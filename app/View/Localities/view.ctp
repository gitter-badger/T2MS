<div class="localities view">
    <?php
//    echo json_encode($locality);
    ?>
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Locality'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Locality'), array('action' => 'edit', $locality['Locality']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Locality'), array('action' => 'delete', $locality['Locality']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $locality['Locality']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Localities'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Locality'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Tags'), array('controller' => 'tags', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Tag'), array('controller' => 'tags', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($locality['Locality']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($locality['Locality']['name']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>
            <div class="col-md-12">
                <h3><?php echo __('Related Tags'); ?></h3>
                <?php if (!empty($locality['Tag'])): ?>
                    <table cellpadding = "0" cellspacing = "0" class="table table-striped">
                        <thead>
                        <tr>
                            <th><?php echo __('Tag'); ?></th>
                            <th class="actions"></th>
                        </tr>
                        <thead>
                        <tbody>
                        <?php  foreach ($locality['Tag'] as $tag): ?>
                            <tr>
                                <td><?php echo $tag['tag']; ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'tags', 'action' => 'view', $tag['tag'],$tag['locality_id']), array('escape' => false)); ?>
                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'tags', 'action' => 'edit', $tag['tag'],$tag['locality_id']), array('escape' => false)); ?>
                                    <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'tags', 'action' => 'delete',$tag['tag'],$tag['locality_id']), array('escape' => false), __('Are you sure you want to delete tag %s?', $tag['tag'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>

                <div class="actions">
                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Tag'), array('controller' => 'tags', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>
                </div>
            </div><!-- end col md 12 -->

            <div class="col-md-12">
                <h3><?php echo __('Related Trips'); ?></h3>
                <?php if (!empty($locality['Trip'])): ?>
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
                        <?php foreach ($locality['Trip'] as $trip): ?>
                            <tr>
                                <td><?php echo $trip['id']; ?></td>
                                <td><?php echo $trip['time']; ?></td>
                                <td><?php echo $trip['fare']; ?></td>
                                <td><?php echo $trip['status']; ?></td>
                                <td><?php echo $trip['StartLocality']['name']; ?></td>
                                <td><?php echo $trip['EndLocality']['name']; ?></td>
                                <td><?php echo $trip['Vehicle']['vehicleNum']; ?></td>
                                <td><?php echo $trip['Customer']['name']; ?></td>
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

            <div class="col-md-12">
                <h3><?php echo __('Related Active Tuksessions'); ?></h3>
                <?php if (!empty($locality['Tuksession'])): ?>
                    <table cellpadding = "0" cellspacing = "0" class="table table-striped">
                        <thead>
                        <tr>
                            <th><?php echo __('VehicleID'); ?></th>
                            <th><?php echo __('StartTime'); ?></th>
                            <th><?php echo __('EndTime'); ?></th>
                            <th><?php echo __('Status'); ?></th>
                            <th class="actions"></th>
                        </tr>
                        <thead>
                        <tbody>
                        <?php foreach ($locality['Tuksession'] as $tuksession): if($tuksession['endTime']==null){ ?>
                            <tr>
                                <td><?php echo $tuksession['Vehicle']['vehicleNum']; ?></td>
                                <td><?php echo $tuksession['startTime']; ?></td>
                                <td><?php echo $tuksession['endTime']; ?></td>
                                <td><?php if($tuksession['status']==null) echo 'Not on a trip'; else{echo 'On a trip';} ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('action' => 'view', $tuksession['vehicleID'],str_replace(':','-',h($tuksession['startTime']))), array('escape' => false)); ?>
                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('action' => 'edit', $tuksession['vehicleID'],str_replace(':','-',h($tuksession['startTime']))), array('escape' => false)); ?>
                                    <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('action' => 'delete', $tuksession['vehicleID'],str_replace(':','-',h($tuksession['startTime']))), array('escape' => false), __('Are you sure you want to delete tuksession of %s?', $tuksession['Vehicle']['vehicleNum'])); ?>

                                </td>
                            </tr>
                        <?php } endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                <div class="actions">
                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Tuksession'), array('controller' => 'tuksessions', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>
                </div>
            </div><!-- end col md 9 -->
            <div class="col-md-12">
                <h3><?php echo __('Related Non-Active Tuksessions'); ?></h3>
                <?php if (!empty($locality['Tuksession'])): ?>
                    <table cellpadding = "0" cellspacing = "0" class="table table-striped">
                        <thead>
                        <tr>
                            <th><?php echo __('VehicleID'); ?></th>
                            <th><?php echo __('StartTime'); ?></th>
                            <th><?php echo __('EndTime'); ?></th>
                            <th class="actions"></th>
                        </tr>
                        <thead>
                        <tbody>
                        <?php foreach ($locality['Tuksession'] as $tuksession):if($tuksession['endTime']!=null){ ?>
                            <tr>
                                <td><?php echo $tuksession['Vehicle']['vehicleNum']; ?></td>
                                <td><?php echo $tuksession['startTime']; ?></td>
                                <td><?php echo $tuksession['endTime']; ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('action' => 'view', $tuksession['vehicleID'],str_replace(':','-',h($tuksession['startTime']))), array('escape' => false)); ?>
                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('action' => 'edit', $tuksession['vehicleID'],str_replace(':','-',h($tuksession['startTime']))), array('escape' => false)); ?>
                                    <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('action' => 'delete', $tuksession['vehicleID'],str_replace(':','-',h($tuksession['startTime']))), array('escape' => false), __('Are you sure you want to delete tuksession of %s?', $tuksession['Vehicle']['vehicleNum'])); ?>

                                </td>
                            </tr>
                        <?php } endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                <div class="actions">
                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Tuksession'), array('controller' => 'tuksessions', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>
                </div>
            </div><!-- end col md 9 -->


        </div>


