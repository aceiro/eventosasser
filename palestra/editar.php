<?php $config = require '../cfg/config.php'; ?>
<!DOCTYPE html >
<html lang='pt-BR'>
<head>
	<meta charset='utf-8'/>
	<meta http-equiv='pragma' content='no-cache' />
	<meta http-equiv='cache-control' content='no-cache' />
	<meta http-equiv='cache-control' content='no-store' />
	<link rel='shortcut icon' href='favicon.ico'>
<title>Asser Eventos</title>

<!-- adicionado o suporte para o jquery e thema redmond -->
<link rel='stylesheet' href='//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css'>
<script src='//code.jquery.com/jquery-1.10.2.js'></script>
<script src='//code.jquery.com/ui/1.11.4/jquery-ui.js'></script>

<!-- outros suporte a css da página -->
<link rel='stylesheet' href='../css/menu-styles.css' type='text/css'>
<link rel='stylesheet' href='../css/estilo.css' type='text/css'>

<!-- outros scripts para o menu-->
<script src='../scripts/asser-main-menu.js'></script>
</head>

<body>
	<div id='corpo'>    	
		<div id='cabecalho'>
        </div>        
        <br />        
        <!-- menu da aplicacao -->
          <div id='cssmenu'>
                <ul>
                   <li><a href='../'>Sair</a></li> 
                </ul>
            </div>
            <!-- adiciona o suporte ao separador gradiente -->
            <div id='mmenu'> &nbsp;</div>
            <div id='mmenubar'> &nbsp;</div>
            <div id='mmenusubbar'> &nbsp;</div>
            <div id='mmenusubsubbar'> &nbsp;</div>
            <br />        
        <br />
        <div id="texto">
		    <form id="cad_resumo" name="resumo" method="post" action="inscr.php" >
            	
	<?php
				$ra = $_POST['ra'];
				$nome = $_POST['nome'];
				$palestra = $_POST['palestra'];
				echo $ra.' '.$nome.' '.$palestra;
		// Estabelecendo a conexão com o banco de dados
		try{
			$link = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
			$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql = "INSERT INTO palestras (ra,nome,palestra) VALUES ('$ra','$nome','$palestra')";
			$link->query($sql);
			
			$sql = "SELECT * FROM palestras WHERE ra='$ra'";
			echo '<table style="width:100%">';
			echo '<tr><td>RA</td><td>ALUNO</td><td>PALESTRA</td></tr>';
					
			foreach($link->query($sql) as $row){
				echo '<tr><td>'.$row['ra'].'</td><td>'.$row['nome'].'</td><td>'.$row['palestra'].'</td></tr>';	
			}
			
			echo '</table>';
					
		}catch(PDOException $e){
			echo "ERROR" . $e->getMessage();
		}
		
	?>
				<input type="hidden" name="ra" value="<?php echo $ra; ?>" />
				<input type="hidden" name="nome" value="<?php echo $nome; ?>" />
				<input type="hidden" name="palestra" value="<?php echo $palestra; ?>" />
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