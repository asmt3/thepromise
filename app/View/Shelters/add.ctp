<?php echo $this->Html->script('shelter-map-editor.js', array('inline' => false)); ?>

<div class="shelters form">
<?php echo $this->Form->create('Shelter'); ?>
	<fieldset>
		<legend><?php echo __('Add Shelter'); ?></legend>
	<?php
		echo $this->Form->input('agency_id');
		echo $this->Form->input('name', array('type' => 'text'));
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('lat', array('type1' => 'hidden'));
		echo $this->Form->input('lng', array('type1' => 'hidden'));
	?>
	</fieldset>
	<div id="map">

	</div>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Shelters'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Agencies'), array('controller' => 'agencies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agency'), array('controller' => 'agencies', 'action' => 'add')); ?> </li>
	</ul>
</div>

