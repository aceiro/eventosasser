<?php
    try{
        header("Content-Type: text/html; charset=UTF-8", true);

        require_once("../constants/asser_eventos_constants.php");
        require_once ("../cfg/Session.php");
        require_once ("../repositorio/models/Trabalho.php");
        require_once ("../repositorio/TrabalhoRepository.php");
        require_once ("../repositorio/models/Participante.php");
        require_once ("../repositorio/models/ParticipanteTrabalho.php");
        require_once ("../repositorio/ParticipanteRepository.php");
        require_once ('../repositorio/facade/EventosAsserFacade.php');


        $session            =  new Session("EventosAsser2016");
        $idTrabalho         =  $_POST['trabalho_id'];
        $titulo             =  strtoupper(addslashes($_POST['titulo']));
        $resumo             =  addslashes($_POST['texto']);
        $keywords           =  addslashes($_POST['keyword']);
        $idTipoAtividade    =  $_POST['tipo'];
        $idOrientador       =  $_POST['orientador'];
        $idCoorientador     =  $_POST['coorientador'];
        $listOfEmails       =  $_POST['email'];

        $trabalhoRepository             = EventosAsserFacade::createTrabalhoRepository();
        $participanteRepository         = EventosAsserFacade::createParticipanteRepository();
        $participanteTrabalhoRepository = EventosAsserFacade::createParticipanteTrabalhoRepository();

        $idTrabalhoUpdated   = $trabalhoRepository->updateTrabalhoReviewed($idTrabalho, $titulo, $resumo, $keywords, $idOrientador, $idTipoAtividade, $idCoorientador);

        if( is_null($idTrabalhoUpdated) ){
            echo "<br>Não foi possível criar o resumo!";
            return;
        }

        $firstAuthor = true;
        foreach ($listOfEmails as $email) {
            if( $email==NULL )
                continue;

            if( $participanteRepository->checkIfTrabalhosExists($idTrabalhoUpdated, $email))
                continue;

            if( !is_string($email) && !$participanteRepository->existsParticipanteByEmail($email) )
                throw new InvalidArgumentException('O participante ' + $email + 'não existe na base de dados !') ;



            $participanteDto = $participanteRepository->findParticipanteByEmail($email);
            $idParticipante  = $participanteDto->id;

            $participanteTrabalho = ParticipanteTrabalho::create()
                ->setIdParticipante($idParticipante)
                ->setIdTrabalho($idTrabalhoUpdated)
                ->setCoAutor($firstAuthor == false)
                ->setAutorPrincipal($firstAuthor == true)
                ->setOuvinte(false);

            $participanteTrabalhoRepository->save($participanteTrabalho);
            $firstAuthor = false;

        }
        header("Location:confirma.php");
    }catch(Exception $e){
        header( "Location: ../error/error.php", true);
    }



