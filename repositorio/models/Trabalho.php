<?php

class Trabalho extends BaseDataTransferObject{
    public $titulo;
    public $resumo;
    public $palavrasChave;
    public $statusR;
    public $comentarios;
    public $idCurso;
    public $idTipoAtividade;
    public $idEvento;


    public function __construct($id, $titulo, $resumo, $palavrasChave, $statusR, $comentarios, $idCurso, $idTipoAtividade, $idEvento)
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
    }


}
