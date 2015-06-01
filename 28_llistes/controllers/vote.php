<?php
require_once("../config.php");
if(
    isset($_POST['taula']) &&
    is_numeric($_POST['taula']) &&
    isset($_POST['fase']) &&
    is_numeric($_POST['fase'])
){
    $_SESSION['FASE'] = $_POST['taula'];
    $_SESSION['FASE'] = $_POST['fase'];
}
die("test");
