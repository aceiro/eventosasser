<!DOCTYPE html >
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<title>EventSIS</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<link rel="stylesheet" href="../../../css/menu-styles.css" type="text/css">
<link rel="stylesheet" href="../../../css/estilo.css" type="text/css">

<script src="../../../scripts/asser-main-menu.js"></script>
<script src="../../../scripts/asser-commum.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<body>
	<div id="corpo">
    	
        <div id="cabecalho">
    	Mostra Científica 2015.
    	</div>
        
        <br />
        
        <div id="mmenu">
		<a>Dados Pessoais</a> | Dados Resumo  | <a>Avaliação realizada</a></div>
        
        <br />
        
        <div id="texto">
    		<form id="cad_usuario" name="usuario" method="post" action="av_resumo.php"  onSubmit="return validaCampo(); return false;">
                <br />
				<p align="center"><b>Digite o ID do resumo a avaliar.</b></p>
				<p align="center"><input type="text" name="id" size="19" maxlength="20" /><input name="avaliar" type="submit" id="avaliar" value="Avaliar" /></p>
				<?php
				// Estabelecendo a conexão com o banco de dados
				try{
					$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
					$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
					$sql = 'SELECT * FROM evento order by curso';
					
					echo '<table style="width:100%">';
					echo '<tr><td>ID</td><td>TITULO</td><td>ALUNO</td><td>CURSO</td><td>STATUS</td></tr>';
					
					foreach($link->query($sql) as $row){
						echo "<tr><td>".$row['id']."</td>";
						echo '</td><td>'.$row['titulo'].'</td><td>'.$row['nome'].'</td><td>'.$row['curso'].'</td><td>'.$row['status'].'</td></tr>';	
					}
					echo '</table>';
					
				}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
				}
				?>				
                
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
