<?php
	require_once("../cfg/BD.php");
	$bd = new BD();
	$bd->selecionaUmResumo();error_reporting(0);
	$session = new Session("EventosAsser2016");
	$valida = $session->get('titulo');
	if(strcmp($valida,"")==0){
		require_once("../adm/sair.php");
		sair();
		header("location: ./");
	}
?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="cache-control" content="no-store" />
	<link rel="shortcut icon" href="../favicon.ico">
	<title>Asser Eventos</title>
	

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<script src="../scripts/asser-main-menu.js"></script>
	<script src="../scripts/asser-commum.js"></script>
	<script src="../scripts/asser-submission.paper-1.0.0.js"></script>

	<link rel="stylesheet" href="../css/menu-styles.css" type="text/css">
	<link rel="stylesheet" href="../css/estilo.css" type="text/css">

	<script type="text/javascript">
		var evs = ASSER.submission;

	  	$(function() {
		    evs.init();		   
		});

		$(document).ready(function(){
			var TimeoutFadeIn = {
				FAST		: 1500,
				SLOW		: 3000,
				VERY_SLOW	: 6000
			};

			$("#effect").fadeIn(TimeoutFadeIn.FAST);
			$("#info-title-bubble").fadeIn(TimeoutFadeIn.SLOW);
			$("#info-course-bubble").fadeIn(TimeoutFadeIn.SLOW);	
			$("#info-adviser-bubble").fadeIn(TimeoutFadeIn.VERY_SLOW);
			$("#info-authors-bubble").fadeIn(TimeoutFadeIn.VERY_SLOW);
			$("#info-abstract-bubble").fadeIn(TimeoutFadeIn.VERY_SLOW);
			$("#info-keywords-bubble").fadeIn(TimeoutFadeIn.VERY_SLOW);
			
			
		});

	</script>
	
</head>

<body>
	<div id="corpo">
    	
		<div id="cabecalho">
        </div>
        
        <br />
          <div id='cssmenu'>
                <ul>
                   <li><a href='../index.html'>Evento</a></li>      
                   <li class='active'><a>Reenvio de Trabalhos</a></li>
                   <li><a href='../index.html'>Sair</a></li>
                </ul>
            </div>

            <div id="mmenu"> &nbsp;</div>
            <div id="mmenubar"> &nbsp;</div>
            <div id="mmenusubbar"> &nbsp;</div>
            <div id="mmenusubsubbar"> &nbsp;</div>
            <br /> 
        
        <br />
        
        <fieldset>
			<legend> Reenvio de Resumo </legend>
	        <div>
			    <form id="register-form" name="register-form" method="post" action="confirma_resumo.php"  novalidate="novalidate">
					<div id="info-title-bubble" class="info-resumo display-none">Leia os comentários do avaliador e só altere o que foi solicitado.</div>
					
					<div class="rotulo-resumo">Comentários do avaliador</div>
					<div class="input-resumo"><textArea id="comentarios" name="comentarios" cols="70" rows="5" ><?php echo $session->get('comentarios');?></textArea></div>
								

					<div class="rotulo-resumo">Titulo</div>
					<div class="input-resumo"><input type="text" id="titulo" name="titulo" size="100" maxlength="250" value="<?php echo $session->get('titulo');?>" /></div>
	               
					<div class="rotulo-resumo">Curso</div>
					<?php
						echo '<center><strong>' . $session->get('curso') . '</strong></center><br />';
						echo "<input type='hidden' id='curso' name='curso' value='" . $session->get('curso') . "'>";
					?>
					                                
					<div class="rotulo-resumo">Orientador</div>
					<div class="input-resumo">
					
					<input type="text" id="orientador" name="orientador" size="75" maxlength="255" value="<?php echo $session->get('orientador');?>"/></div>
					<br />				
				  	<div class="rotulo-resumo">Autores</div>
				  	<?php 						
						echo '<center><strong>' . $session->get('autores') . '</strong></center>';
					?>
				  	
				<br/>					
			                
	                <div id="info-abstract-bubble" class="info-resumo display-none"> &nbsp; Altere seu resumo aqui, caso necessário, com Contexto, Lacuna de pesquisa, Objetivo, Metodologia, Resultado e Conclusão.
	                </div>
					<div class="rotulo-resumo">Resumo</div>
					<div class="input-resumo"><textArea id="resumo" name="resumo" cols="100" rows="7" ><?php echo $session->get('resumo');?></textArea></div>
					
					<div id="info-keywords-bubble" class="info-resumo display-none">Adicone pelo menos três palavras-chave que caracterizem o seu trabalho. 
					Coloque as palavras-chave separadas por ponto-e-virgula. Por exemplo, <strong>Sistema Toyota; Administração de Empresas; Gestão</strong></div>
					<div class="rotulo-resumo">Palavras-chave</div>
					<div class="input-resumo"><input type="text" id="keyword" name="keyword" size="100" maxlength="95" value="<?php echo $session->get('keyword');?>"/></div>
					
	                 <div class="text-align-center">
	              		<input class="button button-center" name="cadastrar" type="submit" id="cadastrar" value="Confirmar" /> 
	              		<input class="button button-center" name="limpar" type="reset" id="limpar" value="Limpar" />
	              	</div>
					
	              
	            </form>
			</div>
		</fieldset>

        <br />      
    <div id="rodape">
            <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
        </div>
    </div>
</body>
</html>