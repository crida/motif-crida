<?php
abstract class Object {
    public $id;


    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function insert(){
        $props = get_object_vars($this);
        $keys = $values = array();
        foreach($props as $key => $value){

            $getName = 'get'.ucfirst($key);
            if(method_exists($this,$getName)){
                $value = $this->$getName();
                if($value !== null){
                    $keys[] = $key;
                    $values[] = $value;
                }
            }
        }

        $sql = "INSERT INTO ".$this::TABLE_NAME." (".implode(", ",$keys).") VALUES (".implode(", ",$values).")";
        $result = $GLOBALS['DATA']->execute($sql);
        return $result;
    }

    public function update(){
        $props = get_object_vars($this);
        $params = array();
        foreach($props as $key => $value){

            $getName = 'get'.ucfirst($key);
            if(method_exists($this,$getName)){
                $value = $this->$getName();

                switch(gettype($value)){
                    case "boolean":
                        if($value){
                            $params[] = $key." = TRUE";
                        }
                        else {
                            $params[] = $key." = FALSE";
                        }
                        break;
                    case "NULL":
                        $params[] = $key." = NULL";
                        break;
                    default:
                        $params[] = $key." = '".$value."'";
                        break;
                }

            }
        }

        $sql = "UPDATE ".$this::TABLE_NAME." SET ".implode(", ",$params)." WHERE id = ".$this->getId();
        $result = $GLOBALS['DATA']->execute($sql);
        return $result;
    }
}
