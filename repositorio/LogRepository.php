<?php

require_once 'interfaces\GenericRepository.php';

class LogRepository implements GenericRepository{
    protected $db;
    public function __construct(Database $db){
        $this->db = $db;
    }

    public function findAllBySql($sql, $bindings = array())
    {
        return $this->db->getAllBySql($sql, $bindings);
    }



    public function findOne($id){
        return $this->db->findById( 'log',$id );
    }

    public function save(BaseDataTransferObject $dto){

        if ($dto instanceof Log) {
            // from DTO to SimpleBean
            // no need pass id
            // this id is automatically generated
            // by MySQL db
            /*var_dump($dto);
            die;*/

            $bean = $this->db->load('log');
            $bean->descricao        = "$dto->descricao";
            $bean->id_participante  = $dto->idParticipante;
            $bean->email            = $dto->email;
            $bean->data_log         = $dto->dataLog;


            // save the dto
            return $this->db->save($bean);

        } else {
            throw new InvalidArgumentException;
        }
    }

    public function remove(BaseDataTransferObject $dto)
    {
        if ($dto instanceof Log) {
            $bean = $this->findOne($dto->id);
            return  $this->db->trash($bean);
        }

    }

    public function update(BaseDataTransferObject $dto)
    {
        if ($dto instanceof Log) {
            $bean = $this->findOne($dto->id);
            $bean->descricao        = $dto->descricao;
            $bean->id_participante  = $dto->idParticipante;
            $bean->email            = $dto->email;
            $bean->data_log         = $dto->dataLog;
            return  $this->db->save($bean);
        }

    }

    public function findAll()
    {
        return $this->db->findAll('log');
    }
    public function updateStatusRemovidoById($id)
    {
        throw new Exception('Not implemented yet!');
    }
}