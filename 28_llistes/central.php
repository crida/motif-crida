<?php
require_once("config.php");


$GLOBALS['DATA'] = new Data();

if(isset($_REQUEST['action'])){
    switch($_REQUEST['action']){
        case "prepare-fase-2":
            $query = "UPDATE ".Persona::TABLE_NAME." set vots = 0";
            $GLOBALS['DATA']->execute($query);
            break;
        case "full-reset":
            $queries = file_get_contents("reset.sql");
            $queries = explode(";",$queries);
            foreach($queries as $query){
                $query = trim($query);
                if($query){
                    $GLOBALS['DATA']->execute($query);
                }
            }
            break;

        case "choose-winners":
            $ids = explode(",",$_REQUEST['ids']);
            foreach($ids as $id){
                $query = "UPDATE ".Persona::TABLE_NAME." set escollidaFase1 = 1 WHERE id = ".$id;
                $result = $GLOBALS['DATA']->execute($query);
                d($result);

            }
            die();
            break;
    }
    header("Location: central.php");
}

if(
    isset($_REQUEST['fase']) &&
    is_numeric($_REQUEST['fase'])
){
    $_SESSION['FASE'] = $GLOBALS['FASE'] = $_REQUEST['fase'];
}
else {
    $_SESSION['FASE'] = $GLOBALS['FASE'] = 2;
}
$_SESSION['TAULA'] = $GLOBALS['TAULA'] = "central";

$GLOBALS['DATA'] = new Data();
$GLOBALS['DATA']->load();

switch($GLOBALS['FASE']){
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
        $TITLE = "FASE: ".$GLOBALS['FASE']." | CENTRAL ".$txt;
        $SECTION = "summary";
        include("views/header.php");

            include("views/summary.php");
            include('views/totals.php');
            for($i = 1; $i <= 4; $i++){
                $TAULA = $i;
                //include('views/totalsTaula.php');
            }

            include("views/adminButtons.php");
        include("views/footer.php");

        break;
    default:
        $_SESSION['TAULA'] = $GLOBALS['TAULA'] = null;
        $_SESSION['FASE'] = $GLOBALS['FASE'] = null;
        header("Location: ../index.php");
        break;
}
