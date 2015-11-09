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
		    <form id="cad_resumo" name="resumo" method="post" action="confirma.php" >
            	
	<?php
		$ra = $_POST['ra'];
		try{
			$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
			$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql = "SELECT DISTINCT nome, ra FROM palestras WHERE ra='$ra'";
								
			foreach($link->query($sql) as $row){			
			}
					
		}catch(PDOException $e){
			echo "ERROR" . $e->getMessage();
		}
	?>
	<fieldset>	
		<legend>Confirmar Pagamento</legend>
			<div>
				<label>Aluno</label>
				<input type="text" name ="nome" size="50" maxlength="250" value="<?php echo $row['nome'];?>" />
			</div>
			<div>
				<label>RA</label>
				<input type="text" name ="ra" size="50" maxlength="250" value="<?php echo $row['ra'];?>" />
			</div>			
			<div>
				<label>Pagamento: 1 - Pago </label>
				<input type="text" name ="pago" size="10" maxlength="1" value="1" />
			</div>    
                <p align="center">
              <input name="cadastrar" type="submit" id="cadastrar" value="Confirmar Pagamento?" />
              <input name="limpar" type="reset" id="limpar" value="Limpar Campos!" /><br /> </p>
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