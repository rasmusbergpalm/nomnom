<div class="getters form">
<?php echo $this->Form->create('Getter');?>
	<fieldset>
		<legend><?php __('Add Getter'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('cron');
		echo $this->Form->input('code');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Getters', true), array('action' => 'index'));?></li>
	</ul>
</div>