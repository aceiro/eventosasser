<?php
		$id = $_POST['id'];
		$status = $_POST['status'];
		$comentarios = $_POST['comentarios'];
		
	// Estabelecendo a conexão com o banco de dados
	try{
		$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "UPDATE evento SET status='$status', comentarios='$comentarios' WHERE id ='$id'";
		$link->query($sql);

		$resposta = "<!DOCTYPE html ><html lang='pt-BR'><head><meta charset='utf-8' /><title>Asser Eventos - Cadastro realizado com sucesso</title><link REL=StyleSheet HREF='../../../css/estilo.css' TYPE='text/css'></head><body>
							<div id='corpo'><div id='cabecalho'>IX - Semana Conhecimento e VI - Mostra de Iniciação Científica</div><br /><div id='mmenu'><a>Dados Pessoais</a> | <a>Dados Resumo</a>  | Avaliação realizada</div>
							<br /><div id='texto'><p align='center'>Avaliação realizada com sucesso!</p><p align='center'><a href='./'>Avaliar novo resumo</a> | <a href='../../../'>Sair</a> </p></div><br /><div id='rodape'>
							<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  Visualização: 
							800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p></div></div></body></html>";

		echo $resposta;

	}catch(PDOException $e){
		echo "ERROR" . $e->getMessage();
	}
?>
