<?php
require_once("config.php");
if(isset($GLOBALS['FASE']) && is_numeric($GLOBALS['FASE']) && $GLOBALS['FASE'] > 0 && isset($GLOBALS['TAULA']) && is_numeric($GLOBALS['TAULA']) && $GLOBALS['TAULA'] > 0){

    $GLOBALS['DATA'] = new Data();
    $GLOBALS['DATA']->load();

    switch($GLOBALS['FASE']){
        case 1:
        case 3:
            $TITLE = "FASE: ".$GLOBALS['FASE']." | TAULA: ".$GLOBALS['TAULA'];
            $SECTION = "vote";
            include("views/header.php");
                include("views/display.php");
                include("views/vote.php");
                include("views/input.php");
            include("views/footer.php");
            break;
        case 2:
        case 4:
            $txt = "";
            switch($GLOBALS['FASE']){
                case 2:
                    $txt = " | esperant tancar votació 1-5";
                    break;
                case 4:
                    $txt = " | esperant tancar votació 6-11";
                    break;
            }
            $TITLE = "FASE: ".$GLOBALS['FASE']." | TAULA: ".$GLOBALS['TAULA'].$txt;
            $SECTION = "summary";
            include("views/header.php");
                include("views/summary.php");
            include("views/footer.php");
            break;
    }
}
else {
    $TITLE = "Tria taula i fase:";
    $SECTION = "setup";
    include("views/header.php");
        include("views/setup.php");
    include("views/footer.php");
}
