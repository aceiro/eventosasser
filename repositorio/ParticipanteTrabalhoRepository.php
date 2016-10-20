<?php

require_once 'interfaces/GenericRepository.php';

define("ALGUMA_QUERY",'SELECT * FROM participantextrabalho WHERE XXX = :XXX and XX = :XX');


class ParticipanteTrabalhoRepository implements GenericRepository{
    protected $db;
    public function __construct(Database $db){
        $this->db = $db;
    }

    public function findAllBySql($sql, $bindings = array())
    {
        return $this->db->getAllBySql($sql, $bindings);
    }


    public function findOne($id){
        return $this->db->findById( 'participantextrabalho',$id );
    }

    public function save(BaseDataTransferObject $dto){

        if ($dto instanceof ParticipanteTrabalho) {


            // from DTO to SimpleBean
            // no need pass id
            // this id is automatically generated
            // by MySQL db

            $participanteTrabalho = $this->db->load('participantextrabalho');
            $participanteTrabalho->id_participante  = $dto->idParticipante;
            $participanteTrabalho->id_trabalho      = $dto->idTrabalho;
            $participanteTrabalho->ouvinte          = $dto->ouvinte;
            $participanteTrabalho->co_autor         = $dto->coAutor;
            $participanteTrabalho->autor_principal  = $dto->autorPrincipal;


            // save the dto
            $this->db->save($participanteTrabalho);

        } else {
            throw new InvalidArgumentException;
        }
    }

    public function remove(BaseDataTransferObject $dto)
    {
        if ($dto instanceof ParticipanteTrabalho) {
            $bean = $this->findOne($dto->id);
            return  $this->db->trash($bean);
        }

    }

    public function update(BaseDataTransferObject $dto)
    {

        if ($dto instanceof ParticipanteTrabalho) {
            $bean = $this->findOne($dto->id);

            $bean->id_participante  = $dto->idParticipante;
            $bean->id_trabalho      = $dto->idTrabalho;
            $bean->ouvinte          = $dto->ouvinte;
            $bean->co_autor         = $dto->coAutor;
            $bean->autor_principal  = $dto->autorPrincipal;

            return  $this->db->save($bean);
        }

    }

    public function findAll()
    {
        return $this->db->findAll('participantextrabalho');
    }
    public function updateStatusRemovidoById($id)
    {
        throw new Exception('Not implemented yet!');
    }


}