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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="../../../css/menu-styles.css" type="text/css">
	<link rel="stylesheet" href="../../../css/estilo.css" type="text/css">
	<script src="../../../scripts/asser-main-menu.js"></script>
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
      <div id='cssmenu'>
			<ul>
			   <li class='active'><a href='../'>Voltar</a></li>
			   <li><a href='../../../'>Sair</a></li>
			</ul>
	 	</div>

		<div id="mmenu"> &nbsp;</div>
		<div id="mmenubar"> &nbsp;</div>
		<div id="mmenusubbar"> &nbsp;</div>
		<div id="mmenusubsubbar"> &nbsp;</div>
        <div>
		<p align="center"><a href="./">Cadastrar Nova</a> | <a href="../">Voltar</a></p>
    		<form id="cad_usuario" name="usuario" method="post" action="av_resumo.php"  onSubmit="return validaCampo(); return false;">
             
		<?php
			echo '<p align="center" size="10"><b>';
			echo '<table style="width:100%">';
			echo '<tr><td>DIA</td><td>HORÁRIO</td><td>TITULO</td><td>PALESTRANTE</td></tr>';
						
			foreach($bd->listar() as $row){
				echo '<tr><td>'.$row['dia'].'</td><td>'.$row['horario'].'</td><td>'.$row['palestra'].'</td><td>'.$row['palestrante'].'</td></tr>';	
			}
			echo '</table>';
		?>
<p align="center"><a href="./">Cadastrar Nova</a> | <a href="../">Voltar</a></p>
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