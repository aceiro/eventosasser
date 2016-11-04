<?php
require_once 'Base.php';

class Usuario extends BaseDataTransferObject{
    public $nome;
    public $senha;

    public function __construct($id, $nome, $senha){
        $this->id=$id;
        $this->nome = $nome;
        $this->senha = $senha;
    }


}