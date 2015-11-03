<!DOCTYPE html >
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<title>Asser Eventos</title>
<link REL=StyleSheet HREF="../css/estilo.css" TYPE="text/css"></head>

<body>
	<div id="corpo">
    	
		<div id="cabecalho">
			IX - Semana Conhecimento e VI - Mostra de Iniciação Científica
		</div>
        
        <br />
        
        <div id="mmenu">
		Situação dos trabalhos Enviados</div>
        
        
        
        <div id="texto">
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
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>
