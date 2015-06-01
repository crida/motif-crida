<?php
class Taula extends Object {

    const TABLE_NAME = 'llistes_taules';

    public $fase = 1;
    public $oberta = FALSE;

    public function getFase(){
        return $this->fase;
    }

    public function setFase($fase){
        $this->fase = $fase;
    }

    public function getOberta(){
        return $this->oberta;
    }

    public function setOberta($oberta){
        $this->oberta = $oberta;
    }

}
