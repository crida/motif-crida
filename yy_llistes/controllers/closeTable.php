<?php
require_once("../config.php");

$GLOBALS['DATA'] = new Data();
$GLOBALS['DATA']->load();

if(isset($_REQUEST['tableBallots'])){
    $tableBallots = json_decode($_REQUEST['tableBallots']);
    foreach($tableBallots as $ballot){
        $vot = new Vot();
        $vot->setTaula($GLOBALS['TAULA']);
        $vot->setFase($GLOBALS['FASE']);
        $nDones = 0;
        $nHomes = 0;

        foreach($ballot as $persona){
            switch($persona->genere){
                case "dona":
                    $nDones++;
                    $funcName = "setDona".$nDones;
                    break;
                case "home":
                    $nHomes++;
                    $funcName = "setHome".$nHomes;
                    break;
                default:
                    throw new Exception("Falta genere");
                    break;
            }

            $vot->$funcName($persona->id); //MAB: assegura't que és l'id que volem

        }
        $vot->insert();
    }
}
$GLOBALS['FASE'] = $_SESSION['FASE'] =  $GLOBALS['FASE']+1;
$taula = $GLOBALS['DATA']->searchArray($GLOBALS['DATA']->taules,$GLOBALS['TAULA']);
$taula->setOberta(true);
$taula->setFase($GLOBALS['FASE']);
$taula->update();

echo json_encode(true);
