<?php $config = require '../cfg/config.php'; ?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<title>Asser Eventos</title>
<!-- adicionado o suporte para o jquery e thema redmond -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!-- adicionado o suporte para o bootstrap padrão  -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 
<!-- outros suporte a css da página -->

<link rel="stylesheet" href="../css/menu-styles.css" type="text/css">
<link rel="stylesheet" href="../css/estilo.css" type="text/css">

<!-- outros scripts para o menu-->
<script src="../scripts/asser-main-menu.js"></script>

<style type="text/css">
	#listar-coteudo{
		margin: 5px 5px 5px 50px;
	}

	table{
		width: 95%;
	}

	table caption{
		font-size: 14px;
		text-align: center;
	}

	table, th, td{
		border: 1px solid #CBCDDD;
		border-collapse: collapse;
	}

	th, td {
		padding: 5px;
		text-align: left;		
	}

	tr:nth-child(even){
		background-color: #eee;
	}

	tr:nth-child(odd){
		background-color: #fff;
	}

	th{
		background-color: #1862A1;
		color: white;
	}

	.linhaStatusVazio{ }

	.itemStatus {
		text-align: center;
	}

</style>

</head>

<body>
	<div id="corpo">
    	
		<div id="cabecalho">
    		IX - Semana Conhecimento
    		<div id="subcabecalho" style="font-size:14px"> VI Mostra de Iniciação Científica </div>
    	</div>
        
        <br />
        
       <!-- menu da aplicacao -->
      <div id='cssmenu'>
			<ul>
			   <li><a href='../index.html'>Evento</a></li>	
			   <li class='active'><a href='../index.html'>Submissão de Trabalhos</a></li>
			   <li><a href='../palestra'>Palestras</a></li>
			   <li><a href='../programa.html'>Programação</a></li>			   
			   		
			   <li class='has-sub'> <a href='#'>Edições Anteriores</a> 
				   		<ul>
				   			<li> <a href='../anais/Anais2015_FINAL.pdf' target="_blank"> V Mostra de Iniciação Científica e Workshop (Anais 6/2015)</a> </li>
				   		</ul>
			   	    </li>   
			   <li><a href='../contato'>Contato</a></li>
			   <li><a href='../creditos.html'>Créditos</a></li>
			</ul>
	 	</div>

		<!-- adiciona o suporte ao separador gradiente -->
		<div id="mmenu"> &nbsp;</div>
		<div id="mmenubar"> &nbsp;</div>
		<div id="mmenusubbar"> &nbsp;</div>
		<div id="mmenusubsubbar"> &nbsp;</div>
		<br />
        
        
        
        <div id="listar-coteudo">
		<p align="center"><a href="../">Voltar</a></p>
    		<form id="cad_usuario" name="usuario" method="post" action="av_resumo.php"  onSubmit="return validaCampo(); return false;">
                
				<?php
				// Estabelecendo a conexão com o banco de dados
				try{
					$link = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
					$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
					$sql = 'SELECT * FROM evento order by curso';
					
					echo '<table class=\'table-hover\'>';
					echo '<caption><strong>Lista de Resumos submetidos </strong></caption>';
					echo '<th>ID</th><th>TITULO</th><th>ALUNO</th><th>CURSO</th><th>STATUS</th>';
					$linhaStatus = "linhaStatusVazio";
					$result = "-";
					foreach($link->query($sql) as $row){
						$status = $row['status'];						
						switch($status){
							case 0:{
								$result="<span class=\"glyphicon glyphicon-list-alt\"></span><br/> Enviado";
								$linhaStatus = "info";
								break;
							}
							case 1:{
								$result="<span class=\" glyphicon glyphicon-ok-circle\"></span><br/>Aprovado";
								$linhaStatus = "success";
								break;
							}
							case 2:{
								$result="<span class=\" glyphicon glyphicon-ban-circle\"></span><br/>Re-enviar";
								$linhaStatus = "warning";
								break;
							}
							case 3:{
								$result="<span class=\" glyphicon glyphicon-remove-circle\"></span><br/>Reprovado";
								$linhaStatus = "danger";
								break;
							}
							default:{
								$result="-";								
							}
						}
					
						echo '<tr class=\''.$linhaStatus. '\'><td>'.$row['id'].'</td><td>'.$row['titulo'].'</td><td>'.$row['nome'].'</td><td>'.$row['curso'].'</td><td class=\'itemStatus\'>'.$result.'</td></tr>';	
					}
					echo '</table>';
					
				}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
				}
				?>		
				<br />			
                <p align="center"><a href="../">Voltar</a></p>
				<br />	

            </form>
        </div>
        
        <br />
    <div id="rodape">
              <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
      </div>
    </div>
</body>
</html>
