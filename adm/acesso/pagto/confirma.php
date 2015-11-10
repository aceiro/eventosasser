<!DOCTYPE html >
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<title>Asser Eventos - Cadastro realizado com sucesso</title>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<link rel="stylesheet" href="../../../css/menu-styles.css" type="text/css">
<link rel="stylesheet" href="../../../css/estilo.css" type="text/css">

<script src="../../../scripts/asser-main-menu.js"></script>
<script src="../../../scripts/asser-commum.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

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

        <br />
        
        <div id="texto">
		    <form id="cad_resumo" name="resumo" method="post" action="comprovante.php" >
				<input type="hidden" name="codigo" value="<?php echo $codigo; ?>" />
				<input type="hidden" name="autor" value="<?php echo $autor; ?>" />
				<input type="hidden" name="titulo" value="<?php echo $titulo; ?>" />
				<input type="hidden" name="tipo" value="<?php echo $tipo; ?>" />
				<input type="hidden" name="pago" value="<?php echo $pago; ?>" />
            	<fieldset>	
				<legend>Pagamento realizado com sucesso!</legend>
			
				<div id="effect" class="ui-corner-all">O que deseja fazer?</div><br />				
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