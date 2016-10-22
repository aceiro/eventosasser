<?php 
	require_once("../cfg/Session.php");
	error_reporting(0);
	$session = new Session("EventosAsser2016");
	require_once("BD.php");
	$bd = new BD();
	header("Content-Type: text/html; charset=UTF-8", true);
	include_once('../utils/common.php');
	
   /* if(!strcmp($session->get('login'),null)){
       header('Location: ../');
       die();
    }*/
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
    <link rel="stylesheet" href="../css/menu-styles.css" type="text/css">
    <link rel="stylesheet" href="../css/estilo.css" type="text/css">


    <!-- outros scripts para o menu-->
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="../scripts/asser-main-menu.js"></script>
    <script src="../scripts/asser-commum.js"></script>

    <link rel="stylesheet" href="../scripts/tablesorter/blue/style.css" type="text/css" media="print, projection, screen">
    <link rel="stylesheet" href="../css/teacher-evaluation-style.css" type="text/css">
    <script type="text/javascript" src="../scripts/tablesorter/jquery.tablesorter.js"></script>
</head>

<script>
  $(function() {
    $("#register-form").validate({
        rules: {
            comentarios: "required",
            tipo: "required",
            email: {
                required: true,
                email: true
            },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  </script>
  
<body>
	<div id="corpo">
    	
		<div id="cabecalho">
        </div>
        
        <br />
        
          <div id='cssmenu'>
              <ul>
                   <li class='active'><a href='professor.php'>Voltar</a></li>
                </ul>
            </div>

            <div id="mmenu"> &nbsp;</div>
            <div id="mmenubar"> &nbsp;</div>
            <div id="mmenusubbar"> &nbsp;</div>
            <div id="mmenusubsubbar"> &nbsp;</div>
        <div class="welcome-login" style="margin-bottom: 80px;">
            <span id="small-button-class" class="small-button-class" onclick="javascript:location.href='loggout.php'"> Sair </span>
        </div>
            <br /> 
        
        
		<form id="register-form" 
                  name="register-form" method="post" 
                  action="confirma_resumo.php"  novalidate="novalidate">
          <fieldset>	
			<legend>Avaliar Resumo</legend>
			<?php
				$session->set('id',$_POST['id']);
				
				foreach($bd->devolveUm($session->get('id')) as $row){
					$titulo = $row['titulo'];
					
					echo "<p align='center'><strong>";?>
							
							<script>			
								var str = ' <?php echo $titulo; ?>  ';
								var res = str.toUpperCase();
								document.write(res);			
							</script>						
						
						</strong></p>
					<?php
					if( !isEmpty($row['autores']) ) {
						echo "<p align='right'>" . $row['autores'] . "</p>";
					}else {
						echo "<p align='right'>" . $row['nome'] . " - " . $row['email'] . "</p>";
					}

					echo "<p align='right'>" . $row['curso'] . "</p>";
					echo "<p align='right'>Orientador(a): ".$row['orientador'] . "</p>";
					echo "<p align='center'><b>RESUMO</b></p>";
					echo "<p align='justify'>" . $row['resumo'] . "</p>";
					echo "<p align='left'><strong>Palavras-chave:</strong> " . $row['keyword'] . "</p>";
					$session->set('comentarios', $row['comentarios']);
				}
			?>
				<div>
                    <label>Comentários</label>
                    <textArea name="comentarios" rows="8" cols="80" value="<?php $session->get('comentarios');?>" /></textArea>
                </div>
					
				<div>
                    <label>Status do trabalho</label>
                    <select id="status" name="status"  />
						<option value="1">Aprovado</option>
						<option value="2">Reenvio</option>
						<option value="3">Reprovado</option>
					</select>
                </div>
					
			     <input type="hidden" name="id" value="<?php echo $idTrabalho; ?>" />
                	
				<div button type="button" class="btn btn-default" aria-label="Left Align">
				   <input name="cadastrar" style="width:30%;" type="submit" id="cadastrar" value="Enviar" />
				
				   <input name="limpar" style="width:30%;" type="reset" id="limpar" value="Limpar" />
				</div>					
                </fieldset>
            </form>        
        <br />        
        <div id="rodape">
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2016, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>