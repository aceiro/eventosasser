<?php

require_once 'interfaces\GenericRepository.php';

class TrabalhoRepository implements GenericRepository{
    protected $db;
    public function __construct(Database $db){
        $this->db = $db;
    }


    public function findOne($id){
        return $this->db->findById( 'trabalho',$id );
    }

    public function save(BaseDataTransferObject $dto){

        if ($dto instanceof Trabalho) {
            // from DTO to SimpleBean
            // no need pass id
            // this id is automatically generated
            // by MySQL db

            $trabalho = $this->db->load('trabalho');
            $trabalho->titulo = $dto->titulo;
            $trabalho->resumo = $dto->resumo;
            $trabalho->palavrasChave = $dto->palavrasChave;
            $trabalho->statusR = $dto->statusR;
            $trabalho->comentarios = $dto->comentarios;
            $trabalho->idCurso = $dto->idCurso;
            $trabalho->idTipoAtividade = $dto->idTipoAtividade;
            $trabalho->idEvento = $dto->idEvento;


            // save the dto
            $this->db->save($trabalho);

        } else {
            throw new InvalidArgumentException;
        }
    }

    public function remove(BaseDataTransferObject $dto)
    {
        if ($dto instanceof Trabalho) {
            $bean = $this->findOne($dto->id);
            return  $this->db->trash($bean);
        }

    }

    public function update(BaseDataTransferObject $dto)
    {
        if ($dto instanceof Trabalho) {
            $trabalho = $this->findOne($dto->id);
            $trabalho->titulo = $dto->titulo;
            $trabalho->resumo = $dto->resumo;
            $trabalho->palavrasChave = $dto->palavrasChave;
            $trabalho->statusR = $dto->statusR;
            $trabalho->comentarios = $dto->comentarios;
            $trabalho->idCurso = $dto->idCurso;
            $trabalho->idTipoAtividade = $dto->idTipoAtividade;
            $trabalho->idEvento = $dto->idEvento;

            return  $this->db->save($trabalho);
        }

    }

    public function findAll()
    {
        return $this->db->findAll('trabalho');
    }
}