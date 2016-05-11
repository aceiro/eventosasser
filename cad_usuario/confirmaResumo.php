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
	
	$session->set('autor1',$_POST['autor1']);
	$session->set('email1',$_POST['email1']);
	$session->set("titulo", $_POST['titulo']);
	$session->set("curso", $_POST['curso']);
	$orientador = $_POST['esp'] . ' ' . $_POST['orientador'];
	$session->set("orientador", $orientador);
	$session->set("resumo", $_POST['resumo']);
	$session->set("keyword", $_POST['keyword']);
	$session->set("status", '0');
	$session->set("comentarios", 'Professor avaliador, por favor anote as alterações para o autor aqui.');
	
	$autores = $session->get("autor1") . "  - " . $session->get("email1");
	//verifica se há mais autores
	if(strcmp($_POST['autor2'],"")!=0){
			$session->set("autor2",$_POST['autor2']);
			$session->set("email2",$_POST['email2']);
			$autores = $autores . "; " . $session->get('autor2') . " - " . $session->get('email2');	
		}	
	if(strcmp($_POST['autor3'],"")!=0){
			$session->set("autor3",$_POST['autor3']);
			$session->set("email3",$_POST['email3']);
			$autores = $autores . "; " . $session->get('autor3') . " - " . $session->get('email3');		
		}	
	if(strcmp($_POST['autor4'],"")!=0){
			$session->set("autor4",$_POST['autor4']);
			$session->set("email4",$_POST['email4']);
			$autores = $autores . "; " . $session->get('autor4') . " - " . $session->get('email4');			
		}		
	if(strcmp($_POST['autor5'],"")!=0){
			$session->set("autor5",$_POST['autor5']);
			$session->set("email5",$_POST['email5']);
			$autores = $autores . "; " . $session->get('autor5') . " - " . $session->get('email5');	
		}	
		

	if( isset($_POST['authorPlus']) ){
		$authorPlus = $_POST['authorPlus'];

		foreach ($authorPlus as $key => $value) {
			$authorName  = $value['author'];
			$authorEmail = $value['email'];

			$autores = $autores . '; ' . $authorName . ' - ' . $authorEmail;
		}
	}

	
	$session->set("autores", $autores);

// verifica se não está vazia as strings
// senao faz um bypass
	if( isEmpty($session->get('titulo')) || isEmpty($session->get('curso')) || isEmpty($session->get('orientador')) || isEmpty($session->get('resumo')) || isEmpty($session->get('keyword')) ){
			die();
		}
	
	header("Location:confirma.php");
	
?>
