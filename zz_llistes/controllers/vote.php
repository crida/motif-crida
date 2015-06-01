<?php
require_once("../config.php");
if(
    isset($_POST['taula']) &&
    is_numeric($_POST['taula']) &&
    isset($_POST['fase']) &&
    is_numeric($_POST['fase'])
){
    $_SESSION['taula'] = $_POST['taula'];
    $_SESSION['fase'] = $_POST['fase'];
}
die("test");
