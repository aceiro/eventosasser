<?php
require 'Base.php';

class Semestre extends BaseDataTransferObject{
    public $descricao;

    public function __construct($id, $descricao){
        $this->id=$id;
        $this->descricao = $descricao;
    }


}