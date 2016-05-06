<?php 
	require_once("../../../cfg/Session.php");
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
	include_once('../../../utils/common.php');
	require_once("BD.php");
	$bd = new BD();
	
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

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

	<!-- adicionado o suporte para o bootstrap padrão  -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="../../../css/menu-styles.css" type="text/css">
	<link rel="stylesheet" href="../../../css/estilo.css" type="text/css">

	<script src="../../../scripts/asser-main-menu.js"></script>
	<script src="../../../scripts/asser-commum.js"></script>
	<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

	<link rel="stylesheet" href="../../../scripts/tablesorter/blue/style.css" type="text/css" id="" media="print, projection, screen">
	<script type="text/javascript" src="../../../scripts/tablesorter/jquery.tablesorter.js"></script>

<script type="application/javascript">
    $(document).ready(function()
        {
            $("#myTable").tablesorter();
        }
    );

</script>

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

        .itemStatus {
            text-align: center;
        }


        fieldset{
            width: auto;
            height: auto;
            margin: 10px;
        }

        table.tablesorter thead tr th{
            background-color: #1862A1;
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
				<li><a href='../'>Voltar</a></li>
                   <li><a href='../../../index.html'>Sair</a></li>
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
             <?php
				echo '<table id="myTable" class="tablesorter" >';
				echo '<caption><strong>Lista de alunos com pagamento já efetuado</strong> <br/> clique nas colunas para ordenar</caption>';
				echo '<thead>';
				echo '<tr><th>ID</th><th>ALUNO</th><th>TITULO</th><th>TIPO</th></tr>';
				echo '</thead>';
				echo '<tbody>';
				foreach($bd->resumosPagos() as $row){
					echo "<tr><td>".$row['codigo']."</td>";
					echo '</td><td>'.$row['autor'].'</td><td>'.$row['titulo'].'</td><td>'.$row['tipo'].'</td></tr>';
				}
				echo '</tbody>';
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
