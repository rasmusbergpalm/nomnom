<div class="dashboards view">
<h2 style="margin-top:-20px;"><?php echo $dashboard['Dashboard']['name']; ?></h2>

<?php

    foreach ($dashboard['Item'] as $item){
        //debug($item);
        $id = $item['id'];
        $dbi_id = $item['DashboardsItem']['id'];

        echo "<div class='dragbox' id='dragbox_$dbi_id' style='position: relative; left: ".$item['DashboardsItem']['left']."px; top: ".$item['DashboardsItem']['top']."px; width: ".($item['DashboardsItem']['width']+20)."px; height: ".($item['DashboardsItem']['height']+40)."px;'><h2>".$item['name']."</h2><div class='dragbox-content' id='item$id' style='width: ".$item['DashboardsItem']['width']."px; height: ".$item['DashboardsItem']['height']."px;'>Loading...</div></div>";
    }
    ?>
    <script type='text/javascript'>
    <?php
    foreach ($dashboard['Item'] as $item){
        $id = $item['id'];
        $code = $item['code'];
        echo "$('#item$id').ready(function(){";
        echo "$code";
        echo "var params = ".$item['DashboardsItem']['params'].";";
        echo "params.unshift('item$id');";
        echo $item['name'].".apply(this, params);";
        echo "});";
    }
    ?>
        $(function(){
            $(".dragbox").draggable({
                handle: "h2", 
                grid: [20, 20],
                stop: function(event, ui){
                    console.log(ui);
                    var id = ui.helper.context.id.split('_')[1];
                    $.ajax({
                        type: "POST",
                        url: "<?php echo $this->Html->url('/DashboardsItems/update/')?>"+id,
                        data: {data:{left: ui.position.left, top: ui.position.top}},
                        success: function(msg){
                            console.log(msg);
                        }
                    });
                }
            });
            $(".dragbox").resizable({
                stop: function(event, ui){
                    console.log(ui);
                    var id = ui.helper.context.id.split('_')[1];
                    $.ajax({
                        type: "POST",

                        url: "<?php echo $this->Html->url('/DashboardsItems/update/')?>"+id,
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