<?
$generalTotalsGeneres = $GLOBALS['DATA']->getGeneralTotals();
$nValidBallots = 0;
$nWhiteBallots = 0;
$nTotalBallots = 0;
foreach($GLOBALS['DATA']->vots as $vot){
    $atLeastOnePerson = false;
    foreach(array("dona","home") as $genere){
        for($i = 1; $i <=3; $i++){
            $get = "get".ucfirst($genere).$i;
            if($vot->$get()){
                $atLeastOnePerson = true;
            }
        }
    }
    if($atLeastOnePerson){
        $nValidBallots++;
        $nTotalBallots++;
    }
    else {
        $nWhiteBallots++;
    }
}

?>
<div class="generalTableTotals">
    <?
    foreach($generalTotalsGeneres as $genere => $persones){
        $pannelTitle = "Totals generals ".$genere;
        ?>
        <div class="panel panel-default panel-taula">
            <div class="panel-heading">
                <h3 class="panel-title"><?=$pannelTitle?></h3>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <?
                    foreach($persones as $persona){
                        ?>
                        <li><strong><?=$persona->getVots()?></strong> - [<?=$persona->getId()?>] <?=$persona->getCognoms()?>, <?=$persona->getNom()?>
                        <?
                    }
                    ?>
                </ul>
            </div>
        </div>
        <?
    }
    ?>

    <div class="panel panel-default panel-taula">
        <div class="panel-heading">
            <h3 class="panel-title">Totals butlletes general</h3>
        </div>
        <div class="panel-body">
            Total butlletes: <?=$nTotalBallots?><br>
            Total no-blancs: <?=$nValidBallots?><br>
            Total blancs: <?=$nWhiteBallots?><br>
        </div>
    </div>
</div> <!-- generalTableTotals -->
