<?php $this->assign('title', 'Diary');?>

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
        <section class=" col-md-12 cadreprincipal">

            <table id="events" class="table table-striped">

                <thead>

                    <tr>

                        <th class="col-lg-4 col-md-4 col-sm-5 col-xs-5"  id="cadre1">Events</th>

                        <th class="col-lg-4 col-md-4 col-sm-5 col-xs-5" id="cadre2">Date</th>

                        <th class="col-lg-8 col-md-2 col-sm-1 col-xs-1" id="cadre3">X</th>

                        <th class="col-lg-8 col-md-2 col-sm-1 col-xs-1" id="cadre 4">Y</th>

                    </tr>

                </thead>

                <tbody><?php

                    foreach ($Events as $e){

                        echo $this->Html->tableCells([

                            [$e['name'], $e['date'], $e['coordinate_x'], $e['coordinate_y']]

                        ]);
                    }?>
                </tbody>
            </table>   
        </section>

    </body>
</html>
