<?php $config = require '../cfg/config.php'; ?>
<?php
	$ra = $_POST['ra'];
	$nome = $_POST['nome'];
	if($_POST['palestra']!=""){
		$palestra = $_POST['palestra'];
	}
	$meuhtml = "<!DOCTYPE html >
<html lang='pt-BR'>
<head>
<meta charset='utf-8' />
<title>Asser Eventos</title>
<link REL=StyleSheet HREF='../css/estilo.css' TYPE='text/css'>
<!-- adicionado o suporte para o jquery e thema redmond -->
<link rel='stylesheet' href='//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css'>
<script src='//code.jquery.com/jquery-1.10.2.js'></script>
<script src='//code.jquery.com/ui/1.11.4/jquery-ui.js'></script>

<!-- outros suporte a css da página -->
<link rel='stylesheet' href='../css/menu-styles.css' type='text/css'>
<link rel='stylesheet' href='../css/estilo.css' type='text/css'>

<!-- outros scripts para o menu-->
<script src='//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js'></script>
<script src='../scripts/asser-main-menu.js'></script>
<script src='../scripts/asser-commum.js'></script>
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
        <br />
        
        <div id='texto'>
    		<form id='cad_usuario' name='usuario' method='post' action='editar.php' >
				<p align='center'><b>Escolha uma palestra</b></p>
				<div align='center'><select name='palestra' id='palestra' style='width:700px;'>";
//conexão com o banco de dados
		try{
			$link = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
			$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
			$sql = "SELECT * FROM palestra";
			$link->query($sql);
			foreach($link->query($sql) as $row){
				$palestrasel = $row['dia'].' '.$row['horario'].' '.$row['palestrante'].' '.$row['palestra'];
				$meuhtml = $meuhtml."<option value='$palestrasel'>$palestrasel</option>";
			}
			echo $meuhtml;
			$meuhtml = "</select></div>
				<p align='center'><input type='hidden' id='ra'  name='ra' value='$ra' />
				<p align='center'><input type='hidden' id='nome' name='nome' value='$nome' />
				<div class='button'>	
					<input name='proximo' style='width:30%;' type='submit' id='proximo' value='Proximo' />
				</div>
				<br />	
            </form>
        </div>
        
        <br />
        
        <div id='rodape'>
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>";			
	echo $meuhtml;
	
	}catch(PDOException $e){
			echo "ERROR" . $e->getMessage();
		}
							
?>		