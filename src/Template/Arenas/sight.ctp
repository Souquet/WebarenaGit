
<?= $this->Html->css('arena.css') ?>



<section class="cadre">
        <table id="arenaTable">
            <?php 
                $lignes = 1;
                $colonnes = 1;
                
                while($lignes <= 10){
                echo '<tr class="Tcolonne">';
                    while($colonnes <= 15){
                        echo '<td class="Tligne">';
                        if(($colonnes== 6)&&($lignes== 2)) { //conditions coordonnées ici
                            echo $this->Html->image('mur.png'); 
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

<section class="ControlsArea">
    <section class="Actions">
        <ul class="btnActions">
            <li><?php echo $this->Form->create('Attaque1');?>
                <?php echo $this->Form->hidden('actfight',['value'=>'1']);?>
                <?php echo $this->Form->button('ATTAQUER !');?>
                <?php echo $this->Form->end();?>
            </li>
        </ul>
    </section>
    
    <section class="Directions">
        <table class="TouchesDir">
            <tr>
                <td></td>
                <td><?php echo $this->Form->create('haut');?>
                    <?php echo $this->Form->hidden('calcposgrid',['value'=>'h']);?>
                    <?php echo $this->Form->button('HAUT');?>
                    <?php echo $this->Form->end();?>
                </td>
                <td></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->create('gauche');?>
                    <?php echo $this->Form->hidden('calcposgrid',['value'=>'g']);?>
                    <?php echo $this->Form->button('GAUCHE');?>
                    <?php echo $this->Form->end();?></td>
                <td></td>
                <td><?php echo $this->Form->create('groite');?>
                    <?php echo $this->Form->hidden('calcposgrid',['value'=>'d']);?>
                    <?php echo $this->Form->button('DROITE');?>
                    <?php echo $this->Form->end();?></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $this->Form->create('bas');?>
                    <?php echo $this->Form->hidden('calcposgrid',['value'=>'b']);?>
                    <?php echo $this->Form->button('BAS');?>
                    <?php echo $this->Form->end();?></td>
                <td></td>
            </tr>
        </table>
    </section>

</section>