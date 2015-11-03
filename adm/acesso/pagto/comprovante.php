<!DOCTYPE html >
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<title>Asser Eventos - Pagamento Confirmado</title>
</head>

<?php
		$codigo = $_POST['codigo'];
		$autor = $_POST['autor'];
		$titulo = $_POST['titulo'];
		$tipo = $_POST['tipo'];
		$pago = $_POST['pago'];

?>

<body>
	<div id="corpo">
    	
        <div id="cabecalho">
		<p align="center">ESCOLA SUPERIOR DE TECNOLOGIA E EDUCACAO DE RIO CLARO</p>
    	<p align="center">IX - Semana Conhecimento e VI - Mostra de Iniciação Científica</p>
    	</div>
        
        <br />
        
        <div id="mmenu">
		<p align="center">Pagamento confirmado</p></div>
        
        <br />
        
        <div id="texto">
		    <form id="comprovante" name="resumo" method="post"  >
            	<p align="center">Declaro ter recebido de <?php echo $autor; ?> a importancia de R$ 10,00 referente a taxa de inscricao
				para participacao no formato <?php echo $tipo; ?> na IX - Semana Conhecimento e VI - Mostra de Iniciação Científica. </p><br />
				<p align="center">Rio Claro, _____ de ____________ de 2015.</p>
				<p align="center">Recebido de</p>
				<p align="center">________________________ </p>
				<p align="center">________________________ </p>
				<p align="center">Assinatura</p>
				
            </form>
		</div>
        
        <br />
        
        <div id="rodape">
    	<p align="center">Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001,</p> 
		<p align="center">ASSER - Todos os direitos reservados  Visualizacao: 800 x 600</p>
		<p align="center">Desenvolvido pelo Curso de Sistemas de Informacao. </p>
    	</div>
    </div>
</body>
</html>