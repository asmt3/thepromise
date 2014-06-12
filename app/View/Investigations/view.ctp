<?php $this->Html->script('investigations/view', array('inline' => false));?>
<?php $this->Html->script('investigations/view.text-survivor', array('inline' => false));?>
<?php $this->Html->script('investigations/view.shelter-search', array('inline' => false));?>
<?php $this->Html->script('investigations/view.record-location', array('inline' => false));?>
<?php $this->Html->script('investigations/view.addNote', array('inline' => false));?>

<script type="text/javascript">
var investigation_id = <?php echo $investigation['Investigation']['id']; ?>;
</script>
<div class="investigations view">
<h2><?php echo __('Case'); ?></h2>
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

	<div class="tabs" id="survivor-process">
	  <ul>
	  	<li><a href="#tabs-1">Find shelter</a></li>
	  	<li><a href="#tabs-0">Record Location</a></li>
	  </ul>

	  <div id="tabs-0">
		<div class="map" id="survivor-location-map"></div>
		<input id="survivor-location-map-lat" type="hidden">
		<input id="survivor-location-map-lng" type="hidden">
	  	<div id="survivor-location-map-controls">
	  		<input id="survivor-location-map-save" type="button" value="Save">
			<input id="survivor-location-map-clear" type="button" value="Clear">
	  	</div>
	  </div>


	  <div id="tabs-1">
	    <input id="query-search-shelters" value="بانياس" placeholder="Enter an address">
	    <input type="button" id="btn-search-shelters" value="Search for shelters">
	  	<div class="shelter-map" id="shelter-map"></div>

	  </div>
	  
	</div>


	<div class="related">
		<h3><?php echo __('Case History'); ?></h3>


		<div class="tabs">
	  <ul>
	    <li><a href="#tabs-0">Add note to case</a></li>
	    <li><a href="#tabs-1">Send text to survivor</a></li>
	  </ul>
	  <div id="tabs-0">
	    <textarea id="note-content"></textarea>
	    <input type="button" id="btn-add-note" value="Add note">

	  </div>
	  <div id="tabs-1">
	  	<label>Destination Number</label>
		<input id="text-number" value="<?php echo $investigation['Message'][0]['from']?>" placeholder="Destination Number">
		<label>Your Message</label>
		<textarea id="text-content"></textarea>
	    <input type="button" id="btn-text-survivor" value="Add note">
	  </div>
	  
	</div>

		


		<?php if (!empty($investigation['History'])): ?>
		<table cellpadding = "0" cellspacing = "0" class="history">
		<tr>
			<th width="10%"><?php echo __('Type'); ?></th>
			<th><?php echo __('Note'); ?></th>
			<th width="30%"><?php echo __('Created'); ?></th>
		</tr>
		<?php foreach ($investigation['History'] as $history): ?>
			<tr>
				<td><?php echo $history['type']; ?></td>
				<td><?php echo $history['content']; ?></td>
				<td><?php echo $this->Time->nice($history['created']); ?></td>
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


<div id="shelter-info-template">
	<div class="shelter-info-template">
		<table>
			<tr class="name">
				<th>
					Name
				</th>
				<td>
					
				</td>
			</tr>


			<tr class="capacity">
				<th>
					Capacity
				</th>
				<td>
					X/Y
				</td>
			</tr>

			<tr class="address">
				<th>
					Address
				</th>
				<td>
					
				</td>
			</tr>

			<tr class="email">
				<th>
					Email
				</th>
				<td>
					<a href="#"></a>
				</td>
			</tr>

			<tr class="phone">
				<th>
					Phone
				</th>
				<td>
					<a href="#"></a>
				</td>
			</tr>

		</table>
		
		<a href="#" class="btn">Refer</a>
	</div>
</div>