<?php
    require_once("../cfg/Session.php");
    $session = new Session("EventosAsser2016");
    error_reporting(0);

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
                   <li class='active'><a href='../index.html'>Submissão de Trabalhos</a></li>
                   <li><a href='../palestra'>Palestras</a></li>
                   <li><a href='../programa.html'>Programação</a></li>            
                   <li> <a href='../anais'>Edições<br>Anteriores</a></li>          
                   <li><a href='../contato'>Contato</a></li>
                   <li><a href='../creditos.html'>Créditos</a></li>
                </ul>
            </div>

            <div id="mmenu"> &nbsp;</div>
            <div id="mmenubar"> &nbsp;</div>
            <div id="mmenusubbar"> &nbsp;</div>
            <div id="mmenusubsubbar"> &nbsp;</div>
            <br /> 
        
        <br />
        
        <fieldset>
			<legend> Cadastro de Resumo </legend>
	        <div>
			    <form id="register-form" name="register-form" method="post" action="confirmaResumo.php"  novalidate="novalidate">
					<div>
						<p id="effect" class="ui-corner-all">

							Copie e cole, ou escreva as informações para o envio do resumo nos campos abaixo.
							Ao lado de cada item, você vai encontrar balões como este 
							explicando o que deve ser colocado em cada campo. 
							</p>
					</div>			

					<div class="info-resumo">Lembre-se o título descreve sinteticamente o seu trabalho</div>
					<div class="rotulo-resumo">Titulo</div>
					<div class="input-resumo"><input type="text" id="titulo" name="titulo" size="100" maxlength="250"  /></div>

	                <div class="info-resumo">Escolha o Tipo de apresentação</div>
					<div class="rotulo-resumo">Tipo</div>
                    <div>
                        <center><select id="tipo" name="tipo">
                            <?php
                            require_once("../cfg/BD.php");
                            $bd = new BD();
                            $str = "";
                            foreach($bd->retornaTipo() as $row) {
                                $str .= "<option value='" . $row['id'] . "'>" . $row['descricao'] . "</option>";
                            }
                            echo $str;
                            ?>
                        </select></center>
                    </div>

				  	<div class="info-resumo">Informe nome completo e e-mail dos autores</div>	
					<br/>
				  	<table id="table-authors-wrapper">
				    <thead>
				        <tr>
				           		<th id="table-author-col">Autor</th>
								<th id="table-author-name">Nome Completo</th>
								<th id="table-author-email">E-mail</th>
				        </tr>
				    </thead>
				  	
				    <tbody>
				        <tr>
				            <td colspan="3">
							        <div id="table-authors-container" class="scrollit">
							            <table id="table-authors">
							                <tr>
												<td> Autor (1) </td>
												<td> <input type="text" id="autor1" name="autor1" size="40" maxlength="255" value="<?php echo $session->get('nome'); ?>" /> </td>
												<td> <input type="text" id="email1" name="email1" size="40" maxlength="255" value="<?php echo $session->get('email'); ?>" /> </td>
											</tr>

							                <tr>
												<td> Autor (2) </td>
												<td> <input type="text" id="autor2" name="autor2" size="40" maxlength="255" /> </td>
												<td> <input type="text" id="email2" name="email2" size="40" maxlength="255" /> </td>
											</tr>

											<tr>
												<td> Autor (3) </td>
												<td> <input type="text" id="autor3" name="autor3" size="40" maxlength="255" /> </td>
												<td> <input type="text" id="email3" name="email3" size="40" maxlength="255" /> </td>
											</tr>

											<tr>
												<td> Autor (4) </td>
												<td> <input type="text" id="autor4" name="autor4" size="40" maxlength="255" /> </td>
												<td> <input type="text" id="email4" name="email4" size="40" maxlength="255" /> </td>
											</tr>

											<tr>
												<td> Autor (5) </td>
												<td> <input type="text" id="autor5" name="autor5" size="40" maxlength="255" /> </td>
												<td> <input type="text" id="email5" name="email5" size="40" maxlength="255" /> </td>
											</tr>
							            </table>
							        </div>
				                </td>
				        </tr>
				    </tbody>
				</table>
								             
				<button  class="button button-right" type="button" onclick="evs.addNewAuthorRowToTable();">Novo autor</button>
				<br/> <br/> <br/>
					
			                
	                <div class="info-resumo"> &nbsp; Informe seu resumo aqui, com Contexto, Lacuna de pesquisa, Objetivo, Metodologia, Resultado e Conclusão.
	                </div>
					<div class="rotulo-resumo">Resumo</div>
					<div class="input-resumo"><textArea id="texto" name="texto" cols="100" rows="7"></textArea></div>
					
					<div class="info-resumo">Adicone pelo menos três palavras-chave que caracterizem o seu trabalho. 
					Coloque as palavras-chave separadas por ponto-e-virgula. Por exemplo, <strong>Sistema Toyota; Administração de Empresas; Gestão</strong></div>
					<div class="rotulo-resumo">Palavras-chave</div>
					<div class="input-resumo"><input type="text" id="keyword" name="keyword" size="100" maxlength="95" /></div>
					
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