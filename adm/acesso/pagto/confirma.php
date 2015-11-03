<!DOCTYPE html >
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<title>Asser Eventos - Cadastro realizado com sucesso</title>
<link REL=StyleSheet HREF="../../../css/estilo.css" TYPE="text/css"></head>

<?php
		$codigo = $_POST['codigo'];
		$autor = $_POST['autor'];
		$titulo = $_POST['titulo'];
		$tipo = $_POST['tipo'];
		$pago = $_POST['pago'];
		
	// Estabelecendo a conexão com o banco de dados
	try{
		$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "UPDATE pagamento SET autor='$autor', titulo='$titulo', tipo='$tipo', pago='$pago' WHERE codigo ='$codigo'";
		$link->query($sql);

		

	}catch(PDOException $e){
		echo "ERROR" . $e->getMessage();
	}
?>

<body>
	<div id="corpo">
    	
        <div id="cabecalho">
			IX - Semana Conhecimento e VI - Mostra de Iniciação Científica
    	</div>
        
        <br />
        
        <div id="mmenu">
		Pagamento confirmado.</div>
        
        <br />
        
        <div id="texto">
		    <form id="cad_resumo" name="resumo" method="post" action="comprovante.php"  onSubmit="return validaCampo(); return false;">
            	<p align="center">Pagamento realizado com sucesso!</p>
				<input type="hidden" name="codigo" value="<?php echo $codigo; ?>" />
				<input type="hidden" name="autor" value="<?php echo $autor; ?>" />
				<input type="hidden" name="titulo" value="<?php echo $titulo; ?>" />
				<input type="hidden" name="tipo" value="<?php echo $tipo; ?>" />
				<input type="hidden" name="pago" value="<?php echo $pago; ?>" />
				<p align="center"><a href="index.php">Novo Pagamento</a> </p>
				<p align="center"><input name="comprovante" type="submit" id="comprovante" value="Imprimir Comprovante" /></p>
            </form>
		</div>
        
        <br />
        
        <div id="rodape">
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>