<!DOCTYPE html >
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<title>Asser Eventos</title>
<link REL=StyleSheet HREF="../../../css/estilo.css" TYPE="text/css"></head>

<body>
	<div id="corpo">
    	
        <div id="cabecalho">
    	IX - Semana Conhecimento e VI - Mostra de Iniciação Científica
    	</div>
        
        <br />
        
        <div id="mmenu">
		Historico de pagamentos realizados.</div>
        
        <br />
        
        <div id="texto">
    		<form id="cad_usuario" name="usuario" method="post" action="editar.php" >
                <br />
				<p align="center"><b>Digite o codigo referente ao aluno para confirmar o pagamento.</b></p>
				<p align="center"><input type="text" name="codigo" size="19" maxlength="20" /><input name="Confirmar" type="submit" id="Confirmar" value="Confirmar" /></p>
				<?php
				// Estabelecendo a conexão com o banco de dados
				try{
					$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
					$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
					$sql = 'SELECT * FROM pagamento order by autor';
					
					echo '<table style="width:100%">';
					echo '<tr><td>CODIGO</td><td>ALUNO</td><td>TITULO</td><td>TIPO</td><td>PAGO</td></tr>';
					
					foreach($link->query($sql) as $row){
						echo '<tr><td>'.$row['codigo'].'</td><td>'.$row['autor'].'</td><td>'.$row['titulo'].'</td><td>'.$row['tipo'].'</td><td>'.$row['pago'].'</td></tr>';	
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
