<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <?php 
        echo $this->Form->input('email');
        echo $this->Form->input('message_shelter');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Confirm referral')); ?>
</div>
