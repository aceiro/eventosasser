<?php
	require_once("../../../cfg/Session.php");
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
	include_once('../../../utils/common.php');
    if(!strcmp($session->get('login'),null)){
       header('Location: ../../');
       die();
    }
?>
<!DOCTYPE html >
<html lang="pt-BR">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="cache-control" content="no-store" />
	<link rel="shortcut icon" href="../../../favicon.ico">
	<title>Asser Eventos</title>
</head>

<body>
	<div id="corpo">
    	
        <div id="cabecalho">
    	</div>
        
        <br />
        
        <div id="mmenu">
		<p align="center">Pagamento confirmado</p></div>
        
        <br />
        
        <div id="texto">
		    <form id="comprovante" name="resumo" method="post"  >
            	<p align="center">Declaro ter recebido de <?php echo $session->get('nome'); ?> a importância de R$ ______ referente a taxa de inscrição
				para participação como ouvinte na V Workshop e VII - Mostra de Iniciação Científica. </p><br />
				<p align="center">Rio Claro, _____ de ____________ de 2016.</p>
				<p align="center">Recebido de</p>
				<p align="center">________________________ </p>
				<p align="center">________________________ </p>
				<p align="center">Assinatura</p>
				
            </form>
		</div>
        
        <br />
        
        <div id="rodape">
    	<p align="center">Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001,</p> 
		<p align="center">ASSER - Todos os direitos reservados  Visualização: 800 x 600</p>
		<p align="center">Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
		<a href="./">Voltar</a>
    </div>
</body>
</html>