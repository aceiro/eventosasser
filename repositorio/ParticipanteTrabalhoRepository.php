<?php

require_once 'interfaces\GenericRepository.php';

define("RETORNA_TODOS_PARTICIPANTES",'SELECT * FROM participante WHERE email = :email and senha = :senha');
define("RETORNA_TODOS_PARTICIPANTES_POR_EMAIL",'SELECT * FROM participante WHERE email = :email');
define("RETORNA_TOTOS_AUTORES", 'SELECT nome, email FROM participante ORDER BY email');

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
        return $this->db->findById( 'participante',$id );
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
            $participante->id_curso    = $dto->idCurso;


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
            $bean = $this->findOne($dto->id);

            $bean->nome     = $dto->nome;
            $bean->email    = $dto->email;
            $bean->senha    = $dto->senha;
            $bean->id_curso    = $dto->idCurso;

            return  $this->db->save($bean);
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

    public function findAllAutores()
    {
        return $this->findAllBySql(RETORNA_TOTOS_AUTORES);
    }

    public function existsParticipanteByEmail($email){

        $participanteExistente = $this->findAllBySql(RETORNA_TODOS_PARTICIPANTES_POR_EMAIL, [':email' => $email]);

        if( count($participanteExistente)==1 )
            return true;
        else return false;

    }

    public function findParticipanteByEmail($email)
    {
        $participante  = $this->findAllBySql(RETORNA_TODOS_PARTICIPANTES_POR_EMAIL, [':email' => $email]);

        if( count($participante)==1 ){
            $umParticipante   = $participante[0];
            $participanteDto  = Participante::createParticipante()
                ->setId($umParticipante['id'])
                ->setNome($umParticipante['nome'])
                ->setEmail($umParticipante['email'])
                ->setSenha($umParticipante['senha'])
                ->setIdCurso($umParticipante['id_curso']);
            return $participanteDto;
        } else return null;

    }


}