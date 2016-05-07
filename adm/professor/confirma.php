<?php
	require_once("../../../cfg/Session.php");
	require_once("BD.php");
	$bd = new BD();
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
	
    if(!strcmp($session->get('login'),null)){
       header('Location: ../../');
       die();
    }

	$session->set('status', $_POST['status']);
	$session->set('comentarios', $_POST['comentarios']);
	
	$bd->gravaAlteracao($session->get('status'),$session->get('comentarios'),$session->get('id'));

?>
