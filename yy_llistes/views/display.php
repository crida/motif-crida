<?php
$internalId = 10;
?>
<div class="llistaHolder">
    <h2>Llistes</h2>
    <div class="donesHolder">
        <h3>Dones</h3>
        <ul class="voteList dones">
            <?php
            foreach($GLOBALS['DATA']->dones as $persona){
                $disabled = false;
                include("views/persona.php");
                $internalId++;
            }
            ?>
        </ul>
    </div>

    <div class="homesHolder">
        <h3>Homes</h3>
        <ul class="voteList homes">
        <?php
            foreach($GLOBALS['DATA']->homes as $persona){
                $disabled = false;
                include("views/persona.php");
                $internalId++;
            }
            ?>
        </ul>
    </div>
</div>
