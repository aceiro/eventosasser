<?php

require_once 'interfaces/GenericRepository.php';
define("RETORNA_TODOS_USUARIOS",'SELECT * FROM usuario WHERE nome = :login and senha = :senha');

class UsuarioRepository implements GenericRepository{
    protected $db;
    public function __construct(Database $db){
        $this->db = $db;
    }

    public function findAllBySql($sql, $bindings = array())
    {
        return $this->db->getAllBySql($sql, $bindings);
    }



    public function findOne($id){
        return $this->db->findById( 'usuario',$id );
    }

    public function save(BaseDataTransferObject $dto){

        if ($dto instanceof Usuario) {
            // from DTO to SimpleBean
            // no need pass id
            // this id is automatically generated
            // by MySQL db

            $usuario = $this->db->load('usuario');
            $usuario->nome = $dto->nome;
            $usuario->senha = $dto->senha;
            $usuario->id_tipoatividade = $dto->idTipoAtividade;

            // save the dto
            $this->db->save($usuario);

        } else {
            throw new InvalidArgumentException;
        }
    }

    public function remove(BaseDataTransferObject $dto)
    {
        if ($dto instanceof Usuario) {
            $bean = $this->findOne($dto->id);
            return  $this->db->trash($bean);
        }

    }

    public function update(BaseDataTransferObject $dto)
    {
        if ($dto instanceof Usuario) {
            $bean = $this->findOne($dto->id);
            $bean->nome = $dto->nome;
            $bean->senha = $dto->senha;
            $bean->id_tipoatividade = $dto->idTipoAtividade;
            return  $this->db->save($bean);
        }

    }

    public function findAll()
    {
        return $this->db->findAll('usuario');
    }

    public function updateStatusRemovidoById($id)
    {
        throw new Exception('Not implemented yet!');
    }

    public function existsLogin($login, $senha)
    {
        $usuarios = $this->findAllBySql(RETORNA_TODOS_USUARIOS, [':login'=>$login, ':senha'=>$senha]);

        if( count($usuarios)==1 ){
            return true;
        }
        return false;
    }
}
