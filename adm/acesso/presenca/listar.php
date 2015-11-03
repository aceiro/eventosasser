<!DOCTYPE html >
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<title>Asser Eventos</title>
<link REL=StyleSheet HREF="../../../css/estilo.css" TYPE="text/css"></head>

<body>
	<div id="corpo">
    	
		<div id="cabecalho">
			IX - Semana Conhecimento e VI - Mostra de Iniciação Científica
		</div>
        
        <br />
        
        <div id="mmenu">
		Lista de presença</div>
        
        
        
        <div id="texto">
    		<form id="cad_usuario" name="usuario" method="post" action="av_resumo.php"  onSubmit="return validaCampo(); return false;">
                
				<?php
				$palestra=$_POST['palestra'];
				// Estabelecendo a conexão com o banco de dados
				try{
					$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
					$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
					$sql = "SELECT nome, ra FROM palestras WHERE pago='1' AND palestra='$palestra' order by nome";
					echo '<p align="center" size="10"><b>';
					$dia = date("l");
					if(strcmp($dia,"Monday")==0){
						$dia = 'Segunda-feira';
					}else if(strcmp($dia,"Thirday")==0){
								$dia = 'Terça-feira';
							}else if(strcmp($dia,"Wednesday")==0){
										$dia = 'Quarta-feira';
									}else if(strcmp($dia,"Thursday")==0){
												$dia = 'Quinta-feira';
											}else if(strcmp($dia,"Friday")==0){
														$dia = 'Sexta-feira';
													}
					echo $dia.' - Data: __/__/_____</p>';
					echo "<p align='center'> <i>Palestra:".$palestra."</i>";
					echo '<table style="width:90%" align="center">';
					echo '<tr><td>NOME</td><td>RA</td><td>ASSINATURA</td></tr>';
					
					foreach($link->query($sql) as $row){
					echo '<tr><td>'.$row['nome'].'</td><td>'.$row['ra'].'</td><td>________________________</td></tr>';	
					}
					echo '</table>';
					
				}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
				}
				?>				
                <p align="center"><a href="../">Voltar</a></p>
				<br />	
				<p align="center"><a href="index.php">Imprimir nova lista</a></p>
				<p align="center"><a href="../">Página inicial</a></p>

            </form>
        </div>
        
        <br />
        
        <div id="rodape">
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>
