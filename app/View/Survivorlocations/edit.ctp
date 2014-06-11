<div class="survivorlocations form">
<?php echo $this->Form->create('Survivorlocation'); ?>
	<fieldset>
		<legend><?php echo __('Edit Survivorlocation'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Survivorlocation.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Survivorlocation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Survivorlocations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Investigations'), array('controller' => 'investigations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Investigation'), array('controller' => 'investigations', 'action' => 'add')); ?> </li>
	</ul>
</div>
