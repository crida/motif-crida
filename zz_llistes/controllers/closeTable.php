<?php
require_once("../config.php");

if(isset($_REQUEST['tableBallots'])){
    $tableBallots = json_decode($_REQUEST['tableBallots']);
    foreach($tableBallots as $ballots){
        d($ballots);
    }
}
//header("Location: index.php");
