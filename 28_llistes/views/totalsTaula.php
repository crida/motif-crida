<?
$myTotalsGeneres = $GLOBALS['DATA']->getTotalsTable($TAULA);
$taula = $GLOBALS['DATA']->searchArray($GLOBALS['DATA']->taules,$GLOBALS['TAULA']);
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
