<?php $config = require '../cfg/config.php'; ?>
<?php include_once('../utils/common.php'); ?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="cache-control" content="no-store" />
	<link rel="shortcut icon" href="../favicon.ico">
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
    	</div>
        
        <br />
        

        
        
        <div id="listar-coteudo">
				<?php

				try{
					$link = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
					$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
					$sql = 'SELECT DISTINCT  * FROM evento WHERE titulo <> \'\' AND  titulo IS NOT NULL AND
                                                                 nome <> \'\' AND  nome IS NOT NULL AND
                                                                 curso LIKE \'%educa%\' AND
                                                                 status LIKE \'1\'
                                                           ORDER BY tipo';
					
					echo '<table class=\'table-hover\'>';
					echo '<caption><strong>Relatório de Trabalhos APROVADOS </strong> - <a href="#" onclick="window.print();return false;">Imprimir página</a></caption>';
					echo '<th>ID</th><th>TIPO</th><th>TITULO</th><th>ALUNO</th><th>CURSO</th>';
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
					
						echo '<tr class=\''.$linhaStatus. '\'><td>'.$row['id'].'</td><td>'.$row['tipo'].'</td><td>'.$row['titulo'].'</td><td>'.$row['nome'].'</td><td>'.$row['curso'].'</td></tr>';
					}
					echo '</table>';
					
				}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
				}
				?>		
        </div>
        
        <br />
    <div id="rodape">
              <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
      </div>
    </div>
</body>
</html>
