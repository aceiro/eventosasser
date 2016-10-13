<?php
require '..\repositorio\TipoAtividadeRepository.php';
require '..\repositorio\facade\Database.php';

class EventosAsserFacade
{

    public static function createTipoAtividadeRepository(){
        $tipoAtividadeDb = (new TipoAtividadeRepository(new Database()));
        return $tipoAtividadeDb;
    }
}