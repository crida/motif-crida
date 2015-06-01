<?
$finishedTables = array_filter(
$GLOBALS['DATA']->taules,
    function ($e) {
        return $e->getFase() >= $GLOBALS['FASE'];
    }
);

$readyForNextFase = false;
if(count($GLOBALS['DATA']->taules) == count($finishedTables)){
    $readyForNextFase = true;
}

include('views/tablesStatus.php');

if(is_numeric($GLOBALS['TAULA'])){
    ?>
    <div class="thisTableBallots">
        <?

        $taula = $GLOBALS['DATA']->searchArray($GLOBALS['DATA']->taules,$GLOBALS['TAULA']);

        $pannelTitle = "Butlletes taula ".$taula->getId();
        $gliph = "glyphicon-ok";
        if($taula->getFase() < $GLOBALS['FASE']){
            $gliph = "glyphicon-hourglass";
        }
        $nValidBallots = 0;
        $nWhiteBallots = 0;
        $nTotalBallots = 0;
        ?>


        <div class="panel panel-default panel-taula">
            <div class="panel-heading">
                <h3 class="panel-title"><?=$pannelTitle?></h3>
            </div>
            <div class="panel-body">
                    <?
                    foreach($GLOBALS['DATA']->vots as $vot){
                        if($vot->getTaula() == $taula->getId() && $vot->getFase() == ($GLOBALS['FASE']-1)){
                            ?>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <ul class="list-group">
                                            <?
                                            $atLeastOnePerson = false;
                                            foreach(array("dona","home") as $genere){
                                                for($i = 1; $i <=3; $i++){
                                                    $get = "get".ucfirst($genere).$i;
                                                    if($vot->$get()){
                                                        $person = $GLOBALS['DATA']->getPersonById($vot->$get());
                                                        $atLeastOnePerson = true;
                                                        ?>
                                                        <li><?=$person->getNom()?> <?=$person->getCognoms()?></li>
                                                        <?
                                                    }
                                                }
                                            }
                                            if($atLeastOnePerson){
                                                $nValidBallots++;
                                            }
                                            else {
                                                $nWhiteBallots++;
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            <?
                            $nTotalBallots++;
                        }
                    }
                    ?>
            </div>
        </div>
    </div> <!-- thisTableBallots -->

    <div class="thisTableTotals">
        <div class="panel panel-default panel-taula">
            <div class="panel-heading">
                <h3 class="panel-title">Total butlletes taula</h3>
            </div>
            <div class="panel-body">
                Total butlletes: <?=$nTotalBallots?><br>
                Total no-blancs: <?=$nValidBallots?><br>
                Total blancs: <?=$nWhiteBallots?><br>
            </div>
        </div>
    </div> <!-- thisTableTotals -->

    <?
}
?>

<div class="formHolder">
    <form class="navbar-form navbar-left refresh-form" role="refreshPage">
        <div class="refrescar-pagina-button">
            <?
            if(!$readyForNextFase){
                ?>
                <button type="submit" class="send-button btn btn-primary">Comprovar totals</button>
                <?
            }
            ?>
            <button type="submit" class="reset-button btn btn-danger">Resetejar taula</button>
        </div>
    </form>
</div>
