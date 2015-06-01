<?php
require_once("config.php");
if(isset($GLOBALS['FASE']) && is_numeric($GLOBALS['FASE']) && $GLOBALS['FASE'] > 0 && isset($GLOBALS['TAULA']) && is_numeric($GLOBALS['TAULA']) && $GLOBALS['TAULA'] > 0){
    $TITLE = "FASE: ".$GLOBALS['FASE']." TAULA: ".$GLOBALS['TAULA'];
    $SECTION = "vote";
    include("views/header.php");
        $data = new Data();
        include("views/display.php");
        include("views/vote.php");
        include("views/input.php");
    include("views/footer.php");
}
else {
    $TITLE = "Tria taula:";
    $SECTION = "setup";
    include("views/header.php");
        include("views/setup.php");
    include("views/footer.php");
}
