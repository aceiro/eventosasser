<?php

require_once 'interfaces\GenericRepository.php';
define("RETORNA_PAGAMENTO_POR_EMAIL",'SELECT i.* FROM participante p, inscricao i WHERE p.id = i.id_participante AND p.email = :email');
define("RETORNA_DETALHES_PAGAMENTO", 'SELECT p.nome,
       cc.nome as nome_curso,
       i.data_pagamento,
       i.valor
 FROM participante p,
     inscricao i,
     curso cc
 WHERE p.id = i.id_participante
  AND cc.id = p.id_curso
  AND p.email = :email');

class InscricaoRepository implements GenericRepository{
    protected $db;
    public function __construct(Database $db){
        $this->db = $db;
    }

    public function findAllBySql($sql, $bindings = array())
    {


        return $this->db->getAllBySql($sql, $bindings);
    }



    public function findOne($id){
        return $this->db->findById( 'inscricao',$id );
    }

    public function save(BaseDataTransferObject $dto){

        if ($dto instanceof Inscricao) {
            // from DTO to SimpleBean
            // no need pass id
            // this id is automatically generated
            // by MySQL db

            $bean = $this->db->load('inscricao');
            $bean->data_inscricao = $dto->dataInscricao;
            $bean->pago = $dto->pago;
            $bean->data_pagamento = $dto->dataPagamento;
            $bean->valor = $dto->valor;
            $bean->id_participante = $dto->idParticipante;

            // save the dto
            $this->db->save($bean);

        } else {
            throw new InvalidArgumentException;
        }
    }

    public function remove(BaseDataTransferObject $dto)
    {
        if ($dto instanceof Inscricao) {
            $bean = $this->findOne($dto->id);
            return  $this->db->trash($bean);
        }

    }

    public function update(BaseDataTransferObject $dto)
    {
        if ($dto instanceof Inscricao) {
            $bean = $this->findOne($dto->id);
            $bean->data_inscricao = $dto->dataInscricao;
            $bean->pago = $dto->pago;
            $bean->data_pagamento = $dto->dataPagamento;
            $bean->valor = $dto->valor;
            $bean->id_participante = $dto->idParticipante;
            return  $this->db->save($bean);
        }

    }

    public function findAll()
    {
        return $this->db->findAll('inscricao');
    }

    public function existsPagamentoByEmail($email)
    {
        $pagamentoExistente = $this->findAllBySql(RETORNA_PAGAMENTO_POR_EMAIL, [':email' => $email]);

        if( count($pagamentoExistente)==1 )
            return true;
        else return false;
    }

    public function findInscricaoDetailByEmail($email)
    {
        $inscricaoDetalhe = $this->db->getAllBySql(RETORNA_DETALHES_PAGAMENTO, [':email' => $email]);

        if( count($inscricaoDetalhe)==1 )
            return $inscricaoDetalhe[0];
        else return null;
    }
}