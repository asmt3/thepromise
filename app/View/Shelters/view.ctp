<div class="shelters view">
<h2><?php echo __('Shelter'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($shelter['Shelter']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Agency'); ?></dt>
		<dd>
			<?php echo $this->Html->link($shelter['Agency']['name'], array('controller' => 'agencies', 'action' => 'view', $shelter['Agency']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($shelter['Shelter']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lat'); ?></dt>
		<dd>
			<?php echo h($shelter['Shelter']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lng'); ?></dt>
		<dd>
			<?php echo h($shelter['Shelter']['lng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($shelter['Shelter']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($shelter['Shelter']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($shelter['Shelter']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($shelter['Shelter']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Shelter'), array('action' => 'edit', $shelter['Shelter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Shelter'), array('action' => 'delete', $shelter['Shelter']['id']), array(), __('Are you sure you want to delete # %s?', $shelter['Shelter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Shelters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shelter'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Agencies'), array('controller' => 'agencies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agency'), array('controller' => 'agencies', 'action' => 'add')); ?> </li>
	</ul>
</div>
