
<?= $this->Html->css('arena.css') ?>



<section class="cadre">
        <table id="arenaTable">
            <?php 
                $lignes = 1;
                $colonnes = 1;
                
                while($colonnes <= 10){
                echo '<tr class="Tcolonne">';
                    while($lignes <= 15){
                        echo '<td class="Tligne">';
                        echo $this->Html->image('herbe.png');
                        echo '</td>';
                        $lignes++;
                }
                echo '</tr>';
                $lignes =1;
                $colonnes++;
            }
            ?>
        </table>
</section>