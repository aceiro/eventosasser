<?php
	require_once("../cfg/Session.php");
	require_once("BD.php");
	error_reporting(0);
	$bd = new BD();
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
	
	$session->set('login', $_POST['login']);
	$session->set('password', $_POST['password']);
	$session->set('funcao',$_POST['funcao']);
	
	$bd->check($session->get('login'), $session->get('password'));

