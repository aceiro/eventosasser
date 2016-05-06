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
	#listar-coteudo{
		margin: 5px 5px 5px 50px;
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
        
        <div id="texto">
    		<form id="cad_usuario" name="usuario" method="post" action="editar.php" >
                <fieldset>
					<legend>Confirma pagamento Ouvinte</legend>
					<div>
					<label>Digite o RA referente ao aluno para confirmar o pagamento.</label>
					<input type="text" name="ra" id="ra" size="19" maxlength="20" /><input name="Confirmar" type="submit" id="Confirmar" value="Confirmar" /></div>
					<table style="width:100%">
					<th>RA</th><th>ALUNO</th><th>Palestra</th><th>PAGO</th>
					<?php	
						foreach($bd->listar() as $row){
							echo '<tr><td>' . $row['ra'] . '</td><td>' . $row['nome']
							. '</td><td>' . $row['palestra'] . '</td><td>' . $row['pago'].'</td></tr>';	
						}
						
					?>				
					</table>
				</fieldset>	

            </form>
        </div>
        
        <br />
        
        <div id="rodape">
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2016, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>
