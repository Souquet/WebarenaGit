<?php $this->assign('title', 'New Fighter');?>

<?php 
    echo $this->Form->create('Nouveau combattant',['type' => 'file']);
    echo $this->Form->control('name', array('label'=>"Nom",'type' => 'text','class'=>'form-control'));
    echo $this->Form->control('avatar', array('label'=>"Quel est votre avatar ?",'type' => 'file'));
    echo $this->Form->button('valider', ['class'=>'btn']);
    echo $this->Form->end();
    echo $fail;
?>