<div class="survivorlocations view">
<h2><?php echo __('Survivorlocation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($survivorlocation['Survivorlocation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Investigation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($survivorlocation['Investigation']['name'], array('controller' => 'investigations', 'action' => 'view', $survivorlocation['Investigation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lat'); ?></dt>
		<dd>
			<?php echo h($survivorlocation['Survivorlocation']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lng'); ?></dt>
		<dd>
			<?php echo h($survivorlocation['Survivorlocation']['lng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($survivorlocation['Survivorlocation']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Survivorlocation'), array('action' => 'edit', $survivorlocation['Survivorlocation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Survivorlocation'), array('action' => 'delete', $survivorlocation['Survivorlocation']['id']), array(), __('Are you sure you want to delete # %s?', $survivorlocation['Survivorlocation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Survivorlocations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survivorlocation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Investigations'), array('controller' => 'investigations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Investigation'), array('controller' => 'investigations', 'action' => 'add')); ?> </li>
	</ul>
</div>
