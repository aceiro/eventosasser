<?php

require_once 'interfaces\GenericRepository.php';

class TipoAtividadeRepository implements GenericRepository{
    protected $db;
    public function __construct(Database $db){
        $this->db = $db;
    }


    public function findOne($id){
        return $this->db->findById( 'curso',$id );
    }

    public function save(BaseDataTransferObject $dto){

        if ($dto instanceof TipoAtividade) {
            // from DTO to SimpleBean
            // no need pass id
            // this id is automatically generated
            // by MySQL db

            $tipoAtividade = $this->db->load('tipoatividade');
            $tipoAtividade->descricao = $dto->descricao;

            // save the dto
            $this->db->save($tipoAtividade);

        } else {
            throw new InvalidArgumentException;
        }
    }

    public function remove(BaseDataTransferObject $dto)
    {
        if ($dto instanceof TipoAtividade) {
            $bean = $this->findOne($dto->id);
            return  $this->db->trash($bean);
        }

    }

    public function update(BaseDataTransferObject $dto)
    {
        if ($dto instanceof TipoAtividade) {
            $bean = $this->findOne($dto->id);
            $bean->descricao = $dto->descricao;
            return  $this->db->save($bean);
        }

    }

    public function findAll()
    {
        return $this->db->findAll('tipoatividade');
    }
}