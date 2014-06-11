<?php $this->Html->script('investigations/view', array('inline' => false));?>
<div class="investigations view">
<h2><?php echo __('Investigation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($investigation['Investigation']['id']); ?>
			&nbsp;
		</dd><!-- 
		<dt><?php echo __('Agency'); ?></dt>
		<dd>
			<?php echo h($investigation['Agency']['name']); ?>
			&nbsp;
		</dd> -->
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($investigation['Investigation']['name']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($investigation['Investigation']['phone']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($investigation['Investigation']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($investigation['Investigation']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($investigation['Investigation']['created']); ?>
			&nbsp;
		</dd>
	</dl>

	<div class="tabs">
	  <ul>
	    <li><a href="#tabs-0">Find shelter</a></li>
	    <li><a href="#tabs-1">Record Location</a></li>
	    <li><a href="#tabs-2">Send Text</a></li>
	    <li><a href="#tabs-3">Refer to shelter</a></li>
	  </ul>
	  <div id="tabs-0">
	    <input id="query-search-shelters" value="">
	    <input type="button" id="btn-search-shelters" value="Search for shelters">
	  	<div class="shelter-map" id="shelter-map"></div>

	  </div>
	  <div id="tabs-1">
	    <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
	  </div>
	  <div id="tabs-2">
	    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
	  </div>
	  <div id="tabs-3">
	    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
	    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
	  </div>
	</div>


	<div class="related">
		<h3><?php echo __('Case History'); ?></h3>

		<textarea id="history"></textarea>
		<?php echo $this->Html->link(__('Save note'), array('controller' => 'histories', 'action' => 'view', 1)); ?>


		<?php if (!empty($investigation['History'])): ?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Note'); ?></th>
			<th><?php echo __('Created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($investigation['History'] as $history): ?>
			<tr>
				<td><?php echo $history['content']; ?></td>
				<td><?php echo $history['created']; ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'histories', 'action' => 'view', $history['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'histories', 'action' => 'edit', $history['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'histories', 'action' => 'delete', $history['id']), array(), __('Are you sure you want to delete # %s?', $history['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('New History'), array('controller' => 'histories', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
	


</div>
<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Close Case'), array('controller' => 'investitgations', 'action' => 'close')); ?> </li>
			</ul>
		</div>