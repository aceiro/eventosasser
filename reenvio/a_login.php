<?php 
	$config = require_once("../cfg/Session.php");
	require_once("../cfg/BD.php");
	$bd = new BD();
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
	
	$session->set('email',$_POST['email']);
	$session->set('password',$_POST['password']);
	
	foreach($bd->selecionaResumo() as $row){
				
		if(strcmp($row['password'],$session->get('password'))==0){
			$session->set('nome',$row['nome']);
			$session->set('tipo',$row['tipo']);
			$session->set('titulo',$row['titulo']);
			$session->set('curso',$row['curso']);
			$session->set('orientador',$row['orientador']);
			$session->set('autores',$row['autores']);
			$session->set('resumo',$row['resumo']);
			$session->set('keyword',$row['keyword']);
			header('Location: ed_resumo.php');
		}else{
			header('Location: ../reenvio');
		}
	}