<?php
require_once 'Base.php';

class ParticipanteTrabalho extends BaseDataTransferObject{



    public $idTrabalho;
    public $idParticipante;
    public $ouvinte;
    public $autorPrincipal;
    public $coAutor;


    public function __construct($idTrabalho, $idParticipante, $ouvinte, $autorPrincipal, $coAutor)
    {
        $this->idTrabalho = $idTrabalho;
        $this->idParticipante = $idParticipante;
        $this->ouvinte = $ouvinte;
        $this->autorPrincipal = $autorPrincipal;
        $this->coAutor = $coAutor;
    }


    // TODO: Fluent API
    // add for others DTOs
    //

    public static function create(){
        return new ParticipanteTrabalho(-1,-1,-1,false,false,false);
    }


    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    public function setIdTrabalho($idTrabalho)
    {
        $this->idTrabalho = $idTrabalho;
        return $this;
    }


    public function setIdParticipante($idParticipante)
    {
        $this->idParticipante = $idParticipante;
        return $this;
    }


    public function setOuvinte($ouvinte)
    {
        $this->ouvinte = $ouvinte;
        return $this;
    }


    public function setAutorPrincipal($autorPrincipal)
    {
        $this->autorPrincipal = $autorPrincipal;
        return $this;
    }


    public function setCoAutor($coAutor)
    {
        $this->coAutor = $coAutor;
        return $this;
    }








}