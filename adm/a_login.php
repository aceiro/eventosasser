<?php
	require_once("../cfg/Session.php");
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
	
	$session->set('login', addslashes($_POST['login']));
	$session->set('password', addslashes($_POST['password']));
	$session->set('funcao', addslashes($_POST['funcao']));
	
	//$bd->check($session->get('login'), $session->get('password')); sem validar

    if(strcmp($session->get('funcao'),"administrador")==0){
        header("location:administrador.php");
    }else if(strcmp($session->get('funcao'),"professor")==0){
        header("location:professor.php");
    }else{
        header("location:secretaria.php");
    }

