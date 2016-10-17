<?php
require_once 'Base.php';

class Participante extends BaseDataTransferObject{

    public $nome;
    public $email;
    public $senha;
    public $ouvinte;
    public $autorPrincipal;
    public $coAutor;
    public $idTrabalho;
    public $idCurso;



    public function __construct($id, $nome, $email, $senha, $idCurso)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->idCurso = $idCurso;
    }

    // TODO: Fluent API
    // add for others DTOs
    //

    public static function createParticipante(){
        return new Participante(-1,"N/A","N/A","N/A",-1);
    }


    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }


    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }


    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }


    public function setIdCurso($idCurso)
    {
        $this->idCurso = $idCurso;
        return $this;
    }






}