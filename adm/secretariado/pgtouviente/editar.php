<?php
	require_once("../../../cfg/Session.php");
	require_once("BD.php");
	$bd = new BD();
	error_reporting(0);
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
	include_once('../../../utils/common.php');
	$session->set('ra',$_POST['ra']);
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
		    <form id="cad_resumo" name="resumo" method="post" action="confirma.php" >
            	
	<?php		
		$bd->selecionaRa($session->get('ra'));
		$row = 	$session->get('nome');
		if(!isset($row)){
			exit("<center>Não encontrei este RA.<br><a href='./'>Voltar</a></center>");
			die();
		}
		$session->set('pago',1);
	?>
	<fieldset>	
		<legend>Confirmar Pagamento</legend>
			<div>
				<label>Aluno</label>
				<input type="text" name ="nome" size="50" maxlength="250" value="<?php echo $session->get('nome');?>" />
			</div>
			<div>
				<label>RA</label>
				<input type="text" name ="ra" size="50" maxlength="250" value="<?php echo $session->get('ra');?>" />
			</div>			
			
                <p align="center">
              <input name="cadastrar" type="submit" id="cadastrar" value="Confirmar Pagamento?" />
              <input name="limpar" type="reset" id="limpar" value="Limpar Campos!" /><br /> </p>
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