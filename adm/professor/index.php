<?php 
	require_once("../../cfg/Session.php");
	require_once("BD.php");
	$bd = new BD();
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
	include_once('../../utils/common.php');
	
	//$bd->checkUsuario($session->get('login'));
	
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
	<link rel="shortcut icon" href="../../favicon.ico">
	<title>Asser Eventos</title>
	
	<!-- adicionado o suporte para o jquery e thema redmond -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	
	<!-- adicionado o suporte para o bootstrap padrão  -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<!-- outros suporte a css da página -->
	<link rel="stylesheet" href="../../css/menu-styles.css" type="text/css">
	<link rel="stylesheet" href="../../css/estilo.css" type="text/css">


	<!-- outros scripts para o menu-->
	<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
	<script src="../../scripts/asser-main-menu.js"></script>
	<script src="../../scripts/asser-commum.js"></script>

	<link rel="stylesheet" href="../../scripts/tablesorter/blue/style.css" type="text/css" media="print, projection, screen">
	<link rel="stylesheet" href="../../css/teacher-evaluation-style.css" type="text/css">
	<script type="text/javascript" src="../../scripts/tablesorter/jquery.tablesorter.js"></script>
	


	<script type="application/javascript">
		$(function() {
		    evc.init();
		    evc.addSelectOptionCourse('select-content');
		    evc.addTableFilter('#abstracts-table','#select-content select');
		});

		var evc = ASSER.courses;

	  	
		
	</script>
   
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
                   <li><a href='../'>Sair</a></li>
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
            <fieldset>
				<legend> Formulário de Avaliação </legend>

				<div class="filter-container">
					<div> Curso: </div> <div id="select-content"> </div> 
					<div> ID: </div> 	 <div> 
											<input type="text" name="id" id="id" size="5" maxlength="5" />
								 	 	 	<input name="avaliar" type="submit" id="avaliar" value="Avaliar" />
								 	 	 </div>	
				</div>
				<div>
					<table id="abstracts-table" class="tablesorter" >
                    
                    <thead>
					<tr><th>ID</th><th>Título</th><th>Aluno</th><th>Curso</th><th>Status</th></tr>
                    </thead>
					<tbody>
					<?php					
						foreach($bd->devolveLista() as $row){
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
						$titulo = $row['titulo'];						
						echo '<tr class=\''.$linhaStatus. '\'><td>'.$row['id'].'</td><td>';?>
							
							<script>			
								var str = ' <?php echo $titulo; ?>  ';
								var res = str.toUpperCase();
								document.write(res);			
							</script>						
						
						<?php
							echo '</td><td>'.$row['nome'].'</td><td>'.$row['curso'].'</td><td class=\'itemStatus\'>'.buildSimpleRowStatus($row['status']).'</td></tr>';
						
						}
					?>
					</tbody>
					</table>
                </div>
			</fieldset>
            </form>
        </div>            
        <div id="rodape">
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2016, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>
