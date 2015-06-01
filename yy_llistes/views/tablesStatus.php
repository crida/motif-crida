<div class="otherTables">
    <div class="panel panel-default panel-taula">
        <div class="panel-heading">
            <h3 class="panel-title">Estat taules</h3>
        </div>
        <div class="panel-body">
            <ol>
                <?php
                foreach($GLOBALS['DATA']->taules as $taula){
                    $gliph = "glyphicon-ok";
                    if($taula->getFase() < $GLOBALS['FASE']){
                        $gliph = "glyphicon-hourglass";
                    }
                    ?>
                    <li><span class="glyphicon <?=$gliph?>" aria-hidden="true"></span></li>
                    <?
                }
                ?>
            </ol>
        </div>
    </div>
</div> <!-- .otherTables -->
