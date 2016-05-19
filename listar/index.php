<?php 
	include_once('../utils/common.php');
	require_once("../cfg/BD.php");
	$bd = new BD();
	header("Content-Type: text/html; charset=UTF-8", true);	
?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="cache-control" content="no-store" />
	<link rel="shortcut icon" href="../favicon.ico">
	<title>Asser Eventos</title>
	<!-- adicionado o suporte para o jquery e thema redmond -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<!-- adicionado o suporte para o bootstrap padrão  -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>	 
	<!-- outros suporte a css da página -->
	<link rel="stylesheet" href="../css/menu-styles.css" type="text/css">
	<link rel="stylesheet" href="../css/estilo.css" type="text/css">
	<!-- outros scripts para o menu-->
	<script src="../scripts/asser-main-menu.js"></script>
	<script type="application/javascript">
		$(document).ready(function()
        {
            var $table 		= $("#myTable")	, 
            	$rowsResend = $('table tr:contains("Re-enviar")');	
            
            /* $table.tablesorter(); */
            $rowsResend.each(function(){ 
            		var $row = $(this);
            		$row.css("cursor","pointer");	

            		$row.hover(function(){
            			$row.css("background-color", "#87F59D");
            		}, function(){
            			$row.css("background-color", "");
            		});

            		$row.click(function(){
            			window.location.href='../reenvio'
            		});            		
            	});
        }
		);
	</script>

    <style type="text/css">
        #listar-coteudo{
            margin: 5px 5px 5px 50px;
        }

        table{
            width: 95%;
        }

        table caption{
            font-size: 14px;
            text-align: center;
        }

        table, th, td{
            border: 1px solid #CBCDDD;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
            text-align: center;
        }

        tr:nth-child(even){
            background-color: #eee;
        }

        tr:nth-child(odd){
            background-color: #fff;
        }

        th{
            background-color: #1862A1;
            color: white;
        }

        .itemStatus {
            text-align: center;
        }


        fieldset{
            width: auto;
            height: auto;
            margin: 10px;
        }

        table.tablesorter thead tr th{
            background-color: #1862A1;
        }
    </style>

</head>

<body>
	<div id="corpo">
    	
		<div id="cabecalho">
    	</div>
        
        <br />
        
       <!-- menu da aplicacao -->
      <div id='cssmenu'>
			<ul>
			   <li><a href='../index.html'>Evento</a></li>	
			   <li class='active'><a href='../submissao.html'>Submissão de Trabalhos</a></li>
			   <li><a href='../palestra'>Palestras</a></li>
			   <li><a href='../programa.html'>Programação</a></li>			   
			   <li> <a href='../anais'>Edições<br>Anteriores</a></li>  
			   <li><a href='../contato'>Contato</a></li>
			   <li><a href='../creditos.html'>Créditos</a></li>
			</ul>
	 	</div>

		<!-- adiciona o suporte ao separador gradiente -->
		<div id="mmenu"> &nbsp;</div>
		<div id="mmenubar"> &nbsp;</div>
		<div id="mmenusubbar"> &nbsp;</div>
		<div id="mmenusubsubbar"> &nbsp;</div>
		<br />   
        
        <div id="listar-coteudo">
		<p align="center"><a href="../">Voltar</a></p>
                <table id="table-hover">
					<caption><strong>Lista de Resumos submetidos </strong><br>
					Trabalhos com status aprovado devem recolher taxa de R$ 20,00 na secretaria.
					</caption>
					<th>ID</th><th>TITULO</th><th>ALUNO</th><th>CURSO</th><th>STATUS</th>
				<?php
					foreach ($bd->listar() as $row) {
						$status = $row['status'];
						switch($status){
							case 0:{
								$result="<span class=\"glyphicon glyphicon-list-alt\"></span><br/> Enviado";
								$linhaStatus = "info";
								break;
							}
							case 1:{
								$result="<span class=\" glyphicon glyphicon-ok-circle\"></span><br/>Aprovado";
								$linhaStatus = "success";
								break;
							}
							case 2:{
								$result="<span class=\" glyphicon glyphicon-ban-circle\"></span><br/>Re-enviar";
								$linhaStatus = "warning";
								break;
							}
							case 3:{
								$result="<span class=\" glyphicon glyphicon-remove-circle\"></span><br/>Reprovado";
								$linhaStatus = "danger";
								break;
							}
							default:{
								$result="-";								
							}
						}
						$titulo = $row['titulo'];						
						echo '<tr class=\''.$linhaStatus. '\'><td>'.$row['id'].'</td><td>';?>
						
						<script>			
							var str = ' <?php echo $titulo; ?>  ';
							var res = str.toUpperCase();
							document.write(res);			
						</script>						
						
						<?php
							echo '</td><td>' . $row['nome'] . '</td><td>' . $row['curso'] . '</td><td>' . $result . '</td></tr>';
					}					
				?>		
				</table>
				<br />			
                <p align="center"><a href="../">Voltar</a></p>
				<br />	
        </div>
        
        <br />
    <div id="rodape">
              <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
      </div>
    </div>
</body>
</html>