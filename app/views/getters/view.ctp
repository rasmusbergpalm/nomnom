<div class="getters view">
<h2><?php  __('Getter');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $getter['Getter']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $getter['Getter']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $getter['Getter']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cron'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $getter['Getter']['cron']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Code'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $getter['Getter']['code']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Getter', true), array('action' => 'edit', $getter['Getter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Getter', true), array('action' => 'delete', $getter['Getter']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $getter['Getter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Getters', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Getter', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
