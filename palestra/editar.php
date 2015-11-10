<?php $config = require '../cfg/config.php'; ?>
<!DOCTYPE html >
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<title>Asser Eventos - Cadastro realizado com sucesso</title>
<link REL=StyleSheet HREF="../listar/estilo.css" TYPE="text/css"></head>

<body>
	<div id="corpo">
    	
		<div id="cabecalho">
			IX - Semana Conhecimento e VI - Mostra de Iniciação Científica
		</div>
        
        <br />
        
        <div id="mmenu">
		Inscrição em palestra realizada com sucesso</div>
        
        <br />
        
        <div id="texto">
		    <form id="cad_resumo" name="resumo" method="post" action="inscr.php" >
            	
			<?php
				$ra = $_POST['ra'];
				$nome = $_POST['nome'];
				$palestra = $_POST['palestra'];
		// Estabelecendo a conexão com o banco de dados
		try{
			$link = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
			$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql = "INSERT INTO palestras (ra,nome,palestra) VALUES ('$ra','$nome','$palestra')";
			$link->query($sql);
			
			$sql = "SELECT * FROM palestras WHERE ra='$ra'";
			echo '<table style="width:100%">';
			echo '<tr><td>ID</td><td>RA</td><td>ALUNO</td><td>PALESTRA</td></tr>';
					
			foreach($link->query($sql) as $row){
				echo '<tr><td>'.$row['id'].'</td><td>'.$row['ra'].'</td><td>'.$row['nome'].'</td><td>'.$row['palestra'].'</td></tr>';	
			}
			
			echo '</table>';
					
		}catch(PDOException $e){
			echo "ERROR" . $e->getMessage();
		}
		
	?>
	<input type="hidden" name="ra" value="<?php echo $ra; ?>" />
	<input type="hidden" name="nome" value="<?php echo $nome; ?>" />
				<p align="center"><a href="confirma.php">Finalizar</a></p>
				<p align="center"><input name="cadastrar" type="submit" id="cadastrar" value="Inscrever-se em mais palestras" /></p>
            </form>
		</div>
        
        <br />
    <div id="rodape">
              <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
      </div>
    </div>
</body>
</html>