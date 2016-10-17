<?php
    require_once("../cfg/Session.php");
    $session = new Session("EventosAsser2016");
    require_once '..\repositorio\models\Curso.php';
    require_once '..\repositorio\models\Participante.php';
    require_once '..\repositorio\facade\EventosAsserFacade.php';

    $cursoRepository        = EventosAsserFacade::createCursoRepository();
    $participanteRepository = EventosAsserFacade::createParticipanteRepository();

    $nome    = strtoupper(addslashes($_POST['nome']));
    $email   = addslashes($_POST['email']);
    $senha   = addslashes($_POST['senha']);
    $idCurso = $_POST['curso'];

    $session->set('nome',$nome);
    $session->set('email',$email);
    $session->set('senha',$senha);
    $session->set('idCurso',$idCurso);


    $participante = new Participante(null, $nome, $email, $senha, $idCurso);
    $participanteRepository->save($participante);

    header('Content-Type: text/html; charset=iso-8859-1');      /* hack to be used on redirect */

    if($participanteRepository->existsParticipante($email, $senha)){
        header( "Location: perfil.php" );
    }else{
        header( "Location: novo.php" );
    }
    die;

