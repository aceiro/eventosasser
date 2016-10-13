<?php
require 'Base.php';

class Participante extends BaseDataTransferObject{
    public $descricao;


    public function __construct($id, $descricao){
        parent::__construct($id);
        $this->descricao = $descricao;
    }
}