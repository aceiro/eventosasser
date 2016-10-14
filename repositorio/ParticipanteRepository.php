<?php

require_once 'interfaces\GenericRepository.php';

define("RETORNA_TODOS_PARTICIPANTES",'SELECT * FROM participante WHERE email = :email and senha = :senha');

class ParticipanteRepository implements GenericRepository{
    protected $db;
    public function __construct(Database $db){
        $this->db = $db;
    }

    public function findAllBySql($sql, $bindings = array())
    {
        return $this->db->getAllBySql($sql, $bindings);
    }


    public function findOne($id){
        return $this->db->findById( 'curso',$id );
    }

    public function save(BaseDataTransferObject $dto){

        if ($dto instanceof Participante) {
            if( empty($dto->nome) ){
                var_dump($dto);
                throw new InvalidArgumentException;
            }

            if( empty($dto->email)  ){
                var_dump($dto);
                throw new InvalidArgumentException;
            }

            if( empty($dto->senha)  ){
                var_dump($dto);
                throw new InvalidArgumentException;
            }
            if( empty($dto->idCurso)  ){
                var_dump($dto);
                throw new InvalidArgumentException;
            }

            //
            //TODO verificar se já existe um participante cadastrado com o mesmo e-mail
            //

            // from DTO to SimpleBean
            // no need pass id
            // this id is automatically generated
            // by MySQL db

            $participante = $this->db->load('participante');
            $participante->nome     = $dto->nome;
            $participante->email    = $dto->email;
            $participante->senha    = md5($dto->senha);
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

    public function findAll()
    {
        return $this->db->findAll('participante');
    }

    public function existsParticipante($email, $senha)
    {
        $participanteExistente = $this->findAllBySql(RETORNA_TODOS_PARTICIPANTES, [':email' => $email,
                                                                                    ':senha' => md5($senha)
                                                                                  ]);

        if( count($participanteExistente)==1 )
            return true;
            else return false;
    }


}