<?php
require_once 'Base.php';

class Curso extends BaseDataTransferObject{
    public $nome;

    public function __construct($id, $nome){
        $this->id=$id;
        $this->nome = $nome;
    }


}