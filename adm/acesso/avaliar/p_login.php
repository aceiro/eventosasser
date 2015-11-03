<!DOCTYPE html >
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<title>Asser Eventos</title>
<link REL=StyleSheet HREF="estilo.css" TYPE="text/css"></head>

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
    		<form id="p_login" name="login" method="post" action="av_resumo.php"  onSubmit="return validaCampo(); return false;">
                <?php
				// Estabelecendo a conexão com o banco de dados
				$email = $_POST['email'];
				$senha = $_POST['senha'];
				try{
					$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
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