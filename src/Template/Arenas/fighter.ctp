<html>
    <?php $this->assign('title', 'Fighter');?>
    
    <head>
        <title> Fighter </title>
        <meta charset="utf-8" />
    </head>
    
    <body>
        <?php
            if($create==0){
                echo $this->Html->link("Créer !", array('controller' => 'Arenas','action'=> 'creating'), array( 'class' => 'button'));
            }else{
                foreach($player_fighter as $p){
        ?>
        
        <ul>
            <li> Fighter        <?php echo $p['name'];?>            </li>
            <li> Level :        <?php echo $p['level']; ?>          </li>
            <li> XP :           <?php echo $p['xp']; ?>             </li>
            <li> Sight :        <?php echo $p['skill_sight']; ?>    </li>
            <li> Strenght :        <?php echo $p['skill_strength']; ?>    </li>
            <li> Health :        <?php echo $p['skill_health']; ?>    </li>
            <li> Current Health :        <?php echo $p['current_health']; ?>    </li>
            <!-- SI IL PEUT LVL UP -->
            <?php
                if (($p['xp'])>=$p['level']*4){
            ?>
            <li> 
                <?php echo $this->Form->create(); ?>
                <?php echo $this->Form->hidden('lvl_up_type', array('value'=>"sight")); ?>
                <?php echo $this->Form->button('up sight'); ?>
                <?php echo $this->Form->end(); ?>
                    
                <?php echo $this->Form->create(); ?>
                <?php echo $this->Form->hidden('lvl_up_type', array('value'=>"force")); ?>
                <?php echo $this->Form->button('up strenght'); ?>
                <?php echo $this->Form->end(); ?> 
                    
                <?php echo $this->Form->create(); ?>
                <?php echo $this->Form->hidden('lvl_up_type', array('value'=>"hp")); ?>
                <?php echo $this->Form->button('up hp'); ?>
                <?php echo $this->Form->end(); ?>
            </li>
            <?php
                }
            ?>
            </ul>
        <?php
                }
                }
        ?>

        
   
        
    
    </body>
</html>