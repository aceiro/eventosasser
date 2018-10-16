<?php
	require_once("../cfg/Session.php");
    require_once("../constants/asser_eventos_constants.php");
    require_once '../repositorio/models/Usuario.php';
    require_once '../repositorio/facade/EventosAsserFacade.php';

    $session    = new Session(SESSION_SERVER_ID);
    $repository = EventosAsserFacade::createUsuarioRepository();

	header("Content-Type: text/html; charset=UTF-8", true);


    if( !isset($_POST) ){
        header("location:index.php");
        die;
    }

    $login          = $_POST['login'];
    $senha          = $_POST['password'];
    $tipoatividade  = $_POST['funcao'];

    $session->set(SESSION_KEY_TYPE_ACADEMIC, $tipoatividade);
    $session->set(SESSION_KEY_LOGIN_ACADEMIC, $login);
    $session->set(SESSION_KEY_PASSWORD_ACADEMIC, $senha);


    function isProfessor($session){
        return strcmp($session->get(SESSION_KEY_TYPE_ACADEMIC), "professor") == 0;
    }

    function isSecretaria($session){
        return strcmp($session->get(SESSION_KEY_TYPE_ACADEMIC), "secretaria") == 0;
    }


    // controller (redirect)
    // manage routes
    // for professor and secretary
    if(isProfessor($session)){
        // 1. find login for professor access
        // 2. set login for processor access on session
        if( $repository->existsLogin($login, $senha) ){
            header("location:professor_perfil.php");
        }else  header("location:index.php");

    }else if(isSecretaria($session)){

        // 1. find login for secretary access
        // 2. set login for secretary access on session

        if( $repository->existsLogin($login, $senha) ){
            header("location:secretaria_perfil.php");
        }else  header("location:index.php");
    }

