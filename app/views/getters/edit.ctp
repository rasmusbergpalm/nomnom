<div class="getters form">
<?php echo $this->Form->create('Getter');?>
	
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('interval');
                ?>
                <div>
                    <input type="submit" value="Submit" />
                </div>
                <?php
                echo "<div style='float: left;'>";
		echo $this->Form->input('code', array('id' => 'GetterCode'));
                echo "</div>";
	?>
	
    <div id="console" style="float: right;"></div>

</form>
</div>
<script type="text/javascript">
    $('#ItemCode').ready(function(){
        var myCodeMirror = CodeMirror.fromTextArea(document.getElementById("GetterCode"), {lineNumbers: true, matchBrackets: true, indentUnit: 4});

    });
    $('#console').ready(function(){
       function loadstatus(){
           $('#console').load('/timer/viewInterval/'+<?php echo $this->data['Getter']['id']; ?>);
       }
       loadstatus();
       window.setInterval(loadstatus, parseInt($('#GetterInterval').val()) || 10000);
       
    });

</script>