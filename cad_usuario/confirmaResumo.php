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
	
	$session->set('autor1',addslashes($_POST['autor1']));
	$session->set('email1',addslashes($_POST['email1']));
	$session->set("titulo",addslashes($_POST['titulo']));
	$session->set("resumo",addslashes($_POST['texto']));
	$session->set("keyword",addslashes($_POST['keyword']));
	$session->set("status", '0');
	$session->set("comentarios", 'Professor avaliador, por favor anote as alterações para o autor aqui.');
	
	$autores = $session->get("autor1") . "  - " . $session->get("email1");
	//verifica se há mais autores
	if(strcmp($_POST['autor2'],"")!=0){
			$session->set("autor2",addslashes($_POST['autor2']));
			$session->set("email2",addslashes($_POST['email2']));
            $session->set("co-autor2",1);
		}	
	if(strcmp($_POST['autor3'],"")!=0){
			$session->set("autor3",addslashes($_POST['autor3']));
			$session->set("email3",addslashes($_POST['email3']));
            $session->set("co-autor3",1);
		}	
	if(strcmp($_POST['autor4'],"")!=0){
			$session->set("autor4",addslashes($_POST['autor4']));
			$session->set("email4",addslashes($_POST['email4']));
            $session->set("co-autor4",1);
		}		
	if(strcmp($_POST['autor5'],"")!=0){
			$session->set("autor5",addslashes($_POST['autor5']));
			$session->set("email5",addslashes($_POST['email5']));
            $session->set("co-autor5",1);
		}	
		

	if( isset($_POST['authorPlus']) ){
		$authorPlus = $_POST['authorPlus'];
        //$emails = $_POST['emails'];

		foreach ($authorPlus as $key => $value) {
			$authorName  = $value['author'];
			//$authorEmail = $value['emails'];
		}
	}

	
	$session->set("autores", $autores);
    //$session->set("emails", $emails);
    $session->set("co-autorplus",1);

// verifica se não está vazia as strings
// senao faz um bypass
	if( isEmpty($session->get('titulo')) || isEmpty($session->get('curso')) || isEmpty($session->get('orientador')) || isEmpty($session->get('resumo')) || isEmpty($session->get('keyword')) ){
			die();
		}
	
	header("Location:confirma.php");
	
?>
