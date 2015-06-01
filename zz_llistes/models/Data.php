<?php
class Data {

    public $mysqli;

    public $vots;
    public $persones;

    public function __construct(){
        $this->mysqli = new mysqli("miqueladgc_crida.mysql.db", "miqueladgc_crida", "Esponja1Por", "miqueladgc_crida");
        if ($this->mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }

        foreach(array("dones" => "dona","homes" => "home") as $groupName => $genere){
            $this->$groupName = array();
            $query = "SELECT * FROM llistes_persona where genere = '".$genere."' ";
            switch($GLOBALS['FASE']){
                case 1:
                    $query .= "AND fase = 1";
                    break;
                case 2:
                    $query .= "AND escollidaFase1 = 0"; //MAB: l'altra opció és mostrarlos deshabilitats
                    break;
                default:
                    throw new Exception("missing fase");
                    break;
            }
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

        /* close connection */
        $this->mysqli->close();
    }
}
