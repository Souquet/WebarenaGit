<?php $this->assign('title', 'Diary');?>

<section class="col-md-12 cadreprincipal">
<section class="col-md-4">
<section class=" col-md-12 cadresecondaire">
    <table id="events" class="table table-striped">
        <thead><tr><th>Events</th></tr></thead>
        <tbody><?php
            foreach ($events as $e){
                echo $this->Html->tableCells([
                    [$e['2014-11-07 12:00:00'], $e['Entrée de Aragorn'], $e['2'], $e['2']]
                ]);
            }?>
        </tbody>
    </table>   
</section>
</section>