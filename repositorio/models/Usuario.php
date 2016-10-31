<?php
require_once 'Base.php';

class Usuario extends BaseDataTransferObject{
    public $nome;
    public $senha;
    public $idTipoAtividade;

    public function __construct($id, $nome, $senha, $idTipoAtividade){
        $this->id=$id;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->idTipoAtividade = $idTipoAtividade;

    }


}