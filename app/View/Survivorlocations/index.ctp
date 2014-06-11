<div class="survivorlocations index">
	<h2><?php echo __('Survivorlocations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('investigation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('lat'); ?></th>
			<th><?php echo $this->Paginator->sort('lng'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($survivorlocations as $survivorlocation): ?>
	<tr>
		<td><?php echo h($survivorlocation['Survivorlocation']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($survivorlocation['Investigation']['name'], array('controller' => 'investigations', 'action' => 'view', $survivorlocation['Investigation']['id'])); ?>
		</td>
		<td><?php echo h($survivorlocation['Survivorlocation']['lat']); ?>&nbsp;</td>
		<td><?php echo h($survivorlocation['Survivorlocation']['lng']); ?>&nbsp;</td>
		<td><?php echo h($survivorlocation['Survivorlocation']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $survivorlocation['Survivorlocation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $survivorlocation['Survivorlocation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $survivorlocation['Survivorlocation']['id']), array(), __('Are you sure you want to delete # %s?', $survivorlocation['Survivorlocation']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Survivorlocation'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Investigations'), array('controller' => 'investigations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Investigation'), array('controller' => 'investigations', 'action' => 'add')); ?> </li>
	</ul>
</div>
