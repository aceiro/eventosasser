<?php
	function isEmpty($input)
	{
		$strTemp = $input;
		$strTemp = trim($strTemp); // trimming the string

		if( $strTemp == null       ||
		    $strTemp == ''         ||
		    strlen($strTemp) == 0  ) {
			return true;
		}
		return false;
	}
 
	require_once("../cfg/Session.php");
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
    $titulo         = strtoupper(addslashes($_POST['titulo']));
    $resumo         = addslashes($_POST['texto']);
    $keyword        = addslashes($_POST['keyword']);
    $statusR         = 1;
    $comentarios    = 'Professor avaliador, por favor anote as alterações para o autor aqui.';
    $idCurso        = $session->get('idCurso');
    $idTipoAtividade = $_POST['tipo'];
    $idEvento       = 1;

    require_once ("../repositorio/models/Trabalho.php");
    require_once ("../repositorio/TrabalhoRepository.php");
    require_once ("../repositorio/models/Participante.php");
    require_once ("../repositorio/ParticipanteRepository.php");
    require_once ('../repositorio/facade/EventosAsserFacade.php');

    $trabalhoRepository = EventosAsserFacade::createTrabalhoRepository();
    $participanteRepository = EventosAsserFacade::createParticipanteRepository();

    $trabalho = new Trabalho(null,$titulo, $resumo, $keyword, $statusR, $comentarios, $idCurso, $idTipoAtividade, $idEvento);
    $trabalhoRepository->save($trabalho);

    //recuperando id do trbalho para update participante autor principal

    $sql = 'SELECT id FROM trabalho WHERE titulo = :titulo';
    foreach($participanteRepository->findAllBySql($sql, [':titulo'=>$titulo]) as $idTrabalho);


    $sql = 'SELECT * FROM participante WHERE nome = :nome;';
    foreach($participanteRepository->findAllBySql($sql, [':nome'=>$session->get('nome')]) as $row){
        $participante = new Participante($row['id'],$row['nome'],$row['email'],$row['senha'],null,1,$id['id'],$idCurso);
    };

    $participanteRepository->update($participante);

	header("Location:confirma.php");
	
?>
