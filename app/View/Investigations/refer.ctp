<?php 

$smstemplate =<<<ENDTEXT
Case#{$investigation['Investigation']['id']} has been referred to you
ENDTEXT;
$smstemplate = trim($smstemplate);
?>
<div class="users form">
<?php echo $this->Form->create('Investigation'); ?>
    <fieldset>
    	<legend>Confirm Referral</legend>
        <?php 
        echo $this->Form->input('note', array(
        	'type' => 'textarea',
        	'value' => $smstemplate,
        ));
        echo $this->Form->input('message_shelter', array(
        	'label' => 'Send SMS to shelter',
        	'type' => 'checkbox'
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Confirm referral')); ?>
</div>
