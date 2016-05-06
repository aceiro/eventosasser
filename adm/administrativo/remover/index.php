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
?>
<!DOCTYPE html >
<html lang="pt-BR">
<head>
	<meta charset="UTF-8"/>
	<title>Asser Eventos</title>
	<!-- adicionado o suporte para o jquery e thema redmond -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

	<!-- adicionado o suporte para o bootstrap padrão  -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	 
	<!-- outros suporte a css da página -->

	<link rel="stylesheet" href="../../../css/menu-styles.css" type="text/css">
	<link rel="stylesheet" href="../../../css/estilo.css" type="text/css">

	<!-- outros scripts para o menu-->
	<script src="../../../scripts/asser-main-menu.js"></script>

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

        <!-- inicio do menu da aplicacao -->
          <div id='cssmenu'>
                <ul>
                   <li class='active'><a href='../'>Voltar</a></li>
                   <li><a href='../../../'>Sair</a></li>
                </ul>
            </div>

            <!-- adiciona o suporte ao separador gradiente -->
            <div id="mmenu"> &nbsp;</div>
            <div id="mmenubar"> &nbsp;</div>
            <div id="mmenusubbar"> &nbsp;</div>
            <div id="mmenusubsubbar"> &nbsp;</div>
            <br /> 
        
        <div id="listar-coteudo">
    		<form id="register-form" name="register-form" method="post" action="av_resumo.php"  >
                
			<p align="center"><b>Digite o ID do resumo a remover.</b></p>
			<p align="center"><input type="text" name="id" size="19" maxlength="20" /> </p> <p align="center"> <input type="submit" name="remover"  id="remover" value="Remover?" /></p>
			<?php
				$row = $bd->selecionaResumos();
				echo '<table class=\'table-hover\'>';
				echo '<caption><strong>Lista de Resumos submetidos </strong></caption>';
				echo '<th>ID</th><th>TITULO</th><th>ALUNO</th><th>CURSO</th><th>STATUS</th>';
				$linhaStatus = "linhaStatusVazio";
					$result = "-";
					foreach($row){
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
				?>		
				<br />	
            </form>
        </div>
        <br />
        <div id="rodape">
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2016, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>
