<?php
	require_once("../cfg/Session.php");
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
	$session->set('ra',$_POST['ra']);
	$session->set('nome',$_POST['nome']);
	header('location: palestras.php');
?>