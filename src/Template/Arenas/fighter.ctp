<html>
    <?php $this->assign('title', 'Fighter');?>
    
    <head>
        <title> Fighter </title>
        <meta charset="utf-8" />
    </head>
    
    <body>
        <?php
            if($create==0){
                echo $this->Html->link("Créer votre personnage !",['controller' => 'Arenas', 'action'=> 'creating']);
            }else{
                foreach($player_fighter as $p){
        ?>
        
        <ul>
            <li class="list-group-item"> Fighter :        <?php echo $p['name'];?>            </li>
            <li class="list-group-item"> Level :        <?php echo $p['level']; ?>          </li>
            <li class="list-group-item"> XP :           <?php echo $p['xp']; ?>             </li>
            <li class="list-group-item"> Sight :        <?php echo $p['skill_sight']; ?>    </li>
            <li class="list-group-item"> Strenght :     <?php echo $p['skill_strength']; ?>    </li>
            <li class="list-group-item"> Health :       <?php echo $p['skill_health']; ?>    </li>
            <li class="list-group-item"> Current Health :        <?php echo $p['current_health']; ?>    </li>
            <!-- SI IL PEUT LVL UP -->
        </ul>
            <?php
                if (($p['xp'])>=$p['level']*4){
            ?>
        <h3 class="text-center">Vous avez gagné un niveau !</h3>
        <ul class="container-fluid list-inline text-center">
            <li> 
                <?php echo $this->Form->create(); ?>
                <?php echo $this->Form->hidden('lvl_up_type', array('value'=>"sight")); ?>
                <?php echo $this->Form->button('up sight', ['class'=>'btn btn-danger']); ?>
                <?php echo $this->Form->end(); ?>
            </li>
            <li>
                <?php echo $this->Form->create(); ?>
                <?php echo $this->Form->hidden('lvl_up_type', array('value'=>"force")); ?>
                <?php echo $this->Form->button('up strenght', ['class'=>'btn btn-danger']); ?>
                <?php echo $this->Form->end(); ?> 
            </li>
            <li>
                <?php echo $this->Form->create(); ?>
                <?php echo $this->Form->hidden('lvl_up_type', array('value'=>"hp")); ?>
                <?php echo $this->Form->button('up hp', ['class'=>'btn btn-danger']); ?>
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