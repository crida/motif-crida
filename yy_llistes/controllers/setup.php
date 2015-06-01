<?php
require_once("../config.php");

if(
    isset($_POST['taula']) &&
    is_numeric($_POST['taula']) &&
    isset($_POST['fase']) &&
    is_numeric($_POST['fase'])
){
    $_SESSION['TAULA'] = $GLOBALS['TAULA'] = (int) $_POST['taula'];
    $_SESSION['FASE'] = $GLOBALS['FASE'] = (int) $_POST['fase'];

    $GLOBALS['DATA'] = new Data();
    $GLOBALS['DATA']->load();
}

$taula = $GLOBALS['DATA']->searchArray($GLOBALS['DATA']->taules,$GLOBALS['TAULA']);
$taula->setOberta(true);
$taula->setFase($GLOBALS['FASE']);
$taula->update();

header("Location: ../index.php");
