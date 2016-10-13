<?php

require 'interfaces\GenericRepository.php';

class CursoRepository implements GenericRepository{
    protected $db;
    public function __construct(Database $db){
        $this->db = $db;
    }


    public function findOne($id){
        return R::findOne( 'curso', 'id=?', [ $id ] );
    }

    public function save(BaseDataTransferObject $dto){

        if ($dto instanceof Curso) {
            // from DTO to SimpleBean
            // no need pass id
            // this id is automatically generated
            // by MySQL db

            $curso = $this->db->load('curso');
            $curso->nome = $dto->nome;

            // save the dto
            $this->db->save($curso);

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
        if ($dto instanceof Curso) {
            $bean = $this->findOne($dto->id);
            $bean->nome = $dto->nome;
            return  $this->db->save($bean);
        }

    }
}