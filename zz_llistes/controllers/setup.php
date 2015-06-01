<?php
require_once("../config.php");
if(
    isset($_POST['taula']) &&
    is_numeric($_POST['taula']) &&
    isset($_POST['fase']) &&
    is_numeric($_POST['fase'])
){
    $_SESSION['taula'] = (int) $_POST['taula'];
    $_SESSION['fase'] = (int) $_POST['fase'];
}
header("Location: ../index.php");
