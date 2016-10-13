<?php
require_once '..\repositorio\TipoAtividadeRepository.php';
require_once '..\repositorio\CursoRepository.php';
require_once '..\repositorio\ParticipanteRepository.php';
require_once '..\repositorio\facade\Database.php';

class EventosAsserFacade
{

    public static function createTipoAtividadeRepository(){
        $db = (new TipoAtividadeRepository(new Database()));
        return $db;
    }

    public static function createCursoRepository(){
        $db = (new CursoRepository(new Database()));
        return $db;
    }

    public static function createParticipanteRepository(){
        $db = (new ParticipanteRepository(new Database()));
        return $db;
    }
}