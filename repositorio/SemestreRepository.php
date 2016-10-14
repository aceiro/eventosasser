<?php

require_once 'interfaces\GenericRepository.php';

class SemestreRepository implements GenericRepository{
    protected $db;
    public function __construct(Database $db){
        $this->db = $db;
    }

    public function findAllBySql($sql, $bindings = array())
    {
        return $this->db->getAllBySql($sql, $bindings);
    }


    public function findOne($id){
        return $this->db->findById( 'semestre',$id );
    }

    public function save(BaseDataTransferObject $dto){

        if ($dto instanceof Semestre) {
            // from DTO to SimpleBean
            // no need pass id
            // this id is automatically generated
            // by MySQL db

            $semestre = $this->db->load('semestre');
            $semestre->descricao = $dto->descricao;

            // save the dto
            $this->db->save($semestre);

        } else {
            throw new InvalidArgumentException;
        }
    }

    public function remove(BaseDataTransferObject $dto)
    {
        if ($dto instanceof Semestre) {
            $bean = $this->findOne($dto->id);
            return  $this->db->trash($bean);
        }

    }

    public function update(BaseDataTransferObject $dto)
    {
        if ($dto instanceof Semestre) {
            $bean = $this->findOne($dto->id);
            $bean->descricao = $dto->descricao;
            return  $this->db->save($bean);
        }

    }

    public function findAll()
    {
        return $this->db->findAll('semestre');
    }
}