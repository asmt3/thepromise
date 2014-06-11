<div class="agencies view">
<h2><?php echo __('Agency'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($agency['Agency']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($agency['Agency']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($agency['Agency']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($agency['Agency']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Agency'), array('action' => 'edit', $agency['Agency']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Agency'), array('action' => 'delete', $agency['Agency']['id']), array(), __('Are you sure you want to delete # %s?', $agency['Agency']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Agencies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agency'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Investigations'), array('controller' => 'investigations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Investigation'), array('controller' => 'investigations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shelters'), array('controller' => 'shelters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shelter'), array('controller' => 'shelters', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Investigations'); ?></h3>
	<?php if (!empty($agency['Investigation'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Agency Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($agency['Investigation'] as $investigation): ?>
		<tr>
			<td><?php echo $investigation['id']; ?></td>
			<td><?php echo $investigation['created']; ?></td>
			<td><?php echo $investigation['agency_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'investigations', 'action' => 'view', $investigation['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'investigations', 'action' => 'edit', $investigation['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'investigations', 'action' => 'delete', $investigation['id']), array(), __('Are you sure you want to delete # %s?', $investigation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Investigation'), array('controller' => 'investigations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Shelters'); ?></h3>
	<?php if (!empty($agency['Shelter'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Agency Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Lat'); ?></th>
		<th><?php echo __('Lng'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($agency['Shelter'] as $shelter): ?>
		<tr>
			<td><?php echo $shelter['id']; ?></td>
			<td><?php echo $shelter['agency_id']; ?></td>
			<td><?php echo $shelter['name']; ?></td>
			<td><?php echo $shelter['lat']; ?></td>
			<td><?php echo $shelter['lng']; ?></td>
			<td><?php echo $shelter['email']; ?></td>
			<td><?php echo $shelter['phone']; ?></td>
			<td><?php echo $shelter['created']; ?></td>
			<td><?php echo $shelter['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'shelters', 'action' => 'view', $shelter['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'shelters', 'action' => 'edit', $shelter['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'shelters', 'action' => 'delete', $shelter['id']), array(), __('Are you sure you want to delete # %s?', $shelter['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Shelter'), array('controller' => 'shelters', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
