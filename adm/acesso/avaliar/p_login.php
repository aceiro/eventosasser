<?php $config = require '../../../cfg/config.php'; ?>
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

<body>
	<div id="corpo">
    	
        <div id="cabecalho">
    	IX - Semana Conhecimento e VI - Mostra de Iniciação Científica
    	</div>
        
        <br />
        
        <div id="mmenu">
		Dados Pessoais | <a>Dados Resumo</a>  | <a>Avaliação realizada</a></div>
        
        <br />
        
        <div id="texto">
    		<form id="p_login" name="login" method="post" action="av_resumo.php" >
                <?php
				// Estabelecendo a conexão com o banco de dados
				$email = $_POST['email'];
				$senha = $_POST['senha'];
				try{
					$link = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
					$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
					$sql = "SELECT email, senha FROM evento WHERE email = '$email'";
					
					foreach($link->query($sql) as $row){
						
					}				
					if($row['senha']==$senha){
						echo "<input name='email' type='hidden' value='$email' />";
						echo "Avaliar resumo: ";
						echo "<input name='Avaliar Resumo' type='submit' id='avaliar' value='Avaliar' /></p>";
					}else{
						echo 'Email ou senha inválidos';
						echo '<a href="p_login.html">Tentar novamente</a>';
					}
					$resultado = null;
					
				}catch(PDOException $e){
					echo "ERROR";
				}
				?>
				<br />	
				<br />	
				<br />	
				<br />	
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