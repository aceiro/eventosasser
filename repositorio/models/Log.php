<?php
require_once 'Base.php';

class Log extends BaseDataTransferObject{
    public $descricao;
    public $idParticipante;
    public $email;
    public $dataLog;


    public function __construct($descricao, $idParticipante, $email, $dataLog)
    {
        $this->descricao = $descricao;
        $this->idParticipante = $idParticipante;
        $this->email = $email;
        $this->dataLog = $dataLog;
    }




}