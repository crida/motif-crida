<?
function personSort( $a, $b ) {
    return $a->getVots() == $b->getVots() ? 0 : ( $a->getVots() < $b->getVots() ) ? 1 : -1;
}

$myTotalsDones =  $GLOBALS['DATA']->dones;
$myTotalsHomes =  $GLOBALS['DATA']->homes;
$myTotalsGeneres = array("dones" => &$myTotalsDones,"homes" => &$myTotalsHomes);

foreach($myTotalsGeneres as &$persones){

    foreach($persones as &$persona){
        $votes = array_filter(
        $GLOBALS['DATA']->vots,
            function ($e) use (&$id,&$persona) {
                if($e->getTaula() != $GLOBALS['TAULA']){
                    return false;
                }
                foreach(array("dona","home") as $genere){
                    for($i = 1; $i <=3; $i++){
                        $get = "get".ucfirst($genere).$i;
                        if($e->$get() == $persona->getId()){
                            return true;
                        }
                    }
                }
                return false;
            }
        );
        $persona->setVots(count($votes));
    }

    usort( $persones, 'personSort' );
}
?>
<div class="otherTables">
    <?php
    foreach($GLOBALS['DATA']->taules as $taula){
        $pannelTitle = "Estat taula ".$taula->getId();
        $gliph = "glyphicon-ok";
        if($taula->getFase() < $GLOBALS['FASE']){
            $gliph = "glyphicon-hourglass";
        }
        ?>


        <div class="panel panel-default panel-taula">
            <div class="panel-heading">
                <h3 class="panel-title"><?=$pannelTitle?></h3>
            </div>
            <div class="panel-body">
                <span class="glyphicon <?=$gliph?>" aria-hidden="true"></span>
            </div>
        </div>
        <?
    }
?>
</div> <!-- .otherTables -->

<div class="thisTableBallots">
    <?
    $taula = $GLOBALS['DATA']->searchArray($GLOBALS['DATA']->taules,$GLOBALS['TAULA']);

    $pannelTitle = "Butlletes taula ".$taula->getId();
    $gliph = "glyphicon-ok";
    if($taula->getFase() < $GLOBALS['FASE']){
        $gliph = "glyphicon-hourglass";
    }
    ?>


    <div class="panel panel-default panel-taula">
        <div class="panel-heading">
            <h3 class="panel-title"><?=$pannelTitle?></h3>
        </div>
        <div class="panel-body">
                <?
                foreach($GLOBALS['DATA']->vots as $vot){
                    if($vot->getTaula() == $taula->getId()){
                        ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <ul class="list-group">
                                        <?
                                        foreach(array("dona","home") as $genere){
                                            for($i = 1; $i <=3; $i++){
                                                $get = "get".ucfirst($genere).$i;
                                                if($vot->$get()){
                                                    $person = $GLOBALS['DATA']->getPersonById($vot->$get());
                                                    ?>
                                                    <li><?=$person->getCognoms()?>, <?=$person->getNom()?></li>
                                                    <?
                                                }
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        <?
                    }
                }
                ?>
        </div>
    </div>
</div> <!-- thisTableBallots -->

<div class="thisTableTotals">
    <?
    foreach($myTotalsGeneres as $genere => $persones){
        $pannelTitle = "Totals ".$genere." taula ".$taula->getId();
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
                        <li><?=$persona->getVots()?> - <?=$persona->getCognoms()?>, <?=$persona->getNom()?>
                        <?
                    }
                    ?>
                </ul>
            </div>
        </div>
        <?
    }
    ?>
</div> <!-- thisTableTotals -->

<div class="formHolder">
    <form class="navbar-form navbar-left refresh-form" role="refreshPage">
        <div class="refrescar-pagina-button">
            <button type="submit" class="send-button btn btn-primary" title="[enter]">Comprovar totals</button>
        </div>
    </form>
</div>
