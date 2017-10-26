<?php $this->assign('title', 'Fighter');?>

<?php 
    echo $this->Form->create();
    echo $this->Form->control('name');
    echo $this->Form->button(("Validé"));
    echo $this->Form->end();   
?>