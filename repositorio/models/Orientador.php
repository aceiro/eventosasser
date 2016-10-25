<?php
require_once 'Base.php';

class Orientador extends BaseDataTransferObject{
    public $nome;
    public $idTitulacao;

    public function __construct($id, $nome, $idTitulacao){
        $this->id=$id;
        $this->nome = $nome;
        $this->idTitulacao = $idTitulacao;
    }


}