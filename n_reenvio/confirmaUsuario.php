<?php 
	require_once("../cfg/Session.php");
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
	$session->set("r_email", 	$_POST['r_email']);
	$session->set("r_password", $_POST['r_password']);

	header("Location: ed_resumo.php?id=" . $_GET['id']);
?>


