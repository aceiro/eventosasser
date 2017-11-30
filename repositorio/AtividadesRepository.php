<?php

require_once 'interfaces/GenericRepository.php';

define("RETORNA_TOODOS_IDS_BY_ID_PARTICIPANTE",'SELECT id FROM atividades WHERE id_participante = :id_participante');
define("RETORNA_TODAS_ATIVIDADES_BY_ID_PARTICIPANTE",'SELECT * FROM atividades WHERE id_participante = :id_participante');

class AtividadesRepository implements GenericRepository{
    protected $db;
    public function __construct(Database $db){
        $this->db = $db;
    }

    public function findAllBySql($sql, $bindings = array())
    {
        return $this->db->getAllBySql($sql, $bindings);
    }

    public function findOne($id){
        return $this->db->findById( 'atividades',$id );
    }

    public function save(BaseDataTransferObject $dto){

        if ($dto instanceof Atividades) {
            // from DTO to SimpleBean
            // no need pass id
            // this id is automatically generated
            // by MySQL db

            $atividade = $this->db->load('atividades');
            $atividade->id_participante = $dto->id_participante;
            $atividade->id_atividade_option = $dto->id_atividade_option;
            $atividade->active = $dto->active;

            // save the dto
            $this->db->save($atividade);

        } else {
            throw new InvalidArgumentException;
        }
    }

    public function remove(BaseDataTransferObject $dto)
    {
        if ($dto instanceof Atividades) {
            $bean = $this->findOne($dto->id);
            return  $this->db->trash($bean);
        }

    }

    public function removeAllActivitiesByParticipanteId($idParticipante)
    {
        $atividades = $this->findAllBySql(RETORNA_TOODOS_IDS_BY_ID_PARTICIPANTE, [':id_participante' => $idParticipante]);
        foreach ($atividades as $atividade) {
            $bean = $this->findOne($atividade['id']);
            $this->db->trash($bean);
        }


    }

    public function update(BaseDataTransferObject $dto)
    {
        if ($dto instanceof Atividades) {
            $bean = $this->findOne($dto->id);
            $bean->id_participante = $dto->id_participante;
            $bean->id_atividade_option = $dto->id_atividade_option;
            $bean->active = $dto->active;
            return  $this->db->save($bean);
        }

    }

    public function findAll()
    {
        return $this->db->findAll('atividades');
    }

    public function findAllActivitiesByIdParticipante($idParticipante)
    {
        $atividades = $this->findAllBySql(RETORNA_TODAS_ATIVIDADES_BY_ID_PARTICIPANTE, [':id_participante' => $idParticipante]);
        return $atividades;
    }

    public function updateStatusRemovidoById($id)
    {
        throw new Exception('Not implemented yet!');
    }

    public function checkSelectedOption($optionIdx, $idParticipante)
    {

        $activities = $this->findAllActivitiesByIdParticipante($idParticipante);
        if( is_null($activities) )
            return "";

        foreach ($activities as $activity) {
            if( $activity['id_atividade_option'] == $optionIdx ) {
                return true;
            }

        }
        return false;
    }
}