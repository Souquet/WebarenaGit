
<?php $this->assign('title', 'Login');?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <h1>Connectez-vous !</h1>
    
    <?php echo $this->Form->create('Connexion',['class'=>'form-group']);?>
    <?php echo $this->Form->hidden('processing',['value'=>'login']);?>
    
    <section class="form-group">
            <?php echo $this->Form->control('email',array('label'=>"email",'class'=>'form-control'));?>
    </section>
    
    <section class="form-group">
        <?php echo $this->Form->control('password',array('label'=>"mot de passe",'class'=>'form-control'));?>
    </section>
    
    <section class="form-group form-inline">
        <?php echo $this->Form->button('se connecter', ['class'=>'btn']);?>
        <?php echo $invalid;?>
    </section>
    
    <?php echo $this->Form->end();?>
    
    <h1>Inscrivez-vous !</h1>
    <?php echo $this->Form->create('Enregistrement');?>
    <?php echo $this->Form->hidden('processing',['value'=>'register']);?>
    
    <section class="form-group">
        <?php echo $this->Form->input('email',array('label'=>"email",'class'=>'form-control'));?>
    </section>
    
    <section class="form-group">
        <?php echo $this->Form->input('password',array('label'=>"mot de passe",'class'=>'form-control'));?>
    </section>
    
    <section class="form-group form-inline">
        <?php echo $this->Form->button('s"inscrire', ['class'=>'btn']);?>
        <?php echo $alert;?>
    </section>
    <?php echo $this->Form->end();?>

    <h1>Mot de passe perdu ?</h1>
    
    <?php echo $this->Form->create('Mot de passe perdu');?>
    <?php echo $this->Form->hidden('processing',['value'=>'recover']);?>
    <section class="form-group">
        <?php echo $this->Form->input('email',array('label'=>"Email",'class'=>'form-control'));?>
    </section>
    
    <section class="form-group">
        <?php echo $this->Form->input('password',array('label'=>"Nouveau mot de passe",'class'=>'form-control'));?>
    </section>
    
    <section class="form-group form-inline">
        <?php echo $this->Form->button('Confirmer le nouveau mot de passe ?', ['class'=>'btn']);?>
        <?php echo $mdp;?>
    </section>
    <?php echo $this->Form->end();?>
</body>
</html>

