<?php 
//grava dados na sessão
	require_once("../cfg/Session.php");
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
	$session->set("login", $_POST['email1']);
	$session->set("autor", $_POST['autor']);
	$session->set("tipo", $_POST['tipo']);
	$session->set("password", $_POST['password']);

	header("Location: cad_resumo.php");
?>
<!--
<!DOCTYPE html >
<html lang="pt-BR">
<head>
		<meta http-equiv="content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="cache-control" content="no-store" />
	<link rel="shortcut icon" href="../favicon.ico">
	<title>Asser Eventos</title>
	<html>
		<body>
		<div align="center">
			Período de envio de resumos expirou !
			</br><a href='../' >  Voltar </a>
		</div>
		</body>
	</html>
-->

