<?php
	require_once("../cfg/Session.php");
	//error_reporting(0);
	$session = new Session("EventosAsser2016");
	
	require_once("../cfg/BD.php");
	$bd = new BD();
	
	header("Content-Type: text/html; charset=UTF-8", true);
	
	$session->set('palestra',$_POST['palestra']);
	
	$bd->cadastrarAlunoPalestra();

    header('location:finalizar.php');
?>