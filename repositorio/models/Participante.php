<?php
require 'Base.php';

class Participante extends BaseDataTransferObject{

    public $nome;
    public $email;
    public $senha;
    public $ouvinte;
    public $autorPrincipal;
    public $coAutor;
    public $idTrabalho;
    public $idCurso;


    public function __construct($id, $nome, $email, $senha, $ouvinte, $autorPrincipal, $coAutor, $idTrabalho, $idCurso)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->ouvinte = $ouvinte;
        $this->autorPrincipal = $autorPrincipal;
        $this->coAutor = $coAutor;
        $this->idTrabalho = $idTrabalho;
        $this->idCurso = $idCurso;
    }


}