<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <?php echo $this->Html->charset(); ?>
	<head>
            <title>
                <?php echo $title_for_layout; ?>
            </title>
            <?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('clean');
                echo $this->Html->css('jquery-ui');
                
                

                echo $this->Javascript->link('jquery');
                echo $this->Javascript->link('jquery-ui');

                echo $this->Javascript->link('flot/jquery.flot');

                echo $this->Javascript->link('codemirror/codemirror');
                echo $this->Javascript->link('codemirror/javascript');

                echo $this->Javascript->link('jquery.colorbox-min');


                echo $this->Html->css('codemirror/codemirror');
                echo $this->Html->css('codemirror/default');
                echo $this->Html->css('colorbox');


		echo $scripts_for_layout;
            ?>
	</head>

	<body>
        <?php
            $nomnom_says = Array(
                'MMmmmm... yummy in my tummy!',
                'I need more data!'
            );
        ?>

		<div id="header">
                    <small style="float: right; color: white; text-align: right; padding-right: 5px;">
                        <?php echo $nomnom_says[rand(0, count($nomnom_says)-1)]; ?>
                        <br />
                        Nomnom v. 0.1a
                    </small>
                    
                    
                    <ul id="menu">
                        <li><?php echo $this->Html->link('Dashboards', '/dashboards')?></li>
                        <li><?php echo $this->Html->link('Views', '/dbviews')?></li>
                        <li><?php echo $this->Html->link('Getters', '/getters')?></li>
                    </ul>
                    

                    
		</div>

                

		<div id="content">
                    <div id="wrap">
                    <?php echo $this->Session->flash(); ?>

                    <?php echo $content_for_layout; ?>
                        </div>
		</div>
            <?php echo $this->element('sql_dump'); ?>
	</body>
</html>

