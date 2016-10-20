<?php
    try{
        require_once("../cfg/Session.php");
        require_once '../repositorio/models/Curso.php';
        require_once '../repositorio/facade/EventosAsserFacade.php';

        $repository = EventosAsserFacade::createParticipanteRepository();

        header('Content-Type: text/html; charset=iso-8859-1'); /* hack to be used on redirect*/

        $session = new Session("EventosAsser2016");
        $email   = $_POST['email'];
        $senha   = $_POST['senha'];


        if($repository->existsParticipante($email, $senha)){
            $participante = $repository->findParticipanteByEmail($email);

            $session->set('email', $participante->email);
            $session->set('nome', $participante->nome);
            $session->set('idCurso', $participante->idCurso);

            header( "Location: perfil.php", true);
        }else{
            header( "Location: login.php", true);
        }
        exit;
    }catch(Exception $e){
        header( "Location: ../error/error.php", true);
    }
