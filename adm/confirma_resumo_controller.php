<?php
	try{
		header("Content-Type: text/html; charset=UTF-8", true);

		require_once("../constants/asser_eventos_constants.php");
		require_once ("../cfg/Session.php");
		require_once ("../repositorio/models/Trabalho.php");
		require_once ("../repositorio/TrabalhoRepository.php");
		require_once ('../repositorio/facade/EventosAsserFacade.php');

		$trabalhoRepository   = EventosAsserFacade::createTrabalhoRepository();
		$session              =  new Session("EventosAsser2016");

		$login 		 = $session->get(SESSION_KEY_LOGIN_ACADEMIC);
		$comentarios = $_POST['comentarios'];
		$status 	 = $_POST['status'];
		$idTrabalho  = $_POST['id'];




		if( !isset( $login ) ){
			throw new InvalidArgumentException('Login requerido !');
		}



		$id = $trabalhoRepository->updateReviewByIdTrabalho($idTrabalho, $status, $comentarios);
		if( isset($id) ){
			header("Location: ../relatorios/lista_resumos_x_autores.php");
		}else throw new Exception('Erro ao atualizar trabalho');



	}catch (Exception $e){
		header( "Location: ../error/error.php", true);
	}





