<?php
    try{
        header('Content-Type: text/html; charset=iso-8859-1'); /* hack to be used on redirect*/

        require_once("../constants/asser_eventos_constants.php");
        require_once("../cfg/Session.php");
        require_once '../repositorio/models/Trabalho.php';
        require_once '../repositorio/facade/EventosAsserFacade.php';

        $repository = EventosAsserFacade::createTrabalhoRepository();

        $session = new Session(SESSION_SERVER_ID);
        $email = $session->get(SESSION_KEY_EMAIL);
        $curso = $session->get(SESSION_KEY_ID_CURSO);


        if( !isset($email) || !isset($curso)){
            $session->set(SESSION_MESSAGE_ERROR, 'There is no session active!');
            $session->set(SESSION_ERROR_CODE,     ERROR_CODE_GENERAL);
            throw new Exception;
        }

        $id    = $_GET['id'];
        $t     = $_GET['t'];

        if( "d" == $t ){
            $_SESSION[SESSION_REQUEST_DATA] = $_GET;
            header( "Location: confirma_exclusao_resumo.php", true);
        }else if( "r" == $t){
            header( "Location: login.php", true);

        }else throw new Exception;

    }catch(Exception $e){
        header( "Location: ../error/error.php", true);
    }
