<div class="agencies form">
<?php echo $this->Form->create('Agency'); ?>
	<fieldset>
		<legend><?php echo __('Edit Agency'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Agency.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Agency.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Agencies'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Investigations'), array('controller' => 'investigations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Investigation'), array('controller' => 'investigations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shelters'), array('controller' => 'shelters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shelter'), array('controller' => 'shelters', 'action' => 'add')); ?> </li>
	</ul>
</div>


