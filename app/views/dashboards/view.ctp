<div class="dashboards view">
<h2 style="margin-top:-20px;"><?php echo $dashboard['Dashboard']['name']; ?></h2>

<?php

    foreach ($dashboard['Dbview'] as $dbview){
        //debug($dbview);
        $id = $dbview['id'];

        echo "<div class='dragbox' id='dragbox_$id'
        style='position: relative; left: ".$dbview['left']."px; top: ".$dbview['top']."px; width: ".($dbview['width']+20)."px; height: ".($dbview['height']+40)."px;'>
        <div class='header'>
        <span>".$dbview['name']."</span>
        <a class='editlink' href='/nomnom/dbviews/edit/$id' style='float: right;'>edit</a>
        </div>
        <div class='dragbox-content' id='view$id' style='clear: both; width: ".$dbview['width']."px; height: ".$dbview['height']."px;'>Loading...</div>
        </div>";
    }
    ?>
    <script type='text/javascript'>
    <?php
    foreach ($dashboard['Dbview'] as $dbview){
        $id = $dbview['id'];
        $code = $dbview['code'];
        echo "$('#view$id').ready(function(){";
        echo "var viewid = 'view$id';";
        echo "$code";
        echo "});";
    }
    ?>
        $(function(){
            $('.editlink').colorbox({width:"80%", height:"100%"});

            $(".dragbox").draggable({
                handle: "h2", 
                grid: [20, 20],
                stop: function(event, ui){
                    console.log(ui);
                    var id = ui.helper.context.id.split('_')[1];
                    $.ajax({
                        type: "POST",
                        url: "<?php echo $this->Html->url('/dbviews/update/')?>"+id,
                        data: {data:{left: ui.position.left, top: ui.position.top}},
                        success: function(msg){
                            console.log(msg);
                        }
                    });
                }
            });
            $(".dragbox").resizable({
                stop: function(event, ui){
                    
                    var id = ui.helper.context.id.split('_')[1];
                    $.ajax({
                        type: "POST",

                        url: "<?php echo $this->Html->url('/dbviews/update/')?>"+id,
                        data: {data:{width: ui.size.width, height: ui.size.height}},
                        success: function(msg){
                            console.log(msg);
                        }
                    });
                }
            });
        });
    </script>
		
</div>