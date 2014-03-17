<div class="users form">
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('user'); ?>
    <fieldset>
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
        <?php echo $this->Form->input('contact');
            echo $this->Form->input('password');
?>
    </fieldset>
    <?php echo $this->Form->end(__('Login')); ?>
</div>