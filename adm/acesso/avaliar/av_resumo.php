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
		<a>Dados Pessoais</a> | Dados Resumo  | <a>Avaliação realizada</a></div>
        
        <br />
        
        <div id="texto">
		    <form id="cad_resumo" name="resumo" method="post" action="confirma.php"  onSubmit="return validaCampo(); return false;">
            	
			<?php
		$id = $_POST['id'];
		// Estabelecendo a conexão com o banco de dados
		try{
			$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
			$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql = "SELECT * FROM evento WHERE id='$id'";
								
			foreach($link->query($sql) as $row){
				echo "<p align='center'><b>".$row['id']."</b></p>";
				echo "<p align='center'><b>".$row['titulo']."</b></p>";
				echo "<p align='right'>".$row['autores']."</p>";			
				echo "<p align='right'>".$row['curso']."</p>";			
				echo "<p align='right'>Orientador(a): ".$row['orientador']."</p>";			
				echo "<p align='justify'>".$row['resumo']."</p>";			
				echo "<p align='left'>".$row['keyword']."</p>";			
			}
					
		}catch(PDOException $e){
			echo "ERROR" . $e->getMessage();
		}
	?>
				<p align="center"><b>Comentários:</b></p>
		    	<p align="center"><textArea name="comentarios" rows="8" cols="80" value="<?php $row['comentarios'];?>" /></textArea></p>
                <input type="hidden" name="id" value="<?php echo $id; ?>" />			
                <p align="center"><b>Status: 1 - Aprovado | 2 - Reenvio | 3 - Reprovado</b></p>
                <p align="center"><input type="text" name ="status" size="70" maxlength="65" value="1" /></p>
				
                <p align="center">
              <input name="cadastrar" type="submit" id="cadastrar" value="Confirmar cadastro" />
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