<?php
    require_once("../cfg/Session.php");
    $session = new Session("EventosAsser2016");
    require '..\repositorio\models\Curso.php';
    require '..\repositorio\facade\EventosAsserFacade.php';
    $repository = EventosAsserFacade::createParticipanteRepository();


    header('Content-Type: text/html; charset=iso-8859-1'); /* hack to be used on redirect*/

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