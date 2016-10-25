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


    public function __construct($id, $titulo, $resumo, $palavrasChave, $statusR, $comentarios, $idCurso, $idTipoAtividade, $idEvento, $idOrientador, $statusAtualizacao)
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
    }


}
