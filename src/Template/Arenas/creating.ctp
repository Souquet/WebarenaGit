<?php $this->assign('title', 'New Fighter');?>

<?php 
    echo $this->Form->create();
    echo $this->Form->control('new_name');
    echo $this->Form->select('avatar', [1,2]);
    echo $this->Form->button('valider');
    echo $this->Form->end();
    echo $this->Html->image('avatar1.png', ['legend' => 'choix 1']);
    echo $this->Html->image('avatar2.png', ['legend' => 'choix 2']);
    echo $fail;
?>