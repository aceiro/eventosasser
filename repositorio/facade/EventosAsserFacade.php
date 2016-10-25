<?php
require_once '../repositorio/TipoAtividadeRepository.php';
require_once '../repositorio/CursoRepository.php';
require_once '../repositorio/ParticipanteRepository.php';
require_once '../repositorio/ParticipanteTrabalhoRepository.php';
require_once '../repositorio/InscricaoRepository.php';
require_once '../repositorio/LogRepository.php';
require_once '../repositorio/TrabalhoRepository.php';
require_once '../repositorio/OrientadorRepository.php';
require_once '../repositorio/facade/Database.php';

class EventosAsserFacade
{

    public static function createCursoRepository(){
        $db = (new CursoRepository(new Database()));
        return $db;
    }

    public static function createParticipanteRepository(){
        $db = (new ParticipanteRepository(new Database()));
        return $db;
    }

    public static function createTrabalhoRepository(){
        $db = (new TrabalhoRepository(new Database()));
        return $db;
    }

    public static function createTipoAtividadeRepository(){
        $db = (new TipoAtividadeRepository(new Database()));
        return $db;
    }

    public static function createParticipanteTrabalhoRepository(){
        $db = (new ParticipanteTrabalhoRepository(new Database()));
        return $db;
    }

    public static function createInscricaoRepository(){
        $db = (new InscricaoRepository(new Database()));
        return $db;
    }

    public static function createLogRepository(){
        $db = (new LogRepository(new Database()));
        return $db;
    }

    public static function createOrientadorRepository(){
        $db = (new OrientadorRepository(new Database()));
        return $db;
    }
}