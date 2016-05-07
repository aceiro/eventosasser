<?php 
	require_once("../../../cfg/Session.php");
	require_once("BD.php");
	$bd = new BD();
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
	include_once('../../../utils/common.php');
    if(!strcmp($session->get('login'),null)){
       header('Location: ../../');
       die();
    }	
	$bd->gravaPalestra($_POST['palestrante'],$_POST['palestra'],$_POST['dia'],$_POST['horario']);
?>