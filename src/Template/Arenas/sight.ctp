<?= $this->Html->css('arena.css') ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

<body class="container text-center">


<section class="col-lg-12">
        <table>
            <?php 
            use Cake\ORM\Table;
            use Cake\ORM\TableRegistry;
            $FightersTable = TableRegistry::get('fighters');
            $fighters = $FightersTable->get(2);
                $lignes = 1;
                $colonnes = 1;
                
                while($lignes <= 10){
                echo '<tr class="Tcolonne">';
                    while($colonnes <= 15){
                        echo '<td class="Tligne">';
                        //if(($colonnes== 6)&&($lignes== 2)) { //conditions coordonnées ici
                        if(($colonnes== $fighters->coordinate_x)&&($lignes== $fighters->coordinate_y))
                        //if(($colonnes== $fighters['coordinate_x'])&&($lignes== $fighters['coordinate_y']))
                        {
                            echo $this->Html->image('perso.png'); 
                        }
                        else{
                            echo $this->Html->image('herbe.png');
                        }
                        echo '</td>';
                        $colonnes++;
                }
                echo '</tr>';
                $colonnes =1;
                $lignes++;
            }
            ?>
        </table>
</section>

<section class="col-lg-12">
    <section class="col-lg-6 text-center">
        <table>
            <tr>
                <td></td>
                <td><?php echo $this->Form->create('haut');?>
                    <?php echo $this->Form->hidden('action',['value'=>'ah']);?>
                    <?php echo $this->Form->button('Attaque HAUT', ['class'=>'btn btn-danger']);?>
                    <?php echo $this->Form->end();?>
                </td>
                <td></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->create('gauche');?>
                    <?php echo $this->Form->hidden('action',['value'=>'ag']);?>
                    <?php echo $this->Form->button('Attaque GAUCHE', ['class'=>'btn btn-danger']);?>
                    <?php echo $this->Form->end();?></td>
                <td></td>
                <td><?php echo $this->Form->create('groite');?>
                    <?php echo $this->Form->hidden('action',['value'=>'ad']);?>
                    <?php echo $this->Form->button('Attaque DROITE', ['class'=>'btn btn-danger']);?>
                    <?php echo $this->Form->end();?></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $this->Form->create('bas');?>
                    <?php echo $this->Form->hidden('action',['value'=>'ab']);?>
                    <?php echo $this->Form->button('Attaque BAS', ['class'=>'btn btn-danger']);?>
                    <?php echo $this->Form->end();?></td>
                <td></td>
            </tr>
        </table>
    </section>
    
    <section class="col-lg-6 text-center">
        <table >
            <tr>
                <td></td>
                <td><?php echo $this->Form->create('haut');?>
                    <?php echo $this->Form->hidden('action',['value'=>'dh']);?>
                    <?php echo $this->Form->button('Aller HAUT', ['class'=>'btn btn-danger']);?>
                    <?php echo $this->Form->end();?>
                </td>
                <td></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->create('gauche');?>
                    <?php echo $this->Form->hidden('action',['value'=>'dg']);?>
                    <?php echo $this->Form->button('Aller GAUCHE', ['class'=>'btn btn-danger']);?>
                    <?php echo $this->Form->end();?></td>
                <td></td>
                <td><?php echo $this->Form->create('groite');?>
                    <?php echo $this->Form->hidden('action',['value'=>'dd']);?>
                    <?php echo $this->Form->button('Aller DROITE', ['class'=>'btn btn-danger']);?>
                    <?php echo $this->Form->end();?></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $this->Form->create('bas');?>
                    <?php echo $this->Form->hidden('action',['value'=>'db']);?>
                    <?php echo $this->Form->button('Aller BAS', ['class'=>'btn btn-danger']);?>
                    <?php echo $this->Form->end();?></td>
                <td></td>
            </tr>
        </table>
    </section>

</section>

   </body>
</html>
