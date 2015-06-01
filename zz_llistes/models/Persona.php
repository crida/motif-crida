<?php
class Persona {

    private $id;
    private $fase;
    private $nom;
    private $cognoms;
    private $genere;
    private $vots;
    private $escollidaFase1;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getFase(){
        return $this->fase;
    }

    public function setFase($fase){
        $this->fase = $fase;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getCognoms(){
        return $this->cognoms;
    }

    public function setCognoms($cognoms){
        $this->cognoms = $cognoms;
    }

    public function getGenere(){
        return $this->genere;
    }

    public function setGenere($genere){
        $this->genere = $genere;
    }


    public function getVots(){
        return $this->vots;
    }

    public function setVots($vots){
        $this->vots = $vots;
    }

    public function getEscollidaFase1(){
        return $this->escollidaFase1;
    }

    public function setEscollidaFase1($escollidaFase1){
        $this->escollidaFase1 = $escollidaFase1;
    }
    
}
