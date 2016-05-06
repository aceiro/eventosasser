<?php
	require_once("../../../cfg/Session.php");
	$session = new Session("EventosAsser2016");
	
	require_once("BD.php");
	$bd = new BD();
	
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

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

	<link rel="stylesheet" href="../../../css/menu-styles.css" type="text/css">
	<link rel="stylesheet" href="../../../css/estilo.css" type="text/css">

	<script src="../../../scripts/asser-main-menu.js"></script>
	<script src="../../../scripts/asser-commum.js"></script>
	<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

	<style type="text/css">
		fieldset{
			width: 800px;
		}
	
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
            text-align: center;
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
            <br /> 

        <br />
        
        <div id="texto">
		<fieldset><legend>Digite o codigo referente ao aluno para confirmar o pagamento.</legend>
    		<form id="cad_usuario" name="usuario" method="post" action="editar.php" >
                <br />
				<p align="center"><b></b></p>
				<p align="center"><strong>Código: </strong><input type="text" name="codigo" id="codigo" size="19" maxlength="20" />
				<input name="Confirmar" type="submit" id="Confirmar" value="Confirmar" /></p>
			</form>
				<table class="table-hover">
					<th>CODIGO</th><th>ALUNO</th><th>TITULO</th><th>TIPO</th><th>PAGO</th>
				<?php						
					foreach($bd->selecionaTudo() as $row){
						echo '<tr><td>' . $row['codigo'] . '</td><td>' . $row['autor'] . '</td><td>';
						$titulo = $row['titulo'];
						?>
							<script>			
								var str = ' <?php echo $titulo; ?>  ';
								var res = str.toUpperCase();
								document.write(res);			
							</script>
						<?php
						echo '</td><td>' . $row['tipo'] . '</td><td>' . $row['pago'] . '</td></tr>';	
					}					
				?>
				</table>				
				<br />	
		</fieldset>
        </div>     
        
        <div id="rodape">
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2016, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>
