<?php

require 'interfaces\GenericRepository.php';

class ParticipanteRepository implements GenericRepository{
    protected $db;
    public function __construct(Database $db){
        $this->db = $db;
    }


    public function findOne($id){
        return R::findOne( 'participante', 'id=?', [ $id ] );
    }

    public function save(BaseDataTransferObject $dto){

        if ($dto instanceof Participante) {
            // from DTO to SimpleBean
            // no need pass id
            // this id is automatically generated
            // by MySQL db

            $participante = $this->db->load('participante');
            $participante->nome     = $dto->nome;
            $participante->email    = $dto->email;
            $participante->senha    = $dto->senha;
            $participante->ouvinte  = $dto->ouvinte;
            $participante->autorPrincipal = $dto->autorPrincipal;
            $participante->coAutor    = $dto->coAutor;
            $participante->idTrabalho = $dto->idTrabalho;
            $participante->idCurso    = $dto->idCurso;


            // save the dto
            $this->db->save($participante);

        } else {
            throw new InvalidArgumentException;
        }
    }

    public function remove(BaseDataTransferObject $dto)
    {
        if ($dto instanceof Participante) {
            $bean = $this->findOne($dto->id);
            return  $this->db->trash($bean);
        }

    }

    public function update(BaseDataTransferObject $dto)
    {
        if ($dto instanceof Participante) {
            $participante = $this->findOne($dto->id);
            $participante->nome     = $dto->nome;
            $participante->email    = $dto->email;
            $participante->senha    = $dto->senha;
            $participante->ouvinte  = $dto->ouvinte;
            $participante->autorPrincipal = $dto->autorPrincipal;
            $participante->coAutor    = $dto->coAutor;
            $participante->idTrabalho = $dto->idTrabalho;
            $participante->idCurso    = $dto->idCurso;

            return  $this->db->save($participante);
        }

    }
}