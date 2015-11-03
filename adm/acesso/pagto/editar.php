<!DOCTYPE html >
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<title>Asser Eventos - Cadastro realizado com sucesso</title>
<link REL=StyleSheet HREF="../../../css/estilo.css" TYPE="text/css"></head>

<body>
	<div id="corpo">
    	
        <div id="cabecalho">
		IX - Semana Conhecimento e VI - Mostra de Iniciação Científica
    	</div>
        
        <br />
        
        <div id="mmenu">
		Confirmar dados e pagamento.</div>
        
        <br />
        
        <div id="texto">
		    <form id="cad_resumo" name="resumo" method="post" action="confirma.php" >
            	
			<?php
				$codigo = $_POST['codigo'];
		// Estabelecendo a conexão com o banco de dados
		try{
			$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
			$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql = "SELECT * FROM pagamento WHERE codigo='$codigo'";
								
			foreach($link->query($sql) as $row){
				echo "<p align='center'><b>".$row['autor']."</b></p>";
				echo "<p align='center'>".$row['titulo']."</p>";			
				echo "<p align='center'>".$row['tipo']."</p>";			
			}
					
		}catch(PDOException $e){
			echo "ERROR" . $e->getMessage();
		}
	?>
				<p align="center"><b>Aluno:</b></p>
		    	<p align="center"><input type="text" name ="autor" size="100" maxlength="250" value="<?php echo $row['autor'];?>" /></p>
                <input type="hidden" name="codigo" value="<?php echo $codigo; ?>" />
				<p align="center"><input type="text" name ="titulo" size="100" maxlength="250" value="<?php echo $row['titulo'];?>" /></p>				
                <p align="center"><input type="text" name ="tipo" size="50" maxlength="50" value="<?php echo $row['tipo'];?>" /></p>
				<p align="center"><b>Pagamento: 1 - Pago </b></p>
                <p align="center"><input type="text" name ="pago" size="25" maxlength="25" value="1" /></p>
				
                <p align="center">
              <input name="cadastrar" type="submit" id="cadastrar" value="Confirmar Pagamento?" />
              <input name="limpar" type="reset" id="limpar" value="Limpar Campos!" /><br /> </p>
            </form>
		</div>
        
        <br />
        
        <div id="rodape">
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>