<?php

require_once 'interfaces/GenericRepository.php';
define("RETORNA_ORIENTADORES",'SELECT id, ucase(nome) as nome FROM orientador ORDER BY nome ');
define("RETORNA_COORIENTADORES",'SELECT id, ucase(nome) as nome FROM co_orientador ORDER BY nome ');

class OrientadorRepository implements GenericRepository{
    protected $db;
    public function __construct(Database $db){
        $this->db = $db;
    }

    public function findAllBySql($sql, $bindings = array())
    {
        return $this->db->getAllBySql($sql, $bindings);
    }


    public function findCoAdviserById($id){
        return $this->db->findById( 'co_orientador',$id );
    }

    public function findOne($id){
        return $this->db->findById( 'orientador',$id );
    }

    public function save(BaseDataTransferObject $dto){

        if ($dto instanceof Orientador) {
            // from DTO to SimpleBean
            // no need pass id
            // this id is automatically generated
            // by MySQL db

            $orientador = $this->db->load('orientador');
            $orientador->nome = $dto->nome;
            $orientador->id_titulacao = $dto->idTitulacao;

            // save the dto
            $this->db->save($orientador);

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

    public function findAll()
    {
        return $this->findAllBySql(RETORNA_ORIENTADORES);
    }


    public function findAllCoorientadores()
    {
        return $this->findAllBySql(RETORNA_COORIENTADORES);
    }



    public function updateStatusRemovidoById($id)
    {
        throw new Exception('Not implemented yet!');
    }
}