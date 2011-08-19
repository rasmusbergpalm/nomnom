<div class="getters form">
<?php echo $this->Form->create('Getter');?>
	<fieldset>
		<legend><?php __('Edit Getter'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('cron');
		echo $this->Form->input('code', array('id' => 'GetterCode'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<script type="text/javascript">
    $('#ItemCode').ready(function(){
        var myCodeMirror = CodeMirror.fromTextArea(document.getElementById("GetterCode"), {lineNumbers: true, matchBrackets: true, indentUnit: 4});

    });

</script>