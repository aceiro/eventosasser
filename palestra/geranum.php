<?php
	require_once("../cfg/Session.php");
	$session = new Session("EventosAsser2016");
	require_once("../cfg/BD.php");
	$bd = new BD();
	header("Content-Type: text/html; charset=UTF-8", true);
	
	$ra = rand(0,10000000);
	$session->set('ra',$ra);
		
	$conta = $bd->geraRa();
			
	if($conta == 0){
		$session->set('ra',$ra);
	}
	
	if($conta >= 1){
		$ra = rand(0,10000000);
		$session->set('ra',$ra);
	}
	
	header("location:index2.php");

?>