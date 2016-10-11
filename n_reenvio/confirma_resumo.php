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

	$session->set("titulo", $_POST['titulo']);
	$session->set("curso", $_POST['curso']);
	$session->set("orientador", $_POST['orientador']);
	$session->set("resumo", $_POST['resumo']);
	$session->set("keyword", $_POST['keyword']);
	$session->set("status", '0');

// verifica se não está vazia as strings
// senao faz um bypass
	if( isEmpty($session->get('titulo')) 	 ||
		isEmpty($session->get('curso'))  	 ||
		isEmpty($session->get('orientador')) ||
		isEmpty($session->get('resumo')) 	 ||
		isEmpty($session->get('keyword')) ){
			die();
		}
	require_once("../cfg/BD.php");
	$bd = new BD();
	$bd->atualizaResumoPorId($_GET['id']);
	require_once("../adm/sair.php");
	sair();
	header("Location:confirma.html");
	
?>
