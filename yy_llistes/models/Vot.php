<?php
class Vot extends Object {

    const TABLE_NAME = 'llistes_vots';

    public $dona1;
    public $dona2;
    public $dona3;
    public $home1;
    public $home2;
    public $home3;
    public $taula;
    public $fase;
    public $data;

    public function getDona1(){
        return $this->dona1;
    }

    public function setDona1($dona1){
        $this->dona1 = $dona1;
    }

    public function getDona2(){
        return $this->dona2;
    }

    public function setDona2($dona2){
        $this->dona2 = $dona2;
    }

    public function getDona3(){
        return $this->dona3;
    }

    public function setDona3($dona3){
        $this->dona3 = $dona3;
    }

    public function getHome1(){
        return $this->home1;
    }

    public function setHome1($home1){
        $this->home1 = $home1;
    }

    public function getHome2(){
        return $this->home2;
    }

    public function setHome2($home2){
        $this->home2 = $home2;
    }

    public function getHome3(){
        return $this->home3;
    }

    public function setHome3($home3){
        $this->home3 = $home3;
    }

    public function getTaula(){
        return $this->taula;
    }

    public function setTaula($taula){
        $this->taula = $taula;
    }

    public function getFase(){
        return $this->fase;
    }

    public function setFase($fase){
        $this->fase = $fase;
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = $data;
    }
}
