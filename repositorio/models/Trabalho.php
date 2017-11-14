<?php
require 'Base.php';
class Trabalho extends BaseDataTransferObject{
    public $titulo;
    public $resumo;
    public $palavrasChave;
    public $statusR;
    public $comentarios;
    public $idCurso;
    public $idTipoAtividade;
    public $idEvento;
    public $idOrientador;
    public $statusAtualizacao;
    public $idCoorientador;


    public function __construct($id, $titulo, $resumo, $palavrasChave, $statusR, $comentarios, $idCurso, $idTipoAtividade, $idEvento, $idOrientador, $statusAtualizacao, $idCoorientador)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->resumo = $resumo;
        $this->palavrasChave = $palavrasChave;
        $this->statusR = $statusR;
        $this->comentarios = $comentarios;
        $this->idCurso = $idCurso;
        $this->idTipoAtividade = $idTipoAtividade;
        $this->idEvento = $idEvento;
        $this->idOrientador = $idOrientador;
        $this->statusAtualizacao = $statusAtualizacao;
        $this->idCoorientador = $idCoorientador;

    }

    public static function create(){
        return new Trabalho(-1, "N/A", "N/A", "N/A", "N/A", "N/A", -1, -1, -1, -1, -1, -1);
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
        return $this;
    }


    public function setResumo($resumo)
    {
        $this->resumo = $resumo;
        return $this;
    }


    public function setPalavrasChave($palavrasChave)
    {
        $this->palavrasChave = $palavrasChave;
        return $this;
    }


    public function setStatusR($statusR)
    {
        $this->statusR = $statusR;
        return $this;
    }


    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;
        return $this;
    }


    public function setIdCurso($idCurso)
    {
        $this->idCurso = $idCurso;
        return $this;
    }


    public function setIdTipoAtividade($idTipoAtividade)
    {
        $this->idTipoAtividade = $idTipoAtividade;
        return $this;
    }


    public function setIdEvento($idEvento)
    {
        $this->idEvento = $idEvento;
        return $this;
    }


    public function setIdOrientador($idOrientador)
    {
        $this->idOrientador = $idOrientador;
        return $this;
    }


    public function setStatusAtualizacao($statusAtualizacao)
    {
        $this->statusAtualizacao = $statusAtualizacao;
        return $this;
    }


    public function getIdCoorientador()
    {
        return $this->idCoorientador;
    }


    public function setIdCoorientador($idCoorientador)
    {
        $this->idCoorientador = $idCoorientador;
    }





}
