<?php
ini_set('default_charset','UTF-8');
error_reporting(E_ALL);
error_reporting(1);
ini_set('error_reporting', E_ALL);
ini_set("display_errors", 1);
require_once("include/kint-0.9/Kint.class.php");
session_start();

if(isset($_SESSION['TAULA'])){
    $GLOBALS['TAULA'] = $_SESSION['TAULA'];
}
if(isset($_SESSION['FASE'])){
    $GLOBALS['FASE'] = $_SESSION['FASE'];
}



require_once("models/Object.php");
require_once("models/Taula.php");
require_once("models/Persona.php");
require_once("models/Vot.php");
require_once("models/Data.php");
