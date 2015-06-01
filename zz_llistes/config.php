<?php
error_reporting(E_ALL);
error_reporting(1);
ini_set('error_reporting', E_ALL);
ini_set("display_errors", 1);
require_once("include/kint-0.9/Kint.class.php");
session_start();

if(isset($_SESSION['taula'])){
    $GLOBALS['TAULA'] = $_SESSION['taula'];
}
if(isset($_SESSION['fase'])){
    $GLOBALS['FASE'] = $_SESSION['fase'];
}

require_once("models/Persona.php");
require_once("models/Vot.php");
require_once("models/Data.php");
