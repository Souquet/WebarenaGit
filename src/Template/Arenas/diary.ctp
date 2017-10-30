<?php $this->assign('title', 'Diary');?>

<section class="col-md-12 cadreprincipal">
<section class="col-md-4">
<section class=" col-md-12 cadresecondaire">
    <table id="events" class="table table-striped">
        <thead><tr><th>Events</th></tr></thead>
        <tbody><?php
            foreach ($events as $e){
                echo $this->Html->tableCells([
                    [$e['name'], $e['date'], $e['coordinate_x'], $e['coordinate_y']]
                ]);
            }?>
        </tbody>
    </table>   
</section>
</section>