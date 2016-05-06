<?php 
	require_once("../cfg/Session.php");
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
?>
<!DOCTYPE html >
<html lang="pt-BR">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv='pragma' content='no-cache' />
	<meta http-equiv='cache-control' content='no-cache' />
	<meta http-equiv='cache-control' content='no-store' />
	<link rel='shortcut icon' href='../favicon.ico'>
	<title>Asser Eventos</title>
	<link REL=StyleSheet HREF='../css/estilo.css' TYPE='text/css'>
	<!-- adicionado o suporte para o jquery e thema redmond -->
	<link rel='stylesheet' href='//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css'>
	<script src='//code.jquery.com/jquery-1.10.2.js'></script>
	<script src='//code.jquery.com/ui/1.11.4/jquery-ui.js'></script>
	<!-- outros suporte a css da página -->
	<link rel='stylesheet' href='../css/menu-styles.css' type='text/css'>
	<link rel='stylesheet' href='../css/estilo.css' type='text/css'>
	<!-- outros scripts para o menu-->
	<script src='//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js'></script>
	<script src='../scripts/asser-main-menu.js'></script>
	<script src='../scripts/asser-commum.js'></script>

</head>
<body>
	<div id='corpo'>
    	
		<div id='cabecalho'>
        </div>        
        <br />
        
        <!-- menu da aplicacao -->
          <div id='cssmenu'>
                <ul>
                   <li><a href='../'>Sair</a></li> 
                </ul>
            </div>

            <!-- adiciona o suporte ao separador gradiente -->
            <div id='mmenu'> &nbsp;</div>
            <div id='mmenubar'> &nbsp;</div>
            <div id='mmenusubbar'> &nbsp;</div>
            <div id='mmenusubsubbar'> &nbsp;</div>
            <br />        
        <br />        
        <br />
        
        <div id='texto'>
    		<form id='cad_palestra' name='palestra' method='POST' action='valida.php' >
			<fieldset>
				<legend>Informe seu RA e nome:</legend>
				<div class="info-resumo">Não Possui RA? <a href="geranum.php" style="color: rgb(255,255,255)"><strong>Clique aqui</strong></a> e guarde o número gerado.</div><br />
				<?php 
					$ra = $session->get('ra');
					if ($ra == ""){
						echo "<div><label>RA</label><input type='text' name='ra' id='ra' size='25'></div>";
					}
					if ($ra != ""){
						echo "<div><label>RA</label><input type='text' name='ra' id='ra' value='{$ra}' size='25'></div>";
					}				
				?>				
				<div><label>Nome</label><input type="text" name="nome" id="nome" size="60"></div>
				<div class='button'>	
					<input name='proximo' style='width:30%;' type='submit' id='proximo' value='Próximo' />
				</div>
			</fieldset>
				<br />	
            </form>
        </div>
        
        <br />
        
        <div id='rodape'>
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>