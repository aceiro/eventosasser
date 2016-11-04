<?php
    try{
        header('Content-Type: text/html; charset=iso-8859-1');      /* hack to be used on redirect */

        require_once '../constants/asser_eventos_constants.php';
        require_once '../cfg/Session.php';
        require_once '../repositorio/models/Curso.php';
        require_once '../repositorio/models/Participante.php';
        require_once '../repositorio/facade/EventosAsserFacade.php';

        $session                = new Session("EventosAsser2016");
        $cursoRepository        = EventosAsserFacade::createCursoRepository();
        $participanteRepository = EventosAsserFacade::createParticipanteRepository();

        $nome    = strtoupper(addslashes($_POST['nome']));
        $email   = addslashes($_POST['email']);
        $senha   = addslashes($_POST['senha']);
        $idCurso = $_POST['curso'];

        $session->set(SESSION_KEY_NOME,$nome);
        $session->set(SESSION_KEY_EMAIL,$email);
        $session->set(SESSION_KEY_SENHA,$senha);
        $session->set(SESSION_KEY_ID_CURSO,$idCurso);

        if($participanteRepository->existsParticipanteByEmail($email)) {
            $session->set(SESSION_MESSAGE_ERROR, 'Constraint violation, the e-mail address exists on database, '.$email);
            $session->set(SESSION_ERROR_CODE, ERROR_CODE_EMAIL_EXISTING);
            header("Location: ../error/error.php");
            exit;
        }


        $participante = new Participante(null, $nome, $email, $senha, $idCurso);
        $participanteRepository->save($participante);

        if($participanteRepository->existsParticipante($email, $senha)){
            header( "Location: perfil.php" );
        }else{
            header( "Location: novo.php" );
        }
        die;
    }catch(Exception $e){
        $session->set(SESSION_MESSAGE_ERROR,$e);
        header( "Location: ../error/error.php");
    }


