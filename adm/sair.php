<?php 
	require_once("../cfg/Session.php");
	function sair(){
		$session = new Session("EventosAsser2016");
		$session->destroy();
	}
?>