<!DOCTYPE html >
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<title>Asser Eventos</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<link rel="stylesheet" href="../../../css/menu-styles.css" type="text/css">
<link rel="stylesheet" href="../../../css/estilo.css" type="text/css">

<script src="../../../scripts/asser-main-menu.js"></script>
<script src="../../../scripts/asser-commum.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
</head>

<body>
	<div id="corpo">
    	
		<div id="cabecalho">
            IX - Semana Conhecimento
            <div id="subcabecalho" style="font-size:14px"> VI Mostra de Iniciação Científica </div>
        </div>
        
        <br />

          <div id='cssmenu'>
                <ul>
                   <li class='active'><a href='../index.html'>Submissão de Resumos</a></li>
                   <li><a href='../palestra'>Palestras</a></li>
                   <li><a href='../programa.html'>Programação</a></li>            
                   <li><a href='#'>Sobre o evento</a></li>             
                   <li><a href='../'>Administrativo</a></li>
                   <li><a href='../contato'>Contato</a></li>
                   <li><a href='../creditos.html'>Créditos</a></li>
                </ul>
            </div>

            <div id="mmenu"> &nbsp;</div>
            <div id="mmenubar"> &nbsp;</div>
            <div id="mmenusubbar"> &nbsp;</div>
            <div id="mmenusubsubbar"> &nbsp;</div>
            <br /> 
        
        <div id="texto">
    		<form id="cad_usuario" name="usuario" method="post" action="editar.php" >
                <fieldset>
				<legend>Confirma pagamento Ouvinte</legend>
				<div>
				<label>Digite o RA referente ao aluno para confirmar o pagamento.</label>
				<input type="text" name="ra" size="19" maxlength="20" /><input name="Confirmar" type="submit" id="Confirmar" value="Confirmar" /></div>
				<?php
				// Estabelecendo a conexão com o banco de dados
				try{
					$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
					$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
					$sql = 'SELECT * FROM palestras order by nome';
					
					echo '<table style="width:100%">';
					echo '<tr><td>CODIGO</td><td>ALUNO</td><td>RA</td><td>Palestra</td><td>PAGO</td></tr>';
					
					foreach($link->query($sql) as $row){
						echo '<tr><td>'.$row['id'].'</td><td>'.$row['ra'].'</td><td>'.$row['nome'].'</td><td>'.$row['palestra'].'</td><td>'.$row['pago'].'</td></tr>';	
					}
					echo '</table>';
					
				}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
				}
				?>				
                
				</fieldset>	

            </form>
        </div>
        
        <br />
        
        <div id="rodape">
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>
