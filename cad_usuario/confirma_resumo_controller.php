<?php

    require_once("../constants/AsserEventosConstants.php");
	require_once("../cfg/Session.php");
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
    $titulo          = strtoupper(addslashes($_POST['titulo']));
    $resumo          = addslashes($_POST['texto']);
    $keyword         = addslashes($_POST['keyword']);
    $statusR         = RESUMO_STATUS_ENVIADO;
    $comentarios     = 'Professor avaliador, por favor anote as alterações para o autor aqui.';
    $idCurso         = $session->get(SESSION_KEY_ID_CURSO);
    $idTipoAtividade = $_POST['tipo'];
    $idEvento        = 1;

    require_once ("../repositorio/models/Trabalho.php");
    require_once ("../repositorio/TrabalhoRepository.php");
    require_once ("../repositorio/models/Participante.php");
    require_once ("../repositorio/models/ParticipanteTrabalho.php");
    require_once ("../repositorio/ParticipanteRepository.php");
    require_once ('../repositorio/facade/EventosAsserFacade.php');

    $listOfEmails = $_POST['email'];

    $trabalhoRepository     = EventosAsserFacade::createTrabalhoRepository();
    $participanteRepository = EventosAsserFacade::createParticipanteRepository();
    $participanteTrabalhoRepository = EventosAsserFacade::createParticipanteTrabalhoRepository();

    $trabalho   = new Trabalho(null,$titulo, $resumo, $keyword, $statusR, $comentarios, $idCurso, $idTipoAtividade, $idEvento);
    $idTrabalho = $trabalhoRepository->save($trabalho);
    if( is_null($idTrabalho) ){
        echo "<br>Não foi possível criar o resumo!";
        return;
    }


    foreach ($listOfEmails as $email) {
        if( $email==NULL )
            continue;

        if( !is_string($email) && !$participanteRepository->existsParticipanteByEmail($email) )
            throw new InvalidArgumentException('O participante ' + $email + 'não existe na base de dados !') ;



        $participanteDto = $participanteRepository->findParticipanteByEmail($email);
        $idParticipante  = $participanteDto->id;

        $participanteTrabalho = ParticipanteTrabalho::create()
                                        ->setIdParticipante($idParticipante)
                                        ->setIdTrabalho($idTrabalho)
                                        ->setCoAutor(false)
                                        ->setAutorPrincipal(false)
                                        ->setOuvinte(false);

        $participanteTrabalhoRepository->save($participanteTrabalho);

    }
    header("Location:confirma.php");


