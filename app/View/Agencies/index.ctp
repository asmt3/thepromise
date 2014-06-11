<div class="agencies index">
	<h2><?php echo __('Agencies'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($agencies as $agency): ?>
	<tr>
		<td><?php echo h($agency['Agency']['id']); ?>&nbsp;</td>
		<td><?php echo h($agency['Agency']['name']); ?>&nbsp;</td>
		<td><?php echo h($agency['Agency']['created']); ?>&nbsp;</td>
		<td><?php echo h($agency['Agency']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $agency['Agency']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $agency['Agency']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $agency['Agency']['id']), array(), __('Are you sure you want to delete # %s?', $agency['Agency']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Agency'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Investigations'), array('controller' => 'investigations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Investigation'), array('controller' => 'investigations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shelters'), array('controller' => 'shelters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shelter'), array('controller' => 'shelters', 'action' => 'add')); ?> </li>
	</ul>
</div>
