<?php
class Data {
    public $mysqli;

    public $vots;
    public $dones;
    public $homes;
    public $taules;

    private function connect(){
        $this->mysqli = new mysqli("miqueladgc_crida.mysql.db", "miqueladgc_crida", "Esponja1Por", "miqueladgc_crida");
        if ($this->mysqli->connect_errno) {
            throw new Exception("Failed to connect to MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error);
        }
        $this->mysqli->set_charset("utf8");

    }

    public function searchArray($array,$id){
        $return = array_filter(
            $array,
            function ($e) use (&$id) {
                return $e->id == $id;
            }
        );
        if(sizeof($return) == 1){
            $return = array_shift($return);
        }
        return $return;
    }

    public function getPersonById($id){
        $neededObject = $this->searchArray($this->dones,$id);
        if(!$neededObject){
            $neededObject = $this->searchArray($this->homes,$id);
        }
        return $neededObject;
    }

    public function load(){
        $this->connect();

        foreach(array("dones" => "dona","homes" => "home") as $groupName => $genere){
            $this->$groupName = array();
            $query = "SELECT * FROM ".persona::TABLE_NAME." where genere = '".$genere."' ";
            switch($GLOBALS['FASE']){
                case 1:
                case 2:
                    $query .= "AND fase = 1";
                    break;
                case 3:
                case 4:
                    //$query .= "AND escollidaFase1 = 0"; //MAB: l'altra opció és mostrarlos deshabilitats
                    break;
                default:
                    throw new Exception("missing fase");
                    break;
            }
            $query .= " ORDER BY cognoms ASC ";
            if ($result = $this->mysqli->query($query)) {
                while ($obj = $result->fetch_object()) {
                    $persona = new Persona();
                    foreach(get_object_vars($obj) as $key => $value){
                        call_user_func(array($persona, "set".ucfirst($key)),utf8_encode($value));
                    }
                    array_push($this->$groupName, $persona);
                }
                $result->close();
            }
        }


        $this->taules = array();
        $query = "SELECT * FROM ".Taula::TABLE_NAME;

        if ($result = $this->mysqli->query($query)) {
            while ($obj = $result->fetch_object()) {
                $taula = new Taula();
                foreach(get_object_vars($obj) as $key => $value){
                    call_user_func(array($taula, "set".ucfirst($key)),utf8_encode($value));
                }
                array_push($this->taules, $taula);
            }
            $result->close();
        }

        $this->vots = array();
        $query = "SELECT * FROM ".Vot::TABLE_NAME;

        if ($result = $this->mysqli->query($query)) {
            while ($obj = $result->fetch_object()) {
                $taula = new Vot();
                foreach(get_object_vars($obj) as $key => $value){
                    call_user_func(array($taula, "set".ucfirst($key)),utf8_encode($value));
                }
                array_push($this->vots, $taula);
            }
            $result->close();
        }


        /* close connection */
        $this->mysqli->close();
    }

    public function execute($query){
        $this->connect();
        $result = $this->mysqli->query($query);
        $this->mysqli->close();
        if($result === false){
            throw new Exception("Error executing: ".$query);
        }
        return $result;
    }

    public function getTotalsTable($id){

        $myTotalsDones =  $this->dones;
        $myTotalsHomes =  $this->homes;
        $myTotalsGeneres = array("dones" => &$myTotalsDones,"homes" => &$myTotalsHomes);

        foreach($myTotalsGeneres as &$persones){
            foreach($persones as &$persona){
                $votes = array_filter(
                $GLOBALS['DATA']->vots,
                    function ($e) use (&$id,&$persona) {
                        if($e->getTaula() != $id){
                            return false;
                        }
                        if($e->getFase() != ($GLOBALS['FASE']-1)){
                            return false;
                        }
                        foreach(array("dona","home") as $genere){
                            for($i = 1; $i <=3; $i++){
                                $get = "get".ucfirst($genere).$i;
                                if($e->$get() == $persona->getId()){
                                    return true;
                                }
                            }
                        }
                        return false;
                    }
                );
                $persona->setVots(count($votes));
            }
            usort( $persones, function($a, $b){
                return $a->getVots() == $b->getVots() ? 0 : ( $a->getVots() < $b->getVots() ) ? 1 : -1;
            });
        }

        return $myTotalsGeneres;
    }

    public function getGeneralTotals(){

        $myTotalsDones =  $this->dones;
        $myTotalsHomes =  $this->homes;
        $myTotalsGeneres = array("dones" => &$myTotalsDones,"homes" => &$myTotalsHomes);

        foreach($myTotalsGeneres as &$persones){
            foreach($persones as &$persona){
                $votes = array_filter(
                $GLOBALS['DATA']->vots,
                    function ($e) use (&$id,&$persona) {
                        foreach(array("dona","home") as $genere){
                            for($i = 1; $i <=3; $i++){
                                $get = "get".ucfirst($genere).$i;
                                if($e->$get() == $persona->getId()){
                                    return true;
                                }
                            }
                        }
                        return false;
                    }
                );
                $persona->setVots(count($votes));
                $persona->update();
            }
            usort( $persones, function($a, $b){
                return $a->getVots() == $b->getVots() ? 0 : ( $a->getVots() < $b->getVots() ) ? 1 : -1;
            });
        }

        return $myTotalsGeneres;
    }

}
