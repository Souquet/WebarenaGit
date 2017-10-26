<?php $this->assign('title', 'Login');?>

<h1>Connectez-vous!</h1>

<?php echo $this->Form->create('Connexion');?>
    <?php echo $this->Form->hidden('processing',['value'=>'login']);?>
    <?php echo $this->Form->control('email',array('label'=>"email"));?>
    <?php echo $this->Form->control('password',array('label'=>"mot de passe"));?>
    <?php echo $this->Form->button('se connecter');?>
<?php echo $this->Form->end();?>

<h1>Inscrivez-vous !</h1>

<?php echo $this->Form->create('Enregistrement');?>
    <?php echo $this->Form->hidden('processing',['value'=>'register']);?>
    <?php echo $this->Form->input('email',array('label'=>"email"));?>
    <?php echo $this->Form->input('password',array('label'=>"mot de passe"));?>
    <?php echo $this->Form->button('s"inscrire');?>
<?php echo $this->Form->end();?>

<h1>Mot de passe perdu ?</h1>

<?php echo $this->Form->create('Mot de passe perdu');?>
    <?php echo $this->Form->hidden('processing',['value'=>'recover']);?>
    <?php echo $this->Form->input('email',array('label'=>"Email"));?>
    <?php echo $this->Form->button('Récupérer votre mot de passe');?>
<?php echo $this->Form->end();?>