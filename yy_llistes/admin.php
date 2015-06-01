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
    header("Location: admin.php");
}
$TITLE = "Admin";
$SECTION = "Admin";
include("views/header.php");
    include("views/adminButtons.php");
include("views/footer.php");
