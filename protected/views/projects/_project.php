<div>
	<div class="pull-left">
	<p><strong><?php echo CHtml::link(CHtml::encode($data->name),
	$this->createUrl('/projects/tasks', array('id'=>$data->id))); ?></strong></p>
	<p>Due on <?php echo date('m/D/Y',$data->due_date); ?></p>
	<?php if($data->completed): ?>
		Completed
	<?php else: ?>
		<?php if($data->numberOfTasks==0): ?>
			<p>No Tasks</p>
		<?php else: ?>
			<p><?php echo $data->getPercentCompleted(); ?>% Completed</p>
		<?php endif; ?>
	<?php endif; ?>
	</div>
	<div class="pull-right">
		<?php echo CHtml::link(NULL,$this->createUrl('/projects/save', array('id'=>$data->id)),
		array('title'=>'edit','class'=>'glyphicon glyphicon-pencil')); ?>
		<?php echo CHtml::link(NULL,$this->createUrl('/projects/complete', array('id'=>$data->id)),
		array('title'=>$data->completed==1 ? 'uncompleted':'completed','class'=>'glyphicon glyphicon-check')); ?>
		<?php echo CHtml::link(NULL, $this->createUrl('/projects/delete', array('id'=>$data->id)),
		array('title'=>'delete','class'=>'glyphicon glyphicon-remove')); ?>
	</div>
	<div class="clearfix"></div>
	<hr/>
</div>	