<div class="investigations index">
	<h2><?php echo __('Investigations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th>Most Recent Message</th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($investigations as $investigation): ?>
	<tr>
		<td><?php echo h($investigation['Investigation']['id']); ?>&nbsp;</td>
		<td><?php echo h($investigation['Investigation']['name']); ?>&nbsp;</td>
		<td><?php echo h($investigation['Investigation']['description']); ?>&nbsp;</td>
		<td><?php echo h($investigation['Message'][0]['content']); ?>&nbsp;</td>
		<td><?php echo h($investigation['Investigation']['status']); ?>&nbsp;</td>
		<td><?php echo h($investigation['Investigation']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $investigation['Investigation']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Investigation'), array('action' => 'add')); ?></li>
		
	</ul>
</div>
