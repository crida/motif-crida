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
