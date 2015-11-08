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
			   <li class='active'><a href='../index.html'>Submissão de Resumos</a></li>
			   <li><a href='../palestra'>Palestras</a></li>
			   <li><a href='../programa.html'>Programação</a></li>			   
			   <li><a href='#'>Sobre o evento</a></li>			   
			   <li><a href='../adm'>Administrativo</a></li>
			   <li><a href='../contato'>Contato</a></li>
			   <li><a href='#'>Créditos</a></li>
			</ul>
	 	</div>

		<!-- adiciona o suporte ao separador gradiente -->
		<div id="mmenu"> &nbsp;</div>
		<div id="mmenubar"> &nbsp;</div>
		<div id="mmenusubbar"> &nbsp;</div>
		<div id="mmenusubsubbar"> &nbsp;</div>
		<br />
        
        
        
        <div>
		<p align="center"><a href="../">Voltar</a></p>
    		<form id="cad_usuario" name="usuario" method="post" action="av_resumo.php"  onSubmit="return validaCampo(); return false;">
                
				<?php
				// Estabelecendo a conexão com o banco de dados
				try{
					$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
					$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
					$sql = 'SELECT * FROM evento order by curso';
					echo '<p align="center" size="10"><b>';
					echo ' 0 : Enviado |';
					echo ' 1 : Aprovado |';
					echo ' 2 : Reenvio |';
					echo ' 4 : Reprovado</b></p>';
					echo '<table style="width:100%">';
					echo '<tr><td>ID</td><td>TITULO</td><td>ALUNO</td><td>CURSO</td><td>STATUS</td></tr>';
					
					foreach($link->query($sql) as $row){
					echo '<tr><td>'.$row['id'].'</td><td>'.$row['titulo'].'</td><td>'.$row['nome'].'</td><td>'.$row['curso'].'</td><td>'.$row['status'].'</td></tr>';	
					}
					echo '</table>';
					
				}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
				}
				?>				
                <p align="center"><a href="../">Voltar</a></p>
				<br />	

            </form>
        </div>
        
        <br />
    <div id="rodape">
              <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
      </div>
    </div>
</body>
</html>
