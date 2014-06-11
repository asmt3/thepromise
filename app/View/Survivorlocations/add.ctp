<div class="survivorlocations form">
<?php echo $this->Form->create('Survivorlocation'); ?>
	<fieldset>
		<legend><?php echo __('Add Survivorlocation'); ?></legend>
	<?php
		echo $this->Form->input('investigation_id');
		echo $this->Form->input('lat');
		echo $this->Form->input('lng');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Survivorlocations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Investigations'), array('controller' => 'investigations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Investigation'), array('controller' => 'investigations', 'action' => 'add')); ?> </li>
	</ul>
</div>
