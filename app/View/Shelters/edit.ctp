<?php echo $this->Html->script('shelter-map-editor.js', array('inline' => false)); ?>

<div class="shelters form">
<?php echo $this->Form->create('Shelter'); ?>
	<fieldset>
		<legend><?php echo __('Edit Shelter'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('agency_id');
		echo $this->Form->input('name');
		echo $this->Form->input('address');	
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('free_spaces');
		echo $this->Form->input('capacity');
		echo $this->Form->input('lat', array('type' => 'hidden'));
		echo $this->Form->input('lng', array('type' => 'hidden'));
	?>
	</fieldset>
	<div id="map"></div>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Shelter.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Shelter.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Shelters'), array('action' => 'index')); ?></li>
	</ul>
</div>


