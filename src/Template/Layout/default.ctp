<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<header>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php echo $this->Html->css('bootstrap.css');?>
    <?php echo $this->Html->css('moncss.css');?>
    
    <nav class="navbar navbar-inverse">
        
            <ul class="nav navbar-nav container-fluid active">
                <li><?php echo $this->Html->link('WebArena', array('controller' => 'Arenas', 'action' => '/')); ?></li>
                <li><?php echo $this->Html->link('Fighter', array('controller' => 'Arenas', 'action' => 'fighter')); ?></li>
                <li><?php echo $this->Html->link('Diary', array('controller' => 'Arenas', 'action' => 'diary')); ?></li>
                <li><?php echo $this->Html->link('Sight', array('controller' => 'Arenas', 'action' => 'sight')); ?></li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right container-fluid active">
                <li><?php echo $this->Html->link('Logout', array('controller' => 'Arenas', 'action' => 'logout')); ?></li>
                <li><?php echo $this->Html->link('Login', array('controller' => 'Arenas', 'action' => 'login')); ?></li>
            </ul>

    </nav>
    
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</header>
    
<body>
    <h1 class="text-center"><?= $this->fetch('title') ?></h1>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
</body>
<footer>
    <ul>
        <li class="col-lg-3 text-center list-group-item">GROUPE : SI2</li> 
        <li class="col-lg-3 text-center list-group-item">DUARTE - SOUQUET - PETRIGNET - GIRARD</li>
        <li class="col-lg-3 text-center list-group-item">OPTION : D/F</li>
        <li class="col-lg-3 text-center list-group-item">SERVEUR : <a href="http://webarena.datahub.fr">Site en ligne</a></li>
    </ul>
</footer>
</html>
