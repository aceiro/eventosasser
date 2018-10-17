<?php
	// Developed by E@@
	// controller event type (used by $.ajax(...) jQuery get method
	// https://api.jquery.com/jquery.get/
	//
	try{
		header("Content-Type: text/html; charset=UTF-8", true);

		require_once '../constants/asser_eventos_constants.php';
		require_once '../cfg/Session.php';
		include_once '../utils/common.php';

		require_once '../repositorio/models/Trabalho.php';
		require_once '../repositorio/models/Participante.php';
		require_once '../repositorio/TrabalhoRepository.php';
		require_once '../repositorio/ParticipanteRepository.php';

		require_once '../repositorio/facade/EventosAsserFacade.php';



		$session = new Session(SESSION_SERVER_ID);
		$t  	= $_GET['t'];
		$id 	= $_GET['id'];

		if( !isset($t) || !isset($id) || !$session->get(SESSION_KEY_EMAIL) || !$session->get(SESSION_KEY_ID_CURSO))
			 throw new Exception('The session is not enable or parameters is not defined');


	}catch(Exception $e){
		header( "Location: ../error/error.php", true);
	}

	$trabalhoRepository     = EventosAsserFacade::createTrabalhoRepository();
	$participanteRepository = EventosAsserFacade::createParticipanteRepository();

	if( "r"==$t ){
		$id = $trabalhoRepository->updateStatusRemovidoById($id);
		echo json_encode( ['status'=>SUCCESS_PROCESS_STATUS] );
	}else if( "e"==$t ){
		echo json_encode( ['status'=>ERROR_PROCESS_STATUS]);
	}else throw new Exception('Not implemented !');




