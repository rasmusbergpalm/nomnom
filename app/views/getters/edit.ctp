<div class="getters form">
<?php echo $this->Form->create('Getter');?>
	<fieldset>
		<legend><?php __('Edit Getter'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('interval');
		echo $this->Form->input('code', array('id' => 'GetterCode'));
	?>
	</fieldset>
    <div id="console" style="float: right;"></div>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<script type="text/javascript">
    $('#ItemCode').ready(function(){
        var myCodeMirror = CodeMirror.fromTextArea(document.getElementById("GetterCode"), {lineNumbers: true, matchBrackets: true, indentUnit: 4});

    });
    $('#console').ready(function(){
       function loadstatus(){
           $('#console').load('/timer/status/'+<?php echo $this->data['Getter']['id']; ?>);
       }
       loadstatus();
       window.setInterval(loadstatus, 10000);
       
    });

</script>