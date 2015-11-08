<!DOCTYPE html >
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<title>Asser Eventos</title>

<!-- adicionado o suporte para o jquery e thema redmond -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!-- outros suporte a css da página -->
<link rel="stylesheet" href="../css/menu-styles.css" type="text/css">
<link rel="stylesheet" href="../css/estilo.css" type="text/css">

<!-- outros scripts para o menu-->
<script src="../scripts/asser-main-menu.js"></script>
<script src="../scripts/asser-commum.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
</head>


<body>
	<div id="corpo">
    	
		<div id="cabecalho">
            IX - Semana Conhecimento
            <div id="subcabecalho" style="font-size:14px"> VI Mostra de Iniciação Científica </div>
        </div>
        
        <br />
        
        <!-- menu da aplicacao -->
          <div id='cssmenu'>
                <ul>
                   <li><a href='../index.html'>Sobre o evento</a></li> 
                   <li><a href='../submissao.html'>Submissão de Resumos</a></li>
                   <li><a href='#' class='active'>Palestras</a></li>
                   <li><a href='../programa.html'>Programação</a></li>            
                   <li><a href='../adm'>Administrativo</a></li>
                   <li><a href='../contato'>Contato</a></li>
                   <li><a href='../creditos.html'>Créditos</a></li>
                </ul>
            </div>

            <!-- adiciona o suporte ao separador gradiente -->
            <div id="mmenu"> &nbsp;</div>
            <div id="mmenubar"> &nbsp;</div>
            <div id="mmenusubbar"> &nbsp;</div>
            <div id="mmenusubsubbar"> &nbsp;</div>
            <br />

        
        <br />
        
        <div>
      		<form id="cad_usuario" name="usuario" method="post" action="inscr.php" >
              <fieldset>
                <legend>Inscrição em Palestras</legend>
                <div>
                    <label>RA: </label>
                    <input type="text" name="ra" size="19" maxlength="20" />
                </div>
                <div>
                  <label>Nome: </label>
                  <input type="text" name="nome" size="70" maxlength="65" />
                </div>
                <div class="button">
                  <input type="hidden" name="palestra" size="80" maxlength="150" />
                  <input name="Proximo" type="submit" id="Confirmar" value="Confirmar" />
                </div>
              </fieldset>
           </form>
        </div>
        
        <br />
    
    <div id="rodape">
              <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
      </div>
    </div>
</body>
</html>
