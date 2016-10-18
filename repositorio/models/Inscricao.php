<?php
require_once 'Base.php';

class Inscricao extends BaseDataTransferObject{

    public $dataInscricao;
    public $pago;
    public $dataPagamento;
    public $valor;
    public $idParticipante;

    public function __construct($id, $dataInscricao, $pago, $dataPagamento, $valor, $idParticipante)
    {
        $this->id = $id;
        $this->dataInscricao = $dataInscricao;
        $this->pago = $pago;
        $this->dataPagamento = $dataPagamento;
        $this->valor = $valor;
        $this->idParticipante = $idParticipante;
    }

    public static function create(){
        return new Inscricao(-1, "N/A", false, "N/A", 0.0, -1);
    }

    public function setDataInscricao($dataInscricao)
    {
        $this->dataInscricao = $dataInscricao;
        return $this;
    }


    public function setPago($pago)
    {
        $this->pago = $pago;
        return $this;
    }


    public function setDataPagamento($dataPagamento)
    {
        $this->dataPagamento = $dataPagamento;
        return $this;
    }


    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }


    public function setIdParticipante($idParticipante)
    {
        $this->idParticipante = $idParticipante;
        return $this;
    }





}